<?php

function verif()
{
    if (isset($_POST['envoyer'])) {
        
        $name = htmlspecialchars(trim($_POST['nom_prenom']));
        $email = htmlspecialchars(trim($_POST['email']));
        $email2 = htmlspecialchars(trim($_POST['email_again']));
        $role = htmlspecialchars(trim($_POST['role']));
        $tokken = tokken(30);

        $errors = [];
        if ( empty($name) || empty($email) || empty($email2)) {
            $errors['empty'] = "veuillez remplir tous les champs";
        }
        if ($email != $email2) {
            $errors['different'] = "Les adresses email ne correspondent pas";
        }
        if (email_taken($email)) {
            $errors['taken'] = "l'adresse est déjà assignée à quelqu'un";
        }
        if (!empty($errors)) { ?>
            <div class="card bg-warning" style="height: 30px">
                <div class="card-body text-center text-white">

                    <?php
                                foreach ($errors as $error) {
                                    echo $error . "<br>";
                                }

                                ?>

                </div>
            </div>
<?php

        } else {
            add_modo($name, $email, $role, $tokken);
        }
    }
}

function email_taken($email)
{
    global $db;

    $e = ['email' => $email];

    $sql = "SELECT email FROM users WHERE email= :email";
    $req = $db->prepare($sql);
    $req->execute($e);

    $free = $req->rowCount($sql);

    return $free;
}

function tokken($length){
    $chars="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    return substr(str_shuffle(str_repeat($chars,$length)),0,$length);
}
function add_modo($name, $email, $role, $tokken){
    global $db;
    $modo = [
        'nom'=>$name,
        'email'=>$email, 
        'token'=>$tokken,       
        'role'=>$role   
    ];
    $sql="INSERT INTO users (nom_prenom, email, tokken, role, idrole) VALUES(:nom, :email,:token, :role, :role)";
    $req = $db->prepare($sql);   
    $req->execute($modo);

    $subject ="Bienvenue sur notre site";
    $msg='<html lang="en" style="font-family:Georgia, Times New Roman, Times, serif">
    <head>
        <meta charset="UTF-8">
        <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title> -->
    </head>
    <body>
        Voici vos identifiant et code unique pour acceder   <a href="http://localhost/stage_back/admin/index.php?page=new">au blog</a> <br>
        identifiant: '.$email.' <br>
        mot de passe: '.$tokken.' <br>
        vous êtes: '.$role.' sur notre blog <br>
        <br> Après avoir inseré ces informations, vous devrez choisir votre login et mot de passe.
        
    </body>
    </html>
    
    ';
    $header="MIME-version: 1.0\r\n";
    $header.= "content-type: text/html;charset=UTF-8\r\n";
    $header.='from: no-reply@blogduclocher.com' . "\r\n". 'Reply-to:contact@blogduclocher.com'. "\r\n";

    mail($email,$subject,$msg,$header);
}