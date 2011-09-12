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