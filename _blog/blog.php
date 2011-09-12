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

            <!-- via http://developers.facebook.com/docs/reference/plugins/like/ but customized to be 90x20 -->
            <iframe src="http://www.facebook.com/plugins/like.php?href=<?= $post_url_urlencoded ?>&amp;layout=button_count&amp;show_faces=false&amp;width=90&amp;action=like&amp;font&amp;colorscheme=light&amp;height=20"
                scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:90px; height:20px;" allowTransparency="true"></iframe>

            <!-- via http://dev.twitter.com/pages/tweet_button instead of https://twitter.com/about/resources/tweetbutton to get iframe and customized to be 110x20 -->
            <iframe allowtransparency="true" frameborder="0" scrolling="no"
                src="http://platform.twitter.com/widgets/tweet_button.html?url=<?= $post_url_urlencoded ?>&amp;count=horizontal&amp;via=aseemk&amp;text=<?= rawurlencode($post_title) ?>"
                style="width:110px; height:20px;"></iframe>

        </div>

    </article>
    {% endfor %}

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