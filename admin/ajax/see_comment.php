<?php
require "../../functions/main-func.php";
$db= connexionDB($param);

$db->exec("UPDATE commentaire SET modere='1' WHERE idcom='{$_POST['id']}'");
?>