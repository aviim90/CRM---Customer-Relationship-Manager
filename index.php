<?php

include_once "DB.php";
include_once "Company.php";
include_once "Customer.php";
include_once "Conversation.php";
include_once "lib/BladeOne.php";
use eftec\bladeone\BladeOne;

//$comp = new Company("Maxima", "Liepu g.71", "LT2300335113", "UAB Maxima", "+37052686787", "maxima@xxx.com","1");
//$comp->create();

$companies = Company::getCompanies();
$bladeCompanies = new BladeOne();
echo $bladeCompanies->run("companies", ["companies"=>$companies]);

$customers = Customer::getCustomers();
$bladeCustomers = new BladeOne();
echo $bladeCustomers->run("customers",["customers"=>$customers]);


