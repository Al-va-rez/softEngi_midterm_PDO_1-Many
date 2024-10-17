<?php

    /* --- Customers --- */
    // FETCH ALL
    function getAllCustomers($pdo) {
        $sql = "SELECT * FROM customers";

        $query = $pdo->prepare($sql);
        $executeQuery = $query->execute();

        if ($executeQuery) {
            return $query->fetchAll();
        }
    }

    // FETCH
    function getCustomer_ByID($pdo, $customer_id) {
        $sql = "SELECT * FROM customers WHERE customer_id = ?";

        $query = $pdo->prepare($sql);
        $executeQuery = $query->execute([$customer_id]);

        if ($executeQuery) {
            return $query->fetch();
        }
    }


    /* --- PROJECTS --- */
    // FETCH ALL
    function getOrder_OfCustomer($pdo, $customer_id) {
        
        $sql = "SELECT 
                    orders.order_id AS order_id,
                    orders.order_Name AS order_Name,
                    orders.order_Quantity AS order_Quantity,
                    orders.order_Price AS order_Price,
                    orders.date_added AS date_added,
                    CONCAT(customers.first_Name,' ',customers.last_Name) AS customer
                FROM orders
                JOIN customers ON orders.customer_id = customers.customer_id
                WHERE orders.customer_id = ? 
                GROUP BY orders.order_Name;
                ";

        $query = $pdo->prepare($sql);
        $executeQuery = $query->execute([$customer_id]);

        if ($executeQuery) {
            return $query->fetchAll();
        }
    }

?>