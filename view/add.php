<?php
include "../database/DBconnect.php";
include "../class/customerManager.php";
include "../class/Customer.php";
$manager = new customerManager();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        label {
            line-height: 1.8;
        }

        body {
            background: darksalmon;
        }

        input {
            position: absolute;
            width: 200px;
            height: 20px;
            left: 80px;
        }
    </style>
</head>
<body>
<form method="post">
    <label>Name</label>
    <input type="text" name="name" placeholder="nameCustomer">
    <br>
    <label>Email</label>
    <input type="email" name="email" placeholder="email">
    <br>
    <label>Address</label>
    <input type="text" name="address" placeholder="address">
    <br>
    <input type="submit" value="Add" onclick="return confirm('Are you sure add into customer table?')">
</form>
<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $customer = new Customer($name, $email, $address);
    $customers = [
        'name' => $customer->getName(),
        'email' => $customer->getEmail(),
        'address' => $customer->getAddress()
    ];
    $manager->insert('customers', $customers);
    header('Location:../index.php');
}

?>
</body>
</html>
