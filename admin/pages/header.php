<?php
// if ($page !='new'&& $page != 'login' && !isset($_SESSION['admin'])) {
//     header('location: index.php?page=login');
//   }

?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../css/font-awesome.min.css">
  <link rel="stylesheet" href="../css/jquery.bxslider.css">
  <link rel="stylesheet" type="text/css" href="../css/isotope.css" media="screen" />
  <link rel="stylesheet" href="../css/animate.css">
  <link href="../css/stylesheet.css" rel="stylesheet"> 
  <link rel="stylesheet" href="../css/trumbowyg.min.css">
  <script>
    src="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.19.1/langs/fr.min.js"
</script>
  <title>Tableau de bord</title>
</head>

<body>
  <header>
    <nav class="navbar navbar-default navbar-static-top" role="navigation">
      <div class="navigation">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbarmobile">
              <span class="sr-only">Toggle nav</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>

            <div class="navbar-brand">
              <a href="index.php?page=dashboard">
                <h1><span>Tableau</span> de bord </h1>
              </a>
            </div>
          </div>
          <div class="collapse" id="navbarmobile">
            <ul class="nav-tabs" role="tablist" style="margin-top: 3.2rem;">
              <li role="presentation"><a href="index.php?page=dashboard" class="<?php if ($page == 'Dashboard') {echo 'active';} ?>">Accueil</i></a></li>
              <li role="presentation"><a href="index.php?page=rediger" class="<?php if ($page == 'rediger') {echo 'active';} ?>">Articles</a></li>
              <li role="presentation"><a href="index.php?page=listing" class="<?php if ($page == 'listing') {echo 'active';} ?>">Listing</a>
              <li role="presentation"><a href="index.php?page=modo" class="<?php if ($page == 'modo') {echo 'active';} ?>">Modération</a>
              <li role="presentation"><a href="index.php?page=login" class="<?php if ($page == 'login') {echo 'active';} ?>">Connexion</a>
              <li role="presentation"><a href="index.php?page=logout" class="<?php if ($page == 'logout') {echo 'active';} ?>">Déconnexion</a></li>
              <li role="presentation"><a href="../index.php?page=home">Quitter</a></li>
            </ul>
          </div>


          <div class="navbar-collapse collapse">
            <div class="menu">
              <ul class="nav nav-tabs" role="tablist">
                <li role="presentation"><a href="index.php?page=dashboard" class="<?php if ($page == 'Dashboard') {echo 'active';} ?>"><i class="glyphicon glyphicon-home"></i></a></li>
                <li role="presentation"><a href="index.php?page=listing" class="<?php if ($page == 'listing') {echo 'active';} ?>"><i class="glyphicon glyphicon-th-list"></i></a>
                  <!-- <div role="presentation"><a href="services.html">Nos Objectifs</a></div></li> -->
                <li role="presentation"><a href="index.php?page=modo" class="<?php if ($page == 'Modo') {echo 'active';} ?>"><i class="glyphicon glyphicon-flag"></i></a></li>
                <li role="presentation"><a href="index.php?page=rediger" class="<?php if ($page == 'rediger') {echo 'active';} ?>"><i class="glyphicon glyphicon-pencil"></i></a></li>
                <li role="presentation"><a href="index.php?page=login" class="<?php if ($page == 'login') {echo 'active';} ?>"><i class="glyphicon glyphicon-log-in"></i></a>
                <li role="presentation"><a href="index.php?page=logout" class="<?php if ($page == 'logout') { echo 'active';} ?>"><i class="glyphicon glyphicon-log-out"></i></a></li>
                <li role="presentation"><a href="../index.php?page=home"><i class=" glyphicon glyphicon-off "></i></a></li>

              </ul>
            </div>
          </div>
        </div>
      </div>
    </nav>
  </header>