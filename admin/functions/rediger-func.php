<?php

function post($titre, $content, $publier)
{
   global $db; 
//    function getIdSession(){
//     global $db; 
//     $req1= $db->query("SELECT idusers FROM USERS WHERE login ='{$_SESSION['admin']}'");
//     $results = [];

  
//     while ($rows = $req1->fetchObject()) {
//         $results[] = $rows;
//     }
//     return $results;
//     var_dump($results);
// }
//    $sess=getIdSession();
//    var_dump($sess);
   $stockPost = [
        'titre' => $titre,
        'contenu' => $content,
        'auteur' => $_SESSION['admin'],
        'public' => $publier
    ];
    
$sql= "INSERT INTO articles (titre, contenu, dateparution,idusers,publier) 
VALUES (:titre, :contenu, NOW(), :auteur, :public)";
var_dump($sql);
$req= $db->prepare($sql);

$req->execute($stockPost);
var_dump($stockPost);
// $id= $db->lastInsertId($sql);
// header("location:index.php?page=article&idarticle=".$id);
}
