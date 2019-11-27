<?php

function get_article()
{
    global $db;
    $getID=$_GET['id'];
    $req = $db->query("SELECT articles.idarticle, 
    articles.titre, 
    articles.image,
    articles.contenu, 
    articles.dateparution,
    users.nom_prenom 
    FROM articles
    JOIN users
    ON articles.idusers = users.idusers
    WHERE articles.idarticle='$getID'
    AND articles.publier='1'
    ");

    $resultat = $req->fetchObject();
    return $resultat;
}

function commentaire($login, $email, $contenu)
{
    global $db;
    $getID=$_GET['id'];
    $comment = array(
        'logs' => $login,
        'email' => $email,
        'com'   => $contenu,
        'postId' => $getID
    );

    $sql = "INSERT INTO commentaire (login, email, contenu, idarticle, date) VALUES(:logs, :email, :com, :postId, NOW())";

    $req = $db->prepare($sql);
    $req->execute($comment);
}

function get_comments()
{
    global $db;
    $getID=$_GET['id'];
    $req = $db->query("SELECT * FROM commentaire WHERE idarticle =$getID AND modere = 1 ORDER BY date DESC");
    $results = [];

    while ($rows = $req->fetchObject()) {
        $results[] = $rows;
    }
    return $results;
}
