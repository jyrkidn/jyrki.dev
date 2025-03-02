---
title: "Weglot for Laravel with Livewire & Filament: A Practical Review"
date: 2025-03-02
excerpt: A full, step-by-step guide for developers seeking to implement a portfolio or blog publication with Astro.
tags: []
---

## Is Weglot the Right Choice for Your Laravel Project?

[Weglot](https://www.weglot.com/) is a popular translation tool that simplifies multilingual website management. But how well does it integrate with a Laravel stack, particularly when using Livewire and Filament? In this article, I’ll explore the pros and cons based on real-world experience.

For our projects we used the subdirectories via DNS, read more [here](https://www.weglot.com/guides/subdirectory-vs-subdomain).

## The Benefits of Using Weglot

One of the key advantages of Weglot is that translations are handled externally, meaning clients don’t have to manually translate content within the CMS. This is a major timesaver and ensures consistency across languages.

Setting up Weglot is straightforward, with clear documentation to guide you through the process. Additionally, their support team is highly responsive, typically replying within 24 hours.

## The Challenges of Integrating Weglot

Despite its advantages, Weglot presents some challenges, particularly in complex Laravel applications.

One significant issue is handling translation exceptions. For example, in most projects I've used Weglot, many manual translations and exceptions had to be added, which complicated maintenance. While Weglot allows you to exclude certain HTML blocks from translation, it does not support ignoring translations in HTML attributes like `href`. This means URLs are always translated, preventing links from pointing to the default language version.

Redirects are another pain point. Weglot removes language prefixes when processing URLs in your backend, meaning redirects like `/nl/jobs` → `/nl/vacatures` won’t work correctly. Instead, you must check on `/jobs`, which is not ideal for maintaining clear, language-specific paths.

For Laravel applications using Livewire, additional complications arise. If the CMS is hosted on the same domain, conflicts can occur with Livewire requests, as Weglot attempts to translate them. While you can exclude `livewire/update`, doing so may break front-end functionality. To avoid this, the CMS must be hosted on a separate domain, adding complexity to deployment and management.

Another drawback is Weglot’s handling of default languages. The primary language cannot be set to `/en`, it must be on `/`. Otherwise, Weglot may generate incorrect URLs, such as `/en/nl`, leading to broken links and SEO issues.

## Translation Issues with Emails

Email translation is another hurdle. You cannot send the whole email body to the [Weglot API](https://developers.weglot.com/api/reference), since it can't handle the html tags. So you have to send the text only, which makes that you have to parse the html tags yourself to send the correct text. I hope to release a package for this soon.

## Final Thoughts: Is Weglot a Good Fit?

Weglot offers a convenient, easy-to-use translation solution, particularly for simple Laravel applications. However, for more complex setups involving Livewire, Filament, and multi-domain CMS environments, it introduces several challenges.

If you’re working with a Laravel application that requires precise URL control, advanced styling, or seamless Livewire integration, you may need to consider workarounds or alternative translation solutions. While Weglot simplifies translation management, its limitations can create additional work for developers.

Before choosing Weglot, weigh these factors carefully to determine if it aligns with your project’s needs. If automation and ease of use outweigh the potential technical hurdles, Weglot may still be a strong contender.

