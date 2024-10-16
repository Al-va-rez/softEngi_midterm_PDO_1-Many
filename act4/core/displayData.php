<?php  

    /* --- DEVELOPERS --- */
    // FETCH ALL
    function getAllWebDevs($pdo) {
        $sql = "SELECT * FROM web_devs";

        $query = $pdo->prepare($sql);
        $executeQuery = $query->execute();

        if ($executeQuery) {
            return $query->fetchAll();
        }
    }


    // FETCH
    function getWebDevByID($pdo, $web_dev_id) {
        $sql = "SELECT * FROM web_devs WHERE web_dev_id = ?";

        $query = $pdo->prepare($sql);
        $executeQuery = $query->execute([$web_dev_id]);

        if ($executeQuery) {
            return $query->fetch();
        }
    }



    /* --- PROJECTS --- */
    // FETCH ALL
    function getProjectsByWebDev($pdo, $web_dev_id) {
        
        $sql = "SELECT 
                    projects.project_id AS project_id,
                    projects.project_name AS project_name,
                    projects.technologies_used AS technologies_used,
                    projects.date_added AS date_added,
                    CONCAT(web_devs.first_name,' ',web_devs.last_name) AS project_owner
                FROM projects
                JOIN web_devs ON projects.web_dev_id = web_devs.web_dev_id
                WHERE projects.web_dev_id = ? 
                GROUP BY projects.project_name;
                ";

        $query = $pdo->prepare($sql);
        $executeQuery = $query->execute([$web_dev_id]);

        if ($executeQuery) {
            return $query->fetchAll();
        }
    }


    // FETCH
    function getProjectByID($pdo, $project_id) {
        $sql = "SELECT 
                    projects.project_id AS project_id,
                    projects.project_name AS project_name,
                    projects.technologies_used AS technologies_used,
                    projects.date_added AS date_added,
                    CONCAT(web_devs.first_name,' ',web_devs.last_name) AS project_owner
                FROM projects
                JOIN web_devs ON projects.web_dev_id = web_devs.web_dev_id
                WHERE projects.project_id  = ? 
                GROUP BY projects.project_name";

        $query = $pdo->prepare($sql);
        $executeQuery = $query->execute([$project_id]);

        if ($executeQuery) {
            return $query->fetch();
        }
    }

?>