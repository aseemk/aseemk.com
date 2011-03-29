<?
    // just for fun -- see <h2> below :)
    setcookie('welcome', 'back');
    
    $description = "";      // TODO
    
    require("_templates/head.php");
?>

    <style>
        #return-greeting {
            border-bottom: 1px dashed silver;
            cursor: pointer;
        }
        
        #return-greeting:hover {
            border-bottom-color: gray;
        }
    </style>

<?
    require("_templates/body.php");
?>
    
    <section>
        
        <h2>
            Welcome
            <? if ($_COOKIE['welcome']) { ?>
                <span id="return-greeting"
                    title="Don't worry, I'm not tracking you. Only your browser is, and only for this session. :)">back</span>
                <script>
                    document.getElementById("return-greeting").onclick = function () {
                        alert(this.title);
                    };
                </script>
            <? } ?>
        </h2>
        
        <p>
            Please excuse the construction in this humble corner of the web.
        </p>
        
    </section>
    
    <!-- TODO -->
    
<?
    require("_templates/foot.php");
?>