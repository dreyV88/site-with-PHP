<?php
include 'pages/header.php';
$article= get_article();
if ($article==false){
    header("location: index.php?page=error");
    
}else{
    ?>
    </div>
    <div class= "parallax-container">
        <div class="parallax" style="background-image:url(./images/img_blog/<?= $article->image?>)">
            <!-- <img src="./images/img_blog/<?= $article->image?>" alt="<?=$article->titre?>"/> -->
        </div>
    </div>

    <div class = "container bg-white">
        <h2><?=$article->titre?></h2>
        <h6>Par <?=$article->nom_prenom?> le <?=date("d/m/Y à H:i", strtotime($article->dateparution))?></h6>
        <p><?= nl2br($article->contenu)?></p>
    <?php
}
?>

<hr>

<h4>Commenter: </h4>
<?php
if(isset($_POST['submit'])){
    $name = htmlspecialchars(trim($_POST['login']));
    $email = htmlspecialchars(trim($_POST['email']));
    $contenu = htmlspecialchars(trim($_POST['contenu']));
    $errors=[];

    if(empty($name)||empty($email)||empty($contenu)){
        $errors['vide']= "il y a un/des champ/s vide/s";
    }else{
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $errors['email']= "le mail n'est pas valide";
        }
    }
    if(!empty($errors)){
        ?>
        <div class="card bg-warning">
            <div class="card-content text-white">
                <?php
                foreach($errors as $error){
                    echo $error."<br/>";
                }?>
            </div>

        </div>
        <?php
    }else{
        commentaire($log,$mail,$comms);
        /*?>
            <script>
                window.location.replace("index.php?page=article&id=<?= $_GET['id']?>");
            </script>
        <?php*/
    }
}
?>

<form method="post">
    <div class="row">
    <div class="col-sm-6 blog-content">
        <label for="nom">Login</label>
        <input type="texte" name ="login" id= "nom" class="form-control is-invalid" style="width:38rem" />
        
    </div>
    <div class="col-sm-6 blog-content">
        <label for="mail">Adresse email</label>
        <input type="email" name ="email" id= "mail" class="form-control is-invalid" style="width:38rem" />
        
    </div>
    <div class="col-sm-12 blog-content">
        <label for="content">Commentaire</label>
        <textarea name="contenu" id= "content" class="form-control" ></textarea>
    </div>
        <button type="submit" name= "submit" class="btn btn-primary">commenter le post</button>
    </div>
    


</form>