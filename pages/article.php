<?php
include 'pages/header.php';
$article= get_article();
if ($article==false){
    header("location: index.php?page=error");
    
}else{
    ?>
    </div>
    <div class= "parallax-container">
        <div class="parallax">
            <img src="./images/img_blog/<?= $article->image?>" alt="<?=$article->titre?>"/>
        </div>
    </div>

    <div class = "container">
        <h2><?=$article->titre?></h2>
        <h6>Par <?=$article->nom_prenom?> le <?=date("d/m/Y à H:i", strtotime($article->dateparution))?></h6>
        <p><?= nl2br($article->contenu)?></p>
    <?php
}