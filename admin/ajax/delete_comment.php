<?php
require "../../functions/main-func.php";
$db= connexionDB($param);

$db->exec("DELETE FROM commentaire 

WHERE idcom='{$_POST['id']}'");
