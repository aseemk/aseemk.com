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
            <iframe src="http://www.facebook.com/plugins/like.php?href=<?= $post_url_urlencoded ?>&amp;layout=button_count&amp;show_faces=false&amp;width=90&amp;action=like&amp;font&amp;colorscheme=light&amp;height=20"
                scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:90px; height:20px;" allowTransparency="true"></iframe>

            <!-- via http://dev.twitter.com/pages/tweet_button instead of https://twitter.com/about/resources/tweetbutton to get iframe and customized to be 110x20 -->
            <!-- note that this page's <title> isn't accessible from the iframe! so have to insert it manually -->
            <iframe allowtransparency="true" frameborder="0" scrolling="no"
                src="http://platform.twitter.com/widgets/tweet_button.html?url=<?= $post_url_urlencoded ?>&amp;count=horizontal&amp;via=aseemk&amp;text=<?= rawurlencode($title) ?>"
                style="width:110px; height:20px;"></iframe>

            <!-- for reference, here's the regular tweet button:
            <a href="http://twitter.com/share" class="twitter-share-button" data-count="horizontal" data-via="aseemk">Tweet</a>
            <script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
            -->

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