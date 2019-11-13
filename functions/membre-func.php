<?php

function get_Membrer(){
    global $db;
    $req= $db->query ("SELECT nom_prenom, login FROM users");
    $resultat= [];
    while($row = $req->fetchObject()){
        $resultat[]= $row;
    }
    return $resultat;
}

function change_Membre(){
    if(isset($_POST)){
    $login = htmlspecialchars(trim($_POST['login']));
    $pwd = htmlspecialchars(trim($_POST['mdp']));
    $pwd2 = htmlspecialchars(trim($_POST['mdp']));

    }
}