<?php
function is_admin($login, $pwd)
{

    global $db;
    $a = [
        'log' => $login,
        'password' => $pwd
    ];
    $sql="SELECT * FROM users WHERE login=:'log'AND mdp=:'password'"; // les : font références au contenu du tableau 
}
