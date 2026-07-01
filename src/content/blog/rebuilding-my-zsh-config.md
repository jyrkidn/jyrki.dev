---
title: "Rebuilding My Zsh Config: Less Framework, More Understanding"
date: 2026-07-01
excerpt: How two blog posts convinced me to throw out oh-my-zsh, delete 358 lines of accumulated shell config, and rebuild it into ~70 lines I can actually read.
tags: []
---

## Why I Reopened My Shell Config

I wasn't planning to touch my shell config, but was already annoyed for some time with the slowness of my shell starting up. Then I read two posts by [Mijndert Stuij](https://mijndertstuij.nl).

The first, [*Life is too short for a slow terminal*](https://mijndertstuij.nl/posts/life-is-too-short-for-a-slow-terminal/), makes the case for a lean shell: no framework, cache your completions, lazy-load the expensive parts. The second, [*I was wrong about fast terminals*](https://mijndertstuij.nl/posts/what-i-got-wrong-about-fast-terminals/), walks the first one back. You *can* have a fully-featured shell that feels instant, and it lands somewhere more honest: keep it small because you want to understand it, not because it's the only way to be fast.

That second point is what got me. Instead of opening my own `~/.zshrc` to see what was in there, I just asked [Claude Code](https://claude.com/claude-code) to sort it out, because I already knew I had no idea what most of it did.

It was 358 lines. Somewhere in there my prompt got drawn, my history worked, and my Node version got picked, but I couldn't have told you where or by what. Over a couple of years, every "just paste this into your `.zshrc`" setup script had done exactly that. The file had become a landfill.

So I cleaned it out. Here's what I found, what I kept, and the point those posts got right.

## What Was Actually in There

A quick inventory of the mess, because I suspect it's a common one:

- **oh-my-zsh**, loading eight plugins, of which I actively used maybe one.
- **Three Node version managers** — `nvm`, `mise`, *and* `fnm` — all initialized on every shell, all competing over which one owned `node`. (`fnm` was winning. The other two were pure tax.)
- **Starship initialized twice. Zoxide twice. Bun three times.** Different setup scripts, each unaware of the others.
- **Atuin**, a full history database with its own daemon, layered on top of plain history and fzf.
- **Six empty plugin folders** — git submodules that were referenced but never actually downloaded. They did nothing, and had done nothing for years.
- Dead references to **Fig** (a product that no longer exists) and roughly 60 lines of pasted **npm completion boilerplate**.

The irony is that the history autocomplete I wanted *was* in there, buried on line 271 and impossible to find.

## What I Actually Wanted

Three things. That's the entire list:

1. **Autocomplete from my history** — the gray "ghost text" you accept with →.
2. **A prompt showing my directory and git branch.**
3. **Git changes at a glance.**

Everything else was noise I'd accumulated rather than chosen.

## The Rebuild

Concretely, what I asked Claude Code to do was work out what every line actually did, flag the duplicates and the dead weight, and rebuild the file around the three things I wanted. It did the heavy lifting; I just asked for it and reviewed the result. That's worth saying, because the whole goal was to *understand* my config, and reading a diff someone (something) else wrote turned out to be a fast way to finally learn what was in there.

The rebuild removed the framework entirely: no oh-my-zsh, no plugin manager. The three things I wanted map to tools Homebrew had already installed. They just needed to be sourced, in plain sight:

```zsh
# History autocomplete (the gray ghost text)
source /opt/homebrew/share/zsh-autosuggestions/zsh-autosuggestions.zsh

# Prompt: directory + git branch + git changes
eval "$(starship init zsh)"

# Command syntax colours — must be last
source /opt/homebrew/share/zsh-syntax-highlighting/zsh-syntax-highlighting.zsh
```

Then the cleanup: one Node manager (`fnm`), Atuin removed, every duplicate init collapsed to a single call, and `compinit` cached so it only runs its slow security audit once a day. The empty plugin folders, the Fig lines, and the npm boilerplate were all deleted.

The result is about 70 lines I can read top to bottom, and a shell that starts in roughly **90ms**. But the speed isn't really the point.

## The Point Those Posts Got Right

While I was at it, I looked at two more modern tools: [**antidote**](https://github.com/mattmc3/antidote), a fast static plugin manager, and [**zsh-patina**](https://github.com/michel-kraemer/zsh-patina), a Rust-daemon syntax highlighter that's quicker than the standard one.

Both are genuinely good. I used neither.

Not because they're slow. Antidote compiles down to the same `source` lines I hand-wrote, and patina is *faster* than what I'm using. I skipped them because each one is another moving part to understand, and understanding my config was the entire goal. I'd just spent an afternoon *removing* machinery; adding some back to shave 20ms would have missed the point.

Which is exactly where Mijndert's follow-up ends up:

> I keep it small because I want to understand it, not because it's the only road to going fast.

That's it. My shell isn't minimal because minimal is fastest. It's minimal because when something breaks, I want to open one short file and *see* it. Fast is just a side effect of there being so little there.

Boring, readable, mine. That's the upgrade.

The full result lives in my dotfiles, if you want to see the whole thing: [github.com/jyrkidn/dotfiles-mac](https://github.com/jyrkidn/dotfiles-mac).
