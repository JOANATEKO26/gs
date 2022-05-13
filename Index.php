<?php
require_once("../vendor/autoload.php");

use App\Models\RP;
$rp =new RP();
$rp->setLogin("rp3");
$rp->setPassword("rp");
$rp->insert();
echo "<pre>";
RP::selectAll();
var_dump(RP::selectById(1));
echo "</pre>";
