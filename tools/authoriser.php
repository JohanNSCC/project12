<?php
    $db_name = "contacts";
    $table_name = "users";
    
    //echo password_hash('admin', PASSWORD_DEFAULT);

    //connect to MySQL and select database to use
    $connection = mysqli_connect("localhost", "root", "", "contacts") 
            or die(mysqli_error($connection));
    
    //Declare Variables
    $username = $_POST['username'];
    $password = $_POST['password'];

    //Create prepared statement
    $stmt = $connection->prepare(" SELECT * FROM $table_name WHERE email = ? ");
    $stmt->bind_param("s", $username);    
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows === 0) exit('No rows');
    while($row = $result->fetch_assoc()) {
        $dbHash = $row['hash'];
      }
    $stmt->close();
    if(password_verify($password, $dbHash)){
        session_start();
        $_SESSION["login"] = "true";
        $_SESSION["email"] = $username;
        header("Location: ../pages/home.php");
    }else{
        // print_r($_SESSION);
        // echo session_status();
        header("Location: ../index.html");
    }


    $connection->close();
