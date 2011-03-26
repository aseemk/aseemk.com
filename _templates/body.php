</head>
<body>
    
    <header>
        
        <?
            $REQUEST_URI = $_SERVER['REQUEST_URI'];
            
            function pathIs($path) {
                global $REQUEST_URI, $root;
                return $REQUEST_URI === ('/' . $root . $path);
            }
            
            function pathIsIn($pathRoot) {
                global $REQUEST_URI, $root;
                return strpos($REQUEST_URI, '/' . $root . $pathRoot) === 0;
            }
        ?>
        
        <!-- $REQUEST_URI: <?= $REQUEST_URI ?> -->
        
        <h1>
            <a href="" class="<?= pathIs('') ? 'current' : '' ?>">Aseem Kishore</a>
        </h1>
        
        <nav>
            <?
                $navLinks = array(
                    'About' => 'about/',
                    'Blog' => 'blog/',
                    'Music' => 'music/',
                    'Projects' => 'projects/',
                    'Teaching' => 'teaching/'
                );
                
                foreach ($navLinks as $text => $path) {
            ?>
                <a href="<?= $path ?>" class="<?= pathIsIn($path) ? 'current' : '' ?>"><?= $text ?></a>
            <?
                }
            ?>
        </nav>
        
    </header>
    