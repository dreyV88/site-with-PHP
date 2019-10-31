<?php

function take_info()
{
    if (isset($_POST['submit'])) {
        $email = htmlspecialchars(trim($_POST['email']));
        $tokken = htmlspecialchars(trim($_POST['tokken']));

        $errors = [];

        if (empty($email) || empty($tokken)) {
            $errors['empty'] = "tous les champs n'ont pas été rempli";
        }
        else if(is_modo($email, $tokken)==0){
            $errors['exist']="Ce modérateur n'existe pas";
        }
        if (!empty($errors)) { 
            ?>
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
            }else{
                $_SESSION['admin2']=$email;
                // var_dump($_SESSION['admin2']);
                header('location: index.php?page=logandpass);
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

    $sql = "SELECT email,tokken FROM users WHERE email = :mail AND tokken = :password";

    $req = $db->prepare($sql);
    $req->execute($a);
    // var_dump($a);
    // var_dump($req);
    $existe = $req->rowCount($sql);
    return $existe;
}
