<?php
     //Check if user is logged in
     require('../tools/loginChecker.php');

    //Connect to db
    require('../tools/dbConnection.php');
    //Create prepared statement
    $stmt = $connection->prepare(" SELECT * FROM $table_name ");   
    $stmt->execute();
    $result = $stmt->get_result();
    // if($result->num_rows === 0) exit('No rows');
    $stmt->close();
    $fp = fopen('php://output', 'w');
    if ($fp && $result) {
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="contacts.csv"');
        while ($row = $result->fetch_array(MYSQLI_NUM)) {
            fputcsv($fp, array_values($row));
        }
        die;
        header("Location: ../pages/home.php");
    }