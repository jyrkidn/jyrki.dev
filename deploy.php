<?php
namespace Deployer;

require 'recipe/laravel.php';

// Config

set('application', 'jyrki.dev');
set('deploy_path', '/var/www/{{application}}');
set('repository', 'git@github.com:jyrkidn/jyrki.dev.git');
set('branch', 'main');

add('shared_files', []);
add('shared_dirs', []);
add('writable_dirs', []);

// Hosts

host('jyrki.dev')
    ->setRemoteUser('root');

// Tasks

task('npm:build', function () {
    cd('{{release_path}}');
    run('npm run production');
});

task('npm:install', function () {
    cd('{{release_path}}');
    run('npm install');
});

after('deploy:failed', 'deploy:unlock');

/**
 * Main deploy task.
 */
desc('Deploy your project');
task('deploy', [
    'deploy:prepare',
    'deploy:vendors',
    'artisan:storage:link',
    'artisan:view:cache',
    'artisan:config:cache',
    'artisan:migrate',
    'deploy:publish',
    'npm:install',
    'npm:build',
]);
