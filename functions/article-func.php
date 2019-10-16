<?php

function get_article(){
    global $db;

    $req = $db->query("SELECT articles.idarticle, 
    articles.titre, 
    articles.image,
    articles.contenu, 
    articles.dateparution,
    users.nom_prenom 
    FROM articles
    JOIN users
    ON articles.idusers = users.idusers
    WHERE articles.idarticle='{$_GET['id']}'
    ");

    $resultat= $req->fetchObject();
    return $resultat;
}

function commentaire($log,$mail,$comms){
    global $db;

    $com=array(
        'login' =>$log,
        'email' =>$mail,
        'com'   =>$comms,
        'postId' =>$_GET["id"]
    );

    $sql="INSERT INTO commentaire (login, email, contenu, idarticle, date) VALUES(:login, :email, :com, :postId, NOW())";
    var_dump($sql);
    $req= $db->prepare($sql);
    $req->execute($com);
}
?>