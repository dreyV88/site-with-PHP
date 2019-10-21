<?php

function post($titre, $content, $publier)
{
   global $db; 
   
   $stockPost = [
        'titre' => $titre,
        'contenu' => $content,
        'auteur' => $_SESSION['admin'],
        'public' => $publier
    ];
    
$sql= "INSERT INTO articles (titre, contenu, dateparution,idusers,publier) 
VALUES (:titre, :contenu, NOW(), :auteur, :public)";

$req= $db->prepare($sql);
echo $sql;
$req->execute($stockPost);

$id= $db->lastInsertId('idarticle');
header("location:index.php?page=article&idarticle=".$id);
}
