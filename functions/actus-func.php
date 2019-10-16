<?php

function affiche(){
    global $db;
    $req= $db->query ("SELECT * FROM articles WHERE publier='1' ORDER BY dateparution DESC ");
    $resultat= [];
    while($row = $req->fetchObject()){
        $resultat[]= $row;
    }
    return $resultat;
}


