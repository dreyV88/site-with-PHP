<?php
include 'pages/header.php';

?>
<div class="container">
    <article>
        <div class="col-md-3">
            <ul class="nav nav-pills nav-stacked" id="myTab" role="tablist">
                <li class="nav-item"><a class="nav-link active" id="home-tab" data-toggle="pill" href="#home" role="tab" aria-controls="home" aria-selected="true">Mon compte</a></li>
                <li class="nav-item"><a class="nav-link active" id="profile-tab" data-toggle="pill" href="#profile" role="tab" aria-controls="profile" aria-selected="true">Mon profil</a></li>

                <li class="nav-item"><a class="nav-link" id="comment-tab" data-toggle="pill" href="#comment" role="tab" aria-controls="comment" aria-selected="true">Mes commentaires</a></li>
                <li class="nav-item"><a class="nav-link" id="contact-tab" data-toggle="pill" href="#contact" role="tab" aria-controls="contact" aria-selected="true">Mon Adhesion</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Soumetre un événement </a></li>
            </ul>
        </div>

        <div class="col-md-9 tab-content" id="myTabContent" style="border-left: 4px solid #098137;">
            <div class="tab-pane fade in active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <H2>Généralités</H2>
                <p>Récapitulatif des éléments de votre compte</p>
                <button class="btn btn-primary" > Modifier profil</button> <button class="btn btn-primary" href="#contact"> Modifier contact</button> <button class="btn btn-primary"> résilier mon compte</button>

            </div>
            <div class="tab-pane fade in" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <H2>Mon Profil</H2>
                <p>Modifier mon profil de membre</p>
                <form method="post">
                    <div class="row">
                        
                            <div class="form-group col-sm-12">
                                <label for="content">Nom et prénom</label>
                                <input type="text" name="login" id="login" class="form-control" placeholder="Sasha Munez">
                            </div>
                
                            <div class="form-group col-sm-12">
                                <label for="content">Modifier mon login</label>
                                <input class="form-control" style="color:darkgray; height:auto;" name="contenu" id="content">
                            </div>
                            <div class="form-group col-sm-12">
                                <label for="content">Modifier mon mot de passe</label>
                                <input type="password" name="mdp" id="password" class="form-control">
                            </div>
                    </div>
                    <button class="btn btn-primary" type="submit" name="submit"> Modifier le profil</button>
                </form>
            </div>
            <div class="tab-pane fade in" id="comment" role="tabpanel" aria-labelledby="comment-tab">
                <p>...</p>
            </div>
            <div class="tab-pane fade in" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                <p>...</p>
            </div>
        </div>
    </article>
</div>
<?php
include 'pages/footer.php';

?>