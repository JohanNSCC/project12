<?php
    session_start();
    //Check to see if user is logged in.
    if (isset($_SESSION["login"]) && $_SESSION["login"] == "true")  {
        //Define a variable for the username
        $email = $_SESSION['email'];
    } else {
        //Send them back to the login page if they're not logged in.
        header("Location: ../index.html");
    }