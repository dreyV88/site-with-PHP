<?php

function affiche()
{
    global $db;
    $req = $db->query("SELECT articles.idarticle, 
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
    GROUP by articles.idarticle
    ORDER BY articles.idarticle DESC
    LIMIT 0,5");
    $resultat = [];
    while ($row = $req->fetchObject()) {
        $resultat[] = $row;
    }
    return $resultat;
}

function viewTag()
{
    global $db;
    $req = $db->query("SELECT nommotcle  FROM motclefs ");
    $resultat = [];
    while ($row = $req->fetchObject()) {
        $resultat[] = $row;
    }
    return $resultat;
}
function viewCateg()
{
    global $db;
    $req = $db->query("SELECT nomcateg  FROM categories ");
    $resultat = [];
    while ($row = $req->fetchObject()) {
        $resultat[] = $row;
    }
    return $resultat;
}

function Pagination()
{
    global $db;
    $articlePerPage = 5;
    
    
    $ArtTotalReq = $db->query('SELECT idarticle FROM articles');
    $TotalPage = $ArtTotalReq->rowCount();
    if(isset($_GET['page']) AND !empty($_GET['page']) AND $_GET['page']>0)
    {
        $_GET['page']=intval($_GET['page']);
        $CurrentPage = $_GET['page'];
    }else{
        $CurrentPage = 1;
    }
    $depart= ($CurrentPage-1)*$articlePerPage;
}
