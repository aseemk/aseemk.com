<?
    $section = "About";
    $description = "";      // TODO
    
    require("_templates/head.php");
?>
    
    <style>
        ul#ext-links {
            margin-left: 0;
        }
        
        ul#ext-links li {
            display: inline-block;
        }
        
        ul#ext-links li:before {
            content: "";
        }
        
        ul#ext-links a {
            margin-right: 0.75em;
        }
        
        ul#ext-links a:before {
            content: " ";
            display: inline-block;
            width: 16px;
            height: 16px;
            margin-right: 0.25em;
            background: transparent no-repeat left center;
        }
        
        ul#ext-links a#ext-link-am:before {
            /* TEMP HACK this is their *current* favicon -- download a local copy or remove link! */
            background-image: url(http://wac.2659.edgecastcdn.net/802659/production75/images/icons/favicon.ico);
        }
        
        ul#ext-links a#ext-link-fb:before {
            background-image: url(http://www.facebook.com/favicon.ico);
        }
        
        ul#ext-links a#ext-link-gh:before {
            background-image: url(https://github.com/favicon.ico);
        }
        
        ul#ext-links  a#ext-link-li:before {
            background-image: url(http://www.linkedin.com/favicon.ico);
        }
        
        ul#ext-links a#ext-link-tw:before {
            background-image: url(http://twitter.com/favicon.ico);
        }
    </style>
    
<?
    require("_templates/body.php");
?>
    
    <section>
        
        <h2>
            Eye of the beholder
        </h2>
        
        <p>
            Please excuse the construction in this humble corner of the web.
        </p>
        
    </section>
    
    <!-- TODO -->
    
    <section>
        
        <h2>
            Elsewhere on the web
        </h2>
        
        <ul id="ext-links">
            <li><a id="ext-link-am" href="http://about.me/aseemk" target="_blank">About.me</a></li>
            <li><a id="ext-link-fb" href="http://www.facebook.com/aseem.kishore" target="_blank">Facebook</a></li>
            <li><a id="ext-link-gh" href="https://github.com/aseemk" target="_blank">GitHub</a></li>
            <li><a id="ext-link-li" href="http://www.linkedin.com/in/akishore" target="_blank">LinkedIn</a></li>
            <li><a id="ext-link-tw" href="http://twitter.com/aseemk" target="_blank">Twitter</a></li>
        </ul>
        
    </section>
    
<?
    require("_templates/foot.php");
?>