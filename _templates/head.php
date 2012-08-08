<!doctype html>
<html lang="en">
<head>
    
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0" />
    
    <?
        $host = $_SERVER['HTTP_HOST'];
        
        // via http://www.php.net/manual/en/ref.strings.php#62307
        function endsWith($str, $sub) {
            return substr($str, strlen($str) - strlen($sub)) === $sub;
        }
        
        if (endsWith($host, ".com") || endsWith($host, ".dev")) {
            // e.g. aseemk.com, aseemk.dev
            $root = "";
        } else {
            // e.g. localhost, aseemk.local, 192.168.0.101
            $root = "web/";
        }
        
        $base = "http://" . $host . "/" . $root;
        
        $req_path = $_SERVER['REQUEST_URI'];
        $req_url = "http://" .$host . $req_path;
    ?>
    
    <base href="<?= $base ?>" />
    
    <?
        $site_name = "Aseem Kishore";
        $title_parts = array();
        
        if ($title) {
            $title_parts[] = $title;
        }
        
        $title_parts[] = $site_name;
        
        if ($section) {
            $title_parts[] = $section;
        }
    ?>
    
    <title><?= join(" - ", $title_parts) ?></title>
    
    <meta name="description" content="<?= $description ?>" />
    
    <!-- http://developers.facebook.com/docs/opengraph/ -->
    <meta property="og:title" content="<?= $title ? $title : ($section ? $section : $site_name) ?>" />
    <meta property="og:site_name" content="<?= $title ? join(' - ', array_slice($title_parts, 1)) : $site_name ?>" />
    <meta property="og:type" content="<?= $og_type ? $og_type : 'website' ?>" />
    <meta property="og:image" content="<?= $og_image ?>" />
    
    <meta property="fb:admins" content="704844" />
    <meta property="fb:app_id" content="160410744017439" />
    
    <link rel="shortcut icon" href="favicon.ico">
    
    <link rel="stylesheet" href="styles/h5bp-base.css" />
    <link rel="stylesheet" href="styles/common.less.css" />
    
    <!-- this is needed before body to enable HTML5 elements in IE8- -->
    <script src="scripts/modernizr-1.7.min.js"></script>
