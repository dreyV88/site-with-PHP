<?php

function affiche(){
    global $db;
    $req= $db->query ("SELECT articles.idarticle, 
    articles.titre, 
    articles.image,
    articles.contenu, 
    articles.dateparution,
    users.nom_prenom,
    COUNT(commentaire.modere) as modere,
    commentaire.contenu as coms
    FROM `articles` 
    LEFT JOIN commentaire 
    ON articles.idarticle= commentaire.idarticle
    LEFT JOIN users
    ON articles.idusers = users.idusers 
    WHERE articles.publier =1
    GROUP by articles.idarticle ");
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
