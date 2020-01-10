<?php
require "../../functions/main-func.php";
$db= connexionDB($param);
$texte= $_POST['txt'];
var_dump($texte);
$db->exec("INSERT INTO categories ('nomcateg') VALUES ('$texte')");
?>