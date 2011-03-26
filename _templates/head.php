<!doctype html>
<html lang="en">
<head>
    
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0" />
    
    <?
        $HTTP_HOST = $_SERVER['HTTP_HOST'];
        
        switch ($HTTP_HOST) {
            
            case "localhost":
            case "akishore-macbook.local":
                $root = "website/new/";
                break;
            
            case "aseemk.com":
            case "aseemk.dev":
            default:
                $root = "";
                break;
            
        }
    ?>
    
    <!-- $HTTP_HOST: <?= $HTTP_HOST ?> -->
    <!-- $root: <?= $root ?> -->
    <? if ($root) { ?>
    <base href="http://<?= $HTTP_HOST ?>/<?= $root ?>" />
    <? } ?>
    
    <title>Aseem Kishore – <?= $title ?></title>
    <meta name="description" content="<?= $description ?>" />
    
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
