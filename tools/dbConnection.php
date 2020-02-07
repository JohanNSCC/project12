<?php
    //Define database variables
    $db_name = "contacts";
    $table_name = "addressbook";

    //connect to MySQL and select database to use
    $connection = mysqli_connect("localhost", "root", "", "contacts") or die(mysqli_error($connection));