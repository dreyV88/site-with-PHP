<?php
include "header.php";

$article = affichArticl();
if($article==false){
    header('location: index.php?page=error');
}
?>
<?php
if(isset($_POST["envoyer"])){
    $titre = htmlspecialchars(trim($_POST['titre']));
    $content = htmlspecialchars(trim($_POST['contenu']));
    $publier = htmlspecialchars(trim($_POST['publier']));
    $errors = [];
    if (empty($titre) || empty($content)) {
        $errors['empty'] = "veuillez remplir tous les champs";
    }if (!empty($errors)) {
        ?>
        <div class="card bg-warning" style="height: auto">
            <div class="card-body text-center text-white">

                <?php
                    foreach ($errors as $error) {
                    echo $error . "<br>";
                    }


                ?>
            </div>
        </div>
    <?php
    } else {
        modifier($titre, $content, $publier, $_GET['id']);    
       echo "modification réussie!";
    }
    
}
?>
</div>
<div class="parallax-container">
    <div class="parallax" style="background-image:url(../images/img_blog/<?= $article->image ?>)">
    </div>
</div>

<div class="container bg-white">
    <form method="post">
        <div class="row">
            <div class="form-group col-sm-12">
                <label for="titre">Titre de l'article</label>
                <input class="form-control" style="color:darkgray" type="text" name="titre" id="titre" value="<?= $article->titre ?>">
            </div>

            <div class="form-group col-sm-12">
                <label for="content">contenu de l'article</label>
                <textarea class="form-control" style="color:darkgray; height:auto;" name="contenu" id="content" rows="35"><?= $article->contenu ?></textarea>
            </div>
            <div >
                <h4>Publier?</h4>
                <div class="form-group col-sm-6">
                    <label  class="custom-control-input" for="publie">oui</label>
                    <input type="radio" name="publier" id="publie" value="1"<?php echo $article->publier == '1' ? 'checked' : '' ?>> <br>
                    <label class="custom-control-input" for="publie">non</label>
                    <input  type="radio" name="publier" id="publie" value="0"<?php echo $article->publier == '0' ? 'checked' : '' ?>>
                </div>
             
                <div class="form-group col-sm-6">
                    <button class="btn btn-primary" type="submit" name="envoyer" >Appliquer modificitation</button>
                </div>
            </div>
        </div>



    </form>