<!-- TITLE -->

<!-- .slide: class="title" -->

# <span class="red">Betting the Company</span>
## (Again) on a
# <span class="green">Graph Database</span>

### The Story Continued…

Aseem Kishore<br/>
Oct 2014<br/>

Notes:
http://aseemk.com/talks/neo4j-lessons-learned


<!-- INTRO: THINGDOM -->

<!-- .slide: data-background="/images/neo4j-lessons-learned/thingdom-hp-gasi.png" data-background-transition="convex" -->

Notes:
http://www.thethingdom.com/


<!-- INTRO: FIFTYTHREE -->

<!-- .slide: data-background="/images/neo4j-lessons-learned/fiftythree-hp.png" data-background-transition="convex" -->

Notes:
http://www.fiftythree.com/


<!-- INTRO: TIMELINE -->

<!-- .slide: data-background="/images/mix-neo4j/aseemk-timeline.jpg" data-background-transition="convex" -->

Notes:
https://mix.fiftythree.com/aseemk/24342


<!-- INTRO: MIX -->

<!-- .slide: data-background="/images/mix-neo4j/mix-billboard-1024x768.png" data-background-transition="convex" -->

<p class="stretch"><a href="http://player.vimeo.com/video/105656434?autoplay=1" style="color: transparent; display: block; width: 100%; height: 100%;">&nbsp;</a></p>

Notes:
https://vimeo.com/105656434


<!-- .slide: class="subtitle" -->

# <span class="orange">Mix</span> ![♥](/images/mix-neo4j/mix-remix-heart.svg) <!-- .element: class="mix-remix-heart" --> <span class="green">Graphs</span>

## Bringing Ideas Together

Notes:
https://mix.fiftythree.com/


<!-- GRAPHCONNECT 2014 + MONSTERS -->

<!-- .slide: data-background="/images/mix-neo4j/graphconnect-2014.jpg" data-background-transition="default" -->

Notes:
https://mix.fiftythree.com/GraphConnect/464175


<!-- .slide: data-background="/images/mix-neo4j/gc-monster1.jpg" data-background-transition="none" -->

Notes:
https://mix.fiftythree.com/391241-Natalia-La-Fey/471737


<!-- .slide: data-background="/images/mix-neo4j/gc-monster2.jpg" data-background-transition="none" -->

Notes:
https://mix.fiftythree.com/391241-Natalia-La-Fey/474539


<!-- .slide: data-background="/images/mix-neo4j/gc-monster3.jpg" data-background-transition="none" -->

Notes:
https://mix.fiftythree.com/391241-Natalia-La-Fey/482993


# <span class="orange">Mix</span> ![♥](/images/mix-neo4j/mix-remix-heart.svg) <!-- .element: class="mix-remix-heart" --> <span class="green">Neo<span class="fragment fade-out">4j</a></span>

Notes:


<!-- NEO FAMILY -->

<!-- .slide: data-background="/images/mix-neo4j/mix-neo0.jpg" data-background-transition="default" -->

Notes:
https://mix.fiftythree.com/5923-Denis-Kovacs/42774


<!-- .slide: data-background="/images/mix-neo4j/mix-neo1.jpg" data-background-transition="none" -->

Notes:
https://mix.fiftythree.com/35823-Seth-H/42837


<!-- .slide: data-background="/images/mix-neo4j/mix-neo2.jpg" data-background-transition="none" -->

Notes:
https://mix.fiftythree.com/scott/43069


<!-- .slide: data-background="/images/mix-neo4j/mix-neo3.jpg" data-background-transition="none" -->

Notes:
https://mix.fiftythree.com/58879-Maciej/116628


<!-- .slide: data-background="/images/mix-neo4j/mix-neo4.jpg" data-background-transition="none" -->

Notes:
https://mix.fiftythree.com/43408-David-Samaniego/143459


<!-- .slide: data-background="/images/mix-neo4j/mix-neo5.jpg" data-background-transition="none" -->

Notes:
https://mix.fiftythree.com/65597-K-EH/173206


<!-- .slide: data-background="/images/mix-neo4j/mix-neo6.jpg" data-background-transition="none" -->

Notes:
https://mix.fiftythree.com/73470-Deb-Kelly/208037


<!-- .slide: data-background="/images/mix-neo4j/mix-neo7.jpg" data-background-transition="none" -->

Notes:
https://mix.fiftythree.com/198435-Antonio-Ferreira/441055


<!-- .slide: data-background="/images/mix-neo4j/mix-neo8.jpg" data-background-transition="none" -->

Notes:
https://mix.fiftythree.com/74103-Zelo/348930


<!-- MIX GRAPHS -->

<!-- .slide: data-background="/images/mix-neo4j/mix-graph0-template.jpg" data-background-transition="default" -->


<!-- .slide: data-background="/images/mix-neo4j/mix-graph1-users.jpg" data-background-transition="none" -->


<!-- .slide: data-background="/images/mix-neo4j/mix-graph2-follows.jpg" data-background-transition="none" -->


<!-- .slide: data-background="/images/mix-neo4j/mix-graph3-creation.jpg" data-background-transition="none" -->


<!-- .slide: data-background="/images/mix-neo4j/mix-graph4-remix.jpg" data-background-transition="none" -->


<!-- .slide: data-background="/images/mix-neo4j/mix-graph5-remixes.jpg" data-background-transition="none" -->


<!-- .slide: data-background="/images/mix-neo4j/mix-graph6-stars.jpg" data-background-transition="none" -->


<!-- .slide: data-background="/images/mix-neo4j/mix-graph7-user1.jpg" data-background-transition="none" -->


<!-- .slide: data-background="/images/mix-neo4j/mix-graph8-user2.jpg" data-background-transition="none" -->


<!-- .slide: data-background="/images/mix-neo4j/mix-graph9-user3.jpg" data-background-transition="none" -->


# Streams

<!-- .slide: class="big-code" data-transition="fade" -->

```
MATCH (me:User {id: {id}})
MATCH (me) <-[:creator]- (creation)

RETURN creation
```

Notes:


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

Notes:
Because of deletions.


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

Notes:


<!-- .slide: data-background="/images/mix-neo4j/mix-graph10-creation1.jpg" data-background-transition="none" -->


<!-- .slide: data-background="/images/mix-neo4j/mix-graph11-creation2.jpg" data-background-transition="none" -->


<!-- .slide: data-background="/images/mix-neo4j/mix-graph12-creation3.jpg" data-background-transition="none" -->


<!-- .slide: data-background="/images/mix-neo4j/mix-graph13-creation4.jpg" data-background-transition="none" -->


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

Notes:


<!-- .slide: data-background="/images/mix-neo4j/mix-graph9-user3.jpg" data-background-transition="none" -->


<!-- .slide: data-background="/images/mix-neo4j/mix-graph14-user4.jpg" data-background-transition="none" -->


<!-- .slide: data-background="/images/mix-neo4j/mix-graph15-user5.jpg" data-background-transition="none" -->


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


# <span class="red">Union?</span>


<!-- .slide: data-background="/images/mix-neo4j/dedupe-holes.jpg" data-background-transition="convex" -->


<!-- .slide: data-background="/images/mix-neo4j/neo4j-union-issue.png" data-background-transition="convex" -->


# <span class="green">Until then…</span>

<!-- .slide: class="big-code" -->

```coffee
nodes = _(results).chain().flatten()
    .sortBy (node) -> node._orderedAt
    .unique (node) -> node.id
    .reverse().value()
```

<aside>Post-processing on our server.</aside>


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

Notes:
Very slow.


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

Notes:
Tipped by Cypher team to break up the variable length implicit MATCH in WHERE.

This helped noticeably, but still slow.


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

Notes:
http://www.markhneedham.com/blog/2013/11/08/neo4j-2-0-0-m06-applying-wes-freemans-cypher-optimisation-tricks/


# Home Stream

<table class="profile-times">
    <tr>
        <td><code>0-following-ids</code></td>
        <td class="fragment" data-fragment-index="1">27 ms</td>
    </tr>
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


# In Production…

<!-- .slide: class="production-perf" -->

![](/images/mix-neo4j/home-stream-perf-queries.png) <!-- .element: class="fragment" -->

<aside class="fragment">(But still some || mystery to unravel…)</aside>


# Threshold

![Log threshold graph](/images/mix-neo4j/log-threshold-graph.png) <!-- .element: class="fragment" -->


<!-- .slide: data-background="/images/mix-neo4j/log-threshold-derivation.jpg" data-background-transition="convex" -->

Notes:
https://mix.fiftythree.com/aseemk/308673


# Threshold

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

MATCH (creation) -[:creator]-> (creator)
RETURN creation, creator, _starredAt
```
<!-- .element: class="fragment" -->

Notes:
And this adds the log threshold.


<!-- OUTRO: GRAPH -->

<!-- .slide: data-background="/images/mix-neo4j/mix-graph6-stars.jpg" data-background-transition="convex" -->

Notes:
All of this richness from this simple graph.
Just two nodes and four relationships.


<!-- OUTRO: MIX -->

<!-- .slide: data-background="/images/mix-neo4j/mix-billboard-1024x768.png" data-background-transition="convex" -->


<!-- OUTRO: THANKS -->

<!-- .slide: data-background="/images/mix-neo4j/aseemk-thanks.jpg" data-background-transition="convex" -->

Notes:
https://mix.fiftythree.com/aseemk/103104


<!-- OUTRO: CONTACT -->

<!-- .slide: data-background="/images/mix-neo4j/aseemk-contact.jpg" data-background-transition="convex" -->

Notes:
https://mix.fiftythree.com/aseemk/90628

- Mix: [/aseemk](https://mix.fiftythree.com/aseemk)
- GitHub: [@aseemk](https://github.com/aseemk)
- Twitter: [@aseemk](https://twitter.com/aseemk)
- Email: [aseem.kishore@gmail.com](mailto:aseem.kishore@gmail.com)


<!-- OUTRO: INSPIRATION 1 -->

<!-- .slide: data-background="/images/mix-neo4j/inspiration1.jpg" data-background-transition="default" -->

Notes:
https://mix.fiftythree.com/asa/163393


<!-- OUTRO: INSPIRATION 1 -->

<!-- .slide: data-background="/images/mix-neo4j/inspiration2.jpg" data-background-transition="default" -->

Notes:
https://mix.fiftythree.com/aseemk/170271


<!-- FINAL -->

<!-- .slide: data-transition="fade" -->

# Thank ![♥](/images/mix-neo4j/mix-remix-heart.svg) <!-- .element: class="mix-remix-heart" --> You

Notes:
Appendix / Future topics:

- Programmatic query building/generation
- Including extra data (e.g. creator, original, optional `?include`s)
- Different "shapes" of remix families (e.g. birthday sketches)
