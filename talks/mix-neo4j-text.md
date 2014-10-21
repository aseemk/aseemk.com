## Building
# Mix by FiftyThree
## with
# Neo4j

Notes:
https://mix.fiftythree.com/


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


<!-- .slide: data-background="/images/mix-neo4j/mix-background-1024x768.png" data-background-transition="slide" -->

Notes:
https://vimeo.com/105656434


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
