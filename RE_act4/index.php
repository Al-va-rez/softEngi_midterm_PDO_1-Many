<?php 
    require_once 'core/dbConfig.php';
    require_once 'core/displayData.php';
?>

<!-- UPDATES/IMPROVEMENTS: -->
<!-- 1. Screen that shows all projects and assigned developers -->
<!-- 2. Menu Screen -->

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Food Orders</title>
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
        <h1>Add a customer</h1>
        <form action="core/handleForms.php" method="POST">
            <p>
                <label for="username">Username</label> 
                <input type="text" name="username">
            </p>
            <p>
                <label for="first_Name">First Name</label> 
                <input type="text" name="first_Name">
            </p>
            <p>
                <label for="last_Name">Last Name</label> 
                <input type="text" name="last_Name">
            </p>
            <p>
                <label for="home_address">Home Address</label> 
                <input type="text" name="home_address">
            </p>
            <p>
                <label for="contact_Num">Contact Number</label> 
                <input type="text" name="contact_Num">
            </p>

            <p>
                <input type="submit" name="add_Customer_Btn">
            </p>
        </form>

        <?php $getAllCustomers = getAllCustomers($pdo); ?>
        <?php foreach ($getAllCustomers as $row) { ?>
            <div class="container" style="border-style: solid; width: 50%; height: 300px; margin-top: 20px;">
                <h3>Username: <?= $row['username']; ?></h3>
                <h3>FirstName: <?= $row['first_Name']; ?></h3>
                <h3>LastName: <?= $row['last_Name']; ?></h3>
                <h3>Home Address: <?= $row['home_address']; ?></h3>
                <h3>Contact Number: <?= $row['contact_Num']; ?></h3>
                <h3>Date Added: <?= $row['date_added']; ?></h3>

                <div class="editAndDelete" style="float: right; margin-right: 20px;">
                    <a href="view_Orders.php?customer_id=<?= $row['customer_id']; ?>">View Orders</a>
                    <a href="edit_Customer.php?customer_id=<?= $row['customer_id']; ?>">Edit</a>
                    <a href="del_Customer.php?customer_id=<?= $row['customer_id']; ?>">Delete</a>
                </div>
            </div> 
        <?php } ?>
    </body>
</html>