<?php
session_start();
include_once "DB.php";
include_once "Company.php";
include_once "Customer.php";
include_once "Conversation.php";
include_once "Admin.php";
include_once "SuperAdmin.php";
include_once "lib/BladeOne.php";
use eftec\bladeone\BladeOne;

if(isset($_GET['action']) && $_GET['action']=='logout'){
    Admin::logout();
}


$pdo = DB::getPDO();
$message = "";
if (isset($_POST['action'])){
    $p = $_POST['password'];
    $pHash = password_hash($p,PASSWORD_BCRYPT);
//    print_r($pHash);

    $user=Admin::login($_POST['username'], $p);

    if ($user){
        header('location: index.php');
        die();
    }
    else{
        $message = 'Wrong username and/or password';
    }
}



$blade=new BladeOne();
echo $blade->run("login", ["login", "message"=>$message]);