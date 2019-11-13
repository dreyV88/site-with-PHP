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

function viewTag(){
    global $db;
    $req= $db-> query("SELECT nommotcle  FROM motclefs ");
    $resultat=[];
    while($row=$req->fetchObject()){
        $resultat[]=$row;
    }return $resultat;
}
function viewCateg(){
    global $db;
    $req= $db-> query("SELECT nomcateg  FROM categories ");
    $resultat=[];
    while($row=$req->fetchObject()){
        $resultat[]=$row;
    }return $resultat;
}
