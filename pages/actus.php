<?php
include 'pages/header.php';

?>
<section id="blog" class="container">
    <div class="text-center">
        <div class="wow bounceInDown" data-wow-offset="0" data-wow-delay="0.3s">
            <h2>Bienvenue sur notre blog</h2>
        </div>
        <div class="wow bounceInDown" data-wow-offset="0" data-wow-delay="0.6s">
            <P>retrouvez nos actualités et événements à venir</P>
        </div>
    </div>
    <?php
    
    $art= affiche_posts();
    foreach($art as $article){
        echo $article->titre;
    }
    ?>

</section>

<?php
include 'pages/footer.php';

?>