<?php

function get_posts(){

    global $db;
    $req= $db->query ("SELECT articles.idarticle, 
    articles.titre, 
    articles.image,
    articles.contenu, 
    articles.dateparution,
    users.nom_prenom 
    FROM articles
    JOIN users 
    ON articles.idusers = users.idusers
    WHERE articles.publier= '1'
    ORDER BY dateparution DESC
    LIMIT 0,2");

    $result = array(); //on va mettre les articles dans un tableau
    while ($row = $req ->fetchObject()){ // pour trier chaque resultat (les query) on le met dans fetch
        $result[]= $row;
    }
    return $result;

}