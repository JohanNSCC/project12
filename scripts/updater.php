<?php
     //Check if user is logged in
     require('../tools/loginChecker.php');
     //Grab the data from the post.
     $id=$_POST['contactID'];
     $fname=$_POST['fname'];
     $lname=$_POST['lname'];
     $phone=$_POST['phone'];
     $email=$_POST['email'];
     $street=$_POST['street'];
     $city=$_POST['city'];
     $province=$_POST['province'];
     $postal=$_POST['postal'];
     $birthday=$_POST['birthday'];

     //Connect to db
     require('../tools/dbConnection.php');

     //Create prepared statement
     $stmt = $connection->prepare(" UPDATE $table_name SET firstname=?, lastname=?, phone=?, email=?, street=?, city=?, province=?, postal=?, birthday=? WHERE id=?");
     $stmt->bind_param("sssssssssi", $fname, $lname, $phone, $email, $street, $city, $province, $postal, $birthday, $id);
     $stmt->execute();
     ($stmt->affected_rows === 0) ? exit('No rows updated...'):header("Location: ../pages/home.php");
     $stmt->close();