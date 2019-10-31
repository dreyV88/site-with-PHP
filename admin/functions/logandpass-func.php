<?php

function get_values(){
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
}
function getIdSession()
{
    global $db;
    $req1 = $db->query("SELECT idusers FROM USERS WHERE email ='{$_SESSION['admin2']}'");

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
        'user' => $user->idusers
    ];
    
    $sql = "UPDATE users SET login = :logd AND mdp=:password WHERE idusers=:user"; 
    // var_dump($sql);
    $req = $db->prepare($sql);
    // var_dump($req);
    $req->execute($a); // pour executer le tableau puisque les 2valeurs sont dedans
    var_dump($req);
    var_dump($a);
    // $existe = $req->rowCount($sql);
    // // var_dump($existe);
    // return $existe;
}