<?php
function is_admin($login, $pwd)
{

    global $db;
    $a = [
        'log' => $login,
        'password' => sha1($pwd)
    ];
    $sql="SELECT * FROM users WHERE 'login =':'log'AND 'mdp =':'password'"; // les : font références au contenu du tableau 
    $req= $db->prepare($sql);
    $req->execute($a); // pour executer le tableau puisque les 2valeurs sont dedans
    $existe=$req->rowCount($sql);
    return $existe;
}
