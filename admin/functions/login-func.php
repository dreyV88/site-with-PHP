<?php
global $is_admin;
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
   if($existe >0){
       $_SESSION['admin']=$login;
   }
    return $existe;
}
  
if (isset($_SESSION['admin'])&& empty($_POST['submit'])){
    header('location: index.php?page=dashboard');
 }
 if(!empty($_POST['submit'])){
    $login = htmlspecialchars(trim($_POST['login']));
    $pwd = htmlspecialchars(trim($_POST['mdp']));
 $is_admin= is_admin($login, $pwd);
 
 }
 