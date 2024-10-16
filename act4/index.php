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
        <title>Project Management</title>
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
        <h1>Welcome To Web Dev Projects Management System. Add new Web Devs!</h1>
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
                <label for="dob">Date of Birth</label> 
                <input type="date" name="dob">
            </p>
            <p>
                <label for="specialization">Specialization</label> 
                <input type="text" name="specialization">
            </p>

            <p>
                <input type="submit" name="insertWebDevBtn">
            </p>
        </form>

        <?php $getAllWebDevs = getAllWebDevs($pdo); ?>
        <?php foreach ($getAllWebDevs as $row) { ?>
            <div class="container" style="border-style: solid; width: 50%; height: 300px; margin-top: 20px;">
                <h3>Username: <?= $row['username']; ?></h3>
                <h3>FirstName: <?= $row['first_Name']; ?></h3>
                <h3>LastName: <?= $row['last_Name']; ?></h3>
                <h3>Date Of Birth: <?= $row['date_of_birth']; ?></h3>
                <h3>Specialization: <?= $row['specialization']; ?></h3>
                <h3>Date Added: <?= $row['date_added']; ?></h3>

                <div class="editAndDelete" style="float: right; margin-right: 20px;">
                    <a href="view_Projects.php?web_dev_id=<?= $row['web_dev_id']; ?>">View Projects</a>
                    <a href="edit_WebDev.php?web_dev_id=<?= $row['web_dev_id']; ?>">Edit</a>
                    <a href="del_WebDev.php?web_dev_id=<?= $row['web_dev_id']; ?>">Delete</a>
                </div>
            </div> 
        <?php } ?>
    </body>
</html>