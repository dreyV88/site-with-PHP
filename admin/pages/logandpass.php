<?php
// include 'pages/header.php';
has_pwd();

?>
<div class="container">
    <div class="card col-lg-4 col-lg-offset-5 col-md-6 col-md-offset-3 col-sm-12 ">
        <div class="row">
            <div class="card-img-top">
                <img src="../images/newpeople.png" style ="margin-left:22px" width="50%">
            </div>
            <div class="card-body">
                <form method="post" >
                <?php

// function get_values(){
    if (isset($_POST['connect'])) {
        $login = htmlspecialchars(trim($_POST['login']));
        $pwd = htmlspecialchars(trim($_POST['mdp']));
        $pwd2 = htmlspecialchars(trim($_POST['mdp_again']));

        $errors = [];

        if (empty($login) || empty($pwd)|| (empty($pwd2))) {
            $errors['empty'] = "tous les champs n'ont pas été rempli";
        }
        else if($pwd !=$pwd2){
            $errors['nomatch']="les mots de passe ne correspondent pas";
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
                            <h3 class="card-title font-weight-normal">Saisir votre login et un mot de passe</h3>
                            
                            <div class="input-group form-group">
                                <label for="login">Pseudo</label>
                                <input type="text" name="login" id="login" class="form-control" required>
                            </div>
                            
                            <div class="input-group form-group">
                                <label for="password">Mot de passe</label>
                                <input type="password" name="mdp" id="password" class="form-control" required>
                            </div>
                            <div class="input-group form-group">
                                <label for="password2">Veuillez repeter le mot de passe</label>
                                <input type="password" name="mdp_again" id="password2" class="form-control" required>
                            </div>
                           
                            <div class="form-group">
                                
                                <button class="btn btn-primary" type="submit" name="connect"><i class="glyphicon glyphicon-user"></i> Se connecter</button><br><br>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>