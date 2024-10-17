<?php 

    require_once 'dbConfig.php';
    require_once 'displayData.php';


    /* --- CUSTOMERS --- */
    // CREATE
    if (isset($_POST['add_Customer_Btn'])) {
        $username = trim($_POST['username']);
        $first_Name = trim($_POST['first_Name']);
        $last_Name = trim($_POST['last_Name']);
        $home_address = trim($_POST['home_address']);
        $contact_Num = trim($_POST['contact_Num']);

        if (!empty($username) && !empty($first_Name) && !empty($last_Name) && !empty($home_address) && !empty($contact_Num)) {
            $sql = "INSERT INTO customers (username, first_Name, last_Name, home_address, contact_Num) VALUES(?,?,?,?,?)";   

            $query = $pdo->prepare($sql);
            $executeQuery = $query->execute([$username, $first_Name, $last_Name, $home_address, $contact_Num]);

            if ($executeQuery) {
                header("Location: ../index.php");
            } else {
                echo "Insertion failed";
            }

        } else {
            echo "There are empty fields";
        }
    }


    // UPDATE
    if (isset($_POST['edit_Customer_Btn'])) {
        $first_Name = trim($_POST['first_Name']);
        $last_Name = trim($_POST['last_Name']);
        $home_address = trim($_POST['home_address']);
        $contact_Num = trim($_POST['contact_Num']);

        if (!empty($first_Name) && !empty($last_Name) && !empty($home_address) && !empty($contact_Num)) {
            $sql = "UPDATE customers
                    SET first_Name = ?,
                        last_Name = ?,
                        home_address = ?, 
                        contact_Num = ?
                    WHERE customer_id = ?
                ";

            $query = $pdo->prepare($sql);
            $executeQuery = $query->execute([$first_Name, $last_Name, $home_address, $contact_Num, $_GET['customer_id']]);

            if ($executeQuery) {
                header("Location: ../index.php");
            } else {
                echo "Edit failed";
            }

        } else {
            echo "There are empty fields";
        }
    }


    // DELETE
    if (isset($_POST['remove_Customer_Btn'])) {
        $remove_fromOrders = "DELETE FROM orders WHERE customer_id = ?";

        $query_Remove = $pdo->prepare($remove_fromOrders);
        $executeRemoval = $query_Remove->execute([$_GET['customer_id']]);

        if ($executeRemoval) {
            $sql = "DELETE FROM customers WHERE customer_id = ?";

            $query = $pdo->prepare($sql);
            $executeQuery = $query->execute([$_GET['customer_id']]);

            if ($executeQuery) {
                header("Location: ../index.php");
            } else {
                echo "Deletion failed";
            }
        }
    }



    /* --- ORDERS --- */
    // CREATE
    if (isset($_POST['add_Order_Btn'])) {
        $order_Name = trim($_POST['order_Name']);
        $order_Quantity = trim($_POST['order_Quantity']);
        $order_Price = trim($_POST['order_Price']);

        if (!empty($order_Name && !empty($order_Quantity)) && !empty($order_Price)) {
            $sql = "INSERT INTO orders (order_Name, order_Quantity, order_Price, customer_id) VALUES (?,?,?, ?)";

            $query = $pdo->prepare($sql);
            $executeQuery = $query->execute([$order_Name, $order_Quantity, $order_Price, $_GET['customer_id']]);

            if ($executeQuery) {
                header("Location: ../view_Orders.php?customer_id=" .$_GET['customer_id']);
            } else {
                echo "Insertion failed";
            }

        } else {
            echo "There are empty fields";
        }
    }


    // UPDATE
    if (isset($_POST['editProjectBtn'])) {
        $project_Name = trim($_POST['project_Name']);
        $tech_Used = trim($_POST['technologies_Used']);
        
        if (!empty($project_Name) && !empty($tech_Used)) {
            $sql = "UPDATE projects
                SET project_Name = ?,
                    technologies_Used = ?
                WHERE project_id = ?
                ";

            $query = $pdo->prepare($sql);
            $executeQuery = $query->execute([$project_Name, $tech_Used, $_GET['project_id']]);

            if ($executeQuery) {
                header("Location: ../view_Projects.php?web_dev_id=" .$_GET['web_dev_id']);
            } else {
                echo "Update failed";
            }

        } else {
            echo "There are empty fields";
        }
    }


    // DELETE
    if (isset($_POST['deleteProjectBtn'])) {
        $sql = "DELETE FROM projects WHERE project_id = ?";

        $query = $pdo->prepare($sql);
        $executeQuery = $query->execute([$_GET['project_id']]);

        if ($executeQuery) {
            header("Location: ../view_Projects.php?web_dev_id=" .$_GET['web_dev_id']);
        } else {
            echo "Deletion failed";
        }
    }

?>