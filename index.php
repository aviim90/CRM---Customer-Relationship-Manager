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



$user=Admin::auth();


if(isset($_GET['deleteCompany_id'])){
    $company=Company::getCompany($_GET['deleteCompany_id']);
    $company->deleteCompany();
    header("location:index.php");
    die();
}

if(isset($_GET['deleteCustomer_id'])){
    $company=Customer::getCustomer($_GET['deleteCustomer_id']);
    $company->deleteCustomer();
    header("location:index.php");
    die();
}

$navBar=new BladeOne();
echo $navBar->run("nav", ["nav", "user"=>$user]);

$companies = Company::getCompanies();
$bladeCompanies = new BladeOne();
echo $bladeCompanies->run("companies", ["companies"=>$companies, "user"=>$user]);

$customers = Customer::getCustomers();
$bladeCustomers = new BladeOne();
echo $bladeCustomers->run("customers",["customers"=>$customers, "user"=>$user]);


