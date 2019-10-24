<?php

function affichArticl(){

    global $db;

    $req= $db->query("SELECT articles.idarticle, 
    articles.titre, 
    articles.image,
    articles.contenu,
    articles.publier,
    articles.dateparution,
    users.nom_prenom 
    FROM articles
    JOIN users
    ON articles.idusers = users.idusers
    WHERE articles.idarticle='{$_GET['id']}'
    ");

    $resultat = $req->fetchObject();
    return $resultat;
}

function getIdSession()
{
    global $db;
    $req1 = $db->query("SELECT idusers FROM USERS WHERE login ='{$_SESSION['admin']}'");

    $result = $req1->fetch(PDO::FETCH_OBJ);
    return $result;
}

function modifier($titre, $content, $publier,$id)
{
    global $db;
    $user = getIdSession();


    $stockPost = [
        'titre'   => $titre,
        'contenu' => $content,
        'auteur'  => $user->idusers,
        'public'  => $publier,
        'id'      => $id
    ];

    $sql = "UPDATE articles 
    SET titre=:titre, contenu=:contenu,  date_modification= NOW(), idusers=:auteur, publier=:public 
    WHERE idarticle=:id";
//  var_dump($sql);
    $req = $db->prepare($sql);
   
    $req->execute($stockPost);
    // var_dump($req);
}