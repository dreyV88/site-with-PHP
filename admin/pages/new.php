<?php
// include 'pages/header.php';
?>
<article class="container">
    <div class="card col-lg-4 col-lg-offset-5 col-md-6 col-md-offset-3 col-sm-12 ">
        <div class="row">
            <div class="card-img-top">
                <img src="../images/newpeople.png" style ="margin-left:22px" width="50%">
            </div>
            <div class="card-body">
                <form method="post" >
                     <?php
                    if (isset($_POST['submit'])) {
                        $email = htmlspecialchars(trim($_POST['email']));
                        $tokken = htmlspecialchars(trim($_POST['tokken']));
                    
                        $errors = [];
                    
                        if (empty($email) || empty($tokken)) {
                            $errors['empty'] = "tous les champs n'ont pas été rempli";
                        } else if (is_modo($email, $tokken) == 0) {
                            $errors['exist'] = "Ce modérateur n'existe pas";
                        }
                        if (!empty($errors)) {
                            ?>
                            <div class="card bg-warning" style="height: 30px">
                                <div class="card-body text-center text-white">
                                    <?php
                                            foreach ($errors as $error) {
                                                echo $error . "<br>";
                                            }
                                            ?>
                                </div>
                            </div>
                    <?php
                        }
                    }
                    ?> 
                    <div class="input-group form-group">
                        <div class="row">
                            <h3 class="card-title font-weight-normal">Veuillez vous enregistrer</h3>
                            
                            <div class="input-group form-group">
                                <label for="mail">Adresse email</label>
                                <input type="email" name="email" id="mail" class="form-control" required>
                            </div>
                            
                            <div class="input-group form-group">
                                <label for="tok">Mot de passe</label>
                                <input type="text" name="tokken" id="tok" class="form-control" required>
                            </div>
                           
                            <div class="form-group">
                                
                                <button class="btn btn-primary" type="submit" name="submit"><i class="glyphicon glyphicon-user"></i> S'enregistrer</button><br><br>
                            <p style="text-align:center"> <a href="index.php?page=login">Déjà Modérateur?</a> </p>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</article>
<?php
// include 'pages/footer.php';
?>