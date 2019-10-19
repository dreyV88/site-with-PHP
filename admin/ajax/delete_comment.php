<?php
require "../../functions/main-func.php";

$db->exec("DELETE FROM commentaire 

WHERE idcom='{$_POST['id']}'");
