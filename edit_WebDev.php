<?php
    require_once 'core/handleForms.php';
    require_once 'core/queryFunctions.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edit developer info</title>
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
        <?php $getWebDevByID = getWebDevByID($pdo, $_GET['web_dev_id']); ?>
        <h1>Edit the user!</h1>

        <form action="core/handleForms.php?web_dev_id=<?= $_GET['web_dev_id']; ?>" method="POST">
            <p>
                <label for="first_Name">First Name</label> 
                <input type="text" name="first_Name" value="<?= $getWebDevByID['first_Name']; ?>">
            </p>
            <p>
                <label for="last_Name">Last Name</label> 
                <input type="text" name="last_Name" value="<?= $getWebDevByID['last_Name']; ?>">
            </p>
            <p>
                <label for="dob">Date of Birth</label> 
                <input type="date" name="dob" value="<?= $getWebDevByID['date_of_birth']; ?>">
            </p>
            <p>
                <label for="specialization">Specialization</label> 
                <input type="text" name="specialization" value="<?= $getWebDevByID['specialization']; ?>">

                <input type="submit" name="editWebDevBtn">
            </p>
        </form>
    </body>
</html>
