<?php
global $update_logpass;
function getIdSession()
{
    global $db;

    $req1 = $db->query("SELECT email FROM USERS WHERE email ='{$_SESSION['admin2']}'");
    // var_dump($req1);
    $result = $req1->fetch(PDO::FETCH_OBJ);
    return $result;
}
function update_logpass($login, $pwd)
{
    global $db;
    $user = getIdSession();
    $a = [
        'logd' => $login,
        'password' => sha1($pwd),
        'user' => $user->email
    ];

    $sql = "UPDATE users SET login= :logd AND mdp=:password WHERE email=:user";
    // var_dump($sql);
    $sql2= "SELECT login FROM USERS WHERE email ='{$_SESSION['admin2']}'";
    $req = $db->prepare($sql);
    // var_dump($req);
    var_dump($a);
    $req->execute($a);
    $req2 = $db->prepare($sql2);
    $req2->execute($a);
    $existe = $req2->rowCount($sql2);
    var_dump($req);
    if ($existe > 0) {
        unset($_SESSION['admin2']);
        $_SESSION['admin'] = $login;
    }
    return $existe;

    // $existe = $req->rowCount($sql);
    // // var_dump($existe);
    // return $existe;
}
function rez_tokken()
{
    global $db;
    $sql = "UPDATE users SET tokken= '' WHERE email= {$_SESSION['admin2']}";

    $req = $db->prepare($sql);
    $req->execute();
}
function has_pwd()
{
    global $db;
    $sql = "SELECT  email FROM users WHERE email = {$_SESSION['admin2']}' AND mdp=''";

    $req = $db->prepare($sql);
    $req->execute();

    $exist = $req->rowCount($sql);
    if ($exist == 1) {
        rez_tokken();
    }
    return $exist;
}
if (isset($_POST['connect'])) {
    $login = htmlspecialchars(trim($_POST['login']));
    $pwd = htmlspecialchars(trim($_POST['mdp']));
    $update_logpass = update_logpass($login, $pwd);
}
if (isset($_SESSION['admin'])) {
    header('location: index.php?page=dashboard');
    exit;
}
