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

I thus settled on using **PHP** with **Apache**: available by default on Mac OS X, always "running", no build/compile step, and for both of their flaws, straightforward and simple to use for a case like this.

Part of the motivation for that was also that my domain, purchased from **GoDaddy**, came with **free PHP hosting**. (I'm not linking to GoDaddy for good reasons --- I fully intend to move off at some point.) I just had to use **FTP** for deploying, which wasn't a big deal as I used **[Coda][]** at the time.

[Coda]: http://panic.com/coda/

And in fact, this Jekyll+PHP mashup worked for an entire year. (That doesn't say much since that was only two blog posts. Yes, I'm sorry!) You can [browse the code][gh-old] from this period if you're interested.

[gh-old]: https://github.com/aseemk/aseemk.com/tree/6b8b9edc13890b93f9d5a90037e5d30901cfdccf



[Liquid]: http://www.liquidmarkup.org/
[GitHub Pages]: http://pages.github.com/



[Joe Hewitt]: http://joehewitt.com/
[jh-post]: http://joehewitt.com/2011/10/03/dropbox-is-my-publish-button
