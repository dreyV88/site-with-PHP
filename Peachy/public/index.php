<?php
require_once __DIR__.'/../application/AuthAndMvc.php';

$init = new authAndMvc();

echo "[TEST] Tu es ". $init->getStatus(). " et ". $init->getLogged();

var_dump($_SESSION);