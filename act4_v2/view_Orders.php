<?php 
    require_once 'core/dbConfig.php';
    require_once 'core/displayData.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Orders</title>
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
        <a href="index.php">Return to home</a>
        <h1>Add New Order</h1>
        
        <form action="core/handleForms.php?customer_id=<?= $_GET['customer_id']; ?>" method="POST">
            <p>
                <label for="order_Name">Product Name</label> 
                <input type="text" name="order_Name">
            </p>
            <p>
                <label for="order_Quantity">Quantity</label> 
                <input type="text" name="order_Quantity">
            </p>
            <p>
                <label for="order_Price">Total Price</label> 
                <input type="text" name="order_Price">
                
                <input type="submit" name="add_Order_Btn">
            </p>
        </form>

        <table style="width:100%; margin-top: 50px;">
            <tr>
                <th>Order ID</th>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Total Price</th>
                <th>Customer</th>
                <th>Date Added</th>
                <th>Action</th>
            </tr>
            <?php $getAllOrders_OfCustomer = getAllOrders_OfCustomer($pdo, $_GET['customer_id']); ?>
            <?php foreach ($getAllOrders_OfCustomer as $row) { ?>
                <tr>
                    <td><?= $row['order_id']; ?></td>	  	
                    <td><?= $row['order_Name']; ?></td>	  	
                    <td><?= $row['order_Quantity']; ?></td>	  	
                    <td><?= $row['order_Price']; ?></td>
                    <td><?= $row['customer']; ?></td>
                    <td><?= $row['date_added']; ?></td>
                    <td>
                        <a href="edit_Order.php?order_id=<?= $row['order_id']; ?>&customer_id=<?= $_GET['customer_id']; ?>">Edit</a>

                        <a href="del_Order.php?order_id=<?= $row['order_id']; ?>&customer_id=<?= $_GET['customer_id']; ?>">Delete</a>
                    </td>	  	
                </tr>
        <?php } ?>
        </table>
    </body>
</html>