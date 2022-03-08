<?php

    $dbhost="localhost";
    $dbuser="root";
    $dbpass="";

    $dbname="polling";
    $connect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
    
    
    $result = $connect->query("SELECT * FROM `polling_q`");
    $data = array();
    if ($result && $result->num_rows != 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }
    


?>