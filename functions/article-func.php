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
    AND articles.publier='1'
    ");

    $resultat= $req->fetchObject();
    return $resultat;
}

function commentaire($login,$email,$contenu){
    global $db;

    $comment=array(
        'logs' =>$login,
        'email' =>$email,
        'com'   =>$contenu,
        'postId' =>$_GET["id"]
    );

    $sql="INSERT INTO commentaire (login, email, contenu, idarticle, date) VALUES(:logs, :email, :com, :postId, NOW())";
    
    $req= $db->prepare($sql);
    $req->execute($comment);
}

function get_comments(){
    global $db;

    $req = $db->query("SELECT * FROM commentaire WHERE idarticle ='{$_GET['id']}' ORDER BY date DESC");
    $results=[];
    while($rows = $req->fetchObject()){
        $results []= $rows;
    }
    return $results;
}

?>