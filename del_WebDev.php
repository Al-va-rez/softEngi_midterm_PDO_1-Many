<?php 
    require_once 'core/dbConfig.php';
    require_once 'core/queryFunctions.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Delete developer record</title>
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
        <h1>Are you sure you want to delete this user?</h1>

        <?php $getWebDevByID = getWebDevByID($pdo, $_GET['web_dev_id']); ?>
        <div class="container" style="border-style: solid; height: 400px;">
            <h2>Username: <?= $getWebDevByID['username']; ?></h2>
            <h2>FirstName: <?= $getWebDevByID['first_Name']; ?></h2>
            <h2>LastName: <?= $getWebDevByID['last_Name']; ?></h2>
            <h2>Date Of Birth: <?= $getWebDevByID['date_of_birth']; ?></h2>
            <h2>Specialization: <?= $getWebDevByID['specialization']; ?></h2>
            <h2>Date Added: <?= $getWebDevByID['date_added']; ?></h2>

            <div class="deleteBtn" style="float: right; margin-right: 10px;">
                <form action="core/handleForms.php?web_dev_id=<?= $_GET['web_dev_id']; ?>" method="POST">
                    <input type="submit" name="deleteWebDevBtn" value="Delete">
                </form>			
            </div>
        </div>
    </body>
</html>
