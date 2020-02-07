<?php
    //Check if user is logged in
    require('../tools/loginChecker.php');

    //Connect to db
    require('../tools/dbConnection.php');

    //define filename variable
    $fileName = $_FILES["file"]["tmp_name"];
    
    //Check to ensure file has a size greater than0
    if ($_FILES["file"]["size"] > 0) {
        
        //Open file in read mode
        $file = fopen($fileName, "r");
        
        //Loop through file and insert data seperated by commas into db
        while (($column = fgetcsv($file, 10000, ",")) !== FALSE) {
            $sqlInsert = "INSERT into $table_name (firstname,lastname,phone,email,street,city,province,postal,birthday)
                   values ('" . $column[0] . "','" . $column[1] . "','" . $column[2] . "','" . $column[3] . "','" . $column[4] . "','" . $column[5] . "','" . $column[6] . "','" . $column[7] . "','" . $column[8] . "')";
            $result = mysqli_query($connection, $sqlInsert);
            
            (! empty($result))?header("Location: ../pages/home.php"):$message = "Problem Importing CSV Data";
        }
    }