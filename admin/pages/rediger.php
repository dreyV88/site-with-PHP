<?php
include "header.php";
?>

<?php
if (isset($_POST['post'])) {
    $titre = htmlspecialchars(trim($_POST['titre']));
    $content = htmlspecialchars(trim($_POST['contenu']));
    $publier = htmlspecialchars(trim($_POST['publier']));
    // die(var_dump($_POST));
   
    $errors = [];
    if (empty($titre) || empty($content)) {
        $errors['empty'] = "veuillez remplir tous les champs";
    }
    if (!empty($_FILES['image']['name'])) { // $files est un tableau donc je récupère l'image et son nom
        $fichier = $_FILES['image']['name'];
        $extension = ['.png', '.jpg', '.jpeg', '.gif', 'PNG', '.JPG', '.JPEG', '.GIF'];
        $extention = strrchr($fichier, '.');
        if (!in_array($extention, $extension)) {
            $errors['image'] = "l'extension de l'image n'est pas pris en charge";
        }
    }
    if (!empty($errors)) {
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
    }else{
        post($titre, $content, $publier);
    }
}
?>
<div class="container">
    <div class="row">
        <h2>Poster un article</h2>

        <form method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="form-group col-sm-12">
                    <label for="titre">Titre de l'article</label>
                    <input type="text" class="form-control" class="form-controlname=" name="titre" id="titre">

                </div>
                <div class="form-group col-sm-12">
                    <label for="contenu">Contenu de l'article</label>
                    <textarea class="form-control" name="contenu" id="contenu"></textarea>

                </div>

                <div class="custom-file col-sm-12">
                    <label class="custom-file-label" for="pj">Ajouter une image</label>
                    <input type="file" class="custom-file-input " name="image" id="pj" style="color:darkgray">


                </div>

                <div class="col-sm-6">
                    <h4>Publier?</h4>
                    <div class="form-group">
                        <label class="custom-control-input" for="publie">
                            <input type="radio" name="publier" id="publie" value='1'>Oui</label> <br>
                        <label class="custom-control-input" for="publie">
                            <input type="radio" name="publier" id="publie" value='0'>Non</label>
                    </div>

                </div>
                <div class="col-sm-6">
                    <button class="btn btn-primary" type="submit" name="post">Envoyer</button>
                </div>

            </div>

        </form>
    </div>
</div>

<?php
