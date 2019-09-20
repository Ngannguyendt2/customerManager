<?php
include "database/DBconnect.php";
include "class/customerManager.php";
include "class/Customer.php";
$manager = new customerManager();
$customers = $manager->convertArraytoObject($manager->getAll('customers'));
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style type="text/css">
        table, th, td {
            border: 1px solid #ccc;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        tr:hover {
            background-color: #ddd;
            cursor: pointer;
            padding: 10px;
        }

        td, tr {
            font-size: 20px;
        }

    </style>
</head>
<body>
<label><h1 align="center">CUSTOMER</h1></label>
<h2><a href="view/add.php">Add</a></h2>
<table>
    <tr>
        <td align="center"><b>ID</b></td>
        <td align="center"><b>Name</b></td>
        <td align="center"><b>Email</b></td>
        <td align="center"><b>Address</b></td>
        <td align="center"><b>Delete</b></td>
        <td align="center"><b>Update</b></td>
    </tr>
    <?php
    foreach ($customers as $key => $customer):
        ?>
        <tr>
            <td align="center"><?php echo ++$key ?></td>
            <td align="center"><?php echo $customer->getName() ?></td>
            <td align="center"><?php echo $customer->getEmail() ?></td>
            <td align="center"><?php echo $customer->getAddress() ?></td>
            <td align="center"><a href="view/delete.php?id=<?php echo $customer->getID() ?>"
                                  onclick="return confirm('Are you sure want to delete?')">Delete</a></td>
            <td align="center"><a href="view/update.php?id=<?php echo $customer->getID() ?>">Update</a></td>
        </tr>
    <?php endforeach; ?>
</table>
</body>
</html>
