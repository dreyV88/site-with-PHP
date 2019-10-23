<?php

function affiche(){
    global $db;
    $req= $db->query ("SELECT * FROM articles ORDER BY dateparution DESC ");
    $resultat= [];
    while($row = $req->fetchObject()){
        $resultat[]= $row;
    }
    return $resultat;
}
