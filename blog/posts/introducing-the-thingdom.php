<?
    $title = 'Introducing: The Thingdom';
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

    $post_title = "Introducing: The Thingdom";   // TODO escape quotes in here!
    $post_url_urlencoded = rawurlencode($base . str_replace('/posts/', 'blog/', str_replace('.html', '', '/posts/introducing-the-thingdom.html')));
?>

    <article>

        <h2>Introducing: The Thingdom</h2>

        <h3>
            <time pubdate datetime="2011-09-12">September 12, 2011</time>
            <!-- TODO categories -->
        </h3>

        <p>I&#8217;m very excited to finally unveil what I&#8217;ve been working on for the past few months! I&#8217;ll start with the story.</p>

<p>When I decided to leave Microsoft, I realized that I&#8217;d need a new computer. Having experienced Apple hardware in the past, I knew that I wanted a Mac; the question was simply which one.</p>

<p>I spent time researching the various models and specs, but ultimately, I wanted more &#8220;human&#8221; data. I thus wrote up an (admittedly long) email to the subset of my friends who I knew had a Mac, asking them which ones they had and how they liked them.</p>

<p>Among those on the &#8220;To:&#8221; line of my email was my close friend and peer, <a href='http://gasi.ch/'>Daniel Gasienica</a>. Daniel is a big Apple fan (to say the least), so I valued his opinions in particular.</p>

<p>Surprisingly, answering my email wasn&#8217;t a chore for Daniel; he <em>wanted</em> to tell me what he had and what he thought, because he loved Apple and identified with their products. This was equally the case with my other friends, as well.</p>

<p>Stepping back, these were two sides of the same coin: I wanted to <em>see</em> what my friends had, and my friends wanted to <em>share</em> what they had. We had no other place to do these things, so we resorted to email.</p>

<p>People resorted to email for sharing photos, too, before Facebook and Flickr came along.</p>

<p>So this is what Daniel and I have been working on: building a place for people to connect around the things in their lives. We&#8217;re excited to finally share it publicly today; we call it <strong><em><a href='http://www.thethingdom.com/'>The Thingdom</a></em></strong>.</p>

<p>So check it out, join (<a href='http://www.thethingdom.com/aseemk'>follow me</a> once you do) and tell us where you think we should go with this! We&#8217;re just getting started.</p>
<aside>The Thingdom wouldn&#8217;t be nearly what it is today without the contributions of several amazing people. For starters, <a href='http://www.twitter.com/sanjayvc'>Sanjay Kumar</a> and <a href='http://www.hungrybear.org/about/'>Sergio Haro</a> contributed significantly to our original ideas and prototypes. Along the way, our beta users provided invaluable feedback (among the most prolific were <a href='http://www.thethingdom.com/424f'>Boris Bluntschli</a>, <a href='http://www.thethingdom.com/gz'>Gerd Zellweger</a> and <a href='http://www.thethingdom.com/frida'>Frida Kumar</a>), and our friends and family provided equally invaluable support and encouragement. And last but definitely not least, <a href='http://www.thethingdom.com/gasi'>Daniel Gasienica</a> brought the whole idea to life, and so much more. Thanks, everyone.</aside>

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