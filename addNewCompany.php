<?php

include_once "DB.php";
include_once "Company.php";
include_once "Customer.php";
include_once "Conversation.php";
include_once "lib/BladeOne.php";

use eftec\bladeone\BladeOne;

$addNewCompany=Company::getCompanies();
$bladeNewComp=new BladeOne();
echo $bladeNewComp->run("addNewCompany", ["addNewCompany"=>$addNewCompany]);

if(isset($_POST['action']) && $_POST['action']=='insert'){
    $addNewCompany = new Company(
        $_POST['name'],
        $_POST['address'],
        $_POST['vat_code'],
        $_POST['company_name'],
        $_POST['phone'],
        $_POST['email']);

    $addNewCompany->createCompany();
    header("location:index.php");
    die();
}