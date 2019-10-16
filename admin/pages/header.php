
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
    crossorigin="anonymous"></script>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="css/jquery.bxslider.css">
  <link rel="stylesheet" type="text/css" href="css/isotope.css" media="screen" />
  <link rel="stylesheet" href="css/animate.css">
  <link href="css/stylesheet.css" rel="stylesheet">

  <title>Tableau de bord</title>
</head>

<body>
  <header>
    <nav class="navbar navbar-default navbar-static-top" role="navigation">
      <div class="navigation">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
              data-target=".navbar-collapse.collapse">
              <span class="sr-only">Toggle nav</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <div class="navbar-brand">
              <a href="index.php?page=home">
                <h1><span>Les Amis</span> du clocher </h1>
              </a>
            </div>
          </div>

          <div class="navbar-collapse collapse">
            <div class="menu">
              <ul class="nav nav-tabs" role="tablist">
                <li role="presentation"><a href="index.php?page=home" class="<?php if($page =='Dashboard'){echo 'active';}?>">Accueil</a></li>
                <li role="presentation"><a href="index.php?page=association" class="<?php if($page =='Gestion'){echo 'active';}?>">Gestion</a>
                  <!-- <div role="presentation"><a href="services.html">Nos Objectifs</a></div></li> -->
                <li role="presentation"><a href="index.php?page=actus" class="<?php if($page =='Modo'){echo 'active';}?>">Moderations</a></li>
                <li role="presentation"><a href="index.php?page=galerie" class="<?php if($page =='article'){echo 'active';}?>">Articles</a></li>
                <li role="presentation"><a href="index.php?page=contact" class="<?php if($page =='connexion'){echo 'active';}?>">Connexion/Déconnexion</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </nav>
  </header>
  

