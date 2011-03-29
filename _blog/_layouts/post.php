<?
    $title = '{{ page.title }}';
    $section = 'Blog';
    $description = "{{ page.summary }}";
    
    require("../../_templates/head.php");
?>

    <style>
    </style>

<?
    require("../../_templates/body.php");
?>
    
    <article>
        
        <h2>{{ page.title }}</h2>
        
        <h3>
            <time pubdate datetime="{{ page.date | date: "%Y-%m-%d" }}">{{ page.date | date: "%B %d, %Y" }}</time>
            <!-- TODO categories -->
        </h3>
        
        {{ content }}
        
        <!-- TODO comments and buttons (like, tweet) -->
        
    </article>
    
<?
    require("../../_templates/foot.php");
?>