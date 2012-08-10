<?
    $title = 'Joining FiftyThree';
    $section = 'Blog';
    $description = "";

    $og_type = "article";

    require("../../_templates/head.php");
?>

    <link href="http://feeds.feedburner.com/aseemk/blog" type="application/atom+xml" rel="alternate" title="Aseem Kishore - Blog" />

    <style>
    </style>

<?
    require("../../_templates/body.php");

    $post_title = "Joining FiftyThree";   // TODO escape quotes in here!
    $post_url_urlencoded = rawurlencode($base . str_replace('/posts/', 'blog/', str_replace('.html', '', '/posts/joining-fiftythree.html')));
?>

    <article>

        <h2>Joining FiftyThree</h2>

        <h3>
            <time pubdate datetime="2012-08-10">August 10, 2012</time>
            <!-- TODO categories -->
        </h3>

        <p>Eighteen months ago, I left Microsoft to start <a href='http://www.thethingdom.com/'>The Thingdom</a>. That journey officially ended this week, and a new one has begun.</p>

<p>After months of keeping it under wraps, I&#8217;m thrilled to finally share that my friends at <a href='http://www.fiftythree.com/'>FiftyThree</a> have <a href='http://blog.thethingdom.com/joining-fiftythree/'>acquired</a> The Thingdom, and I&#8217;ve <a href='http://blog.fiftythree.com/'>joined them</a> to transform our technology into something new.</p>
<!-- TODO update FiftyThree blog link above to reference actual post -->
<p>FiftyThree is the company behind the award-winning iPad app <a href='http://www.fiftythree.com/paper'>Paper</a>, and their mission is to bring creation tools into the post-PC era. If you hadn&#8217;t heard, they&#8217;re off to <a href='http://blog.fiftythree.com/post/20910947821/thank-you'>quite</a> a <a href='http://blog.fiftythree.com/post/24916653139/apple-design-award'>start</a>.</p>

<p>The opportunity is fantastic, but the <a href='http://www.fiftythree.com/about'>team</a> is simply world-class. I&#8217;m honored to work alongside some of not just the brightest but also the nicest people in our industry.</p>

<p>When we met, they joked that they wanted to turn &#8220;The Thingdom&#8221; into &#8220;The Ideadom&#8221; &#8212; a place to connect people around ideas and help them grow. That&#8217;s what we&#8217;re building now, and I couldn&#8217;t be more excited.</p>

<p>We&#8217;re just getting started, and if you&#8217;re interested in being a part of it, reach out &#8212; <a href='http://www.fiftythree.com/jobs'>we&#8217;re hiring</a>. Let&#8217;s invent the future together.</p>

<p>There&#8217;s much more I can say, but let me end it here for now and just say thanks to everyone who helped along the way. Your support was invaluable, and I couldn&#8217;t have done it without you.</p>

<p>One journey ends, and another begins. So it goes&#8230;</p>
<aside>Fun fact: <a href='/images/fiftythree-blog-ada-photo.png'>this</a> was my arm!</aside>

        <div class="stats">

            <!-- technique via http://developers.facebook.com/docs/reference/plugins/comments/ FAQ -->
            <span id="comments-count">&nbsp;</span>
            <script>
                function updateCommentsCount(obj) {
                    var num = obj.comments;
                    document.getElementById("comments-count").innerHTML =
                        (num || "No") + " " + (num === 1 ? "comment" : "comments");
                }
            </script>
            <script src="https://graph.facebook.com/?id=<?= $post_url_urlencoded ?>&amp;callback=updateCommentsCount"></script>

        </div>

        <div class="buttons">

            <!-- via http://www.google.com/webmasters/+1/button/ but customized to be 20px tall -->
            <div class="g-plusone" data-size="medium"></div>
            <script type="text/javascript">
              (function() {
                var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
                po.src = 'https://apis.google.com/js/plusone.js';
                var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
              })();
            </script>

            <!-- via http://developers.facebook.com/docs/reference/plugins/like/ but customized to be 90x20 -->
            <div id="fb-root"></div>
            <script>(function(d){
              var js, id = 'facebook-jssdk'; if (d.getElementById(id)) {return;}
              js = d.createElement('script'); js.id = id; js.async = true;
              js.src = "//connect.facebook.net/en_US/all.js#appId=278241485519332&xfbml=1";
              d.getElementsByTagName('head')[0].appendChild(js);
            }(document));</script>
            <div class="fb-like" data-send="false" data-layout="button_count" data-width="90" data-show-faces="false"></div>

            <!-- via https://dev.twitter.com/docs/tweet-button customized for me, and script made async -->
            <a href="http://twitter.com/share" class="twitter-share-button" data-via="aseemk" data-related="aseemk"
                data-text="<?= htmlspecialchars($post_title) ?>">Tweet</a>
            <script async src="http://platform.twitter.com/widgets.js" type="text/javascript"></script>

        </div>

        <div id="comments" class="comments">

            <!-- via http://developers.facebook.com/docs/reference/plugins/comments/ but customized to be dynamic width -->
            <div id="fb-root"></div>
            <script src="http://connect.facebook.net/en_US/all.js#appId=160410744017439&amp;xfbml=1"></script>
            <fb:comments id="fb-comments" href="<?= $post_url_urlencoded ?>" num_posts="10" width=""></fb:comments>
            <script>
                // TEMP HACK body.clientWidth is not very robust if we add padding!
                document.getElementById("fb-comments").setAttribute("width", document.body.clientWidth);
            </script>

        </div>

    </article>

<?
    require("../../_templates/foot.php");
?>