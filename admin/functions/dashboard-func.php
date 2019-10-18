<?php

function inTable($table)
{

    global $db;
    $query = $db->query("SELECT COUNT(*) FROM $table");
    // var_dump($query);
    return $nombre = $query->fetch(); // fetch nous renvera juste le nombre que l'on aura à afficher
}

function getColor($table, $colors)
{
    if (isset($colors[$table])) {
        return $colors[$table];
    } else {
        return "dark";
    }
}

function get_Comments()
{

    global $db;
    $req = $db->query("SELECT commentaire.idcom,
            commentaire.login,
            commentaire.email,
            commentaire.date,
            commentaire.idarticle,
            commentaire.contenu,
            articles.titre
    FROM commentaire
    JOIN articles
    ON commentaire.idarticle = articles.idarticle
    WHERE commentaire.modere='0'
    ORDER BY commentaire.date ASC
    ");

    $results = [];
    while ($rows = $req->fetchObject()) {
        $results[] = $rows;
    }
    return $results;
}
