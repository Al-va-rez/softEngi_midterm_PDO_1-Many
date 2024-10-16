<?php 
    require_once 'core/dbConfig.php';
    require_once 'core/displayData.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Delete project</title>
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
        <?php $getProjectByID = getProjectByID($pdo, $_GET['project_id']); ?>
        <h1>Are you sure you want to delete this project?</h1>

        <div class="container" style="border-style: solid; height: 400px;">
            <h2>Project Name: <?= $getProjectByID['project_name'] ?></h2>
            <h2>Technologies Used: <?= $getProjectByID['technologies_used'] ?></h2>
            <h2>Project Owner: <?= $getProjectByID['project_owner'] ?></h2>
            <h2>Date Added: <?= $getProjectByID['date_added'] ?></h2>

            <div class="deleteBtn" style="float: right; margin-right: 10px;">
                <form action="core/handleForms.php?project_id=<?= $_GET['project_id']; ?>&web_dev_id=<?= $_GET['web_dev_id']; ?>" method="POST">
                    <input type="submit" name="deleteProjectBtn" value="Delete">
                </form>			
            </div>	
        </div>
</body>
</html>
