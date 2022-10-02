<?php

include_once "DB.php";
include_once "Company.php";
include_once "Customer.php";
include_once "Conversation.php";
include_once "lib/BladeOne.php";

use eftec\bladeone\BladeOne;

$editCompany = Company::getCompany($_GET['id']);

if(isset($_POST['action']) && $_POST['action']=='update') {
    $editCompany->name = $_POST['name'];
    $editCompany->address = $_POST['address'];
    $editCompany->vat_code = $_POST['vat_code'];
    $editCompany->company_name = $_POST['company_name'];
    $editCompany->phone = $_POST['phone'];
    $editCompany->email = $_POST['email'];
    $editCompany->saveCompany();

    header("location:index.php");
    die();
}
    $bladeEditComp=new BladeOne();
    echo $bladeEditComp->run("editCompany", ["editCompany"=>$editCompany]);
