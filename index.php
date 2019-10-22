<?php

include 'functions/main-func.php';
$db = connexionDB($param);
$pages = scandir('pages/'); //scandir scan le contenu d'un dossier
if (isset($_GET['page']) && !empty($_GET['page'])) { // si on saisit directement et si la variable n'est pas vide dans ce cas je peux voir si elle se trouve dans le dossier
    if (in_array($_GET['page'].'.php', $pages)) { // si dans le tableau du scandir qui se trouve dans le variable $pages je recherche une page avec l'extension php
        $page = $_GET['page']; // si c'est bon je lui affiche la page en question
     } else {
        $page = "error"; // sinon c'est une page erreur
     }
} else {
    $page = "home"; // dans le cas ou le visiteur ne remplit rien, il est sur la page home
}

$pages_functions= scandir('functions/');
if(in_array($page.'-func.php', $pages_functions)){
    include 'functions/'.$page. '-func.php';
}
 include 'pages/'.$page.'.php';
?>
 <?php
    $pages_js= scandir('js/');
    if(in_array($page.'-func.js', $pages_js)){
    ?>
      <script type="text/javascript" src="js/<?=$page?>-func.js"></script>
    <?php
       }
    ?>