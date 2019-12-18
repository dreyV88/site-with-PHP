<?php
global $update_logpass;
// global $hazpwd;
function getIdSession()
{
    global $db;
    $mySession= $_SESSION['admin2'];
    $req1 = $db->query("SELECT email FROM USERS WHERE email = '$mySession'");
    var_dump($req1);
    $result = $req1->fetch(PDO::FETCH_OBJ);
    return $result;
}
function update_logpass($login, $pwd)
{
    global $db;
    $mySession= $_SESSION['admin2'];
    $user = getIdSession();
    $a = [
        'logd' => $login,
        'password' => sha1($pwd),
        'user' => $user->email
    ];

    $sql = "UPDATE users SET login= :logd, mdp=:password WHERE email=:user";
    // var_dump($sql);
    $sql2= "SELECT login FROM USERS WHERE email ='$mySession'";
    $req = $db->prepare($sql);
    // var_dump($req);
    // var_dump($a);
    $req->execute($a);
    $req2 = $db->prepare($sql2);
    $req2->execute($a);
    $existe = $req2->rowCount($sql2);
    // var_dump($req);
    if ($existe > 0) {
        // var_dump($existe);
        unset($_SESSION['admin2']);
        $_SESSION['admin'] = $login;
        has_pwd();
    // var_dump ($hazpwd);
    }
    // return $existe;

    // $existe = $req->rowCount($sql);
    // // var_dump($existe);
    // return $existe;
}
function rez_tokken()
{
    global $db;
    $a = [
        'logd' => $_SESSION['admin']
    ];
    $sql = "UPDATE users SET tokken= '' WHERE login= :logd";

    $req = $db->prepare($sql);
    $req->execute($a);
}
function has_pwd()
{
    global $db;
    $a = [
        'logd' => $_SESSION['admin']
    ];
    $sql = "SELECT login FROM users WHERE login = :logd AND mdp IS NOT NULL";
    // var_dump($a);
    $req = $db->prepare($sql);
    $req->execute($a);
    // var_dump($req);
    $exist = $req->rowCount($sql);
    // var_dump($exist);
    if ($exist == 1) {
        rez_tokken();
    }
    return $exist;
    // var_dump($exist);
}
if (isset($_POST['connect'])) {
    $login = htmlspecialchars(trim($_POST['login']));
    $pwd = htmlspecialchars(trim($_POST['mdp']));
    $pwd2 = htmlspecialchars(trim($_POST['mdp_again']));
    
    $errors = [];

        if (empty($login) || empty($pwd)|| (empty($pwd2))) {
            $errors['empty'] = "tous les champs n'ont pas été remplis";
        }
        else if($pwd !=$pwd2){
            $errors['nomatch']="les mots de passe ne correspondent pas";
        }
       $update_logpass = update_logpass($login, $pwd);
       
}

if (isset($_SESSION['admin'])) {
    header('location: index.php?page=dashboard');
    exit;}

