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


<!-- .slide: class="big-code" data-transition="default" -->

`X-Query-Type: write|read`


<!-- .slide: class="subtitle" -->

## <span class="red">Writing</span> &rarr; <span class="green">Atomicity</span>

### <!-- .element: class="fragment" --> 🎩 [Ryan Weingast](https://paper.fiftythree.com/ryan) 👏

// Notes:
Let's talk about writing, and subtleties that come up relating to atomicity.
<p/>
Many props to my colleague Ryan, who discovered and taught me most of this.


<!-- .slide: class="big-code" data-transition="fade" -->

`SET n.count = n.count + 1`

// Notes:
Here's a simple line of Cypher. Does it do what you expect?


<!-- .slide: class="big-list" data-transition="fade" -->

`c = c + 1`

// Notes:
Here's an equivalent line of code in your favorite programming language. If you've ever done multithreaded programming, this surely looks familiar.


<!-- LOCKING DIAGRAM: IMAGE 1 -->

<!-- .slide: data-background="/images/advanced-neo4j/locking-1.jpeg" data-background-transition="none" -->

<p class="stretch"><a href="https://paper.fiftythree.com/aseemk/6961461" style="color: transparent; display: block; width: 100%; height: 100%;">&nbsp;</a></p>

// Notes:
Here are the steps that those operations break down into, visualized. Easy enough when considering one call in isolation.


<!-- LOCKING DIAGRAM: IMAGE 2 -->

<!-- .slide: data-background="/images/advanced-neo4j/locking-2.jpeg" data-background-transition="none" -->

<p class="stretch"><a href="https://paper.fiftythree.com/aseemk/6961470" style="color: transparent; display: block; width: 100%; height: 100%;">&nbsp;</a></p>

// Notes:
If the operation is called twice, and the individual steps happen in grouped sequence, that's great.


<!-- LOCKING DIAGRAM: IMAGE 3 -->

<!-- .slide: data-background="/images/advanced-neo4j/locking-3.jpeg" data-background-transition="none" -->

<p class="stretch"><a href="https://paper.fiftythree.com/aseemk/6961504" style="color: transparent; display: block; width: 100%; height: 100%;">&nbsp;</a></p>

// Notes:
But more realistically, especially at scale, there's no guarantee that the steps will happen in grouped sequence. If the two calls are running in parallel, and both reads happen before either write, then we run into this classic race condition.


<blockquote>
Transactions in Neo4j use a <span class="red">read-committed</span> isolation level...
</blockquote>

<blockquote class="fragment">
Data retrieved by traversals is <span class="red">not protected</span> from modification by other transactions.
</blockquote>

<blockquote class="fragment">
<span class="red">Only write locks</span> are acquired and held until the end of the transaction.
</blockquote>

// Notes:
It turns out that this *can* and *does* happen with the previous Cypher example, because Neo4j uses what's known as a "read-committed" [isolation level](https://en.wikipedia.org/wiki/Isolation_(database_systems)).
<p/>
These are quotes from the Neo4j manual, under the [Transactions](http://neo4j.com/docs/stable/transactions.html) section.


<!-- LOCKING DIAGRAM: IMAGE 1 -->

<!-- .slide: data-background="/images/advanced-neo4j/locking-1.jpeg" data-background-transition="none" -->

<p class="stretch"><a href="https://paper.fiftythree.com/aseemk/6961461" style="color: transparent; display: block; width: 100%; height: 100%;">&nbsp;</a></p>

// Notes:
TODO


<!-- LOCKING DIAGRAM: IMAGE 4 -->

<!-- .slide: data-background="/images/advanced-neo4j/locking-4.jpeg" data-background-transition="none" -->

<p class="stretch"><a href="https://paper.fiftythree.com/aseemk/6961137" style="color: transparent; display: block; width: 100%; height: 100%;">&nbsp;</a></p>

// Notes:
TODO


<!-- LOCKING DIAGRAM: IMAGE 3 -->

<!-- .slide: data-background="/images/advanced-neo4j/locking-3.jpeg" data-background-transition="none" -->

<p class="stretch"><a href="https://paper.fiftythree.com/aseemk/6961504" style="color: transparent; display: block; width: 100%; height: 100%;">&nbsp;</a></p>

// Notes:
TODO


<!-- LOCKING DIAGRAM: IMAGE 6 -->

<!-- .slide: data-background="/images/advanced-neo4j/locking-6.jpeg" data-background-transition="none" -->

<p class="stretch"><a href="https://paper.fiftythree.com/aseemk/6961439" style="color: transparent; display: block; width: 100%; height: 100%;">&nbsp;</a></p>

// Notes:
TODO


<blockquote>
This type of isolation is weaker than serialization, but offers <span class="green">significant performance advantages</span>...
</blockquote>

<blockquote class="fragment">
One can <span class="green">manually acquire write locks</span> on nodes and relationships to achieve higher levels of isolation.
</blockquote>

<blockquote class="fragment">
<span class="green">Deadlock detection</span> is built into the core transaction management.
</blockquote>

// Notes:
TODO


<!-- LOCKING DIAGRAM: IMAGE 4 -->

<!-- .slide: data-background="/images/advanced-neo4j/locking-4.jpeg" data-background-transition="none" -->

<p class="stretch"><a href="https://paper.fiftythree.com/aseemk/6961137" style="color: transparent; display: block; width: 100%; height: 100%;">&nbsp;</a></p>

// Notes:
TODO


<!-- LOCKING DIAGRAM: IMAGE 7 -->

<!-- .slide: data-background="/images/advanced-neo4j/locking-7.jpeg" data-background-transition="none" -->

<p class="stretch"><a href="https://paper.fiftythree.com/aseemk/6961680" style="color: transparent; display: block; width: 100%; height: 100%;">&nbsp;</a></p>

// Notes:
TODO


<!-- LOCKING DIAGRAM: IMAGE 6 -->

<!-- .slide: data-background="/images/advanced-neo4j/locking-6.jpeg" data-background-transition="none" -->

<p class="stretch"><a href="https://paper.fiftythree.com/aseemk/6961439" style="color: transparent; display: block; width: 100%; height: 100%;">&nbsp;</a></p>

// Notes:
TODO


<!-- LOCKING DIAGRAM: IMAGE 8 -->

<!-- .slide: data-background="/images/advanced-neo4j/locking-8.jpeg" data-background-transition="none" -->

<p class="stretch"><a href="https://paper.fiftythree.com/aseemk/6962004" style="color: transparent; display: block; width: 100%; height: 100%;">&nbsp;</a></p>

// Notes:
TODO


<!-- .slide: class="big-code" data-transition="fade" -->

```
SET n.count = n.count + 1
```


<!-- .slide: class="big-code" data-transition="fade" -->

```
SET n._lock = true
SET n.count = n.count + 1
```

// Notes:
Fix by explicitly taking a write lock before reading. We achieve this in Cypher by assigning some dummy property some dummy value. (We do `_lock = true` purely as a convention.)


<!-- .slide: class="big-code" data-transition="fade" -->

```
MATCH (n:Node ...)
SET n._lock = true
SET n.count = n.count + 1
```

// Notes:
But of course, we need a node first. So we add a `MATCH`. That's fine, right?


<!-- .slide: class="big-code" data-transition="fade" -->

```
MATCH (n:Node ...)
REMOVE n:Node
SET n:Deleted
```

// Notes:
What happens if this other query, which removes the `:Node` label, runs concurrently?
<p/>
(In case that seems unrealistic, we do this for soft deletes, replacing labels with `:Deleted` variants.)


<!-- .slide: class="big-code" data-transition="fade" -->

```
MATCH (n:Node ...)
SET n._lock = true
WHERE (n:Node)
SET n.count = n.count + 1
```

// Notes:
The fix is to note that any part of the `MATCH` that can change is *also* a read. So it, too, should be done after the write. In this case, that means to repeat/verify the read.
<p/>
This is known as [double-checked locking](https://en.wikipedia.org/wiki/Double-checked_locking).


<!-- .slide: class="big-code" data-transition="fade" -->

```
MERGE (a) -[:follows]-> (b)
```

// Notes:
Fortunately, for relationships, Neo4j's `MERGE` statement takes care of being properly atomic, taking write locks before reading the pattern.


<!-- .slide: class="big-code" data-transition="fade" -->

```
MATCH (a:User ...)
MATCH (b:User ...)
MERGE (a) -[:follows]-> (b)
```

// Notes:
Except there too, if you only want to `MERGE` a specific part of the pattern (e.g. just the `follows` relationship in this case), and you're `MATCH`ing other parts (e.g. the users in this case)...


<!-- .slide: class="big-code" data-transition="fade" -->

```
MATCH (a:User ...)
MATCH (b:User ...)

SET a._lock = true
SET b._lock = true
WITH a, b

WHERE (a:User) AND (b:User)
MERGE (a) -[:follows]-> (b)
```

// Notes:
...then you need to manually double-check lock in this case too.


<!-- .slide: class="big-code" data-transition="fade" -->

```
MATCH (a:User ...)
MATCH (b:User ...)

WHERE NOT (b) -[:blocks]-> (a)
MERGE (a) -[:follows]-> (b)
```

// Notes:
Even if changing labels etc. isn't an issue for you, these cases can still come up *across multiple relationships*.
<p/>
Here's a simple query to check whether someone is blocking you before you can follow them.


<!-- .slide: class="big-code" data-transition="fade" -->

```
MATCH (a:User ...)
MATCH (b:User ...)
OPTIONAL MATCH (a) -[f:follows]-> (b)
MERGE (b) -[:blocks]-> (a)
DELETE f
```

// Notes:
If this is the query for performing the block — taking care to unfollow if needed — we can have the same kind of race condition, where both queries can do their reads before either one does its write.


<!-- .slide: class="big-code" data-transition="fade" -->

```
MATCH (a:User ...)
MATCH (b:User ...)

SET a._lock = true
SET b._lock = true

WHERE NOT (b) -[:blocks]-> (a)
MERGE (a) -[:follows]-> (b)
```

// Notes:
Since creating and deleting relationships locks on both the start and end nodes, we can manually take write locks on those nodes the same way we do for properties, to ensure we're protected here too.


<blockquote>
Using locks gives the opportunity to simulate the effects of higher levels of isolation by obtaining and releasing locks explicitly. For example, if a write lock is taken on a common node or relationship, then all transactions will serialize on that lock — giving the effect of a serialization isolation level.
</blockquote>

// Notes:
http://neo4j.com/docs/stable/transactions-isolation.html


# Write Locks

<blockquote>
When adding, changing or removing a property on a node or relationship a write lock will be taken on the specific node or relationship.
When creating or deleting a node a write lock will be taken for the specific node.
When creating or deleting a relationship a write lock will be taken on the specific relationship and both its nodes.
The locks will be added to the transaction and released when the transaction finishes.
</blockquote>

// Notes:
http://neo4j.com/docs/stable/transactions-locking.html
