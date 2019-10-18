<?php

function inTable($table){

    global $db;
    $req= $db->query("SELECT COUNT(id.$table) FROM $table");
    var_dump($req);
    return $nombre= $req->fetch(); // fetch nous renvera juste le nombre que l'on aura à afficher
}