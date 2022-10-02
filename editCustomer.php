<?php

include_once "DB.php";
include_once "Company.php";
include_once "Customer.php";
include_once "Conversation.php";
include_once "lib/BladeOne.php";

use eftec\bladeone\BladeOne;

$companies=Company::getCompanies();
$conversation=Conversation::getConversation($_GET['id']);

$editCustomer=Customer::getCustomer($_GET['id']);

if(isset($_POST['action']) && $_POST['action']=='update') {
    $editCustomer->name = $_POST['name'];
    $editCustomer->surname = $_POST['surname'];
    $editCustomer->phone = $_POST['phone'];
    $editCustomer->email = $_POST['email'];
    $editCustomer->address = $_POST['address'];
    $editCustomer->position = $_POST['position'];
    $editCustomer->company_id = $_POST['company_id'];
    $editCustomer->updateCustomer();

    $conversation->customer_id = $_POST['id'];
    $conversation->date = $_POST['date'];
    $conversation->conversation = $_POST['conversation'];
    $conversation->editConversation();

    header("location:index.php");
    die();
}

   $bladeEditCust=new BladeOne();
   echo $bladeEditCust->run("editCustomer", ["editCustomer"=>$editCustomer, "companies"=>$companies, "conversation"=>$conversation]);

