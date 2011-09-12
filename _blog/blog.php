---
layout: nil
---
<?
    $section = "Blog";
    $description = "";      // TODO
    $og_type = "blog";      // only the root should be this, according to the documentation

    require("../_templates/head.php");
?>

    <link href="http://feeds.feedburner.com/aseemk/blog" type="application/atom+xml" rel="alternate" title="Aseem Kishore - Blog" />

    <style>
    </style>

<?
    require("../_templates/body.php");
?>

    <section>

        <h2>
            The post is mightier
        </h2>

        <p>
            Please excuse the construction in this humble corner of the web.
        </p>

    </section>

    <?
        $post_urls = array();

        // this is Liquid markup for Jekyll;
        // see https://github.com/mojombo/jekyll/wiki/Template-Data for available params
    ?>
    {% for post in site.posts %}
    <article>

        <?
            $post_title = "{{ post.title }}";   // TODO escape quotes in here!
            $post_url = str_replace('/posts/', 'blog/', '{{ post.id }}');
            $post_url_urlencoded = rawurlencode($base . $post_url);

            $post_urls[] = $base . $post_url;
        ?>

        <h2>
            <a href="<?= $post_url ?>">{{ post.title }}</a>
        </h2>

        <h3>
            <time pubdate datetime="{{ post.date | date: "%Y-%m-%d" }}">{{ post.date | date: "%B %d, %Y" }}</time>
            <!-- TODO categories -->
        </h3>

        {{ post.content }}

        <div class="stats">

            <!-- technique via http://developers.facebook.com/docs/reference/plugins/comments/ FAQ -->
            <a href="<?= $post_url ?>#comments"><span class="comments-count">View comments</span></a>

        </div>

        <div class="buttons">

            <!-- via http://www.google.com/webmasters/+1/button/ but customized to be 20px tall -->
            <!-- the script is at the bottom, since it needs to be included only once -->
            <div class="g-plusone" data-size="medium"></div>

            <!-- via http://developers.facebook.com/docs/reference/plugins/like/ but customized to be 90x20 -->
            <!-- the script is at the bottom, since it needs to be included only once -->
            <div class="fb-like" data-send="false" data-layout="button_count" data-width="90" data-show-faces="false"></div>

            <!-- via http://dev.twitter.com/pages/tweet_button instead of https://twitter.com/about/resources/tweetbutton to get iframe and customized to be 110x20 -->
            <iframe allowtransparency="true" frameborder="0" scrolling="no"
                src="http://platform.twitter.com/widgets/tweet_button.html?url=<?= $post_url_urlencoded ?>&amp;count=horizontal&amp;via=aseemk&amp;text=<?= rawurlencode($post_title) ?>"
                style="width:110px; height:20px;"></iframe>

        </div>

    </article>
    {% endfor %}

    <? // Google +1 script (async) ?>
    <script type="text/javascript">
      (function() {
        var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
        po.src = 'https://apis.google.com/js/plusone.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
      })();
    </script>

    <? // Facebook JS SDK script (async) ?>
    <div id="fb-root"></div>
    <script>(function(d){
      var js, id = 'facebook-jssdk'; if (d.getElementById(id)) {return;}
      js = d.createElement('script'); js.id = id; js.async = true;
      js.src = "//connect.facebook.net/en_US/all.js#appId=278241485519332&xfbml=1";
      d.getElementsByTagName('head')[0].appendChild(js);
    }(document));</script>

    <? // TEMP HACK this whole thing feels quite hacky. wish there were easier ways. ?>
    <script>
        var postUrls = ["<?= join('","', $post_urls) ?>"],
            commentsCountSpans = document.querySelectorAll(".comments-count");

        function updateCommentsCounts(objs) {
            for (var i = 0; i < postUrls.length; i++) {
                var num = objs[postUrls[i]].comments;
                commentsCountSpans[i].innerHTML =
                    num ? (num + " comment" + (num > 1 ? 's' : '')) : "Add a comment";
            }
        }

        document.write([
            '<script src="https://graph.facebook.com/?ids=',
            encodeURIComponent(postUrls.join(',')),
            '&callback=updateCommentsCounts"></',
            'script>'
        ].join(''));
    </script>

<?
    require("../_templates/foot.php");
?>