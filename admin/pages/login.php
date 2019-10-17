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
                            <h3 class="card-title font-weight-normal">Veuillez vous enregistrer</h3>
                            <label for="nom">Nom et prenom</label>

                            <input type="text" name="nom_prenom" id="nom" class="form-control" required>
                            <div class="input-group form-group">
                                <label for="mail">Adresse email</label>
                                <input type="email" name="email" id="mail" class="form-control" required>
                            </div>
                            <div class="input-group form-group">
                                <label for="login">Pseudo</label>
                                <input type="text" name="login" id="login" class="form-control" required>
                            </div>
                            <div class="input-group form-group">
                                <label for="password">Mot de passe</label>
                                <input type="password" name="mdp" id="password" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <select name="role" id="role">
                                    <label for="role"> inscription en tant que: </label>
                                    <option value="1">Admin</option>
                                    <option value="2">Auteur</option>
                                    <option value="3">Membre</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>
                                    <input type="checkbox" value="remember-me"> Se souvenir de moi
                                </label>
                                <button class="btn btn-primary" type="submit">S'enregistrer</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>