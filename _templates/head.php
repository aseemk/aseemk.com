<!doctype html>
<html lang="en">
<head>
    
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0" />
    
    <?
        $host = $_SERVER['HTTP_HOST'];
        
        switch ($host) {
            
            case "localhost":
            case "aseemk.local":
                $root = "website/new/";
                break;
            
            case "aseemk.com":
            case "aseemk.dev":
            default:
                $root = "";
                break;
            
        }
        
        // TEMP HACK a special case for windows accessing this server
        if (strpos($host, "192.168.") === 0) {
            $root = "website/new/";
        }
        
        $base = "http://" . $host . "/" . $root;
        
        $req_path = $_SERVER['REQUEST_URI'];
        $req_url = "http://" .$host . $req_path;
    ?>
    
    <base href="<?= $base ?>" />
    
    <? if ($title && $section) { ?>
    <title><?= $title ?> – Aseem Kishore – <?= $section ?></title>
    <? } else if ($section) { ?>
    <title>Aseem Kishore – <?= $section ?></title>
    <? } else { ?>
    <title>Aseem Kishore</title>
    <? } ?>
    
    <meta name="description" content="<?= $description ?>" />
    
    <meta property="fb:admins" content="704844" />
    <? // TODO? <meta property="fb:app_id" content="160410744017439"> ?>
    
    <link rel="shortcut icon" href="favicon.ico">
    
    <link rel="stylesheet" href="styles/h5bp-base.css" />
    <link rel="stylesheet/less" href="styles/common.less.css" />
    
    <!-- TEMP for now, downloading raw LESS and converting to CSS in the browser -->
    <script src="styles/less-1.0.41.min.js"></script>
    
    <script>
        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-22174557-1']);
        _gaq.push(['_trackPageview']);
        
        (function() {
            var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
        })();
    </script>
    
    <!-- this is needed before body to enable HTML5 elements in IE8- -->
    <script src="scripts/modernizr-1.7.min.js"></script>
