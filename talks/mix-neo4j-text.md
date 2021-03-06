<!-- TITLE -->

<!-- .slide: class="title" -->

# <span class="red">Betting the Company</span>
## (Again?!) on a
# <span class="green">Graph Database</span>

### Building Mix With Neo4j

Aseem Kishore<br/>
Oct 2014<br/>

// Notes:
Hi guys. My name is [Aseem Kishore](http://aseemk.com/). I'm a developer at a startup called [FiftyThree](http://www.fiftythree.com/). We make an iPad app called [Paper](http://www.fiftythree.com/paper). But I'll get to all that and more.
<p/>
Some of you may know me, maybe from previous GraphConnects. I've previously given a talk entitled [Betting the Company on a Graph Database](http://aseemk.com/talks/neo4j-lessons-learned), sharing my experiences and lessons learned building a startup on [Neo4j](http://neo4j.org/).
<p/>
Today, I'm excited to share the continuation to that story.


<!-- INTRO: THINGDOM -->

<!-- .slide: data-background="/images/neo4j-lessons-learned/thingdom-hp-gasi.png" data-background-transition="convex" -->

// Notes:
The startup I built (along with my friend and peer, [Daniel Gasienica](http://gasi.ch/)) was [The Thingdom](http://www.thethingdom.com/), a social network around products.


<!-- INTRO: FIFTYTHREE -->

<!-- .slide: data-background="/images/neo4j-lessons-learned/fiftythree-hp.png" data-background-transition="convex" -->

// Notes:
I shared that The Thingdom was acquired by [FiftyThree](http://www.fiftythree.com/), and I joined the team to transform its tech into something new.
<p/>
I just couldn't share what that new thing was...


<!-- INTRO: TIMELINE -->

<!-- .slide: data-background="/images/mix-neo4j/aseemk-timeline.jpg" data-background-transition="convex" -->

// Notes:
We worked in secret on that thing for quite a while. I hit my two-year anniversary at FiftyThree this past March, and I drew this sketch then, promising that we'd ship before the year was up. =)
<p/>
(The top line is a reference to the burger chain love of my NYC life, Shake Shack. It blows In 'N Out *out* of the water.)
<p/>
Well, I'm extremely pleased to say that we did meet that goal! We shipped this new product last month...
<p/>
[Via](https://mix.fiftythree.com/aseemk/24342)


<!-- INTRO: MIX -->

<!-- .slide: data-background="/images/mix-neo4j/mix-billboard-1024x768.png" data-background-transition="convex" -->

<p class="stretch"><a href="http://player.vimeo.com/video/105656434?autoplay=1" style="color: transparent; display: block; width: 100%; height: 100%;">&nbsp;</a></p>

// Notes:
And here it is! [Mix by FiftyThree](https://mix.fiftythree.com/).
<p/>
Be sure to [watch the video](https://vimeo.com/105656434) too. =)


<!-- .slide: class="subtitle" -->

# <span class="orange">Mix</span> ![♥](/images/mix-neo4j/mix-remix-heart.svg) <!-- .element: class="mix-remix-heart" --> <span class="green">Graphs</span>

## Bringing Ideas Together

// Notes:


<!-- GRAPHCONNECT 2014 + MONSTERS -->

<!-- .slide: data-background="/images/mix-neo4j/graphconnect-2014.jpg" data-background-transition="default" -->

// Notes:
[Via](https://mix.fiftythree.com/GraphConnect/464175)


<!-- .slide: data-background="/images/mix-neo4j/gc-monster1.jpg" data-background-transition="none" -->

// Notes:
[Via](https://mix.fiftythree.com/391241-Natalia-La-Fey/471737)


<!-- .slide: data-background="/images/mix-neo4j/gc-monster2.jpg" data-background-transition="none" -->

// Notes:
[Via](https://mix.fiftythree.com/391241-Natalia-La-Fey/474539)


<!-- .slide: data-background="/images/mix-neo4j/gc-monster3.jpg" data-background-transition="none" -->

// Notes:
[Via](https://mix.fiftythree.com/391241-Natalia-La-Fey/482993)


# <span class="orange">Mix</span> ![♥](/images/mix-neo4j/mix-remix-heart.svg) <!-- .element: class="mix-remix-heart" --> <span class="green">Neo<span class="fragment fade-out">4j</a></span>

// Notes:


<!-- NEO FAMILY -->

<!-- .slide: data-background="/images/mix-neo4j/mix-neo0.jpg" data-background-transition="default" -->

// Notes:
[Via](https://mix.fiftythree.com/5923-Denis-Kovacs/42774)


<!-- .slide: data-background="/images/mix-neo4j/mix-neo1.jpg" data-background-transition="none" -->

// Notes:
[Via](https://mix.fiftythree.com/35823-Seth-H/42837)


<!-- .slide: data-background="/images/mix-neo4j/mix-neo2.jpg" data-background-transition="none" -->

// Notes:
[Via](https://mix.fiftythree.com/scott/43069)


<!-- .slide: data-background="/images/mix-neo4j/mix-neo3.jpg" data-background-transition="none" -->

// Notes:
[Via](https://mix.fiftythree.com/58879-Maciej/116628)


<!-- .slide: data-background="/images/mix-neo4j/mix-neo4.jpg" data-background-transition="none" -->

// Notes:
[Via](https://mix.fiftythree.com/43408-David-Samaniego/143459)


<!-- .slide: data-background="/images/mix-neo4j/mix-neo5.jpg" data-background-transition="none" -->

// Notes:
[Via](https://mix.fiftythree.com/65597-K-EH/173206)


<!-- .slide: data-background="/images/mix-neo4j/mix-neo6.jpg" data-background-transition="none" -->

// Notes:
[Via](https://mix.fiftythree.com/73470-Deb-Kelly/208037)


<!-- .slide: data-background="/images/mix-neo4j/mix-neo7.jpg" data-background-transition="none" -->

// Notes:
[Via](https://mix.fiftythree.com/198435-Antonio-Ferreira/441055)


<!-- .slide: data-background="/images/mix-neo4j/mix-neo8.jpg" data-background-transition="none" -->

// Notes:
[Via](https://mix.fiftythree.com/74103-Zelo/348930)


<!-- MIX GRAPHS -->

# <span class="orange">Mix</span> ![♥](/images/mix-neo4j/mix-remix-heart.svg) <!-- .element: class="mix-remix-heart" --> <span class="green">Graphs</span>

// Notes:
So let's dive into the Mix graph.


<!-- .slide: data-background="/images/mix-neo4j/mix-graph1-users.jpg" data-background-transition="none" -->

// Notes:
Like any service, we obviously have users...


<!-- .slide: data-background="/images/mix-neo4j/mix-graph2-follows.jpg" data-background-transition="none" -->

// Notes:
And users follow each other, but that's the least interesting part of our graph.


<!-- .slide: data-background="/images/mix-neo4j/mix-graph3-creation.jpg" data-background-transition="none" -->

// Notes:
Users share *creations* (made with Paper), so we add a "creator" relationship from the creation to the user.
<p/>
(The relationship goes from creation to user just for convention: creations *need* user creators, but users don't *need* to have any creations.)


<!-- .slide: data-background="/images/mix-neo4j/mix-graph4-remix.jpg" data-background-transition="none" -->

// Notes:
The key piece to our service is that creations can *remix* other creations. So we add a "remix source" relationship from the remix to the source.


<!-- .slide: data-background="/images/mix-neo4j/mix-graph5-remixes.jpg" data-background-transition="none" -->

// Notes:
The real fun happens when creations remix other *remixes*. These remix creations form a tree, much like source code.
<p/>
You can imagine that remixes can go in all sorts of directions, and so the corresponding remix trees can take all sorts of shapes. Broad, shallow ones; long, deep chains; or hybrids in between.


<!-- .slide: data-background="/images/mix-neo4j/mix-graph6-stars.jpg" data-background-transition="none" -->

// Notes:
Finally, users can *star* (AKA "favorite") arbitrary creations.


<!-- .slide: data-background="/images/mix-neo4j/mix-graph7-user1.jpg" data-background-transition="none" -->

// Notes:
So let's look at a single user, what the graph looks like from their perspective, fanning out.


<!-- .slide: data-background="/images/mix-neo4j/mix-graph8-user2.jpg" data-background-transition="none" -->

// Notes:
A single user can have many incoming "creator" relationships (by sharing many creations), many outgoing "star" relationships (by starring many creations), and many "follows" relationships, both incoming and outgoing (by following and being followed by other users).


<!-- .slide: data-background="/images/mix-neo4j/mix-graph9-user3.jpg" data-background-transition="none" -->

// Notes:
Aggregating or enumerating these relationships gives us many of the core lists and streams we surface in our UI. A nice 1:1 mapping.


# Streams

<!-- .slide: class="big-code" data-transition="fade" -->

```
MATCH (me:User {id: {id}})
MATCH (me) <-[:creator]- (creation)

RETURN creation
```

// Notes:
Here's what that looks like in a Cypher query. This is the profile stream.
<p/>
(In my previous talk, I recommended using linked lists for `O(1)` scalability. That's still a good recommendation, but in our case this time around, we chose to keep our graph and code simpler by not doing that, since our domain here deals with thousands of nodes, not millions or more. These naive aggregations are definitely "good enough" for small numbers, and they give you a lot more flexibility in adapting your domain and iterating.)


# Pagination <span class="red">(Bad)</span>

<!-- .slide: class="big-code" data-transition="fade" -->

```
MATCH (me:User {id: {id}})
MATCH (me) <-[:creator]- (creation)

RETURN creation
ORDER BY creation.createdAt DESC
SKIP {count} * {page - 1}
LIMIT {count}
```

// Notes:
Of course, returning every creation you've ever shared isn't a scalable API or UI pattern, so we want to paginate, which implies a meaningful sort.
<p/>
Like most other social apps, we sort by time, newest-to-oldest, hence the `ORDER BY ... DESC`.
<p/>
This query shows the typical pattern you see for paginating these kinds of aggregations: `SKIP` followed by `LIMIT`.
<p/>
The problem is, this is *not* a robust way of paginating — because creations can get deleted (unshared). If you previously returned 10, but then the 7th creation gets deleted, your next `SKIP 10` will cause you to skip the previous 11th creation, which you never returned.


# Pagination <span class="green">(Good)</span>

<!-- .slide: class="big-code" data-transition="fade" -->

```
MATCH (me:User {id: {id}})
MATCH (me) <-[:creator]- (creation)

WHERE creation.createdAt < {cursorTime}
RETURN creation
ORDER BY creation.createdAt DESC
LIMIT {count}
```

// Notes:
So instead, it's better to paginate using a *cursor* — some property or value that won't be changed or lost by deletes.
<p/>
In this case, we can use the time of the last returned creation as the cursor. Our next creation should be the one immediately preceding that cursor time.


<!-- .slide: data-background="/images/mix-neo4j/mix-graph10-creation1.jpg" data-background-transition="none" -->

// Notes:
Before returning to the single user, let's switch perspectives to that of a single *creation*.


<!-- .slide: data-background="/images/mix-neo4j/mix-graph11-creation2.jpg" data-background-transition="none" -->

// Notes:
Creations always have exactly one (direct) creator (the one who shared the creation), so they have exactly one outgoing "creator" relationship.
<p/>
Creations may remix other creations, which in turn may remix other creations, and so on; this forms an outgoing "remix source" relationship chain until you get to a root "original" creation.
<p/>
Creations may have remixes of their own, which in turn may have remixes of their own, and so on; this forms an *incoming* "remix source" sub-tree, just like the overall remix tree.
<p/>
Finally, creations may have many incoming "star" relationships (from many users starring the same creation).


<!-- .slide: data-background="/images/mix-neo4j/mix-graph12-creation3.jpg" data-background-transition="none" -->

// Notes:
Again, aggregating these relationships gives us more of the core concepts we convey in our UI. For attribution, we surface the chain of remix sources. For discovery and fun — and after experimentation and iteration — we settled on considering the entire remix tree as a whole, which we call a remix "family", to shield non-technical users from the details of children/sibling/etc. relationships.


<!-- .slide: data-background="/images/mix-neo4j/mix-graph13-creation4.jpg" data-background-transition="none" -->

// Notes:
It's worth noting that this still leaves us the flexibility to be more precise for our own needs. E.g. in our algorithms for deriving popular/trending creations, we consider only creations' first-level remixes, not deeper ones.


# Remix Families

<!-- .slide: class="big-code" data-transition="fade" -->

```
MATCH (c:Creation {id: {id}})
MATCH (c) -[:remix_source*0..]- (relative)

WHERE relative.createdAt < {cursorTime}
RETURN relative
ORDER BY relative.createdAt DESC
LIMIT {count}
```

// Notes:
This is what our notion of a remix family looks like in a Cypher query. For a given creation, simply traverse any connected "remix source" relationships — both incoming and outgoing, and including the start creation itself.
<p/>
We sort family creations newest-to-oldest too, and paginate them the same way as well.


<!-- .slide: data-background="/images/mix-neo4j/mix-graph9-user3.jpg" data-background-transition="none" -->

// Notes:
Let's return to our single user now, and apply the context of a single creation here.


<!-- .slide: data-background="/images/mix-neo4j/mix-graph14-user4.jpg" data-background-transition="none" -->

// Notes:
So for each of the creations that our user has shared or starred, those creations themselves can have remixes and/or stars. And the users that our user follows have creations of their own that they've shared or starred.


<!-- .slide: data-background="/images/mix-neo4j/mix-graph15-user5.jpg" data-background-transition="none" -->

// Notes:
From these, we get interesting email notifications ("Bob starred your idea" and "You've been remixed"), as well as an interesting home stream, filled not just with content from people you follow, but with personalized, relevant recommendations as well: creations that people you follow are starring (a form of social curation), and remixes of creations you've starred (giving you the ability to "subscribe" to interesting remix families).
<p/>
What's powerful is that we can do even more in the future, just with what's shown here. E.g. we can recommend users to follow (if you star a creation, you may like more of that creator's work), and we can detect real *collaboration* (if you're remixing other creators).
<p/>
Let's dive into those three pieces that make up our home stream.


# Home Stream 1

<!-- .slide: class="medium-code" data-transition="fade" -->

```
MATCH (me:User {id: {id}})
MATCH (me) -[:follows]-> (f) <-[:creator]- (creation)

WHERE creation.createdAt < {cursorTime}
RETURN creation
ORDER BY creation.createdAt DESC
LIMIT {count}
```

// Notes:
The first piece is the standard one: "creations from people I follow". This is what that query looks like, basic as expected.


# Home Stream 2

<!-- .slide: class="medium-code" data-transition="fade" -->

```
MATCH (me:User {id: {id}})
MATCH (me) -[:follows]-> (f) -[star:starred]-> (creation)

WITH creation, star
ORDER BY star.createdAt
WITH creation, HEAD(COLLECT(star)) AS star

WHERE star.createdAt < {cursorTime}
RETURN creation, star.createdAt AS _starredAt
ORDER BY _starredAt DESC
LIMIT {count}
```

// Notes:
The second piece is the "stars from people I follow" recommendation. This is that query.
<p/>
What's notable here is that `WITH` aggregation in the middle. The reason for it is because we need to account for the fact that multiple people (whom I follow) can star the same creation, at totally different times. We don't want to show you the same creation multiple times though; we want to show it to you just once, at the time that it was first starred.
<p/>
So to achieve that, we have to sort everything by when it was first starred (oldest-to-newest), then filter out any duplicate *stars* (that's what the `HEAD(COLLECT(star))` does), before returning them in reverse (newest-to-oldest).
<p/>
This sounds complex, but this has become a standard pattern for us, whenever an object we're interested in can be arrived at by different paths. It'd be nice if there were a simpler, more shorthand way of expressing this in Cypher. ;)


# Home Stream 3

<!-- .slide: class="medium-code" data-transition="fade" -->

```
MATCH (me:User {id: {id}})
MATCH (me) -[:starred]-> (c) <-[:remix_source*]- (remix)

WHERE remix.createdAt < {cursorTime}
RETURN DISTINCT remix
ORDER BY remix.createdAt DESC
LIMIT {count}
```

// Notes:
The last piece is the "remixes of creations I've starred" recommendation. This is again a more straightforward query. The only thing worth pointing out is that we show you the full sub-tree down, not just first-level remixes, and not siblings, etc.
<p/>
(We actually have two more queries that make up our home stream in practice, but they're similar to these and less noteworthy.)


# <span class="red">Union?</span>

// Notes:
So given that we have these disparate and dissimilar queries, how do we execute them together to make up a single "home stream" query?
<p/>
Well, Cypher 2.0 added a `UNION` keyword, which we thought would have been perfect for this... but the problem is, it's very basic: it doesn't support doing anything *after* the `UNION`; it literally *just* returns each sub-query's results directly.
<p/>
[Via](https://mix.fiftythree.com/aseemk/329802)


<!-- .slide: data-background="/images/mix-neo4j/dedupe-holes.jpg" data-background-transition="convex" -->

// Notes:
The result is that if we were to use it, we'd skip over data. This sketch shows an example I had visualized to help me think through this problem: if queries A and B are returning their individual top result(s), and we simply `UNION`'ed them together, we could skip over data in the middle when we paginate next. (Or we paginate differently but then the two pages overlap in order, which you don't want either.)
<p/>
What we really need, and shown on the right, is for us to dedupe and *slice* (for pagination) *after* aggregation, not before.
<p/>
[Via](https://github.com/neo4j/neo4j/issues/2725)


<!-- .slide: data-background="/images/mix-neo4j/neo4j-union-issue.png" data-background-transition="convex" -->

// Notes:
I filed a feature request to fix this: [neo4j/neo4j#2725](https://github.com/neo4j/neo4j/issues/2725). Chime in there if you agree! ;)


# <span class="green">Until then…</span>

<!-- .slide: class="big-code" -->

```coffee
nodes = _(results).chain().flatten()
    .sortBy (node) -> node._orderedAt
    .unique (node) -> node.id
    .reverse().value()
```

<aside>Post-processing on our server.</aside>

// Notes:
So until we get that ability, our only option is to do the post-processing that we need on our own side. Unfortunately, this can never be fully correct, as we can't simply return all of the data in the database, but we have no other choice with Cypher today.
<p/>
As a concrete example of where this still falls short, imagine that someone I follow just starred a creation today, but that creation was shared by someone *else* I follow *yesterday*. We ideally don't want to show you this creation at the top of your stream today since we just showed it to you yesterday — so this creation should be further down in your stream where it originally was — but our "creations from people I follow" query may not have this creation on its first page anymore, so our post-processing deduping won't see it.


# Deduping <span class="red fragment">(Very Bad)</span>

<!-- .slide: class="medium-code deduping" data-transition="fade" -->

```
MATCH (me:User {id: {id}})
MATCH (me) -[:follows]-> (f) -[star:starred]-> (creation)

WITH me, creation, star
ORDER BY star.createdAt
WITH me, creation, HEAD(COLLECT(star)) AS star

MATCH (creation) -[:creator]-> (creator)
WHERE NOT (me) -[:follows*0..1]-> (creator)

WHERE star.createdAt < {cursorTime}
RETURN creation, star.createdAt AS _starredAt
ORDER BY _starredAt DESC
LIMIT {count}
```

// Notes:
We attempted to work around this by manually and explicitly baking dedupe logic into the queries directly.
<p/>
For example, this is the "stars from people I follow" query now excluding "creations from people I follow": `WHERE NOT(me) -[:follows*0..1]-> (creator)`.
<p/>
Unfortunately, this addition turned out to make that query *an order of magnitude* slower.


# Deduping <span class="red">(Bad)</span>

<!-- .slide: class="medium-code deduping" data-transition="fade" -->

```
MATCH (me:User {id: {id}})
MATCH (me) -[:follows]-> (f) -[star:starred]-> (creation)

WITH me, creation, star
ORDER BY star.createdAt
WITH me, creation, HEAD(COLLECT(star)) AS star

MATCH (creation) -[:creator]-> (creator)
WHERE creator <> me AND NOT((me) -[:follows]-> (creator))

WHERE star.createdAt < {cursorTime}
RETURN creation, star.createdAt AS _starredAt
ORDER BY _starredAt DESC
LIMIT {count}
```

// Notes:
We reached out to the Neo4j team for support, and they analyzed the query execution plans to see if there was any room for improvement.
<p/>
One concrete thing they recommended to us was to break up the variable length `MATCH` (implicitly in the `WHERE`), into separate zero-length (`creator <> me`) and one-length (`NOT (me) -[:follows]-> (creator)`) checks.
<p/>
That change helped noticeably, but overall it was still much slower than before.


# Query Profiling

<!-- .slide: class="medium-code profiling" -->

```coffee
for key, query of queries
    echo "Query '#{key}':"

    # warm-up:
    neo4j.query query, params, _

    times = []
    for i in [1..3]
        start = Date.now()
        neo4j.query query, params, _
        times.push Date.now() - start

    # ...
    echo "Min/median/max: #{min}/#{median}/#{max} ms.
        Mean: #{Math.round mean} ms."
```
<!-- .element: class="fragment" data-fragment-index="1" -->

<aside class="fragment" data-fragment-index="1">(Hat-tip Mark Needham)</aside>

// Notes:
And that leads to our most important lesson learned this time around: profile, profile, profile.
<p/>
Up until this point, we had never explicitly profiled our Cypher queries, assuming that that would be something the Neo4j team could do for us, or thinking that there weren't good tools for that yet, etc. At the most basic level, I assumed we'd need to integrate something into our running app, like a code profiler, except it wouldn't be as simple.
<p/>
But then I did a quick search, and came across [a nice blog post](http://www.markhneedham.com/blog/2013/11/08/neo4j-2-0-0-m06-applying-wes-freemans-cypher-optimisation-tricks/) by Mark Needham. Mark describes how he profiles/benchmarks his queries by simply running them a few times (with a warm-up run first) and looking at the mean and median run times. He wrote a Python script for doing this, and I thought that was brilliant.
<p/>
So we whipped our own equivalent for Node.js, and checked in some files with representative example queries from our app. We now had the ability to quickly experiment with ideas and variations for our queries, and immediately see the effects of those changes.
<p/>
Importantly, *this is not measuring real-world query times in practice* — you're running this script locally on one-off queries — but that's okay. The point of this isn't to look at *absolute* query times (unless they're really high); the point is to look at change, and compare between queries.


# Home Stream

<table class="profile-times">
    <tr>
        <td><code>1-following-shares</code></td>
        <td class="fragment bad" data-fragment-index="1">581 ms</td>
    </tr>
    <tr>
        <td><code>2-following-features</code></td>
        <td class="fragment" data-fragment-index="1">77 ms</td>
    </tr
    <tr>
        <td><code>3-following-stars</code></td>
        <td class="fragment bad" data-fragment-index="1">1386 ms</td>
    </tr>
    <tr>
        <td><code>4-stars-remixes</code></td>
        <td class="fragment" data-fragment-index="1">189 ms</td>
    </tr>
    <tr>
        <td><code>5-shares-remixes</code></td>
        <td class="fragment" data-fragment-index="1">81 ms</td>
    </tr>
    <tr class="summary fragment">
        <td>All in parallel</td>
        <td class="bad">1961 ms</td>
    </tr>
</table>

<aside class="fragment">(On my aging MacBook Air, for our ~worst-case user.)</aside>

// Notes:
So we ran this on our home stream queries, experimented, and concluded that unfortunately, the manual deduping we were trying to do (exclude "creations from people I follow" from "stars from people I follow") was the culprit.
<p/>
Intuitively, that makes sense: we were now fanning out two extra levels and doing a relationship search for every node. It's possible to optimize that algorithm, but every way we tried to in Cypher didn't have the effect. The Neo4j team is aware of the issue and hope to improve this as part of their ongoing Cypher performance optimizations!
<p/>
The numbers here are what my laptop does on our queries today. It's definitely not fast, but more importantly, we made sure to test the queries in parallel too (which is how we run them in practice), and the fact that the parallel run time isn't simply equal to the slowest query's run time tells us that there's something significant to investigate there.


# In Production…

<!-- .slide: class="production-perf" -->

![](/images/mix-neo4j/home-stream-perf-queries.png) <!-- .element: class="fragment" -->

<aside class="fragment">(But still some || mystery to unravel…)</aside>

// Notes:
Fortunately, our performance is much better in practice. =) But notice that the relative ordering of slow to fast queries is still the same.


# Threshold

![Log threshold graph](/images/mix-neo4j/log-threshold-graph.png) <!-- .element: class="fragment" -->

// Notes:
I want to share one last tidbit of our queries.
<p/>
For our "stars from people I follow" query, one tweak we decided to make soon after launch was to make that query selective: instead of recommending *every* creation that's starred, only recommend creations that are starred by *two* people I follow, or maybe three.
<p/>
We spent some time looking at our data, and decided that the threshold should be dynamic, adapting to the number of people I follow. (Conceptually, the more people you follow, the more content you're directly getting, so there's less need for us to recommend content to you.)
<p/>
We arrived at this logarithmic approach: if you follow less than 100 people, still recommend every creation; if you follow 100-300 people, only recommend creations starred by two people you follow; if you follow 300-900, make the threshold three people; etc.


<!-- .slide: data-background="/images/mix-neo4j/log-threshold-derivation.jpg" data-background-transition="convex" -->

// Notes:
I pulled out Paper, Pencil, and some high-school calculus to derive the logarithmic equation... (Some math is wrong here in retrospect!)
<p/>
[Via](https://mix.fiftythree.com/aseemk/308673)


# Threshold

<!-- .slide: class="threshold" -->

```
MATCH (me:User {id: {id}})

WITH me, TOFLOAT(CASE WHEN me.numFollowing < 1 THEN 1 ELSE me.numFollowing END) AS `me.numFollowing`
WITH me, FLOOR(LOG(3 * `me.numFollowing` / 100) / LOG(3)) AS threshold
WITH me, (CASE WHEN threshold < 0 THEN 0 ELSE TOINT(threshold) END) + 1 AS threshold

MATCH (me) -[:follows]-> (following) -[star:starred]-> (creation)

WITH creation, star, threshold
ORDER BY star.createdAt
WITH creation, COLLECT(star) AS stars, threshold
WHERE LENGTH(stars) >= threshold
WITH creation, stars[threshold - 1] AS star

WITH creation, star.createdAt AS _starredAt
ORDER BY _starredAt DESC
LIMIT {count}
```

// Notes:
And we were able to plug that logic into our Cypher query directly.
<p/>
How cool is that? =)


<!-- OUTRO: GRAPH -->

<!-- .slide: data-background="/images/mix-neo4j/mix-graph6-stars.jpg" data-background-transition="convex" -->

// Notes:
So stepping back up, what's incredible is that we've gotten all of this richness from a really simple graph: just two types of nodes, and four types of relationships.
<p/>
That's the power of graphs. ;)


<!-- OUTRO: MIX -->

<!-- .slide: data-background="/images/mix-neo4j/mix-billboard-1024x768.png" data-background-transition="convex" -->

// Notes:
So try out Mix if you haven't already! It's a blast. =)


<!-- OUTRO: THANKS -->

<!-- .slide: data-background="/images/mix-neo4j/aseemk-thanks.jpg" data-background-transition="convex" -->

// Notes:
As with any meaningful product, it was a major collaborative effort by [many amazing people](http://www.fiftythree.com/about) behind the scenes, so I wanted to call them out. I'm lucky to get to work with all of you — thank you!
<p/>
[Via](https://mix.fiftythree.com/aseemk/103104)


<!-- OUTRO: CONTACT -->

<!-- .slide: data-background="/images/mix-neo4j/aseemk-contact.jpg" data-background-transition="convex" -->

// Notes:
<ul>
<li>Mix: <a href="https://mix.fiftythree.com/aseemk">/aseemk</a></li>
<li>GitHub: <a href="https://github.com/aseemk">@aseemk</a></li>
<li>Twitter: <a href="https://twitter.com/aseemk">@aseemk</a></li>
<li>Email: <a href="mailto:aseem.kishore@gmail.com">aseem.kishore@gmail.com</a></li>
</ul>
[Via](https://mix.fiftythree.com/aseemk/90628)


<!-- OUTRO: INSPIRATION 1 -->

<!-- .slide: data-background="/images/mix-neo4j/inspiration1.jpg" data-background-transition="default" -->

// Notes:
I wanted to close with this inspirational note from our design co-founder, Andrew Allen.
<p/>
[Via](https://mix.fiftythree.com/asa/163393)


<!-- OUTRO: INSPIRATION 1 -->

<!-- .slide: data-background="/images/mix-neo4j/inspiration2.jpg" data-background-transition="default" -->

// Notes:
I remixed it.
<p/>
[Via](https://mix.fiftythree.com/aseemk/170271)


<!-- FINAL -->

<!-- .slide: data-transition="fade" -->

# Thank ![♥](/images/mix-neo4j/mix-remix-heart.svg) <!-- .element: class="mix-remix-heart" --> You

// Notes:
Thank you!
<p/>
Appendix / Future topics:
<ul>
<li>Programmatic query building/generation</li>
<li>Including extra data (e.g. creator, original, optional <code>?include</code>s)</li>
<li>Different "shapes" of remix families (e.g. birthday sketches)</li>
</ul>
