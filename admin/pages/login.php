<?php include 'pages/header.php'
?>
<div class="container">
    <div class="card col-lg-4 col-lg-offset-5 col-md-6 col-md-offset-3 col-sm-12 ">
        <div class="row">
            <div class="card-img-top">
                <img src="../images/operatorflatdesign.png" width="50%">
            </div>
            <div class="card-body">
                <form method="post">
                    <div class="input-group form-group">
                        <div class="row">
                            <h3 class="card-title font-weight-normal">Se connecter</h3>
                            <?php
                            if (isset($_POST['submit'])) {
                                $login = htlmspecialchars(trim($_POST['login'])); // htlmspacial evite injection d'HTML et permet la compréhension du mail par les navigateurs et trim coupe au cas ou il y ait des espaces dans le mai
                                $pwd = sha1(htlmspecialchars(trim($_POST['mdp'])));

                                $errors = [];
                                if (empty($login) || empty($pwd)) {
                                    $errors['empty'] = "champ(s) manquant";
                                } else if (is_admin($login, $pwd)==0)  //test si les valeurs n'existent pas
                                {
                                    $errors['exist'] = "Cet administrateur n'existe pas";
                                 }
                                 if (!empty($errors)){
                                    ?>
                                    <div class="card bg-warning">
                                        <div class="card-text text-white">
                                            <?php
                                            foreach($errors as $error){
                                               echo $error. "<br/>";
                                            }
                                            

                                            ?>
                                        </div>
                                    </div>

                                    <?php
                                 }else{
                                     echo "pas d'erreurs";
                                 }
                            }
                            ?>
                            <div class="input-group form-group">
                                <label for="login">Pseudo</label>
                                <input type="text" name="login" id="login" class="form-control" required>
                            </div>
                            <div class="input-group form-group">
                                <label for="password">Mot de passe</label>
                                <input type="password" name="mdp" id="password" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>
                                    <input type="checkbox" value="remember-me"> Se souvenir de moi
                                </label>
                                <button class="btn btn-primary" type="submit">Connexion</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>