<!-- TITLE -->

<!-- .slide: class="title" -->

# <span class="red">Advanced Neo4j</span>
# <span class="green">at FiftyThree</span>

### Reading, Writing, and Scaling — Oh, My!

Aseem Kishore<br/>
Oct 2015<br/>

// Notes:
Hi folks. My name is [Aseem Kishore](http://aseemk.com/). I'm a developer at a startup called [FiftyThree](http://www.fiftythree.com/about). We make the popular iOS app [Paper](http://www.fiftythree.com/paper).


<!-- INTRO: FIFTYTHREE -->

<!-- .slide: data-background="/images/advanced-neo4j/paper-1440.png" data-background-transition="convex" -->

<p class="stretch"><a href="https://player.vimeo.com/video/138268307?autoplay=1" style="color: transparent; display: block; width: 100%; height: 100%;">&nbsp;</a></p>

// Notes:
Paper is an app for quickly capturing ideas. Whether your idea is a text note, a photo, a sketch — or any combination of those — we aim for Paper to be both the fastest and simplest way to get it recorded.
<p/>
Be sure to [watch the video](https://vimeo.com/138268307).


<!-- INTRO: FIFTYTHREE / GRAPH 1 -->

<!-- .slide: data-background="/images/advanced-neo4j/talk2-mix-graph6-stars.jpg" data-background-transition="convex" -->

// Notes:
TODO


<!-- INTRO: FIFTYTHREE / GRAPH 2 -->

<!-- .slide: data-background="/images/advanced-neo4j/talk2-mix-graph15-user5.jpg" data-background-transition="none" -->

// Notes:
TODO


<!-- INTRO: FIFTYTHREE / GRAPH 3 -->

<!-- .slide: data-background="/images/advanced-neo4j/talk2-mix-graph13-creation4.jpg" data-background-transition="none" -->

// Notes:
TODO


<!-- INTRO: FIRST TALK / TITLE -->

<!-- .slide: data-background="/images/neo4j-lessons-learned.png" data-background-transition="convex" -->

<p class="stretch"><a href="http://aseemk.com/talks/neo4j-lessons-learned" style="color: transparent; display: block; width: 100%; height: 100%;">&nbsp;</a></p>

// Notes:
I've previously given two other talks relating to Neo4j. The first, [Betting the Company on a Graph Database](http://aseemk.com/talks/neo4j-lessons-learned), described why we chose Neo4j in the first place, how it works, and some of the fundamental lessons we learned.


<!-- INTRO: FIRST TALK / GRAPH DB DEF -->

<!-- .slide: data-background="/images/advanced-neo4j/talk1-graphdb-def.png" data-background-transition="fade" -->

// Notes:
TODO


<!-- INTRO: FIRST TALK / GRAPH DB VIZ -->

<!-- .slide: data-background="/images/advanced-neo4j/talk1-graphdb-viz.png" data-background-transition="none" -->

// Notes:
TODO


<!-- INTRO: FIRST TALK / FILE DIAGRAM -->

<!-- .slide: data-background="/images/advanced-neo4j/talk1-neo4j-file-diagram.png" data-background-transition="none" -->

// Notes:
TODO


<!-- INTRO: FIRST TALK / FILE FORMAT -->

<!-- .slide: data-background="/images/advanced-neo4j/talk1-neo4j-file-format.png" data-background-transition="none" -->

// Notes:
TODO


<!-- INTRO: FIRST TALK / LESSONS -->

<!-- .slide: data-background="/images/advanced-neo4j/talk1-lessons.png" data-background-transition="none" -->

// Notes:
TODO


<!-- INTRO: SECOND TALK / TITLE -->

<!-- .slide: data-background="/images/mix-neo4j.png" data-background-transition="convex" -->

<p class="stretch"><a href="http://aseemk.com/talks/mix-neo4j" style="color: transparent; display: block; width: 100%; height: 100%;">&nbsp;</a></p>

// Notes:
The second talk, Betting the Company Part 2, or [Building Mix with Neo4j](http://aseemk.com/talks/mix-neo4j), described how we expanded our understanding of Neo4j to ship our major sharing and collaboration service for Paper.


<!-- INTRO: SECOND TALK / PAGINATION BAD -->

<!-- .slide: data-background="/images/advanced-neo4j/talk2-pagination-bad.png" data-background-transition="fade" -->

// Notes:
TODO


<!-- INTRO: SECOND TALK / PAGINATION GOOD -->

<!-- .slide: data-background="/images/advanced-neo4j/talk2-pagination-good.png" data-background-transition="none" -->

// Notes:
TODO


<!-- INTRO: SECOND TALK / PRECISE DISTINCT -->

<!-- .slide: data-background="/images/advanced-neo4j/talk2-precise-distinct.png" data-background-transition="none" -->

// Notes:
TODO


<!-- INTRO: SECOND TALK / DEDUPE HOLES -->

<!-- .slide: data-background="/images/advanced-neo4j/talk2-dedupe-holes.jpg" data-background-transition="none" -->

// Notes:
TODO


<!-- INTRO: SECOND TALK / QUERY PROFILING -->

<!-- .slide: data-background="/images/advanced-neo4j/talk2-query-profiling-code.png" data-background-transition="none" -->

// Notes:
TODO


<!-- INTRO: THIS TALK -->

<!-- .slide: class="big-list" -->

# This Talk

<ul class="fragment fade-in">
<li>Reading <em class="fragment">&rarr; Consistency</em></li>
<li>Writing <em class="fragment">&rarr; Atomicity</em></li>
<li>Scaling <em class="fragment">&rarr; Monitoring</em></li>
</ul>

// Notes:
With both of my previous talks, I tried to focus on things that weren't already covered by typical blog posts, tutorials, etc. This talk is no different.
<p/>
I want to focus on just three things in this talk, but I'll dive deep into each one. And the three things correspond to basic actions. The subtleties just come into play as you grow.


<!-- .slide: class="subtitle" -->

## <span class="red">Reading</span> &rarr; <span class="green">Consistency</span>

### <!-- .element: class="fragment" --> 🎩 [Dave Stern](https://paper.fiftythree.com/davestern) & [Matt Cox](https://paper.fiftythree.com/mcox) 👏

// Notes:
TODO


<!-- .slide: class="big-list" data-transition="fade" -->

<ul>
<li><code><span class="green">A</span>tomicity</code></li>
<li><code><span class="green">C</span>onsistency</code></li>
<li><code><span class="green">I</span>solation</code></li>
<li><code><span class="green">D</span>urability</code></li>
</ul>

// Notes:
Neo4j claims to be ACID, and it certainly is. The consistency in ACID (the database is always "correct" w.r.t. its constraints) is not the consistency we're talking about.


<!-- .slide: class="big-list" data-transition="fade" -->

<ul>
<li><code><span class="green">C</span>onsistency</em></code></li>
<li><code><span class="green">A</span>vailability</code></li>
<li><code><span class="green">P</span>artition-tolerance</code></li>
</ul>

// Notes:
The consistency we're talking about is the consistency referenced in the CAP theorem. Neo4j's High Availability (HA) cluster prioritizes availability (as the name states!), which means that consistency is sacrificed.


<!-- HA DIAGRAM: IMAGE 1 -->

<!-- .slide: data-background="/images/advanced-neo4j/ha-setup-1.jpeg" data-background-transition="none" -->

<p class="stretch"><a href="https://paper.fiftythree.com/aseemk/6953106" style="color: transparent; display: block; width: 100%; height: 100%;">&nbsp;</a></p>

// Notes:
TODO


<!-- HA DIAGRAM: IMAGE 2 -->

<!-- .slide: data-background="/images/advanced-neo4j/ha-setup-2.jpeg" data-background-transition="none" -->

<p class="stretch"><a href="https://paper.fiftythree.com/aseemk/6953126" style="color: transparent; display: block; width: 100%; height: 100%;">&nbsp;</a></p>

// Notes:
TODO


<!-- HA DIAGRAM: IMAGE 3 -->

<!-- .slide: data-background="/images/advanced-neo4j/ha-setup-3.jpeg" data-background-transition="none" -->

<p class="stretch"><a href="https://paper.fiftythree.com/aseemk/6953178" style="color: transparent; display: block; width: 100%; height: 100%;">&nbsp;</a></p>

// Notes:
TODO


<!-- .slide: class="subtitle" -->

## <span class="red">Writing</span> &rarr; <span class="green">Atomicity</span>

### <!-- .element: class="fragment" --> 🎩 [Ryan Weingast](https://paper.fiftythree.com/ryan) 👏

// Notes:
TODO


<!-- .slide: class="big-code" data-transition="fade" -->

`SET n.count = n.count + 1`

// Notes:
Here's a simple line of Cypher. Does it do what you expect?


<!-- .slide: class="big-list" data-transition="fade" -->

`c = c + 1`

// Notes:
Here's an equivalent line of code in your favorite programming language. If you've ever done multithreaded programming, this surely looks familiar.


<!-- .slide: class="big-list" data-transition="fade" -->

<ul>
<li>Read <span class="fragment red">x2</span></li>
<li>Increment <span class="fragment red">x2</span></li>
<li>Write <span class="fragment red">x2</span></li>
</ul>

// Notes:
Here's an equivalent line of code in your favorite programming language. If you've ever done multithreaded programming, this surely looks familiar.
