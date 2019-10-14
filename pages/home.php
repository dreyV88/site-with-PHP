<?php
include 'pages/header.php';
?>
    <div class="row">
        <?php
        $articles= get_posts();
        foreach($articles as $article){
//  echo "<h2>". $article -> titre."</h2><br> <p>". nl2br($article->contenu)."</p>";
        ?>

        <div class="col-xs-12 col-sm-2 text-center">
            <div class="card" style="width: 60rem;">
                <img class="card-img-top" src="./images/img_blog/<?= $article->image?>" alt="<?= $article->titre?>" width=60%>
                <div class="card-body">
                    <h5 class="card-title"><?= $article->titre?></h5>
                    <h6 class="card-text"><?= date("d/m/Y à H:i", strtotime($article->dateparution))?> par <?= $article->nom_prenom?> </h6>
    <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-primary readmore">Lire plus</a> -->
                </div>
            </div>
        </div>
    }
    </div>





