---
title: "The making of"
categories: meta, tech
description: "TODO"
layout: post
draft: true
---

I started this blog over [a year ago][hello-web]. I promised to share my thoughts and ideas here, but that's barely happened! Time to change that, and what better way to begin than to share the code behind this blog itself?

[hello-web]: http://aseemk.com/blog/hello-web


### Context

Your first question may be, why is there any *code* at all? There are plenty of [feature-rich][wordpress] [blogging][blogger] [sites][posterous] and [services][tumblr] out there, and indeed, for most people, I'd unequivocally recommend using one of them. (I'd personally recommend Tumblr today.)

[wordpress]: http://www.wordpress.com/
[blogger]: http://www.blogger.com/
[posterous]: http://www.posterous.com/
[tumblr]: http://www.tumblr.com/

It's a fair question, and I don't have a great answer, but [Marco Arment][marco] [sums it up nicely][quora-marco]:

[marco]: http://www.marco.org/
[quora-marco]: http://www.quora.com/Marco-Arment-1/Why-isnt-Marco-org-built-on-Tumblr/answer/Marco-Arment

> I'm a developer. I make things...
>
> This probably won't sound sensible to non-developers. But it's very important to me to have that level of control over my site.

With that out of the way, the next question was: How? What language, framework, tools?

There were three main factors I cared most about (and still care about) when making this decision (not necessarily in this order):

1. **Development** - it should be easy and fast to develop.
2. **Deployment** - it should be easy and safe to deploy.
3. **Cost** - it should, ideally, be free!

What you see today is the result of these factors. Let's dive right in...


### Act One

With hosted services out of the way, using something like **[Jekyll][]** to develop with was a no-brainer. No database to manage and worry about, posts as just regular files, and support for [Markdown][]; what wasn't to love? ([Tom Preston-Werner][] has a great post about the [rationale behind Jekyll][tpw-post].)

[Jekyll]: https://github.com/mojombo/jekyll/wiki
[Markdown]: http://daringfireball.net/projects/markdown/
[Tom Preston-Werner]: http://tom.preston-werner.com/
[tpw-post]: http://tom.preston-werner.com/2008/11/17/blogging-like-a-hacker.html

Despite that, I didn't like the idea of using Jekyll to power my *entire* site. Call me old-fashioned, but it just felt "wrong" to have to regenerate every single page when only the footer changed.

So using *some* sort of server-side scripting/templating language felt "right", but at the same time (ease of development), I didn't want to have to launch a server when developing locally.

I thus settled on using **PHP** with **Apache**: available by default on Mac OS X, always "running", no build/compile step, and despite both their flaws, they're both straightforward and simple to use for a case like this.

Part of the motivation for that was also that my domain, purchased from **GoDaddy**, came with **free PHP hosting**. (I'm not linking to GoDaddy for good reasons --- I fully intend to move off at some point.) I just had to use **FTP** for deploying, which wasn't a big deal as I used **[Coda][]** at the time.

[Coda]: http://panic.com/coda/

Unfortunately, Jekyll didn't play completely nicely with PHP, and the result meant a build step (a small one, but a build step nonetheless). Despite that, I went with it, and this Jekyll+PHP mashup worked for a while.

You can [browse the code][gh-old] from this period if you're interested.

[gh-old]: https://github.com/aseemk/aseemk.com/tree/6b8b9edc13890b93f9d5a90037e5d30901cfdccf


### Act Two

But pain showed up when I revisited this blog nearly a year later. In particular, FTP felt cumbersome and silly (I had moved from Coda to **[TextMate][]**). Deployment was neither easy nor reliably safe.

[TextMate]: http://macromates.com/

It made sense now to move to **[git][]** for deployment, just like I was already doing with "real" websites. Setting up my own git server felt like overkill to me, so it was time to move to an app platform in The Cloud&trade;.

[git]: http://git-scm.com/

I was already familiar with **[Heroku][]**, but Heroku doesn't support "naked" domains (no www), and for a static site, it's also [expensive][heroku-pricing] ($35/mo.), unless you're willing to put up with [long load times][heroku-idling].

[Heroku]: http://www.heroku.com/
[heroku-pricing]: http://www.heroku.com/pricing#2-0
[heroku-idling]: https://devcenter.heroku.com/articles/dynos#dyno-idling

But I also knew that a potential alternative was **[GitHub Pages][]**. After all, it's specifically meant for hosting (only) static content, and it specifically supports (only) Jekyll for generating that content.

[GitHub Pages]: http://pages.github.com/

And unlike Heroku, GitHub Pages is free and fast, and it supports naked domains! (This isn't documented clearly for project pages, but you just [add an A record][gh-pages-dns] like you would for user/org pages.)

[gh-pages-dns]: https://help.github.com/articles/setting-up-a-custom-domain-with-pages

Unfortunately, GitHub Pages has two limitations: it *only* supports Jekyll --- so no PHP or similar --- and it even locks Jekyll down to disallow custom plugins --- so no helper extras like [LESS][] or [SASS][].

[LESS]: TODO
[SASS]: TODO

Fortunately, Jekyll does include support for a templating language called **[Liquid][]**, built by [Shopify][]. Liquid lacks the flexibility and expressiveness of "regular" languages, but it's safe and secure for hosts like GitHub.

[Liquid]: TODO
[Shopify]: TODO

I was reluctant to switch to a completely new and less popular templating language, but the benefits of GitHub Pages outweighed these costs to me, so I decided to bite the bullet and port my site.

And indeed, the result is what you see today: this site is running entirely on GitHub Pages. You can [browse this code][gh-new] too if you're interested.

<!-- TODO update link -->
[gh-new]: https://github.com/aseemk/aseemk.com


### Details

Porting this site to Jekyll and Liquid for hosting on GitHub Pages wasn't trivial --- it was in fact filled with gotchas. And issues remain.

Liquid, for example, doesn't seem to have a notion of (user-declared) array literals. That would have been useful in cases like the nav bar, e.g. to iterate over a list of links like `['About', 'Blog', ...]`.

GitHub Pages also uses an outdated version of Liquid, since updates to Jekyll are sitting unreleased, so newer Liquid features like `index_of()` and `join()` are also unavailable for use.

GitHub Pages also caches very aggressively --- too aggressively for regularly updated sites like blogs. I'm not the first one to notice, and I've tried to come up with workarounds, but none have worked so far.

It's not all bad, though. In fact, GitHub Pages has some great features that were delightful to discover.

Most useful is that it has simple support for clean URLs baked right in: a file at `/foo.html` can also be accessed at `/foo` (no trailing slash), as long as no folder `/foo/` exists. This site takes advantage of that.

I've also been impressed by the thoroughness and thought that's gone into GitHub Pages. MIME types, modern HTTP headers, even details like making sure HTML5 cache manifests are never cached --- good stuff.


### Going forward

Overall, I'm quite happy with this new setup. Liquid is workable, Jekyll is great, and GitHub Pages is a pleasure to use overall.

If I had a wishlist for improvements I would love to see, it'd be something like this (in rough priority order):

1. Abc

2. Abc

3. Abc


<!--

- Link to Octopress
- Link to Joe Hewitt's Dropbox post

-->

[Liquid]: http://www.liquidmarkup.org/
[GitHub Pages]: http://pages.github.com/

[Joe Hewitt]: http://joehewitt.com/
[jh-post]: http://joehewitt.com/2011/10/03/dropbox-is-my-publish-button
