<?php
include "../database/DBconnect.php";
include "../class/customerManager.php";
include "../class/Customer.php";
$manager = new customerManager();
$idCustomer = $_GET['id'];
$manager->delete('customers', $idCustomer);
header("Location:../index.php");