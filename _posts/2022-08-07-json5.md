---
title: "“Ignore the f’ing haters!”"
categories: json5
description: "And other lessons learned from creating a popular open-source project (JSON5)."
layout: post
---

_(Originally published [on Substack](https://aseemk.substack.com/p/ignore-the-f-ing-haters-json5). Subscribe there for email updates!)_

Ten years ago, on Memorial Day 2012, I authored [JSON5](https://github.com/json5/json5), an open-source project that aimed to fix a small problem I felt when writing certain software.

I’d been chewing on the problem for a year when I decided to finally address it. I coded for roughly ten hours that day, then shared what I built to Hacker News (a forum for software engineers) that night. [This was the response I got](https://news.ycombinator.com/item?id=4031699):

!["This 'JSON5' thing is an abomination."](/images/json5/hn-abomination.png)
!["Why? I know that hand-writing JSON5 can be annoying but is this really the biggest problem we have?"](/images/json5/hn-biggest-problem.png)
!["No-one will ever adopt this."](/images/json5/hn-no-one.png)
!["I can't believe people are taking this seriously."](/images/json5/hn-seriously.png)
!["Horrible… You should never have done this."](/images/json5/hn-horrible.png)

Even [Mitchell Hashimoto](https://www.google.com/search?q=mitchell+hashimoto), creator of an industry-changing open-source [project](https://www.vagrantup.com/) himself (and eventually a billion-dollar [company](https://www.google.com/search?q=NASDAQ:+HCP) as well), piled on. But he went even further: Mitchell took the time to make a _parody project_ of JSON5 (it was genuinely funny, at least 😛), even making fun of me by name. He’s since deleted the project, but the Internet Archive [has it here](https://web.archive.org/web/20150714105148/https://github.com/mitchellh/html7):

!["HTML7 - Modern HTML"](/images/json5/html7-top.png)
!["Aseem Kishore inspired this delightful work with his groundbreaking work on JSON5."](/images/json5/html7-credits.png)

This was especially fascinating to me given that Mitchell Hashimoto was a creator himself — a “[man in the arena](https://en.wikipedia.org/wiki/Citizenship_in_a_Republic)”, not a critic on the sideline — and yet he went to such _depths_ to express his dislike for my project.

I wasn’t upset or offended by any of this. I was mainly just surprised and shell-shocked.

The problem I’d set out to solve seemed so _clear_. I’d even credited others who had written about [this problem before](http://bolinfest.com/essays/json.html). And yet so many comments disagreed with me that this problem was even real, much less worth solving.

Fortunately, I ignored these comments and just kept building. I got some traction, which attracted others. And with others’ (significant) contributions and leadership, JSON5 [slowly](https://star-history.com/#json5/json5) [flourished](https://npmtrends.com/json5).

[![GitHub stars for JSON5](/images/json5/github-stars.png)](https://star-history.com/#json5/json5)
[![npm downloads for JSON5](/images/json5/npm-downloads.png)](https://npmtrends.com/json5)

JSON5 now gets [\>60M downloads/week](https://www.npmjs.com/package/json5), ranks in the [top 0.1%](https://twitter.com/aseemk/status/1513545843030122504) of the most depended-upon packages on npm[^npm-stats], and has been adopted by major projects like [Chromium](https://source.chromium.org/chromium/chromium/src/+/main:third_party/blink/renderer/platform/runtime_enabled_features.json5;drc=5de823b36e68fd99009a29281b17bc3a1d6b329c), [Next.js](https://github.com/vercel/next.js/blob/b88f20c90bf4659b8ad5cb2a27956005eac2c7e8/packages/next/lib/find-config.ts#L43-L46), [Babel](https://babeljs.io/docs/en/config-files#supported-file-extensions), [Retool](https://community.retool.com/t/i-am-attempting-to-append-several-text-fields-to-a-google-sheet-but-receiving-a-json5-invalid-character-error/7626), [WebStorm](https://www.jetbrains.com/help/webstorm/json.html), and [more](https://github.com/json5/json5/wiki/In-The-Wild). All adoption has been entirely organic, with no company or marketing behind it.

My favorite example is that even [Apple](https://developer.apple.com/documentation/foundation/jsondecoder/3766916-allowsjson5) has adopted it now, supporting it *natively* across all their platforms! 🤯 (This means that every iPhone and Mac now ships with JSON5 built in!) I never even considered this to be a possibility and would have bet against it.

![Apple Developer docs: `allowsJSON5`](/images/json5/apple-allowsJSON5.png)

These results are in such stark contrast to the reception I originally got. So what gives?

I take three lessons from this experience that I’d love to share now, ten years later.

---

## Lesson 1: Ignore the haters

This one is obvious. And I admit I [enjoyed](https://twitter.com/aseemk/status/767229426304253952) proving the haters wrong. 😛

![Twitter thread from @aseemk: "Ignore the f'ing haters!"](/images/json5/twitter-ignore-the-haters.png)

But there’s nuance here, and some notable implications.

For starters, the reception I got wasn’t unique to me; it was standard for Hacker News and cliché across cynical communities. The canonical examples here are Drew Houston’s original [Dropbox demo](https://news.ycombinator.com/item?id=8863) and Slashdot’s original [iPod announcement](https://slashdot.org/story/01/10/23/1816257/apple-releases-ipod):

!["For a Linux user, you can already build [Dropbox] yourself quite trivially"](/images/json5/hn-dropbox.png)
!["No wireless. Less space than a nomad. Lame."](/images/json5/slashdot-ipod.png)

But there’s something to be said about actually listening to feedback and criticism, right? And not just blindly building in a vacuum, ignoring the world around you?

The key difference to me is to **know your audience/customer/market**, and listen to _them_. Linux hackers weren’t Dropbox’s target market, nor the iPod’s. It turns out that _all_ of the various software engineers on Hacker News weren’t my target market, either; specifically _JavaScript_ engineers were.

So when I also shared JSON5 on the [Node.js mailing list](https://groups.google.com/g/nodejs/c/GipVA_WHSBY), the reception was notably more positive:

!["Awesome idea!" and "Oh great! <3 I really looked for this a few weeks back!"](/images/json5/node-mailing-list.png)

(Even [Ryan Dahl](https://www.google.com/search?q=ryan+dahl), creator of Node.js, [chimed in with praise](https://groups.google.com/g/nodejs/c/GipVA_WHSBY/m/SDEJdyM9FQUJ)… just two years later. 😂)

!["I love this idea!"](/images/json5/node-ryan-dahl.png)

_This_ was who mattered, so _this_ feedback and validation kept me going.

This lesson applies broadly.

One of my all-time favorite articles on building startups is [this one](https://review.firstround.com/how-superhuman-built-an-engine-to-find-product-market-fit) from Rahul Vohra, founder of Superhuman, on finding product-market fit. (It’s a brilliant article and I can’t recommend it enough; take the time to read it if it’s relevant to you.) Rahul’s advice is _all about_ listening to customer feedback, and _even so_, he specifically says to **ignore the feedback of users who find your product** _**entirely**_ **unappealing:**

> This batch of… users should not impact your product strategy in any way. They’ll request distracting features, present ill-fitting use cases and probably be very vocal, all before they churn out and leave you with a mangled, muddled roadmap. As surprising or painful as it may seem, don’t act on their feedback — it will lead you astray on your quest for product/market fit.
>
> **\[These users\] are so far from loving you that they are essentially a lost cause.**

Just remember to still make something that _[some](http://www.paulgraham.com/13sentences.html)_ [people love](http://www.paulgraham.com/13sentences.html). One way to do that, as Paul Graham writes, is to simply make something that you _yourself_ would [want and love](http://www.paulgraham.com/organic.html). I got lucky in that regard with JSON5. 🙂

---

## Lesson 2: Share your legos

I mentioned above that JSON5’s success owes in large part to others’ contributions and leadership. That wasn’t hyperbole — others really deserve [much of the credit](https://github.com/json5/json5#credits).

![JSON5 credits](/images/json5/json5-credits.png)

I’m grateful to [Max Nanasy](https://github.com/MaxNanasy) and [Andrew Eisenberg](https://github.com/aeisenberg) for their significant contributions, and I’m _especially_ grateful to [Jordan Tucker](https://github.com/jordanbtucker), who took JSON5 to a whole new level. Jordan has [contributed more code](https://github.com/json5/json5/graphs/contributors) at this point than even me by an _order of magnitude_:

![GitHub contributions graph for JSON5, showing Jordan Tucker with the most commits and lines of code changed](/images/json5/jordan-contributions.png)

But what really keeps blowing me away isn’t the quantity of Jordan’s contributions — it’s the quality. Jordan elevated JSON5 from a little toy project to a truly professional-grade _standard_ and _ecosystem_. He authored an [actual formal spec](https://github.com/json5/json5-spec), prototyped several more [reference implementations](https://github.com/orgs/json5/repositories), and even designed a [beautiful vector logo](https://github.com/json5/json5-logo):

![JSON5 logo](/images/json5/json5-logo.svg)

Jordan’s also an amazing maintainer for the project. He consistently responds to every question, bug report, and contribution both more quickly and much better than I can. He thoroughly internalized the vision for the project, and he consistently upholds that vision and its principles. Most importantly, Jordan always represents the project — and speaks for the both of us — with an ideal combination of knowledgeable authority _and_ kind empathy.

I can confidently say that JSON5’s adoption would be nowhere near what it is today if it weren’t for Jordan’s fantastic leadership and ownership.

So I don’t deserve all the credit, but I think I did at least two things right. 😛

1.  **I [shipped early](https://en.wikipedia.org/wiki/Minimum_viable_product).** Shipping less earlier allowed others to contribute more — and better than I could have myself.
2.  **I [shared my legos](https://review.firstround.com/give-away-your-legos-and-other-commandments-for-scaling-startups).** I _truly_ gave up full and direct control, and _this_ was what allowed JSON5 to flourish.

Sharing legos here didn’t come naturally or trivially to me. A lot of people wanted a lot of different things from JSON5, and I was pretty sure that the project would only succeed if it maintained _focus_. I felt responsibility to uphold that focus, so of course I should maintain control, right?

I was inspired here by [this post](https://felixge.de/2013/03/11/the-pull-request-hack/) from prolific open-source developer [Felix Geisendörfer](https://felixge.de/) on a simple “collaboration hack”:

> **Whenever somebody sends you a pull request, give them commit access to your project.**

This sounded crazy at first, but his reasoning and results were spot on. Like Felix, I was often too busy to review code and manage contributions in a timely manner. (I had a demanding [day job](https://www.fiftythree.com/), too!) And the most significant contributions often needed the most time to properly review and accept. So of course [episodes like this](https://github.com/json5/json5/pull/35) happened, where I left a contributor hanging for _nine months_:

![GitHub PR from @aisenberg](/images/json5/aisenberg-pr-delay.png)

This case pushed me over the edge, and I decided to give Felix’s suggestion a try:

![My response to @aisenberg](/images/json5/aisenberg-pr-response.png)

And just like Felix said, the results spoke for themselves.

> Within a few hours the same person who had just submitted a rather mediocre patch, had now fixed things up and committed them. This was highly unusual, so I started using the same strategy for a few other small projects… And it worked, over and over again.
>
> Initially I was very worried about giving up control over these projects, but the results speak for themselves. **Both projects are now maintained by a bunch of amazing developers, writing much better code than I ever received in the form of pull requests before.**

Felix explains this phenomenon much better I can, so I’ll just quote him here:

> So why does it work? Well, I have a few ideas. Once people have commit access, they are no longer worried that their patch might go unmerged. They now have the power to commit it themselves, causing them to put much more work into it. **Doing the actual commit/push also changes their sense of ownership. Instead of handing over a diff to somebody else, they are now part of the project, owning a small part of it.**

Attracting great people you can trust and giving them _true ownership_ is a powerful leadership lesson I’ve learned (on both sides) throughout my career.

A related leadership lesson is to **inform and** _**inspire**_. I love Netflix’s “[context, not control](https://www.slideshare.net/reed2001/culture-1798664/79-context-not-control)” value and this advice derived from [Antoine de Saint-Exupéry](https://quoteinvestigator.com/2015/08/25/sea/):

> If you want to build a ship, don’t drum up the people to gather wood, divide the work, and give orders. Instead, **teach them to yearn for the vast and endless sea.**

This is a topic I want to write more about on its own. For now, I’ll end this lesson by summarizing:

Give up control. Share your legos. Benefit from more Jordans. 🤩

---

## Lesson 3: We’re all blind (so be kind)

The future is crazy hard to predict. That’s doubly so with new ideas.

When an idea is new, it’s not only difficult to know whether it’ll succeed — it’s also easy to assume that it won’t.

As Jony Ive said so eloquently in his [eulogy for Steve Jobs](https://www.youtube.com/watch?v=GnGI76__sSA):

> You see, I think \[Steve\] better than anyone understood that while ideas _ultimately_ can be so powerful, **they** _**begin**_ **as fragile, barely formed thoughts — so easily missed, so easily compromised, so easily just squished.**

I look back on Mitchell Hashimoto’s example as a fascinating case study here. Mitchell is and was an expert programmer and amazing technologist, and even he failed to see the value here. That makes sense in hindsight given that Mitchell’s background was more with Ruby and YAML than with JavaScript and JSON — but that’s the point. We’re all blind and touching [different parts of the elephant](https://en.wikipedia.org/wiki/Blind_men_and_an_elephant).

Successful investors know this well. [Paul Buchheit](https://en.wikipedia.org/wiki/Paul_Buchheit), creator of Gmail and partner at Y Combinator, made this point elegantly in a [2007 post](http://paulbuchheit.blogspot.com/2007/03/how-to-be-right-90-of-time-and-why-id.html): it’s easy to dismiss new ideas and be right most of the time — but if you want to be _successful_ as an investor, it’s better to be _optimistic_ and _wrong_ most of the time (since the most successful ideas yield disproportionate returns). Hence, most successful investors approach new ideas with openness, curiosity, and humility, even if they ultimately reject them.

(An example of Paul’s success with this philosophy was Twitch, which is now one of the most popular sites on the web, but which started as Justin Kan simply streaming his life 24/7. Paul expanded on this example and others in his wonderful [2014 Startup School talk](http://paulbuchheit.blogspot.com/2014/07/the-technology.html) — highly recommend reading.)

But this isn’t just about our own self-interests — it’s also about the impact we have on others.

It’s taken me a long time to say this, but I believe that several of the initial responses I got crossed the line from _disagreeing_ about an idea to _being unkind_. And this included Mitchell’s parody project — *even though* it was funny.

I feel fortunate and privileged that I wasn’t deterred. Due to whatever combination of nature and nurture I was brought up with, I maintained my conviction. But not everyone is so lucky or secure — and it’d be a shame to put those people down.

Heather Arthur, another open-source creator, wrote about her own experience being ridiculed for her work in this [powerful post](https://harthur.wordpress.com/2013/01/24/771/) from 2013:

> It seemed liked I’d done something fundamentally wrong, so stupid that it flabbergasts someone… So of course I start sobbing.
>
> Then I see these people’s follower count, and I sob harder.

Heather fortunately turned out okay, as did I. But she had the same thought:

> I evangelize open source whenever I meet new coders or go to meetups. I tell them to make something that they would find useful and put it out there. **Can you imagine if one of these new open sourcerers took my advice and got this response without the support I had? Can you imagine?**

I reached out to Mitchell as part of writing this post (my first ever interaction directly with him) to let him know I’d be referencing his project. Given that he deleted it some time ago, I assumed he regretted it in retrospect, and I harbored no grudge or ill will towards him. We all make mistakes and do things we’re not proud of sometimes.

Mitchell confirmed this assumption to be true and offered a genuine, sincere apology. Thank you, Mitchell — I appreciated that a lot. ❤️

Learn from Mitchell’s example, and [Corey Haines’](http://blog.coreyhaines.com/2013/01/im-sorry.html) and [Steve Klabnik’s](https://steveklabnik.com/writing/node) in Heather’s case. Be aware of the impact of your words and actions, and (_especially_ if you have standing in your community) lift others up rather than push them down.

Let me end with two closing quotes from [Ratatouille](https://www.imdb.com/title/tt0382932/quotes/qt0465220) ([I love this scene](https://www.youtube.com/watch?v=FjhyXam1Je0)):

> The world is often unkind to new talent, new creations. The new needs friends.

> Not everyone can become a great artist; but a great artist can come from anywhere.

And this one from [Ted Lasso](https://www.imdb.com/title/tt11193418/quotes/qt5642632#:~:text=%22Be%20curious%2C%20not%20judgmental.%22) (_[not](https://www.snopes.com/fact-check/be-curious-not-judgmental-walt-whitman/)_ [Walt Whitman](https://www.snopes.com/fact-check/be-curious-not-judgmental-walt-whitman/) 😛):

> Be curious, not judgmental.

Great ideas can come from anyone, and we’re all blind — so let’s be kind.

---

If you enjoyed this post, [subscribe by email](https://aseemk.substack.com/) for more:

<iframe src="https://aseemk.substack.com/embed" width="480" height="320" style="border:1px solid #EEE; background:white;" frameborder="0" scrolling="no"></iframe>

[^npm-stats]: As of June 2022, the npm registry has roughly [2M packages](http://www.modulecounts.com/), and JSON5 is in the [top 500](https://gist.github.com/anvaka/8e8fa57c7ee1350e3491) by both dependents and PageRank. I haven’t been able to find package rankings by _downloads_ anywhere, but would love to know that, too!
