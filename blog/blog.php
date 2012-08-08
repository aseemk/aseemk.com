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
    
    <article>

        <?
            $post_title = "Joining FiftyThree";   // TODO escape quotes in here!
            $post_url = str_replace('/posts/', 'blog/', '/posts/joining-fiftythree');
            $post_url_absolute = $base . $post_url;

            $post_urls[] = $base . $post_url;
        ?>

        <h2>
            <a href="<?= $post_url ?>">Joining FiftyThree</a>
        </h2>

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

        <div class="stats">

            <!-- technique via http://developers.facebook.com/docs/reference/plugins/comments/ FAQ -->
            <a href="<?= $post_url ?>#comments"><span class="comments-count">View comments</span></a>

        </div>

        <div class="buttons">

            <!-- via http://www.google.com/webmasters/+1/button/ but customized to be 20px tall -->
            <!-- the script is at the bottom, since it needs to be included only once -->
            <div class="g-plusone" data-size="medium"
                data-href="<?= htmlspecialchars($post_url_absolute) ?>"></div>

            <!-- via http://developers.facebook.com/docs/reference/plugins/like/ but customized to be 90x20 -->
            <!-- the script is at the bottom, since it needs to be included only once -->
            <div class="fb-like" data-send="false" data-layout="button_count" data-width="90" data-show-faces="false"
                data-href="<?= htmlspecialchars($post_url_absolute) ?>"></div>

            <!-- via https://dev.twitter.com/docs/tweet-button customized for me, and script made async -->
            <a href="http://twitter.com/share" class="twitter-share-button" data-via="aseemk" data-related="aseemk"
                data-url="<?= htmlspecialchars($post_url_absolute) ?>" data-text="<?= htmlspecialchars($post_title) ?>">Tweet</a>

        </div>

    </article>
    
    <article>

        <?
            $post_title = "Introducing: The Thingdom";   // TODO escape quotes in here!
            $post_url = str_replace('/posts/', 'blog/', '/posts/introducing-the-thingdom');
            $post_url_absolute = $base . $post_url;

            $post_urls[] = $base . $post_url;
        ?>

        <h2>
            <a href="<?= $post_url ?>">Introducing: The Thingdom</a>
        </h2>

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
            <a href="<?= $post_url ?>#comments"><span class="comments-count">View comments</span></a>

        </div>

        <div class="buttons">

            <!-- via http://www.google.com/webmasters/+1/button/ but customized to be 20px tall -->
            <!-- the script is at the bottom, since it needs to be included only once -->
            <div class="g-plusone" data-size="medium"
                data-href="<?= htmlspecialchars($post_url_absolute) ?>"></div>

            <!-- via http://developers.facebook.com/docs/reference/plugins/like/ but customized to be 90x20 -->
            <!-- the script is at the bottom, since it needs to be included only once -->
            <div class="fb-like" data-send="false" data-layout="button_count" data-width="90" data-show-faces="false"
                data-href="<?= htmlspecialchars($post_url_absolute) ?>"></div>

            <!-- via https://dev.twitter.com/docs/tweet-button customized for me, and script made async -->
            <a href="http://twitter.com/share" class="twitter-share-button" data-via="aseemk" data-related="aseemk"
                data-url="<?= htmlspecialchars($post_url_absolute) ?>" data-text="<?= htmlspecialchars($post_title) ?>">Tweet</a>

        </div>

    </article>
    
    <article>

        <?
            $post_title = "Hello, web";   // TODO escape quotes in here!
            $post_url = str_replace('/posts/', 'blog/', '/posts/hello-web');
            $post_url_absolute = $base . $post_url;

            $post_urls[] = $base . $post_url;
        ?>

        <h2>
            <a href="<?= $post_url ?>">Hello, web</a>
        </h2>

        <h3>
            <time pubdate datetime="2011-03-28">March 28, 2011</time>
            <!-- TODO categories -->
        </h3>

        <p>It&#8217;s been <a title='my old MIT website from 2008' href='http://aseemk.github.com/mit-website/'>a few years</a> since I&#8217;ve had a website to call my own. That&#8217;s certainly ironic, given that I call myself a <a href='projects/'>web developer</a>.</p>

<p>Most of those few years for me were spent at <a href='http://en.wikipedia.org/wiki/Microsoft_Live_Labs'>Microsoft Live Labs</a>, home to some amazing people that built some equally <a href='http://gasi.ch/blog/live-labs/'>amazing technology</a>. At Live Labs, my thoughts and ideas were all public, whether through emails or frequent show-and-tells like those at the end of our <a href='http://windowseat.ca/item.php?id=342'>out-of-the-box weeks</a>. It was a very special community.</p>

<p>Now that Live Labs is no more, I&#8217;ve been longing to be a part of another such community, and what better one is there than the web at large? I&#8217;m especially inspired by <a href='https://github.com/'>GitHub</a>; I was hooked the moment I made my first <a href='https://github.com/aseemk/seadragon-ajax/commit/f20c8c389862866f70ce17caf36da8cd79a3f4c0'>push</a>, my first <a href='https://github.com/aseemk/iscroll'>fork</a>, my first <a href='https://github.com/cubiq/iscroll/pull/19'>pull request</a>.</p>

<p>So this is my <a href='about/'>introduction</a>. I&#8217;ll be sharing my thoughts and ideas here, and with your help, I hope we can make the web an even better place.</p>
<aside>Special thanks to <a href='http://gasi.ch/'>Daniel Gasienica</a> for encouraging me to create this blog. He mostly just wanted me to stop sending long emails, though. ;)</aside>

        <div class="stats">

            <!-- technique via http://developers.facebook.com/docs/reference/plugins/comments/ FAQ -->
            <a href="<?= $post_url ?>#comments"><span class="comments-count">View comments</span></a>

        </div>

        <div class="buttons">

            <!-- via http://www.google.com/webmasters/+1/button/ but customized to be 20px tall -->
            <!-- the script is at the bottom, since it needs to be included only once -->
            <div class="g-plusone" data-size="medium"
                data-href="<?= htmlspecialchars($post_url_absolute) ?>"></div>

            <!-- via http://developers.facebook.com/docs/reference/plugins/like/ but customized to be 90x20 -->
            <!-- the script is at the bottom, since it needs to be included only once -->
            <div class="fb-like" data-send="false" data-layout="button_count" data-width="90" data-show-faces="false"
                data-href="<?= htmlspecialchars($post_url_absolute) ?>"></div>

            <!-- via https://dev.twitter.com/docs/tweet-button customized for me, and script made async -->
            <a href="http://twitter.com/share" class="twitter-share-button" data-via="aseemk" data-related="aseemk"
                data-url="<?= htmlspecialchars($post_url_absolute) ?>" data-text="<?= htmlspecialchars($post_title) ?>">Tweet</a>

        </div>

    </article>
    

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

    <? // Tweet button script (async) ?>
    <script async src="http://platform.twitter.com/widgets.js" type="text/javascript"></script>

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