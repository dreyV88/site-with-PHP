<?php
function is_admin($login, $pwd)
{

    global $db;
    $a = [
        'log_In' => $login,
        'password' => sha1($pwd)
    ];
    
    $sql = "SELECT * FROM users WHERE login = :log_In AND mdp = :password"; // les : font références au contenu du tableau 
    // var_dump($sql);
    $req = $db->prepare($sql);
    // var_dump($req);
    $req->execute($a); // pour executer le tableau puisque les 2valeurs sont dedans
    // var_dump($req);
    $existe = $req->rowCount($sql);
    // var_dump($existe);
    return $existe;
}
