<?php
require_once __DIR__.'/../application/AuthAndMvc.php';

$init = new authAndMvc();

echo "[ADMIN] Tu es ". $init->getStatus();
var_dump($_SESSION);