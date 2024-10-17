CREATE TABLE customers (
    customer_id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR (50),
    first_Name VARCHAR (50),
    last_Name VARCHAR (50),
    home_address VARCHAR (50),
    contact_Num VARCHAR (50),
    date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


CREATE TABLE orders (
    order_id INT AUTO_INCREMENT PRIMARY KEY,
    customer_id INT,
    order_Name VARCHAR (50),
    order_Quantity INT,
    order_Price FLOAT,
    date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);