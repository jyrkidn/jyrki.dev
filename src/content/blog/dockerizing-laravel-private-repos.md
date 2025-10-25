---
title: "Dockerizing Laravel with Private Repositories: A Complete Guide"
date: 2025-10-24
excerpt: Learn how to containerize your Laravel application with private package access, multiple containers for different responsibilities, and automated deployment using Portainer and Watchtower.
tags: []
---

## Why Docker for Laravel Deployment?

Moving from traditional deployment methods to Docker offers significant advantages for Laravel applications. Instead of managing PHP versions, extensions, and dependencies directly on servers, Docker allows you to package everything into consistent, reproducible containers. This means no more "it works on my machine" problems and easier maintenance across staging and production environments.

For a recent project, we migrated from a traditional deployment setup using Deployer to a fully containerized Docker solution. This article walks through the implementation, focusing on three key challenges: accessing private package repositories during builds, running separate containers for web, queue, and scheduled tasks, and automating deployments with Portainer and Watchtower.

## Docker Architecture: Multi-Stage Builds

The foundation of our setup is a multi-stage Dockerfile that efficiently builds our Laravel application. We use [ServerSideUp's PHP Docker images](https://serversideup.net/open-source/docker-php/) as our base, which come pre-configured with PHP-FPM and Nginx.

### Base Image Setup

The base stage installs all necessary PHP extensions:

```dockerfile
FROM serversideup/php:8.3-fpm-nginx AS base

USER root
RUN install-php-extensions intl bcmath gd exif imagick
```

### Development vs Production Stages

For local development, we create a stage that maps user IDs to avoid permission issues:

```dockerfile
FROM base AS development

ARG USER_ID
ARG GROUP_ID

USER root
RUN docker-php-serversideup-set-id www-data $USER_ID:$GROUP_ID && \
    docker-php-serversideup-set-file-permissions --owner $USER_ID:$GROUP_ID --service nginx
```

For CI and production, we use different configurations to ensure proper permissions and security.

## Accessing Private Repositories During Build

One of the trickiest parts of containerizing a Laravel application is accessing private packages during the build process. Our project requires access to three types of private repositories:

1. GitHub private repositories (for custom packages)
2. Repman private registry (for internal packages)
3. Font Awesome Pro (via npm)

### Composer Dependencies with Build Secrets

Docker BuildKit's secret mounting feature allows us to securely pass tokens during build without baking them into the image:

```dockerfile
FROM base AS vendor
WORKDIR /var/www/html
USER root

# Install git for composer
RUN apt-get update && apt-get install -y git && rm -rf /var/lib/apt/lists/*

COPY composer.json composer.lock ./

RUN --mount=type=secret,id=GITHUB_TOKEN \
    --mount=type=secret,id=REPMAN_TOKEN \
    git config --global url."https://x-access-token:$(cat /run/secrets/GITHUB_TOKEN)@github.com/".insteadOf "git@github.com:" && \
    composer config --global --auth http-basic.org.repman.org token "$(cat /run/secrets/REPMAN_TOKEN)" && \
    composer install --no-dev --no-scripts --optimize-autoloader --no-interaction
```

This approach configures git to use the GitHub token for HTTPS access and sets up authentication for the Repman registry, all without exposing tokens in the final image.

### NPM Private Packages

For Font Awesome Pro, we use a similar approach in the assets build stage:

```dockerfile
FROM node:21 AS assets
WORKDIR /var/www/html

COPY package.json package-lock.json ./

RUN --mount=type=secret,id=FONT_AWESOME_TOKEN \
    npm config set "@fortawesome:registry" https://npm.fontawesome.com/ && \
    npm config set "//npm.fontawesome.com/:_authToken" "$(cat /run/secrets/FONT_AWESOME_TOKEN)" && \
    npm ci

COPY . .
COPY --from=vendor /var/www/html/vendor ./vendor

RUN npm run build
```

### GitHub Actions Integration

In your GitHub Actions workflow, you pass these secrets during the build:

```yaml
- name: Build and push Docker image
  uses: docker/build-push-action@v5
  with:
    context: .
    file: ./Dockerfile
    target: deploy
    push: true
    tags: ${{ steps.meta.outputs.tags }}
    secrets: |
      FONT_AWESOME_TOKEN=${{ secrets.FONT_AWESOME_TOKEN }}
      REPMAN_TOKEN=${{ secrets.REPMAN_TOKEN }}
      GITHUB_TOKEN=${{ secrets.GITHUB_TOKEN }}
```

## Three Container Architecture: Web, Queue, and Scheduler

A common pattern in Laravel deployments is running separate processes for different responsibilities. Our setup uses three containers, all built from the same image but with different entry points.

### Container 1: Web Server

The main PHP container runs PHP-FPM with Nginx:

```yaml
services:
  php:
    image: ghcr.io/org/project-production-php:latest
    container_name: project-production-php
    ports:
      - 8080:8080
    environment:
      AUTORUN_ENABLED: true
      OPCACHE_ENABLED: true
      AUTORUN_LARAVEL_ROUTE_CACHE: false
      AUTORUN_LARAVEL_VIEW_CACHE: false
    volumes:
      - storage:/var/www/html/storage
      - cache:/var/www/html/bootstrap/cache
      - lang:/var/www/html/lang
```

This container handles all HTTP requests and serves your Laravel application.

### Container 2: Queue Worker

The queue container runs Laravel's queue worker for background job processing:

```yaml
queue:
  image: ghcr.io/org/project-production-php:latest
  container_name: project-production-queue
  command: ["php", "/var/www/html/artisan", "queue:work", "--tries=3"]
  stop_signal: SIGTERM
  volumes:
    - storage:/var/www/html/storage
    - cache:/var/www/html/bootstrap/cache
    - lang:/var/www/html/lang
  healthcheck:
    test: ["CMD", "healthcheck-queue"]
    start_period: 10s
```

The `SIGTERM` signal ensures graceful shutdown, allowing jobs to complete before stopping. The ServerSideUp image includes a built-in `healthcheck-queue` command that monitors queue worker health.

### Container 3: Scheduler

The scheduler container runs Laravel's schedule worker for cron tasks:

```yaml
task:
  image: ghcr.io/org/project-production-php:latest
  container_name: project-production-task
  command: ["php", "/var/www/html/artisan", "schedule:work"]
  stop_signal: SIGTERM
  volumes:
    - storage:/var/www/html/storage
    - cache:/var/www/html/bootstrap/cache
    - lang:/var/www/html/lang
  healthcheck:
    test: ["CMD", "healthcheck-schedule"]
    start_period: 10s
```

This eliminates the need for cron configuration on the host system. The `schedule:work` command runs continuously and executes scheduled tasks at the right time.

### Shared Environment Variables

All three containers share the same environment configuration using YAML anchors:

```yaml
x-env: &default-env
  APP_NAME: ${APP_NAME}
  APP_ENV: ${APP_ENV}
  APP_KEY: ${APP_KEY}
  DB_CONNECTION: ${DB_CONNECTION}
  DB_HOST: ${DB_HOST}
  # ... other environment variables

services:
  php:
    environment:
      <<: *default-env
      # Additional web-specific variables

  queue:
    environment:
      <<: *default-env

  task:
    environment:
      <<: *default-env
```

This ensures consistency across all containers while keeping your docker-compose file DRY.

### Shared Volumes

All three containers share persistent volumes for data that needs to survive container restarts:

```yaml
volumes:
  storage:   # Laravel storage directory
  cache:     # Bootstrap cache
  lang:      # Language files
```

These volumes are mapped on the host system by your container orchestration tool (in our case, Portainer).

## Automated Deployment with Portainer and Watchtower

While the PR focused on the Docker setup, deployment automation is achieved through Portainer for management and Watchtower for automatic updates.

### Portainer Setup

Portainer provides a web interface for managing Docker containers. We have two stacks:

1. `project-staging` - for the staging environment
2. `project-production` - for the production environment

Each stack contains the respective docker-compose file (staging or production). Since GitHub access from Portainer was problematic, we copied the docker-compose files directly into Portainer's stack editor.

Read more about Portainer stacks [here](https://docs.portainer.io/user/docker/stacks/add).

**Important:** When you update docker-compose files in your repository, remember to update them in Portainer as well.

### Environment Variables in Portainer

Each Portainer stack has its own environment variables configured through the UI.

When adding new environment variables:
1. Add them to the docker-compose file in your repository
2. Add them to the Portainer stack environment variables
3. Trigger a rebuild (more on this below)

### Volume Mapping

Portainer manages persistent volumes for each stack. The volumes are mapped by your infrastructure team to ensure data persistence:

- `storage` - Laravel's storage directory
- `cache` - Bootstrap cache directory
- `lang` - Language files directory

These volumes survive container updates, preserving your application data across deployments.

### Watchtower: Automated Image Updates

Watchtower is a container that monitors your running containers and automatically updates them when new images are available. In our setup, Watchtower checks for new images daily at 2:00 AM.

When you push to the `staging` branch or create a new git tag (for production):

1. GitHub Actions builds a new Docker image
2. The image is pushed to GitHub Container Registry (`ghcr.io`)
3. Watchtower detects the new image during its next check
4. Watchtower pulls the new image
5. Watchtower gracefully stops the old containers
6. Watchtower starts new containers with the updated image

This provides zero-downtime deployments without manual intervention.

### Manual Deployment via Portainer

If you need to deploy immediately without waiting for Watchtower:

1. Navigate to your stack in Portainer
2. Click "Update the stack"
3. Check the "Pull latest image" checkbox in the modal
4. Click "Update"

Portainer will pull the latest image from the registry and restart your containers.

## Key Takeaways

Migrating to Docker for Laravel deployment offers several benefits:

**Pros:**
- Consistent environments across development, staging, and production
- Easy PHP and extension version management
- Separation of concerns with dedicated containers
- Automated deployments with minimal manual intervention
- Secure handling of private repository access during builds

**Challenges:**
- Initial setup complexity with multi-stage builds
- Managing secrets across GitHub Actions and container registries
- Keeping docker-compose files synchronized between repository and Portainer
- Understanding volume persistence and container networking

**Best Practices:**
- Use multi-stage builds to keep final images small and secure
- Never bake secrets into images; use BuildKit secret mounting
- Run separate containers for web, queue, and scheduler responsibilities
- Implement health checks for non-web containers
- Use Watchtower for automated updates with scheduled checks
- Maintain documentation about manual deployment procedures

The transition from traditional deployment to Docker requires upfront investment, but the payoff in reliability, consistency, and ease of maintenance makes it worthwhile for Laravel applications of any significant size.

## Files

<details>

<summary>.github/workflows/docker-build-staging.yml</summary>

```yaml
name: Build and Push Docker Image

on:
  push:
    branches:
      - staging

env:
  REGISTRY: ghcr.io
  IMAGE_NAME: org/project-staging-php

jobs:
  build-and-push:
    runs-on: ubuntu-latest
    permissions:
      contents: read
      packages: write

    steps:
      - name: Checkout repository
        uses: actions/checkout@v4

      - name: Log in to the Container registry
        uses: docker/login-action@v3
        with:
          registry: ${{ env.REGISTRY }}
          username: ${{ github.actor }}
          password: ${{ secrets.GITHUB_TOKEN }}

      - name: Extract metadata (tags, labels) for Docker
        id: meta
        uses: docker/metadata-action@v5
        with:
          images: ${{ env.REGISTRY }}/${{ env.IMAGE_NAME }}
          tags: |
            type=ref,event=branch
            type=ref,event=pr
            type=semver,pattern={{version}}
            type=semver,pattern={{major}}.{{minor}}
            type=sha,prefix={{date 'YYYYMMDD'}}-
            type=raw,value=latest,enable=${{ github.ref == format('refs/heads/{0}', 'staging') }}

      - name: Set up Docker Buildx
        uses: docker/setup-buildx-action@v3

      - name: Build and push Docker image
        uses: docker/build-push-action@v5
        with:
          context: .
          file: ./Dockerfile
          target: deploy
          push: true
          tags: ${{ steps.meta.outputs.tags }}
          labels: ${{ steps.meta.outputs.labels }}
          cache-from: type=gha
          cache-to: type=gha,mode=max
          secrets: |
            FONT_AWESOME_TOKEN=${{ secrets.FONT_AWESOME_TOKEN }}
            REPMAN_TOKEN=${{ secrets.REPMAN_TOKEN }}
            GITHUB_TOKEN=${{ secrets.GITHUB_TOKEN }}
```
</details>

<details>

<summary>docker-compose.staging.yml</summary>

```yaml
x-env: &default-env
  APP_NAME: ${APP_NAME}
  APP_ENV: ${APP_ENV}
  APP_KEY: ${APP_KEY}
  APP_DEBUG: ${APP_DEBUG}
  APP_URL: ${APP_URL}
  # More environment variables
  
services:
    php:
        image: ghcr.io/org/project-staging-php:latest
        container_name: project-staging-php
        ports:
            - 8080:8080
        environment:
          <<: *default-env
          AUTORUN_ENABLED: true
          OPCACHE_ENABLED: true
          AUTORUN_LARAVEL_ROUTE_CACHE: false
          AUTORUN_LARAVEL_VIEW_CACHE: false
        volumes:
          - storage:/var/www/html/storage
          - cache:/var/www/html/bootstrap/cache
          - lang:/var/www/html/lang

    task:
      image: ghcr.io/org/project-staging-php:latest
      container_name: project-staging-task
      environment:
        <<: *default-env
      volumes:
        - storage:/var/www/html/storage
        - cache:/var/www/html/bootstrap/cache
        - lang:/var/www/html/lang
      command: [ "php", "/var/www/html/artisan", "schedule:work" ]
      stop_signal: SIGTERM # Set this for graceful shutdown if you're using fpm-apache or fpm-nginx
      healthcheck:
        # This is our native healthcheck script for the scheduler
        test: [ "CMD", "healthcheck-schedule" ]
        start_period: 10s

    queue:
      image: ghcr.io/org/project-staging-php:latest
      container_name: project-staging-queue
      environment:
        <<: *default-env
      volumes:
        - storage:/var/www/html/storage
        - cache:/var/www/html/bootstrap/cache
        - lang:/var/www/html/lang
      command: [ "php", "/var/www/html/artisan", "queue:work", "--tries=3" ]
      stop_signal: SIGTERM # Set this for graceful shutdown if you're using fpm-apache or fpm-nginx
      healthcheck:
        # This is our native healthcheck script for the queue
        test: [ "CMD", "healthcheck-queue" ]
        start_period: 10s

volumes:
  storage:
  cache:
  lang:
```
</details>


<details>

<summary>Dockerfile</summary>

```dockerfile
############################################
# Base Image
############################################

# Learn more about the Server Side Up PHP Docker Images at:
# https://serversideup.net/open-source/docker-php/
FROM serversideup/php:8.4-fpm-nginx AS base

# Switch to root before installing our PHP extensions
USER root
RUN install-php-extensions intl bcmath gd exif imagick

############################################
# Development Image
############################################
FROM base AS development

# We can pass USER_ID and GROUP_ID as build arguments
# to ensure the www-data user has the same UID and GID
# as the user running Docker.
ARG USER_ID
ARG GROUP_ID

# Switch to root so we can set the user ID and group ID
USER root
RUN docker-php-serversideup-set-id www-data $USER_ID:$GROUP_ID  && \
    docker-php-serversideup-set-file-permissions --owner $USER_ID:$GROUP_ID --service nginx

############################################
# CI image
############################################
FROM base AS ci

# Sometimes CI images need to run as root
# so we set the ROOT user and configure
# the PHP-FPM pool to run as www-data
USER root
RUN echo "user = www-data" >> /usr/local/etc/php-fpm.d/docker-php-serversideup-pool.conf && \
    echo "group = www-data" >> /usr/local/etc/php-fpm.d/docker-php-serversideup-pool.conf

############################################
# Vendor Build Stage
############################################
FROM base AS vendor
WORKDIR /var/www/html
USER root

# Install git for composer
RUN apt-get update && apt-get install -y git && rm -rf /var/lib/apt/lists/*

COPY composer.json composer.lock ./

RUN --mount=type=secret,id=GITHUB_TOKEN \
    --mount=type=secret,id=REPMAN_TOKEN \
    git config --global url."https://x-access-token:$(cat /run/secrets/GITHUB_TOKEN)@github.com/".insteadOf "git@github.com:" && \
    composer config --global --auth http-basic.org.repman.com token "$(cat /run/secrets/REPMAN_TOKEN)" && \
    composer install --no-dev --no-scripts --optimize-autoloader --no-interaction

############################################
# Assets Build Stage
############################################
FROM node:21 AS assets
WORKDIR /var/www/html

COPY package.json package-lock.json ./

# Configure FontAwesome registry with token and install dependencies
RUN --mount=type=secret,id=FONT_AWESOME_TOKEN \
    npm config set "@fortawesome:registry" https://npm.fontawesome.com/ && \
    npm config set "//npm.fontawesome.com/:_authToken" "$(cat /run/secrets/FONT_AWESOME_TOKEN)" && \
    npm ci

# Copy application files and vendor from previous stage
COPY . .
COPY --from=vendor /var/www/html/vendor ./vendor

# Build assets
RUN npm run build

############################################
# Production Image
############################################
FROM base AS deploy
WORKDIR /var/www/html

# Copy application files
COPY --chown=www-data:www-data . /var/www/html

# Copy vendor from vendor stage
COPY --from=vendor /var/www/html/vendor ./vendor

# Copy built assets from assets stage
COPY --from=assets /var/www/html/public/build ./public/build

# Run post-autoload-dump scripts and optimize
USER root
RUN composer dump-autoload --optimize --classmap-authoritative && \
    mkdir -p /var/www/html/lang && \
    chown -R www-data:www-data /var/www/html/lang

# Switch back to www-data user
USER www-data
```
</details>
