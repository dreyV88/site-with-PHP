<?php
error_reporting(E_ERROR);

include '../functions/main-func.php';


$pages = scandir('pages/'); //scandir scan le contenu d'un dossier
if (isset($_GET['page']) && !empty($_GET['page'])) { // si on saisit directement et si la variable n'est pas vide dans ce cas je peux voir si elle se trouve dans le dossier
  if (in_array($_GET['page'] . '.php', $pages)) { // si dans le tableau du scandir qui se trouve dans le variable $pages je recherche une page avec l'extension php
    $page = $_GET['page']; // si c'est bon je lui affiche la page en question
  } else {
    $page = "error"; // sinon c'est une page erreur
  }
} else {
  $page = "dashboard"; // dans le cas ou le visiteur ne remplit rien, il est sur la page home
}

$pages_functions = scandir('./functions/');
if (in_array($page . '-func.php', $pages_functions)) {
  include 'functions/' . $page . '-func.php';
}


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
  <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.css" rel="stylesheet">
  <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.js"></script>
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../css/font-awesome.min.css">
  <link rel="stylesheet" href="../css/jquery.bxslider.css">
  <link rel="stylesheet" type="text/css" href="../css/isotope.css" media="screen" />
  <link rel="stylesheet" href="../css/animate.css">
  <link href="../css/stylesheet.css" rel="stylesheet"> 

  <title><?=$_GET['page']?></title>
</head>

<body>
  <?php
  if ($page !='new' && $page != 'login'  && !isset($_SESSION['admin'])&& !isset($_SESSION['admin2'])) {
      header('location: index.php?page=login');
     }
    //else if (isset($_SESSION['admin'])){
    //     header('location: index.php?page=dashboard');
    // }  
    include 'pages/header.php'
    ?>
    <!-- <div class="container"> -->
    <?php
    include 'pages/' . $page . '.php';
  ?>
  <!-- </div> -->
<?php
$pages_js = scandir('../js/');
if (in_array($page . '-func.js', $pages_js)) {
  ?>
  <script type="text/javascript" src="../js/<?= $page ?>-func.js"></script>
<?php
}
?>

<?php
include 'pages/footer.php';
// var_dump($_SESSION);

// die();
// //si je ne suis pas loguer je ne peux acceder au reste du site
// if ($page !='new' && $page != 'login'  && !isset($_SESSION['admin'])) {
//   header('location: index.php?page=login');
// }else if (isset($_SESSION['admin'])){
//     header('location: index.php?page=dashboard');
// }
