<?php

function affiche(){
    global $db;
    $req= $db->query ("SELECT articles.idarticle, 
    articles.titre, 
    articles.image,
    articles.contenu, 
    articles.dateparution,
    users.nom_prenom
    -- commentaire.modere 
    FROM articles
    JOIN users
    ON articles.idusers = users.idusers 
    -- INNER JOIN commentaire
    -- ON articles.idarticle = commentaire.idarticle
    WHERE articles.publier='1' ORDER BY articles.dateparution DESC ");
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
