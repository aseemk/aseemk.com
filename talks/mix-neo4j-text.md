## Building
# Mix by FiftyThree
## with
# Neo4j

Notes:
https://mix.fiftythree.com/

TODO:
- colors
- background
- lessons learned?


<!-- GRAPHCONNECT 2014 + MONSTERS -->

<!-- .slide: data-background="/images/mix-neo4j/graphconnect-2014.jpg" data-background-transition="slide" -->

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


<!-- NEO FAMILY -->

<!-- .slide: data-background="/images/mix-neo4j/mix-neo0.jpg" data-background-transition="slide" -->

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


<!-- MIX VIDEO -->

<!-- .slide: data-background="/images/mix-neo4j/mix-background-1024x768.png" data-background-transition="slide" -->

Notes:
https://vimeo.com/105656434


<!-- MIX GRAPHS -->

<!-- .slide: data-background="/images/mix-neo4j/mix-graph0-template.jpg" data-background-transition="slide" -->


<!-- .slide: data-background="/images/mix-neo4j/mix-graph1-users.jpg" data-background-transition="none" -->


<!-- .slide: data-background="/images/mix-neo4j/mix-graph2-follows.jpg" data-background-transition="none" -->


<!-- .slide: data-background="/images/mix-neo4j/mix-graph3-creation.jpg" data-background-transition="none" -->


<!-- .slide: data-background="/images/mix-neo4j/mix-graph4-remix.jpg" data-background-transition="none" -->


<!-- .slide: data-background="/images/mix-neo4j/mix-graph5-remixes.jpg" data-background-transition="none" -->


<!-- .slide: data-background="/images/mix-neo4j/mix-graph6-stars.jpg" data-background-transition="none" -->


<!-- .slide: data-background="/images/mix-neo4j/mix-graph7-user1.jpg" data-background-transition="none" -->


<!-- .slide: data-background="/images/mix-neo4j/mix-graph8-user2.jpg" data-background-transition="none" -->


<!-- .slide: data-background="/images/mix-neo4j/mix-graph9-user3.jpg" data-background-transition="none" -->


<!-- .slide: data-background="/images/mix-neo4j/mix-graph10-creation1.jpg" data-background-transition="none" -->


<!-- .slide: data-background="/images/mix-neo4j/mix-graph11-creation2.jpg" data-background-transition="none" -->


<!-- .slide: data-background="/images/mix-neo4j/mix-graph12-creation3.jpg" data-background-transition="none" -->


<!-- .slide: data-background="/images/mix-neo4j/mix-graph13-creation4.jpg" data-background-transition="none" -->


<!-- .slide: data-background="/images/mix-neo4j/mix-graph9-user3.jpg" data-background-transition="none" -->


<!-- .slide: data-background="/images/mix-neo4j/mix-graph14-user4.jpg" data-background-transition="none" -->


<!-- .slide: data-background="/images/mix-neo4j/mix-graph15-user5.jpg" data-background-transition="none" -->


<!-- .slide: data-background="/images/mix-neo4j/mix-graph6-stars.jpg" data-background-transition="none" -->

Notes:
All of this richness from this simple graph.
Just two nodes and four relationships.


# Query Profiling

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
<!-- .element: class="fragment" -->

<aside class="fragment">(Hat-tip Mark Needham)</aside>

Notes:
http://www.markhneedham.com/blog/2013/11/08/neo4j-2-0-0-m06-applying-wes-freemans-cypher-optimisation-tricks/


# Home Stream

<table class="profile-times fragment">
    <tr>
        <td><code>0-following-ids</code></td>
        <td class="fragment">27 ms</td>
    </tr>
    <tr>
        <td><code>1-following-shares</code></td>
        <td class="fragment bad">581 ms</td>
    </tr>
    <tr>
        <td><code>2-following-features</code></td>
        <td class="fragment">77 ms</td>
    </tr
    <tr>
        <td><code>3-following-stars</code></td>
        <td class="fragment bad">1386 ms</td>
    </tr>
    <tr>
        <td><code>4-stars-remixes</code></td>
        <td class="fragment">189 ms</td>
    </tr>
    <tr>
        <td><code>5-shares-remixes</code></td>
        <td class="fragment">81 ms</td>
    </tr>
    <tr class="summary">
        <td class="fragment">All in parallel</td>
        <td class="fragment bad">1961 ms</td>
    </tr>
</table>

<aside class="fragment">(On my >3yo MacBook Air, for our ~10x worst-case user.)</aside>


# Recommendations

<!-- .slide: data-transition="fade" -->

```
MATCH (me:User {id: {id}})
MATCH (me) -[:follows]-> (following) -[star:starred]-> (creation)

WITH me, creation, star
ORDER BY star.createdAt
WITH me, creation, HEAD(COLLECT(star)) AS star

MATCH (creation) -[:creator]-> (creator)
WHERE NOT (me) -[:follows*0..1]-> (creator)

RETURN creation, creator, star.createdAt AS _recommendedAt
ORDER BY _recommendedAt DESC
LIMIT 10
```
<!-- .element: class="fragment" -->

Notes:
Our original version. Very slow.


# Recommendations

<!-- .slide: data-transition="fade" -->

```
MATCH (me:User {id: {id}})
MATCH (me) -[:follows]-> (following) -[star:starred]-> (creation)

WITH me, creation, star
ORDER BY star.createdAt
WITH me, creation, HEAD(COLLECT(star)) AS star

MATCH (creation) -[:creator]-> (creator)
WHERE creator <> me AND NOT((me) -[:follows]-> (creator))

RETURN creation, creator, star.createdAt AS _recommendedAt
ORDER BY _recommendedAt DESC
LIMIT 10
```

Notes:
Tipped by Cypher team to break up the variable length implicit MATCH in WHERE.

This helped noticeably, but still slow.


# Recommendations

<!-- .slide: data-transition="fade" -->

```
MATCH (me:User {id: {id}})
MATCH (me) -[:follows]-> (following) -[star:starred]-> (creation)

WITH me, creation, star
ORDER BY star.createdAt
WITH me, creation, HEAD(COLLECT(star)) AS star

WITH creation, star.createdAt AS _recommendedAt
ORDER BY _recommendedAt DESC
LIMIT 10

MATCH (creation) -[:creator]-> (creator)
RETURN creation, creator, _recommendedAt
```

Notes:
Ultimately got rid of the extra hop, and worked around differently.
Had tried a bunch of other stuff too.

Notice now we only fetch creators for O(10) instead of O(N).
