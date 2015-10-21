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

<!-- .slide: data-background="/images/advanced-neo4j/talk2-mix-graph6-stars.jpg" data-background-transition="fade" -->

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
Let's talk about reading data, and what it means with respect to consistency.
<p/>
All of my knowledge here is thanks to my colleague Dave, and our latest and greatest setup is thanks to my colleague Matt.


<!-- HA DIAGRAM: IMAGE 3 -->

<!-- .slide: data-background="/images/advanced-neo4j/ha-setup-3.jpeg" data-background-transition="convex" -->

<p class="stretch"><a href="https://paper.fiftythree.com/aseemk/6953178" style="color: transparent; display: block; width: 100%; height: 100%;">&nbsp;</a></p>

// Notes:
Here's a typical cluster setup: a master, at least two slaves, and a load balancer like HAProxy handling the requests. To take advantage of the cluster for scale, not just resilience, you typically split the traffic between the master and the slaves.


<!-- .slide: class="big-code" data-transition="fade" -->

`X-Query-Type: read|write`

&nbsp;

<code>&nbsp;</code>

// Notes:
The typical way of splitting the traffic is based on whether the query is a read query or write one. Reads get sent to slaves; writes to the master.
<p/>
(Given that Cypher calls are all `POST` requests, the [recommended way](http://blog.armbruster-it.de/2015/08/neo4j-and-haproxy-some-best-practices-and-tricks/) of determining read vs. write is to just send an explicit header with every query.)


<!-- .slide: class="big-code" data-transition="fade" -->

<p><strike class="no">`X-Query-Type: read|write`</strike></p>

&nbsp;

<span class="green">`X-Query-Consistency: strong|weak`</span>

// Notes:
We've learned at FiftyThree that the better way to think about it is through consistency. Writes always need to be strongly consistent, but some reads do too. And all strongly consistent queries should get sent to the master.
<p/>
It's also worthwhile making consistency a separate concept from read/write. We support entering a read-only maintenance mode in our service, and in that mode, we reject write queries, but still accept strongly consistent read queries.


<!-- PAPER APP SCREENSHOTS -->

<!-- .slide: class="table-images" -->

<table>
<tr>
<td>
![Paper sign-up screen](/images/advanced-neo4j/paper-app-signup.png)
</td>
<td class="fragment">
![Paper follow profile](/images/advanced-neo4j/paper-app-follow.png)
</td>
</tr>
</table>

// Notes:
Here are two examples where we need strongly consistent reads:
<p/>
- Right after you sign up (which creates a user node in our db), the very next request — auth'ed as your new account — should succeed in finding you.
<p/>
- Right after you follow someone, the very next home stream request — which Paper might immediately make on your behalf — should include that person's content.


## Per-user
## <span class="green">read-after-write</span>
## consistency

// Notes:
We saw a pattern in cases like those and others: when a given user does a write, *their* immediately subsequent read queries should be strongly consistent.
<p/>
"I don't need to see the effects of someone else's actions right away (because I'm not aware of those actions). But I *should* see the effects of *my* actions right away — because I made them."


<!-- .slide: class="medium-code" -->

```
getConsistency = (req) ->
    if req.method in ['GET', 'HEAD']
        (recentlyWrote req.user) ? 'strong' : 'weak'
    else
        'strong'

recentlyWrote = (user) ->
    return false if not user
    (Date.now() - user.lastWroteAt) < THRESHOLD

recordWrite = (req) ->
    return if not req.user
    return if req.method in ['GET', 'HEAD']

    req.user.lastWroteAt = Date.now()
    req.user.save()
```

// Notes:
So we achieved read-after-write consistency by persisting a "last wrote" time per user, updating that on every write\*, and on every request, checking that value for the user making the request, to see if we should make the request's queries with strong or weak consistency.
<p/>
\*We actually do this by injecting a bit of Cypher into all Cypher write calls, so that this is both atomic and efficient. It was just easier to illustrate this concept with simple code.


<!-- .slide: class="medium-code" -->

```
initReq = (req) ->
    authToken = parseAuthHeader req

    req.user = User.getByAuthToken authToken,
        {consistency: 'strong'}

    req.consistency = getConsistency req
```

// Notes:
Importantly, this implies that we should be reading this timestamp *with strong consistency*.
<p/>
We store this timestamp along with all other account data in Neo4j, so that means we make all auth lookups — read queries — with strong consistency.
<p/>
These lookup queries are very simple and fast, so they haven't been an issue for us. But if they do become an issue, we could offload auth data to a different datastore, e.g. DynamoDB or Redis.


<!-- .slide: class="medium-code" -->

```
recentlyWrote = (user) ->
    return false if not user
    (Date.now() - user.lastWroteAt) < THRESHOLD
```

`THRESHOLD = ?` <!-- .element: class="fragment" -->

// Notes:
Going back to the notion of "recently wrote", what threshold should we use exactly?


<!-- .slide: class="medium-code" -->

```
AnsibleBOT [10:30 PM]
Slave Lag Report:
production-02 (M): 87860743
production-03 (S): 87860748 [-5]
production-01 (S): 87860748 [-5]

AnsibleBOT [10:45 PM]
Slave Lag Report:
production-02 (M): 87863270
production-01 (S): 87863281 [-11]
production-03 (S): 87863289 [-19]

AnsibleBOT [11:00 PM]
Slave Lag Report:
production-02 (M): 87865973
production-01 (S): 87865973 [0]
production-03 (S): 87865973 [0]
```

// Notes:
That's a tough question to answer, with no easy formula. It ultimately depends on slave lag: how far your slaves typically lag behind the master, and the rate at which they catch up and process new transactions.
<p/>
It's possible (though not easy) to monitor this data in Neo4j, via each instance's "last committed transaction ID". We dug into this data and for now, just sample it every 15 minutes and send the numbers to a Slack channel, so we can keep our finger on the pulse.
<p/>
Here's a random snippet. As you can see, the slave lag fluctuates, but it's nice and small relative to the rate of transactions being added.
<p/>
It's important to test this under load and scale, to make sure that your slaves don't start lagging more and more, hopelessly behind and never catching up. Neo4j recently had a bug that would cause that to happen; it's thankfully now fixed in 2.2.6.


<!-- .slide: class="medium-code" -->

<pre><code># The interval at which slaves will pull updates from the master. Comment out
# the option to disable periodic pulling of updates. Unit is seconds.
<span class="green">ha.pull_interval=10</span>

# Amount of slaves the master will try to push a transaction to upon commit
# (default is 1). The master will optimistically continue and not fail the
# transaction even if it fails to reach the push factor. Setting this to 0 will
# increase write performance when writing through master but could potentially
# lead to branched data (or loss of transaction) if the master goes down.
<span class="red">#ha.tx_push_factor=1</span>

# Strategy the master will use when pushing data to slaves (if the push factor
# is greater than 0). There are two options available "fixed" (default) or
# "round_robin". Fixed will start by pushing to slaves ordered by server id
# (highest first) improving performance since the slaves only have to cache up
# one transaction at a time.
<span class="red">#ha.tx_push_strategy=fixed</span>
</code></pre>

// Notes:
A few important HA configs also come into play: push factor, push strategy, and pull interval. This snippet is the default that shipped with Neo4j 2.2.3.
<p/>
As you can see, the default behavior may not be ideal for your needs. It wasn't for us — we were on a pull interval of 10 seconds (with a push factor of 0) for a long time. Only recently did we revisit this with support, and we're now at 500ms (still with a push factor of 0\*).
<p/>
Given this info, and the fact that we don't see significant slave lag in production, we currently set our read-after-write "recency" threshold to 2 seconds — a few comfortable multiples of the pull interval.
<p/>
\*A push factor of 0 has been the official recommendation from the Neo4j team to us, and I can't say I still totally understand why. In general though, it's important to realize that pushes are async and optimistic, so they don't serve the purpose of durability. (And indeed, data loss/branching can occur in some master failures.) I'm looking forward to the revamped quorum-based clustering in Neo4j 3.0!


## Per-user
## <span class="green">read-after-<span class="red">read</span></span>
## consistency

// Notes:
Finally, we also know it's possible for users to see inconsistent data between *reads*, if one read goes to slave A, the next goes to slave B, and the two slaves aren't in sync.


<!-- .slide: class="medium-code" -->

`X-User-Id: 12345678`

```
stick-table type string size 1m expire 5m store server_id,conn_cnt,sess_cnt
stick on hdr(X-User-Id)
```

// Notes:
Because our slave lag is nice and low today, we haven't felt this issue so far. But if we do, one way to solve it would be to introduce slave stickiness based on the user: for weakly consistent reads, always route a given user's queries to the same slave.


# Takeaways

<p class="fragment">
Split on <span class="green">consistency</span>, not read vs. write
</p>

<p class="fragment">
Track user last write time, for <span class="green">read-after-write</span> consistency
</p>

<p class="fragment">
Monitor and tune <span class="green">slave lag</span>, via push/pull configs
</p>

<p class="fragment">
Stick slaves by user, for <span class="green">read-after-read</span> consistency
</p>


<!-- .slide: class="subtitle" -->

## <span class="red">Writing</span> &rarr; <span class="green">Atomicity</span>

### <!-- .element: class="fragment" --> 🎩 [Ryan Weingast](https://paper.fiftythree.com/ryan) 👏

// Notes:
Let's switch gears to writes, and the associated subtleties that come up relating to atomicity.
<p/>
Many props to my colleague Ryan, who discovered and taught me most of this.


<!-- FOLLOW DIAGRAM -->

<!-- .slide: data-background="/images/advanced-neo4j/following-2.jpeg" data-background-transition="convex" -->

<p class="stretch"><a href="https://paper.fiftythree.com/aseemk/6962249" style="color: transparent; display: block; width: 100%; height: 100%;">&nbsp;</a></p>

// Notes:
In Paper, like any other social app, you can follow other users. So we want to create and remove `follows` relationships between users. We also want to increment and decrement `numFollowers` and `numFollowing` stats on those users whenever we do that.


<!-- .slide: class="big-code" data-transition="fade" -->

`SET u.numFollowers = u.numFollowers + 1`

// Notes:
So let's start with the straightforward stat updates. Here's a simple line of Cypher. Does it do what you expect?


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
So going back to a simple operation by itself...


<!-- LOCKING DIAGRAM: IMAGE 4 -->

<!-- .slide: data-background="/images/advanced-neo4j/locking-4.jpeg" data-background-transition="none" -->

<p class="stretch"><a href="https://paper.fiftythree.com/aseemk/6961137" style="color: transparent; display: block; width: 100%; height: 100%;">&nbsp;</a></p>

// Notes:
...The entire operation is a transaction in Neo4j, but a lock is only taken at the end with the write.


<!-- LOCKING DIAGRAM: IMAGE 3 -->

<!-- .slide: data-background="/images/advanced-neo4j/locking-3.jpeg" data-background-transition="none" -->

<p class="stretch"><a href="https://paper.fiftythree.com/aseemk/6961504" style="color: transparent; display: block; width: 100%; height: 100%;">&nbsp;</a></p>

// Notes:
So when two operations run concurrently...


<!-- LOCKING DIAGRAM: IMAGE 6 -->

<!-- .slide: data-background="/images/advanced-neo4j/locking-6.jpeg" data-background-transition="none" -->

<p class="stretch"><a href="https://paper.fiftythree.com/aseemk/6961439" style="color: transparent; display: block; width: 100%; height: 100%;">&nbsp;</a></p>

// Notes:
...We can now see why the lock at the end is ineffective in preventing the race condition.


<blockquote>
This type of isolation is weaker than serialization, but offers <span class="green">significant performance advantages</span>...
</blockquote>

<blockquote class="fragment">
One can <span class="green">manually acquire write locks</span> on nodes and relationships to achieve higher levels of isolation.
</blockquote>

// Notes:
Fortunately, the Neo4j manual acknowledges this default behavior, arguing it's a reasonable trade-off, and notes that you can still achieve higher isolation manually.


<!-- LOCKING DIAGRAM: IMAGE 4 -->

<!-- .slide: data-background="/images/advanced-neo4j/locking-4.jpeg" data-background-transition="none" -->

<p class="stretch"><a href="https://paper.fiftythree.com/aseemk/6961137" style="color: transparent; display: block; width: 100%; height: 100%;">&nbsp;</a></p>

// Notes:
So let's do that. We'll scrap the increment to simplify the illustration (it doesn't affect things here). And then if we add a write before the read...


<!-- LOCKING DIAGRAM: IMAGE 7 -->

<!-- .slide: data-background="/images/advanced-neo4j/locking-7.jpeg" data-background-transition="none" -->

<p class="stretch"><a href="https://paper.fiftythree.com/aseemk/6961680" style="color: transparent; display: block; width: 100%; height: 100%;">&nbsp;</a></p>

// Notes:
...We get the lock at the *beginning* of the transaction, which is what we want.


<!-- LOCKING DIAGRAM: IMAGE 6 -->

<!-- .slide: data-background="/images/advanced-neo4j/locking-6.jpeg" data-background-transition="none" -->

<p class="stretch"><a href="https://paper.fiftythree.com/aseemk/6961439" style="color: transparent; display: block; width: 100%; height: 100%;">&nbsp;</a></p>

// Notes:
So applying the same approach to the concurrent transactions...


<!-- LOCKING DIAGRAM: IMAGE 8 -->

<!-- .slide: data-background="/images/advanced-neo4j/locking-8.jpeg" data-background-transition="none" -->

<p class="stretch"><a href="https://paper.fiftythree.com/aseemk/6962004" style="color: transparent; display: block; width: 100%; height: 100%;">&nbsp;</a></p>

// Notes:
...We get guaranteed serialization, even if both transactions begin at the same time.


<!-- .slide: class="big-code" data-transition="fade" -->

```
SET u.numFollowers = u.numFollowers + 1
```

// Notes:
So going back to our simple Cypher example, we now know we need to take a write lock before we do this read, but how?


<blockquote>
Locks are acquired at the <span class="green">Node</span> and <nobr><span class="green">Relationship</span> level.</nobr>
</blockquote>

<blockquote class="fragment">
When modifying a <span class="red">property</span> on a node or relationship, a write lock will be taken on the <span class="green">node</span> or <span class="green">relationship</span>.
</blockquote>

// Notes:
The same section of the Neo4j manual tells us that locks are held per node and relationship, and so modifying a property on a node means locking the node.


<!-- .slide: class="big-code" data-transition="fade" -->

<pre><code><span class="green">SET u._lock = true</span>
SET u.numFollowers = u.numFollowers + 1
</code></pre>

// Notes:
That means we can fix our Cypher increment by simply writing *any other property* first. (We use `_lock = true` to explicitly convey this purpose, but that's purely a convention.) This will lock the node before reading the `count` and incrementing it.


<!-- .slide: class="big-code" data-transition="fade" -->

<pre><code><span class="red">MATCH (u:User ...)</span>
SET u._lock = true
SET u.numFollowers = u.numFollowers + 1
</code></pre>

// Notes:
But of course, we need the node first. So we add a `MATCH`. That's fine, right?


<!-- .slide: class="big-code" data-transition="fade" -->

<pre><code>MATCH (u:User ...)
<span class="red">REMOVE u:User</span>
SET u:DeletedUser
</code></pre>

// Notes:
What happens if this other query runs concurrently? Then we're back to our race condition, because our first query may have already `MATCH`ed on the `:User` label before it was removed here.
<p/>
(Replacing labels like this is indeed what we do for soft deletes.)


<!-- .slide: class="big-code" data-transition="fade" -->

<pre><code>MATCH (u:User ...)
<span class="green">SET u._lock = true</span>
WITH u
<span class="green">WHERE (u:User)</span>
SET u.numFollowers = u.numFollowers + 1
</code></pre>

// Notes:
The fix is to note that any part of the `MATCH` that can change is *also* a read. So it, too, should be done after the write. In this case, that means to repeat/verify the read.
<p/>
This is known as [double-checked locking](https://en.wikipedia.org/wiki/Double-checked_locking).


<!-- .slide: class="big-code" data-transition="fade" -->

```
WHERE NOT (a) -[:follows]-> (b)
CREATE (a) -[:follows]-> (b)
```

// Notes:
What about relationships? Here's a common concept: ensure only one instance of a particular relationship.


<blockquote>
When <span class="red">creating</span> or <span class="red">deleting</span> a <span class="green">relationship</span>, <nobr>a write lock</nobr> will be taken on the <span class="green">relationship</span> <nobr>and <span class="red">both its nodes</span></nobr>.
</blockquote>

// Notes:
The Neo4j manual tells us that relationships are tied to nodes (makes sense!)...


<!-- .slide: class="big-code" data-transition="fade" -->

<pre><code><span class="green">SET a._lock = true
SET b._lock = true</span>
WHERE NOT (a) -[:follows]-> (b)
CREATE (a) -[:follows]-> (b)
</code></pre>

// Notes:
...So the fix here is to simply write any property to *both* the relationship's nodes, before seeing if the relationship exists.
<p/>
(To explain further, by taking these locks, you're ensuring that a relationship can't get created until you're done, since creating a relationship would need these locks.)


<!-- .slide: class="big-code" data-transition="fade" -->

```
MERGE (a) -[:follows]-> (b)
```

// Notes:
Fortunately for relationships, Neo4j's `MERGE` statement takes care of being properly atomic, taking write locks before reading the pattern.


<!-- .slide: class="big-code" data-transition="fade" -->

<pre><code><span class="red">MATCH (a:User ...)
MATCH (b:User ...)</span>
MERGE (a) -[:follows]-> (b)
</code></pre>

// Notes:
Except there too, if you only want to `MERGE` a specific part of the pattern (e.g. just the `follows` relationship in this case), and you're `MATCH`ing other parts which could change (e.g. the users' labels in this case)...


<!-- .slide: class="big-code" data-transition="fade" -->

<pre><code>MATCH (a:User ...)
MATCH (b:User ...)

<span class="green">SET a._lock = true
SET b._lock = true</span>
WITH a, b

<span class="green">WHERE (a:User) AND (b:User)</span>
MERGE (a) -[:follows]-> (b)
</code></pre>

// Notes:
...then you need to manually double-check lock in this case too, *even though* you're using `MERGE`.


<!-- .slide: class="big-code" data-transition="fade" -->

<pre><code>MATCH (a:User ...)
MATCH (b:User ...)

<span class="red">WHERE NOT (b) -[:blocks]-> (a)</span>
MERGE (a) -[:follows]-> (b)
</code></pre>

// Notes:
Even if changing labels etc. isn't an issue for you, these cases can still come up *across multiple relationships*.
<p/>
Here's a simple query to check whether someone is blocking you before you can follow them. In this case, you might see no `blocks` relationship, but then one could get added just before your `MERGE`.


<!-- .slide: class="big-code" data-transition="fade" -->

<pre><code>MATCH (a:User ...)
MATCH (b:User ...)

<span class="green">SET a._lock = true
SET b._lock = true</span>

WHERE NOT (b) -[:blocks]-> (a)
MERGE (a) -[:follows]-> (b)
</code></pre>

// Notes:
So the fix here is to take explicit locks on the nodes again, *even though* we're using `MERGE`.
<p/>
So however you slice it, `MERGE` is not a silver bullet for properly atomic writes.


<!-- .slide: id="deadlocks" class="medium-code" -->

<blockquote>
<span class="green">Deadlock detection</span> is built into the core transaction management.
</blockquote>

<pre class="fragment"><code><span class="red">Neo.TransientError.Transaction.DeadlockDetected:</span>
ForsetiClient[0] can't acquire ExclusiveLock{owner=ForsetiClient[1]}
on NODE(0), because holders of that lock are waiting for ForsetiClient[0].
Wait list: ExclusiveLock[ForsetiClient[1] waits for [0, 1, ]]
</code></pre>

// Notes:
Now, if you've ever worked with locks before, you know that taking *two* locks, not just one, is asking for trouble. And the more you take explicit locks, the more likely you are to run into issues across queries.
<p/>
Fortunately, Neo4j has deadlock detection built in. And it manifests in the form of these "deadlock detected" errors.


<!-- .slide: class="images" -->

[![Neo4j error classifications](/images/advanced-neo4j/error-classifications.png)](http://neo4j.com/docs/stable/status-codes.html)

[![Props for transient classification](/images/advanced-neo4j/error-classification-props.png)](https://github.com/neo4j/neo4j/issues/1922#issuecomment-77702559) <!-- .element: class="fragment" -->

// Notes:
Fortunately, these "deadlock detected" errors are formally returned as transient errors, encouraging clients to retry the call.
<p/>
As an aside, I think this error classification is awesome. Nice job to the team.


```
for numAttempts in [1..maxAttempts]

    try
        db.cypher query, params

    catch error
        if error.type isnt 'TransientError'
            throw error

        else if numAttempts >= maxAttempts
            throw error     # could wrap in "after N retries" error

        else
            # exponential backoff (in ms): 5, 15, 45, 135, 405
            backoff = Math.min MAX_BACKOFF, 5 * Math.pow 3, numAttempts - 1

            logger.warn 'Retrying query...',
                {query, params, error, numAttempts, maxAttempts, backoff}

            sleep backoff
```

// Notes:
So we retry as suggested. Here's roughly what our (pseudo)code looks like to execute Cypher queries with a retry loop for transient errors. Note the important exponential backoff.


<!-- .slide: class="medium-code" -->

```
isRetriable = (error) ->
    error.type is 'TransientError' or error.code in [
        'Neo.ClientError.Statement.EntityNotFound'
        'Neo.DatabaseError.Statement.ExecutionFailure'
        'Neo.DatabaseError.Transaction.CouldNotCommit'
    ] or isDbUnavailable error
```

// Notes:
In practice, we retry on a few other types of errors too, not just explicitly transient ones. These are due to Neo4j bugs, which we've reported — and which may have since been fixed. And `isDbUnavailable` is for detecting hiccups specific to our setup, e.g. HAProxy 502s and Node.js DNS errors.


<!-- .slide: class="images" -->

[![Neo4j error classifications](/images/advanced-neo4j/error-classifications.png)](http://neo4j.com/docs/stable/status-codes.html)

[![Effects on transaction](/images/advanced-neo4j/error-classification-effects.png)](http://neo4j.com/docs/stable/status-codes.html)

// Notes:
Retrying individual queries like that makes sense. But things change when you're working with transactional queries (i.e. making multiple queries within a single transaction).
<p/>
Notice how the manual ([now](https://github.com/neo4j/neo4j/issues/5258)) documents that *any* type of error is fatal to open transactions: the *entire transaction* will be rolled back on *any* query error.


<!-- .slide: class="medium-code" -->

```
User.delete = (id) ->
    transactWithRetries (tx) ->
        tx.cypher '...'
        ...     # application logic here
        tx.cypher '...'

transactWithRetries = (func) ->
    for numAttempts in [1..maxAttempts]

        try
            tx = db.beginTransaction()
            func tx
            tx.commit()

        catch error
            tx.rollback()
            ...     # same checks, backoff, etc.
```

// Notes:
This means that if you want to be robust to transient errors in a multi-query transaction, you have to retry *the whole transaction* — including any application logic within.
<p/>
So this is roughly what our (pseudo)code looks like to execute queries within retriable transactions. It's actually a fair bit more involved in practice (e.g. these transactional functions could be composed, but Neo4j doesn't support nested transactions, so we track depth and explicitly guard against outer transactions suppressing inner transactions’ errors, etc.), but the important high-level point is that individual queries *aren't* retried on their own. Maybe we'll open-source our full framework some day. =)
<p/>
One note on the explicit `tx.rollback()`: this is to ensure we immediately release any locks, rather than waiting potentially a whole minute for Neo4j to expire the transaction. We only do this because Neo4j didn't always auto-rollback transactions on errors as documented, but Neo4j 2.2.6+ supposedly fixes this.


[![XKCD Haskell comic](/images/advanced-neo4j/xkcd-haskell.png)](https://xkcd.com/1312/)

// Notes:
Just keep in mind that if your application code within a transaction has any side effects, e.g. modifying other data stores, enqueueing background work, emailing users, etc. you shouldn't naively retry those transactions. You only want to retry idempotent or side-effect-free transactions.


`/giphy phew`

&nbsp;

`/giphy spectrum` <!-- .element: class="fragment" -->

// Notes:
So that's obviously a lot to think about! And if even the simple following example has become significantly non-trivial, you can probably imagine how more complex queries quickly become hard to reason about. What all reads are we implicitly depending on? Which locks do we need to explicitly take? What contention will we then start to see? These questions rarely have simple answers.
<p/>
But the good news is that this is a spectrum of trade-offs, between simple and robust. You don't *have* to think about this everywhere. You can generally stick to simple, and use this locking knowledge as a tool when you need it. A few query helpers for common things like property updates and relationship management can also abstract away the complexity.


<blockquote>
While there is still some discussion about error handling semantics and we haven't looked into reordering our locks yet, these changes have <span class="green">dramatically decreased our error count</span> and helped ensure <span class="green">correctness and consistency</span> in our DB.
</blockquote>

<blockquote class="fragment">
I'd like to thank you and Chris for your guidance on this. It's always scary when the solid ground you stand on isn't as sure as you believed, but our system is in a <span class="green">better state now</span> and I feel better about <span class="green">continuing to build</span> on top of Neo4j :-)
</blockquote>

// Notes:
In the end, I agree with these sentiments from Ryan (quotes dug up from our support ticket on this): we work with the tools we have, and I'm pleased that we've been able to get our system running smoothly.
<p/>
The "you" is John Forrest, and "Chris" is Chris Leishman. Thanks guys!


<blockquote>
Locks are acquired at the <span class="green">Node</span> and <nobr><span class="green">Relationship</span> level.</nobr>
</blockquote>

// Notes:
I want to close this topic with one parting lesson, which can be derived from the locking behaviors we covered earlier.


<!-- .slide: class="big-code" -->

```
(:User)
 + lastWroteAt
 + latestBackupBlobId
 + numFollowers
```

```
(:User)
 -[:home_stream_next]->
 -[:notifications_next]->
```

// Notes:
Here's an example data model you might arrive at, for representing users and their associated data. (It's actually not too far from our own model.)
<p/>
You can see that there's a variety of data connected to users, across both properties and relationships.
<p/>
For the sake of illustration, I've picked things here that you could imagine having a reasonably high write throughput — particularly for power or popular users, and particularly since much of the data is modified by *others* (e.g. things that add to your home stream or notify you).


<blockquote>
When modifying a <span class="red">property</span> on a node or relationship, a write lock will be taken on the <span class="green">node</span> or <span class="green">relationship</span>.
</blockquote>

<blockquote>
When creating or deleting a <span class="green">relationship</span>, <nobr>a write lock</nobr> will be taken on the <span class="green">relationship</span> <nobr>and <span class="red">both its nodes</span></nobr>.
</blockquote>

// Notes:
We now know, though, that every property modification and new relationship means that the single node gets locked. That makes the single node an unnecessary bottleneck for conceptually disparate data.


<!-- .slide: class="big-code" -->

```
(:UserAccount)
 + lastWroteAt
 + latestBackupBlobId
```

```
(:UserProfile)
 + numFollowers
```

```
(:UserHomeStream)
 -[:home_stream_next]->
```

```
(:UserNotifications)
 -[:notifications_next]->
```

// Notes:
So perhaps it'd be worth breaking that node up into separate nodes, each having a smaller surface area (similar to separate tables in a relational db). The nodes would still be connected to each other 1:1, so you could still efficiently query across this data if you needed.
<p/>
As before, there exists a spectrum of trade-offs here, and you don't need to prematurely optimize in either direction. It's just good to be aware of the options, and have yet another tool at your disposal. =)
<p/>
(For what it's worth, we do still have the monolithic user node data model shown earlier, and it hasn't seemed like an issue in practice for us *yet*. But if I were starting fresh, I probably would split separate concerns into separate nodes from the start. I think it would encourage smaller APIs, as well as make it easier to extract data into separate data stores in the future if that became valuable.)


# Takeaways

<p class="fragment">
Ensure atomicity by taking <span class="green">write locks</span> early
</p>

<p class="fragment">
Verify implicit reads via <span class="green">double-check locking</span>
</p>

<p class="fragment">
Locks are held at the <span class="green">node</span> and <span class="green">relationship</span> level
</p>

<p class="fragment">
<span class="green">Retry with backoff</span> on transient errors
</p>

<p class="fragment">
<span class="green">Separate nodes</span> for finer-grained locking
</p>


# Thanks

...to Dave, Matt, and Ryan! =)

&nbsp;

### Twitter: [@aseemk](https://twitter.com/aseemk)
### GitHub: [@aseemk](https://github.com/aseemk)
### Email: [aseem@fiftythree.com](mailto:aseem@fiftythree.com)

&nbsp;

Questions?
