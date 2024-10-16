<?php 

    require_once 'dbConfig.php'; 
    require_once 'displayData.php';


    /* --- DEVELOPERS --- */
    // INSERT
    if (isset($_POST['insertWebDevBtn'])) {
        $sql = "INSERT INTO web_devs (username, first_Name, last_Name, date_of_birth, specialization) VALUES(?,?,?,?,?)";

        $query = $pdo->prepare($sql);
        $executeQuery = $query->execute([$_POST['username'], $_POST['first_Name'], $_POST['last_Name'], $_POST['dob'], $_POST['specialization']]);

        if ($executeQuery) {
            header("Location: ../index.php");
        }
        else {
            echo "Insertion failed";
        }
    }


    // UPDATE
    if (isset($_POST['editWebDevBtn'])) {
        $sql = "UPDATE web_devs
                    SET first_Name = ?,
                        last_Name = ?,
                        date_of_birth = ?, 
                        specialization = ?
                    WHERE web_dev_id = ?
                ";

        $query = $pdo->prepare($sql);
        $executeQuery = $query->execute([$_POST['first_Name'], $_POST['last_Name'], $_POST['dob'], $_POST['specialization'], $_GET['web_dev_id']]);

        if ($executeQuery) {
            header("Location: ../index.php");
        }

        else {
            echo "Edit failed";;
        }
    }


    // DELETE
    if (isset($_POST['deleteWebDevBtn'])) {
        $remove_fromProject = "DELETE FROM projects WHERE web_dev_id = ?";

        $query_Remove = $pdo->prepare($remove_fromProject);
        $executeRemoval = $query_Remove->execute([$_GET['web_dev_id']]);

        if ($executeRemoval) {
            $sql = "DELETE FROM web_devs WHERE web_dev_id = ?";

            $query = $pdo->prepare($sql);
            $executeQuery = $query->execute([$_GET['web_dev_id']]);

            if ($executeQuery) {
                header("Location: ../index.php");
            }

            else {
                echo "Deletion failed";
            }
        }
    }



    /* --- PROJECTS --- */
    // INSERT
    if (isset($_POST['insertNewProjectBtn'])) {

        $sql = "INSERT INTO projects (project_name, technologies_used, web_dev_id) VALUES (?,?,?)";

        $query = $pdo->prepare($sql);
        $executeQuery = $query->execute([$_POST['projectName'], $_POST['technologiesUsed'], $_GET['web_dev_id']]);

        if ($executeQuery) {
            header("Location: ../view_Projects.php?web_dev_id=" .$_GET['web_dev_id']);
        }
        else {
            echo "Insertion failed";
        }
    }


    // UPDATE
    if (isset($_POST['editProjectBtn'])) {
        $sql = "UPDATE projects
                SET project_name = ?,
                    technologies_used = ?
                WHERE project_id = ?
                ";

        $query = $pdo->prepare($sql);
        $executeQuery = $query->execute([$_POST['projectName'], $_POST['technologiesUsed'], $_GET['project_id']]);

        if ($executeQuery) {
            header("Location: ../view_Projects.php?web_dev_id=" .$_GET['web_dev_id']);
        }
        else {
            echo "Update failed";
        }

    }


    // DELETE
    if (isset($_POST['deleteProjectBtn'])) {
        $sql = "DELETE FROM projects WHERE project_id = ?";

        $query = $pdo->prepare($sql);
        $executeQuery = $query->execute([$_GET['project_id']]);

        if ($executeQuery) {
            header("Location: ../view_Projects.php?web_dev_id=" .$_GET['web_dev_id']);
        }
        else {
            echo "Deletion failed";
        }
    }

?>