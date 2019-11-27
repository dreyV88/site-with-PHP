<?php

// include 'pages/header.php';
// if(admin()!=1){
//     header("location: index.php?page=dashboard");
// }
?>


<section id="blog" class="container">
<H2>Listing des articles</H2>
    <div class="blog">
        <div class="row">
            <div class="col-md-8">
                <?php
                $article = affiche();
                foreach ($article as $article) {
                    ?>
                    <div class="blog-item">
                        <div class="row">

                            <div class="col-sm-12 blog-content">
                                <a href=""><img class="img-responsive img-blog" src="../images/img_blog/<?= $article->image ?>" width="60%" alt="<?= $article->titre ?>" /></a>
                                <h4><?= $article->titre ." " ?><?php echo($article->publier=='0')?'<i class="glyphicon glyphicon-lock"></i>':''?></h4>
                                <p style="text-align: justify;"><?= substr(nl2br($article->contenu), 0, 300) . "..." ?></p>
                                <a class="btn btn-primary readmore" href="index.php?page=article&id=<?= $article->idarticle ?>">Modifier <i class="fa fa-angle-right"></i></a>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
                <ul class="pagination pagination-lg">
                    <li><a href="#"><i class="fa fa-long-arrow-left"></i>Previous Page</a></li>
                    <li class="active"><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li><a href="#">Next Page<i class="fa fa-long-arrow-right"></i></a></li>
                </ul>
            </div>
        </div>
    </div>

</section>

<?php
// include 'pages/footer.php';

?>