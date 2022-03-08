<?php

    $dbhost="localhost";
    $dbuser="root";
    $dbpass="";

    $dbname="polling";
    $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
    
    
    $result = $conn->query("SELECT * FROM `user`");
    $data = array();
    if ($result && $result->num_rows != 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }
?>