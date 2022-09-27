<?php

include_once "DB.php";
include_once "Company.php";
include_once "Customer.php";
include_once "Conversation.php";
include_once "lib/BladeOne.php";

use eftec\bladeone\BladeOne;

$addCustomer=Company::getCompanies();
$bladeNewCust=new BladeOne();
echo $bladeNewCust->run("addNewCustomer", ["addNewCustomer"=>$addCustomer]);

if(isset($_POST['action']) && $_POST['action']=='insert'){
    $addNewCustomer = new Customer(
        $_POST['name'],
        $_POST['surname'],
        $_POST['phone'],
        $_POST['email'],
        $_POST['address'],
        $_POST['position'],
        $_POST['company_id']);

    $addNewCustomer->addCustomer();
    $conversation = new Conversation($_POST['id'], $addNewCustomer->id, $_POST['date'], $_POST['conversation']);
    $conversation->addConversation();
    header("location:index.php");
    die();
}

