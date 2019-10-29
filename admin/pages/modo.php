<?php

include 'pages/header.php';

?>
<div class="container">
    <h2>Paramêtres</h2>
    <div class="row">

        <div class="col-sm-6 col-xs-12">
            <h4>Modérateurs</h4>
        </div>
        <div class="col-sm-6 col-xs-12">
            <h4>Ajouter un modérateur</h4>
            <?php
            verif();
            
            ?>

            <form method="post">
                <div class="input-group form-group">
                    <div class="row">
                        <!-- <div class="input-group form-group col-sm-12">
                            <label for="login">Pseudo</label>
                            <input type="text" name="login" id="login" class="form-control">
                        </div> -->
                        <div class="input-group form-group col-sm-12">
                            <label for="nom">prénom et nom</label>
                            <input type="text" name="nom_prenom" id="nom" class="form-control" placeholder="Henri Dupont">
                        </div>
                        <div class="input-group form-group col-sm-12">
                            <label for="mail">Adresse email</label>
                            <input type="email" name="email" id="mail" class="form-control" required>
                        </div>
                        <div class="input-group form-group col-sm-12">
                            <label for="mail2">Veuillez confirmer l'adresse mail</label>
                            <input type="email" name="email_again" id="mail2" class="form-control" required>
                        </div>
                        <div class="form-group col-sm-12">
                            <label for="role"> role: </label>

                            <select name="role" id="role">
                                <option value="1">Administrateur</option>
                                <option value="2">Auteur</option>
                                <option value="3">Membre</option>
                            </select>
                        </div>

                        <!-- <div class="input-group form-group">
                                <label for="password">Mot de passe</label>
                                <input type="password" name="mdp" id="password" class="form-control">
                            </div> -->
                        <div class="form-group">

                            <button class="btn btn-primary" type="submit" name="envoyer">Envoyer</button>
                        </div>
            </form>
        </div>
    </div>

</div>