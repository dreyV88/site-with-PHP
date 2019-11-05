<?php

// function get_values(){
    if (isset($_POST['connect'])) {
        $login = htmlspecialchars(trim($_POST['login']));
        $pwd = htmlspecialchars(trim($_POST['mdp']));
        $pwd2 = htmlspecialchars(trim($_POST['mdp_again']));

        $errors = [];

        if (empty($login) || empty($pwd)|| (empty($pwd2))) {
            $errors['empty'] = "tous les champs n'ont pas été rempli";
        }
        else if($pwd !=$pwd2){
            $errors['nomatch']="les mots de passe ne correspondent pas";
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
                update_logpass($login, $pwd);
                
                header('location: index.php?page=dashboard');
            }

    }
// }
function getIdSession()
{
    global $db;
    $req1 = $db->query("SELECT email FROM USERS WHERE email ='{$_SESSION['admin2']}'");

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
    $req = $db->prepare($sql);
    //  var_dump($req);
    // var_dump($a);
    $req->execute($a);
   
    // $existe = $req->rowCount($sql);
    // // var_dump($existe);
    // return $existe;
}
function has_pwd(){
    global $db;
$sql = "SELECT  email FROM users WHERE email = {$_SESSION['admin2']}' AND mdp=''";

$req= $db-> prepare($sql);
$req->execute();
$exist= $req->rowCount($sql);
return $exist;
}
