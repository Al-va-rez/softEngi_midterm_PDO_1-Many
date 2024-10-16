<?php  

    /* --- DEVELOPERS --- */
    // INSERT
    function insertWebDev($pdo, $username, $first_Name, $last_Name, $dob, $specialization) {
        $sql = "INSERT INTO web_devs (username, first_Name, last_Name, date_of_birth, specialization) VALUES(?,?,?,?,?)";

        $query = $pdo->prepare($sql);
        $executeQuery = $query->execute([$username, $first_Name, $last_Name, $dob, $specialization]);

        if ($executeQuery) {
            return true;
        }
    }


    // UPDATE
    function updateWebDev($pdo, $first_Name, $last_Name, $dob, $specialization, $web_dev_id) {
        $sql = "UPDATE web_devs
                    SET first_Name = ?,
                        last_Name = ?,
                        date_of_birth = ?, 
                        specialization = ?
                    WHERE web_dev_id = ?
                ";

        $query = $pdo->prepare($sql);
        $executeQuery = $query->execute([$first_Name, $last_Name, $dob, $specialization, $web_dev_id]);
        
        if ($executeQuery) {
            return true;
        }
    }


    // DELETE
    function deleteWebDev($pdo, $web_dev_id) {
        $remove_fromProject = "DELETE FROM projects WHERE web_dev_id = ?";

        $query_Remove = $pdo->prepare($remove_fromProject);
        $executeRemoval = $query_Remove->execute([$web_dev_id]);

        if ($executeRemoval) {
            $sql = "DELETE FROM web_devs WHERE web_dev_id = ?";

            $query = $pdo->prepare($sql);
            $executeQuery = $query->execute([$web_dev_id]);

            if ($executeQuery) {
                return true;
            }
        }
    }


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


    function insertProject($pdo, $project_name, $technologies_used, $web_dev_id) {
        $sql = "INSERT INTO projects (project_name, technologies_used, web_dev_id) VALUES (?,?,?)";

        $query = $pdo->prepare($sql);
        $executeQuery = $query->execute([$project_name, $technologies_used, $web_dev_id]);

        if ($executeQuery) {
            return true;
        }
    }


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


    function updateProject($pdo, $project_name, $technologies_used, $project_id) {
        $sql = "UPDATE projects
                SET project_name = ?,
                    technologies_used = ?
                WHERE project_id = ?
                ";

        $query = $pdo->prepare($sql);
        $executeQuery = $query->execute([$project_name, $technologies_used, $project_id]);

        if ($executeQuery) {
            return true;
        }
    }


    function deleteProject($pdo, $project_id) {
        $sql = "DELETE FROM projects WHERE project_id = ?";

        $query = $pdo->prepare($sql);
        $executeQuery = $query->execute([$project_id]);

        if ($executeQuery) {
            return true;
        }
    }

?>