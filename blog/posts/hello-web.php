<?
    $title = 'Hello, web';
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

    $post_title = "Hello, web";   // TODO escape quotes in here!
    $post_url_urlencoded = rawurlencode($base . str_replace('/posts/', 'blog/', str_replace('.html', '', '/posts/hello-web.html')));
?>

    <article>

        <h2>Hello, web</h2>

        <h3>
            <time pubdate datetime="2011-03-28">March 28, 2011</time>
            <!-- TODO categories -->
        </h3>

        <p>It&#8217;s been <a href='http://aseemk.github.com/mit-website/' title='my old MIT website from 2008'>a few years</a> since I&#8217;ve had a website to call my own. That&#8217;s certainly ironic, given that I call myself a <a href='projects/'>web developer</a>.</p>

<p>Most of those few years for me were spent at <a href='http://en.wikipedia.org/wiki/Microsoft_Live_Labs'>Microsoft Live Labs</a>, home to some amazing people that built some equally <a href='http://gasi.ch/blog/live-labs/'>amazing technology</a>. At Live Labs, my thoughts and ideas were all public, whether through emails or frequent show-and-tells like those at the end of our <a href='http://windowseat.ca/item.php?id=342'>out-of-the-box weeks</a>. It was a very special community.</p>

<p>Now that Live Labs is no more, I&#8217;ve been longing to be a part of another such community, and what better one is there than the web at large? I&#8217;m especially inspired by <a href='https://github.com/'>GitHub</a>; I was hooked the moment I made my first <a href='https://github.com/aseemk/seadragon-ajax/commit/f20c8c389862866f70ce17caf36da8cd79a3f4c0'>push</a>, my first <a href='https://github.com/aseemk/iscroll'>fork</a>, my first <a href='https://github.com/cubiq/iscroll/pull/19'>pull request</a>.</p>

<p>So this is my <a href='about/'>introduction</a>. I&#8217;ll be sharing my thoughts and ideas here, and with your help, I hope we can make the web an even better place.</p>
<aside>Special thanks to <a href='http://gasi.ch/'>Daniel Gasienica</a> for encouraging me to create this blog. He mostly just wanted me to stop sending long emails, though. ;)</aside>

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