<?php

include_once "DB.php";
include_once "Company.php";
include_once "Customer.php";
include_once "Conversation.php";
include_once "lib/BladeOne.php";
use eftec\bladeone\BladeOne;

//$comp = new Company("Maxima", "Liepu g.71", "LT2300335113", "UAB Maxima", "+37052686787", "maxima@xxx.com","1");
//$comp->create();
//

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

$companies = Company::getCompanies();
$bladeCompanies = new BladeOne();
echo $bladeCompanies->run("companies", ["companies"=>$companies]);

$customers = Customer::getCustomers();
$bladeCustomers = new BladeOne();
echo $bladeCustomers->run("customers",["customers"=>$customers]);


