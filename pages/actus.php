<?php
include 'pages/header.php';

?>
 <section id="blog" class="container">
    <div class="text-center">
        <div class="wow bounceInDown" data-wow-offset="0" data-wow-delay="0.3s">
            <h2>Bienvenue sur notre blog</h2>
        </div>
        <div class="wow bounceInDown" data-wow-offset="0" data-wow-delay="0.6s">
            <p>retrouvez nos actualités et événements à venir</p>
        </div>
    </div>
    <div class="blog">
      <div class="row">
        <div class="col-md-8">
        <?php    
        $article= affiche();
        foreach($article as $article){
            ?>
            <div class="blog-item">
            <div class="row">
              <div class="col-sm-2 text-center">
                <div class="entry-meta">
                  <span id="publish_date"><?= date("j/M",strtotime($article->dateparution))?></span>
                  <span><i class="fa fa-user"></i> <a href="#"><?= $article->nom_prenom?></a></span>
                  <span><i class="fa fa-comment"></i> <a href="#"><?= $article->modere?> <br>Commentaires</a></span>
                  <span><i class="fa fa-heart"></i><a href="#">56 Likes</a></span>
                </div>
              </div>
              <div class="col-sm-10 blog-content">
                <a href=""><img class="img-responsive img-blog" src="./images/img_blog/<?= $article->image?>" width="60%" alt="<?= $article->titre?>" /></a>
                <h4><?= $article->titre?></h4>
                <p style="text-align: justify;"><?= substr(html_entity_decode($article->contenu),0,300)."..."?></p>
                <a class="btn btn-primary readmore" href="index.php?page=article&id=<?=$article->idarticle?>">Lire la suite <i class="fa fa-angle-right"></i></a>
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
          <aside class="col-md-4">
            <div class="widget search">
                <form role="form">
                <input type="text" class="form-control search_box" autocomplete="off" placeholder="Search Here">
                </form>
            </div>
            <div class="widget categories">
            <h3>Recent Comments</h3>
            <div class="row">
              <div class="col-sm-12">
                <div class="single_comments">
                  <img src="images/blog/avatar3.png" alt="" />
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do </p>
                  <div class="entry-meta small muted">
                    <span>By <a href="#">Alex</a></span> <span>On <a href="#">Creative</a></span>
                  </div>
                </div>
                <div class="single_comments">
                  <img src="images/blog/avatar3.png" alt="" />
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do </p>
                  <div class="entry-meta small muted">
                    <span>By <a href="#">Alex</a></span> <span>On <a href="#">Creative</a></span>
                  </div>
                </div>
                <div class="single_comments">
                  <img src="images/blog/avatar3.png" alt="" />
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do </p>
                  <div class="entry-meta small muted">
                    <span>By <a href="#">Alex</a></span> <span>On <a href="#">Creative</a></span>
                  </div>
                </div>

              </div>
            </div>
          </div>
          <!--/.recent comments-->


          <div class="widget categories">
            <h3>Categories</h3>
            <div class="row">
              <div class="col-sm-6">
                <ul class="blog_category">
                  <li><a href="#">Computers <span class="badge">04</span></a></li>
                  <li><a href="#">Smartphone <span class="badge">10</span></a></li>
                  <li><a href="#">Gedgets <span class="badge">06</span></a></li>
                  <li><a href="#">Technology <span class="badge">25</span></a></li>
                </ul>
              </div>
            </div>
          </div>
          <!--/.categories-->

          <div class="widget archieve">
            <h3>Archives</h3>
            <div class="row">
              <div class="col-sm-12">
                <ul class="blog_archieve">
                  <li><a href="#"><i class="fa fa-angle-double-right"></i> December 2015 <span class="pull-right">(97)</span></a></li>
                  <li><a href="#"><i class="fa fa-angle-double-right"></i> November 2015 <span class="pull-right">(32)</a></li>
                  <li><a href="#"><i class="fa fa-angle-double-right"></i> October 2015 <span class="pull-right">(19)</a></li>
                  <li><a href="#"><i class="fa fa-angle-double-right"></i> September 2015 <span class="pull-right">(08)</a></li>
                </ul>
              </div>
            </div>
          </div>
          <!--/.archieve-->

          <div class="widget tags">
            <h3>les mots clés</h3>
            <ul class="tag-cloud">
              <li><a class="btn btn-xs btn-primary" href="#">Apple</a></li>
              <li><a class="btn btn-xs btn-primary" href="#">Barcelona</a></li>
              <li><a class="btn btn-xs btn-primary" href="#">Office</a></li>
              <li><a class="btn btn-xs btn-primary" href="#">Ipod</a></li>
              <li><a class="btn btn-xs btn-primary" href="#">Stock</a></li>
              <li><a class="btn btn-xs btn-primary" href="#">Race</a></li>
              <li><a class="btn btn-xs btn-primary" href="#">London</a></li>
              <li><a class="btn btn-xs btn-primary" href="#">Football</a></li>
              <li><a class="btn btn-xs btn-primary" href="#">Porche</a></li>
              <li><a class="btn btn-xs btn-primary" href="#">Gadgets</a></li>
            </ul>
          </div>
          <!--/.tags-->

          <div class="widget blog_gallery">
            <h3>Nos images</h3>
            <ul class="sidebar-gallery">
              <li><a href="#"><img src="images/blog/gallery1.png" alt="" /></a></li>
              <li><a href="#"><img src="images/blog/gallery2.png" alt="" /></a></li>
              <li><a href="#"><img src="images/blog/gallery3.png" alt="" /></a></li>
              <li><a href="#"><img src="images/blog/gallery4.png" alt="" /></a></li>
              <li><a href="#"><img src="images/blog/gallery5.png" alt="" /></a></li>
              <li><a href="#"><img src="images/blog/gallery6.png" alt="" /></a></li>
            </ul>
          </div>
          <!--/.blog_gallery-->
        </aside>
      </div>
      <!--/.row-->
    </div>

</section>

<?php
include 'pages/footer.php';

?>