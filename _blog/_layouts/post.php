<?
    $title = '{{ page.title }}';
    $section = 'Blog';
    $description = "{{ page.summary }}";

    $og_type = "article";

    require("../../_templates/head.php");
?>

    <link href="http://feeds.feedburner.com/aseemk/blog" type="application/atom+xml" rel="alternate" title="Aseem Kishore - Blog" />

    <style>
    </style>

<?
    require("../../_templates/body.php");

    $post_url_urlencoded = rawurlencode($base . str_replace('/posts/', 'blog/', str_replace('.html', '', '{{ page.url }}')));
?>

    <article>

        <h2>{{ page.title }}</h2>

        <h3>
            <time pubdate datetime="{{ page.date | date: "%Y-%m-%d" }}">{{ page.date | date: "%B %d, %Y" }}</time>
            <!-- TODO categories -->
        </h3>

        {{ content }}

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
            <a href="http://twitter.com/share" class="twitter-share-button" data-via="aseemk" data-related="aseemk">Tweet</a>
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