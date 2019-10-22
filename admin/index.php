<?php
error_reporting(E_ERROR);
// if ($page != 'login' && !isset($_SESSION['admin']) && $_HEADERS['HTTP_REFERER'] == '/admin/index.php?page=dashboard')) {
//     header('location: index.php?page=login');
//   }
include '../functions/main-func.php';
$db = connexionDB($param);

$pages = scandir('pages/'); //scandir scan le contenu d'un dossier
if (isset($_GET['page']) && !empty($_GET['page'])) { // si on saisit directement et si la variable n'est pas vide dans ce cas je peux voir si elle se trouve dans le dossier
  if (in_array($_GET['page'] . '.php', $pages)) { // si dans le tableau du scandir qui se trouve dans le variable $pages je recherche une page avec l'extension php
    $page = $_GET['page']; // si c'est bon je lui affiche la page en question
  } else {
    $page = "error"; // sinon c'est une page erreur
  }
} else {
  $page = "login"; // dans le cas ou le visiteur ne remplit rien, il est sur la page home
}

$pages_functions = scandir('./functions/');
if (in_array($page . '-func.php', $pages_functions)) {
  include 'functions/' . $page . '-func.php';
}
include 'pages/' . $page . '.php';

?>
<?php
$pages_js = scandir('../js/');
if (in_array($page . '-func.js', $pages_js)) {
  ?>
  <script type="text/javascript" src="../js/<?= $page ?>-func.js"></script>
<?php
}
?>
<?php
// var_dump($_SESSION);

// die();
// //si je ne suis pas loguer je ne peux acceder au reste du site
// if ($page != 'login' && !isset($_SESSION['admin'])) {
//   header('location: index.php?page=login');
// }else if (isset($_SESSION['admin'])){
//     header('location: index.php?page=dashboard');
// }
