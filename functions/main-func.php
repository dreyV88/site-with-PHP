<?php
// $dbhost= 'localhost';
// $dbname= 'blog';
// $dbuser='root';
// $dbpwd= 'root';

// try{
// $db = new PDO('mysql:host='. $dbhost .';dbname= '. $dbname, $dbuser,$dbpwd, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8', PDO::ATTR_ERRMODE => PDO:: ERRMODE_WARNING));
// }catch(PDOException $storage){
//     die ('une erreur est survenue lors de la connexion de la base de données: '.$storage->getMessage());
// }
global $db;

session_start();
$param= [
    'driver'=>'mysql',
    'host'=>'localhost',
    'db'=> 'blog',
    // 'user' => 'root',
    // 'password' => ''
    'user'=>'root',
    'password'=>'root'
];
function connexionDB($connex){
    $dsn=$connex['driver']. ':host=' . $connex['host'].';dbname=' . $connex['db'];
    try{
        return new PDO($dsn,$connex['user'],$connex['password']);
        } catch (PDOException $stocks){
            die ('err: '.$stocks->getMessage());
        }
}
$db = connexionDB($param);
// function admin(){

//     if (isset ($_SESSION['admin'])){
//         global $db;
//         $a=[
//             'email'=> $_SESSION['admin'],
//             'role'=>'admin'
//         ];
//         $sql= "SELECT email, idrole FROM users WHERE email=:email AND idrole=:role";
//         $req= $db->prepare($sql);
//         $req ->execute($a);
//         $exist= $req->rowCount($sql);
//         return $exist;
//     } else{
//         return 0
//     }
//     //droit d'accès=1 
//     //Pas de session
//     //Pas d'accès=0
// }
?>