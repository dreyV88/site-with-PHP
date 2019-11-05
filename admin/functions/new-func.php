<?php

global $is_modo;
function is_modo($email, $tokken)
{
   
    global $db;
    $a = [
        'mail' => $email,
        'pwd' => ($tokken)
    ];

    $sql = "SELECT email,tokken FROM users WHERE email = :mail AND tokken = :pwd";
    // var_dump($sql); 

    $req = $db->prepare($sql);
    // var_dump($req);
    $req->execute($a);

    $existe = $req->rowCount($sql);
    if($existe >0){
        $_SESSION['admin2']=$email;
    }
    // var_dump($existe);
    return $existe;
}
if(isset($_POST['submit'])){
    $email = htmlspecialchars(trim($_POST['email']));
    $tokken = htmlspecialchars(trim($_POST['tokken']));
 $is_modo= is_modo($email, $tokken);
 
 }
 if (isset($_SESSION['admin2'])){
    header('location: index.php?page=logandpass');
    exit;
 }
