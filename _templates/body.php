</head>
<body>
    
    <header>
        
        <?
            function req_path_is($path) {
                global $req_path, $root;
                return $req_path === ('/' . $root . $path);
            }
            
            function req_path_is_in($path_root) {
                global $req_path, $root;
                return strpos($req_path, '/' . $root . $path_root) === 0;
            }
        ?>
        
        <h1>
            <a href="" class="<?= req_path_is('') ? 'current' : '' ?>">Aseem Kishore</a>
        </h1>
        
        <nav>
            <?
                $nav_links = array(
                    'About' => 'about/',
                    'Blog' => 'blog/',
                    'Music' => 'music/',
                    'Projects' => 'projects/',
                    'Teaching' => 'teaching/'
                );
                
                foreach ($nav_links as $text => $path) {
            ?>
                <a href="<?= $path ?>" class="<?= req_path_is_in($path) ? 'current' : '' ?>"><?= $text ?></a>
            <?
                }
            ?>
        </nav>
        
    </header>
    