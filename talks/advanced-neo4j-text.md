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

`X-Query-Type: read|write`


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

<pre><code><span class="green">SET n._lock = true</span>
SET n.count = n.count + 1
</code></pre>

// Notes:
That means we can fix our Cypher increment by simply writing *any other property* first. (We use `_lock = true` to explicitly convey this purpose, but that's purely a convention.) This will lock the node before reading the `count` and incrementing it.


<!-- .slide: class="big-code" data-transition="fade" -->

<pre><code><span class="red">MATCH (n:Node ...)</span>
SET n._lock = true
SET n.count = n.count + 1
</code></pre>

// Notes:
But of course, we need a node first. So we add a `MATCH`. That's fine, right?


<!-- .slide: class="big-code" data-transition="fade" -->

<pre><code>MATCH (n:Node ...)
<span class="red">REMOVE n:Node</span>
SET n:Deleted
</code></pre>

// Notes:
What happens if this other query, which removes the `:Node` label, runs concurrently? Then we're back to our race condition, because our first query may have already `MATCH`ed on the `:Node` label before it was removed here.
<p/>
(In case that seems unrealistic, we do replace labels like this for soft deletes.)


<!-- .slide: class="big-code" data-transition="fade" -->

<pre><code>MATCH (n:Node ...)
<span class="green">SET n._lock = true</span>
WITH n
<span class="green">WHERE (n:Node)</span>
SET n.count = n.count + 1
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
TODO


<!-- .slide: class="big-code" data-transition="fade" -->

<pre><code><span class="green">SET a._lock = true
SET b._lock = true</span>
WHERE NOT (a) -[:follows]-> (b)
CREATE (a) -[:follows]-> (b)
</code></pre>

// Notes:
So the fix here is to simply write any property to *both* the relationship's nodes, before seeing if the relationship exists.
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


<!-- TODO: Syntax highlight this code? Manually call out important parts? -->

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

<!-- TODO: Syntax highlight this code? Manually call out important parts? -->

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
