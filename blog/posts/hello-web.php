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