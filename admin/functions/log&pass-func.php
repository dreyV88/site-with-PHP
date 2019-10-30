<?php
function getIdSession()
{
    global $db;
    $req1 = $db->query("SELECT idusers FROM USERS WHERE email ='{$_SESSION['admin2']}'");

    $result = $req1->fetch(PDO::FETCH_OBJ);
    return $result;
}
function is_admin($login, $pwd)
{

    global $db;
    $user = getIdSession();
    $a = [
        'log_In' => $login,
        'password' => sha1($pwd),
        'user' => $user->idusers
    ];
    
    $sql = "UPDATE ON users SET login=:log_In AND mdp=:password WHERE email=:user"; // les : font références au contenu du tableau 
    // var_dump($sql);
    $req = $db->prepare($sql);
    // var_dump($req);
    $req->execute($a); // pour executer le tableau puisque les 2valeurs sont dedans
    // var_dump($req);
    $existe = $req->rowCount($sql);
    // var_dump($existe);
    return $existe;
}