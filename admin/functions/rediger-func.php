<?php
function getIdSession()
{
    global $db;
    $req1 = $db->query("SELECT idusers FROM USERS WHERE login ='{$_SESSION['admin']}'");

    $result = $req1->fetch(PDO::FETCH_OBJ);
    return $result;
}

function post($titre, $content, $publier)
{
    global $db;
    $user = getIdSession();


    $stockPost = [
        'titre' => $titre,
        'contenu' => $content,
        'auteur' => $user->idusers,
        'public' => $publier
    ];

    $sql = "INSERT INTO articles (titre, contenu, dateparution,idusers,publier) 
    VALUES (:titre, :contenu, NOW(), :auteur, :public)";

    $req = $db->prepare($sql);

    $req->execute($stockPost);
    // var_dump($db->errorInfo());

    // if ($db->errorCode() != 0) {
    //     header("location: erro.php");
    // } else {
    //     $id = $db->lastInsertId($sql);
    //     header('location: index.php?page=article&idarticle=' . $id);
    // }
}

function post_img($tmp_name, $extension)
{
    global $db;
    $id = $db->lastInsertId();
    $i = [
        'id' => $id,
        'img' => $id.$extension
    ];
    $sql = "UPDATE articles SET image= :img WHERE id=:id";
    $req = $db->prepare($sql);
    $req->execute($i);
    var_dump($db->errorCode());
    move_uploaded_file($tmp_name, "../images/img_blog/" . $id.$extension);
    var_dump($_FILES["file"]["error"]);
    // header('location: index.php?page=article&idarticle=' . $id);
}
