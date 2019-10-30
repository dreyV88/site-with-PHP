<?php

function take_info(){
   if(isset($_POST['submit'])){
    $email = htmlspecialchars(trim($_POST['email']));
    $tokken = htmlspecialchars(trim($_POST['tokken']));

    $errors=[];

    if(empty($email)|| empty($tokken)){
        $errors['empty']= "tous les champs n'ont pas été rempli";
    }
} 
}
function is_modo($email, $tokken)
{

    global $db;
    $a = [
        'mail' => $email,
        'password' => ($tokken)
    ];
    
    $sql = "SELECT email,tokken FROM users WHERE email = :mail AND tokken = :tokken"; 
    
    $req = $db->prepare($sql);
    $req->execute($a); 
    $existe = $req->rowCount($sql);
    return $existe;
}
