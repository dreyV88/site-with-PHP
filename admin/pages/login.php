<?php
if (isset($_SESSION['admin'])) {
    header("location:index.php?page=dashboard");
}
?>
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
                            <!-- tester si on a rempli les champs -->
                            <?php
                            if (isset($_POST['submit'])) {
                                // htlmspacial evite injection d'HTML et permet la compréhension du mail par les navigateurs et trim coupe au cas ou il y ait des espaces dans le mai
                                $login = htmlspecialchars(trim($_POST['login']));
                                $pwd = htmlspecialchars(trim($_POST['mdp']));
                                $errors = [];
                                if (empty($login) || empty($pwd)) {
                                    $errors['empty'] = "champ(s) manquant";
                                    //test si les valeurs n'existent pas
                                } else if (is_admin($login, $pwd) == 0) {
                                    $errors['existe'] = "Cet administrateur n'existe pas";
                                }
                                // si le tableau d'erreur n'est pas vide alors j'affiche soit 'empty' soit 'existe'
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
                                    // après tous les test si le login et mdp sont dans la BDD je peux accéder au dashboard
                                } else {
                                    $_SESSION['admin'] = $login;
                                    header('location:index.php?page=dashboard');
                                }
                            }
                            ?>
                            <div class="input-group form-group">
                                <label for="login">Pseudo</label>
                                <input type="text" name="login" id="login" class="form-control">
                            </div>
                            <div class="input-group form-group">
                                <label for="password">Mot de passe</label>
                                <input type="password" name="mdp" id="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>
                                    <input type="checkbox" value="remember-me"> Se souvenir de moi
                                </label>
                                <button class="btn btn-primary" type="submit" name="submit"><i class="fa fa-user"> Connexion</i></button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>