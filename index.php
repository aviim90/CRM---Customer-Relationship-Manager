<?php

include_once "DB.php";
include_once "Companys.php";

$comp = new Company("Maxima", "Liepu g.71", "LT2300335113", "UAB Maxima", "+37052686787", "maxima@xxx.com","1");
$comp->create();

?>


<table border="1">
    <?php foreach (Company::getCompanys() as $company){ ?>
        <tr>
            <td><?=$company->name?></td>
            <td><?=$company->address?></td>
            <td><?=$company->vat_code?></td>
            <td><?=$company->company_name?></td>
            <td><?=$company->phone?></td>
            <td><?=$company->email?></td>
        </tr>
    <?php } ?>
</table>
