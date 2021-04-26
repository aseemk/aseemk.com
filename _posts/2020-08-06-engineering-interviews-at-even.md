---
title: "Engineering interviews at Even"
categories: even
description: "This was a blog post I wrote at Even on the tradeoffs we made, and why we made them."
layout: post
image: /images/even/even-interviewing-engineers-blog-post-hero.png
---

<style>
    blockquote {
        color: #444; /* HACK: Hardcoded/duplicated from common.css */
        font-size: 125%;
        font-weight: bold;
    }
</style>

![](/images/even/even-interviewing-engineers-blog-post-hero.png)

_This is a cross-post of a post I wrote at Even. [Original post on Even's blog.](https://www.even.com/blog/how-we-interview-engineers)_

---

Tech interviewing sucks.

As a candidate, it’s stressful, exhausting, and demoralizing. To do well, you often need to explicitly prepare, which is both tedious and time consuming. It may not even be feasible if you’re a parent or have other obligations outside of work. Interviews themselves can feel arbitrary and confounding. In the worst cases, you may not even know what your interviewers are looking for or whether you’re providing it.

Interviewing isn’t great for companies, either. Sourcing, screening, and interviewing candidates is endless work that takes significant time and energy, not just for the hiring manager but also for the team. Hiring decisions must be made after only hours of interaction, yet can have impact that lasts months or years. It sucks turning good candidates away, _and_ it sucks making the opposite mistake.

How much interviewing sucks at any individual company, though, depends a lot on that company’s process.

At Even, we’ve put a lot of thought, care, and iterations into our own interview process. I’m proud that we now get both meaningful signal _and_ consistent, positive feedback from candidates on their interview experience — even fully remote now — like this note from a candidate earlier this year:

> “I was so impressed with the team members whom I met during the interview process. It was clear throughout that the care you are taking in selecting for values and behavior is to good effect. I also appreciated that the technical interviews were both engaging and humane.”

In this post, I’m excited to share the details of our interview process and how we arrived at it. I hope this is helpful to both candidates and other companies.

### First, our context and philosophy

We aren’t the first company to write about interviewing. There are a lot of other admirable companies and people who’ve been pushing to make our industry better for a long time. [Joel Spolsky](https://www.joelonsoftware.com/2006/10/25/the-guerrilla-guide-to-interviewing-version-30/), [Honeycomb](https://www.honeycomb.io/blog/observations-on-the-enterprise-of-hiring/), and [Triplebyte](https://triplebyte.com/blog/how-to-interview-engineers) are just a few examples I appreciate that have informed our process.

When reading any advice, though — including this post — don’t apply it blindly. Consider the context and how it may differ for you.

Here’s our context:

1.  **We’re a fiscally responsible startup**. That means we have a small team and limited seats, so our hiring decisions matter a lot.

2.  **We have a strong social mission**. We’re tackling a [large, important problem](https://blog.even.com/the-new-normal-b741608f929b) and demonstrating [clear, meaningful impact](https://www.even.com/blog/optimizing-for-impact). This helps us both attract and retain great, mission-aligned engineers more effectively than a company of our size may otherwise.

3.  **Our onboarding takes time.** We’re not a simple CRUD app. Our domain is complex (we deal with real-world money movement, sensitive financial data at scale, and important security, privacy, and regulatory concerns). Our codebase is large (>500k LOC today). And much of our tech is new (e.g. Go, GraphQL, and React Native). These things take time to learn, but we commit to providing that time. We love investing up front in our engineers like this because we see the compounding dividends this yields. In return, we accept taking a bit more time before deciding that someone isn’t a good match.

Given this context, we’ve found that hiring someone who isn’t a good match is a much worse mistake for us than [turning someone away](https://charity.wtf/2019/10/18/the-real-11-reasons-i-dont-hire-you/) who may have been. This realization has led us to one key decision: We optimize for **reducing false positives** today.

This decision has ripple effects on other important factors for us. If we want to be selective in our hiring, we need to interview many candidates. To interview many candidates, we need to keep drop-off low throughout our funnel. To keep drop-off low, we need to minimize delays in our process. To minimize delays, we need to spread interviews out across our team. Finally, to have confidence in the assessments we get across our team — as well as to combat unconscious bias and build a diverse team — we need to standardize our interviews as much as reasonably possible.

> “If I ran a company, that's exactly how I would want the interview process formulated. It's nice to know that with a thorough interview process like this, Even will keep hiring good people, and selfishly, those are the kinds of people I want to work with.”

These factors have played an important role in the decisions we’ve made below.

### What we _don’t_ do

For starters, we _don’t_ do…

-   **Whiteboard coding**
-   **Riddles and brain teasers**
-   **Trivia/memorization questions**

I won’t dive too deep here. These things are commonly understood to provide noisy signals at best, and we agree.

But we also avoid other things that can be good and that we ourselves have done in the past. This is where our context and philosophy comes into play.

Today, we don’t:

-   Ask candidates to do a **take-home project**. I personally feel no doubt that take-home projects provide some of the best insight on real-world ability, and we’ve experimented with them in the past. Unfortunately, there are too many candidates who either can't or won't make time for these, so the drop-off ends up being too high for us to accept. (We may experiment with giving candidates a _choice_ here in the future, but that would also make our process less standard across candidates.)

-   Ask candidates to give a **tech talk** on a past project or topic of their choice. We experimented with this previously too, and I personally really like the idea of letting candidates teach _us_ in _their_ area of expertise. But because both the content and the style of talks vary so dramatically across candidates, we found it very hard to standardize our assessments across interviews. This left us little confidence in the correctness of our decisions.

-   Ask candidates to show us a **code sample** (whether asynchronously or via a live code walkthrough). We did this in the past, too, but the massive variety here also made it hard to standardize our assessments.

-   Ask candidates **deep algorithmic questions**. Triplebyte makes some [good arguments](https://triplebyte.com/blog/algorithms-in-interviews-hazing-ritual-or-valuable-vetting-technique) for why they can be good, but the main downside is clear: Plenty of great engineers struggle with these, especially experienced ones who aren’t able to explicitly prepare. This makes the signal noisy and unreliable to us.

-   Ask candidates **deep knowledge questions**, like “what happens when you enter a URL into your browser?” These also have [clear benefits](https://www.reddit.com/r/programming/comments/2sqq7o/what_happens_when_you_type_googlecom_into_your/cns3yek/), and we do require a baseline of existing knowledge. But _deep_ knowledge comes primarily from experience, and we’re happy to take candidates who may not have as much relevant experience, but who are smart, quick learners, and hungry for growth.

> “The interviews were well rounded and very well thought out. The people I met were professional, yet also friendly and approachable. Needless to say, I was impressed, and it left me with a very positive impression of the company.”

Many of the interviews above do provide meaningful signal, so we try to get an approximation of that signal through the other interviews below.

### What we do

Today, we:

-   Ask candidates a **_basic_ data structures question** in the context of a **real-world problem**. Specifically, we ask candidates to describe how they’d implement a simple board game and then extend it in various ways. The key thing we’re looking for is that the candidate is solidly comfortable with _everyday_ data structures (like lists and maps), such that they can effectively apply them to solve the problem at hand. And because we focus on making the problem simple and realistic, this interview has proven to be reliable for us across levels and backgrounds.

-   Ask candidates a **system design and architecture question**, similar to common ones like “build a URL shortener” or “build Twitter” but with variants for mobile/frontend, backend, and full-stack candidates. With this interview, we look for a baseline of relevant domain expertise (like basic relational database design and a basic understanding of HTTP), as well as for candidates to again effectively apply that knowledge to a real-world problem. Experienced candidates can naturally go further here, so we also use this interview to gauge depth of knowledge.

-   Ask candidates to **[debug and extend an existing codebase](https://docs.google.com/document/d/1rcAGodSgNqqLk1CAdi9FEsDGqzdMqvOz1ucT2N9OmhY/edit)** as a **live coding exercise** (inspired by Triplebyte). We added this interview after realizing that navigating, understanding, and modifying a large existing codebase are essential skills in their own right — and fundamentally different than greenfield coding. It’s important to call out, though, that creating this interview was a _lot_ of work. Designing a non-trivial, real-world codebase across multiple languages with good bugs and features that don’t require knowledge of specific tools and technologies wasn’t easy! We also tested this interview on our own engineers and iterated significantly. This work was clearly worth it, though: This has quickly become a very high-signal interview for us that candidates also appreciate.

-   Dive deep into candidates’ **past experience**. But we don’t do this aimlessly; we conduct two interviews specifically tailored to our [four company values](https://www.even.com/about/careers#values). One interview focuses on technical details, and only the hiring manager leads this interview. The other interview focuses on behavioral details, and non-engineers often lead these interviews. This gives us a well-rounded but focused picture on whether candidates share our company values, without falling prey to the classic Silicon Valley trap of ambiguous “culture fit.”

-   Invest in proper **interview guides**, **explicit rubrics**, and **formal training** for new interviewers — including shadowing, reverse shadowing, and debriefs after each interview to help calibrate. This is all in the service of helping us get consistent assessments across interviewers, which keeps our confidence high, combats unconscious bias, and helps us scale. This requires a serious investment as well, but is very much worth it.

-   Remember the **human touch**. Interviewing is a two-way street, and the details matter. From the very first phone screen to the very last interview, we leave time for candidates to ask us questions and ensure they all get answered. We discuss comp expectations and questions up front. We give a one-hour lunch break and reimburse the meal cost. We share behavioral interview questions ahead of time so candidates can think of their best examples. And we try to get back to every candidate quickly — no ghosting or leaving anyone hanging. As our recruiter Alyssa says, it means a lot to us when people take an interest in our team. We cherish that and try to treat everyone with kindness and respect.

I’m sure that what we do today isn’t perfect. We have room for improvement in all of these things, and I’m sure that we’ll iterate more.

Even so, I really appreciate where we are today. I have confidence in the signal we get, and I’m comfortable with the tradeoffs we make. Most importantly, I’m grateful that candidates appreciate their experience, too.

> “I want to thank you and the entire Even team for making this the best recruiting, interview, and offer experience I have ever encountered. It is very clear that you care deeply about helping your candidates. I greatly enjoyed my time interviewing with the team.”

If you have feedback, [shoot me an email](mailto:aseem@even.com) — I’d love to hear it. And if you’d like to join, [reach out](https://www.even.com/about/careers)! Hopefully your own interview experience will be just as positive. ❤️

---

_Most of the credit for our interview process goes to my brilliant colleagues [Evan Goldschmidt](https://www.linkedin.com/in/evangoldschmidt/), [Ryan Gomba](https://www.linkedin.com/in/ryangomba/), [Olivia Bishop](https://www.linkedin.com/in/olivia-bishop-a4b9a428/), and [Jenny Molyneaux](https://www.linkedin.com/in/jenny-molyneaux-bb69b057/). Thank you!_

_Thanks also to the candidates who provided us with the feedback we’ve shown above. All quotes are real, edited only for clarity, and posted with permission._
