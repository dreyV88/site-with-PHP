<?php
// include 'header.php';

?>
<!-- teste le contenu -->
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
    // recupère et teste l'extention d'image
    if (!empty($_FILES['image']['name'])) { // $files est un tableau donc je récupère l'image et son nom
        $fichier = $_FILES['image']['name'];
        $extensions = ['.png', '.jpg', '.jpeg', '.gif', '.PNG', '.JPG', '.JPEG', '.GIF'];
        $extension = strrchr($fichier, '.');
        if (!in_array($extension, $extensions)) {
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
        // teste s'il ya une image ou non pour soit uploader img 1er cas soit mettre l'image par défaut
    } else {
        if (post($titre, $content, $publier)) {
            if (!empty($_FILES['image']['name'])) {
                post_img($_FILES['image']['tmp_name'], $extension);
            } else {
                //                 $id= $db->lastInsertId();
                //                 header('location: index.php?page=article&idarticle='.$id);
                var_dump($_FILES, $extension);
            }
        } else {
            echo "erreur publication DB";
            die;
        }
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
                    <label for="categ">Créer une catégorie</label>
                    <input type="text" class="form-control" class="form-controlname=" name="nomcateg" id="categ">
                    <button type="submit"id="catAdd">Ajouter à la liste</button><br>
                    <label for="liste">Sélectionner une catégorie</label>
                    <select id='liste'>
                        <?php
                        $cats=showCateg();
                        foreach($cats as $cat){
                        ?>
                        <option value="<?=$cat->nomcateg?>"><?=$cat->nomcateg?></option>
                        <?php
                        }?>
                    </select>
                </div>
               <!-- <div class="form-group col-sm-12">
                    <label for="titre">Choisir/ Entrer des mots clés</label>
                    <input type="text" class="form-control" class="form-controlname=" name="titre" id="titre">
                    <select>
                        
                    </select>
                </div> -->
                <div class="form-group col-sm-12">
                    <label for="contenu">Contenu de l'article</label>
                    <textarea id= "editor" class="form-control" name="contenu" id="contenu"></textarea>

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

<script>
    // function addOption(){
        
    //     var element1= document.createElement("OPTION");
    //     var txt1=$("#categ").val();
    //     element1.setAttribute("value",txt1);
    //     var node1= document.createTextNode(txt1);
    //     element1.appendChild(node1);
    //     document.getElementById("liste").appendChild(element1);
        
    // }
    
</script>
<!-- <script>
    $(document).ready(function() {
        $('#editor').summernote();
    });
  </script> -->
<?php

// include 'pages/footer.php';
?>