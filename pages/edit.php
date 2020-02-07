<?php
    
    //Check if user is logged in
    require('../tools/loginChecker.php');

    //Connect to db
    require('../tools/dbConnection.php');

    //Define paramater variable
    $id = $_POST['contactID'];
    //Create prepared statement
    $stmt = $connection->prepare(" SELECT * FROM $table_name WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows === 0) exit('No rows');
    $stmt->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Contact</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/mainStyles.css" type="text/css">
</head>
<body>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <!-- Brand/logo -->
        <a class="navbar-brand" href="./home.php">Contact Manager</a>
    
        <!-- Links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="./home.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./addContact.php">Add Contact</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./birthday.php">Birthdays</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./emailForm.php">Email</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../tools/logout.php">Logout</a>
            </li>
        </ul>
    </nav>
    <div class="container">
        <div class="container-fluid">
            <div class="row welcome justify-content-center">
                <div class="col ">
                    <h2>Update contact info</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-8 login-form-1">
                    <form action="../scripts/updater.php" method="POST">
                        <?php
                            while($row = $result->fetch_assoc()) {
                                echo '<input id="contactID" name="contactID" type="hidden" class="form-control" value="'.$row['id'].'"/>  
                                <div class="form-group">
                                            <label for="fname">Firstname: </label>
                                            <input id="fname" name="fname" type="text" class="form-control" value="'.$row['firstname'].'" required/>
                                        </div>
                                        <div class="form-group">
                                            <label for="lname">Lastname: </label>
                                            <input id="lname" name="lname" type="text" class="form-control" value="'.$row['lastname'].'" required/>
                                        </div>
                                        <div class="form-group">
                                            <label for="phone">Phone: </label>
                                            <input id="phone" name="phone" type="text" class="form-control" value="'.$row['phone'].'" required/>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email: </label>
                                            <input id="email" name="email" type="email" class="form-control" value="'.$row['email'].'" required/>
                                        </div>
                                        <div class="form-group">
                                            <label for="street">Street: </label>
                                            <input id="street" name="street" type="text" class="form-control" value="'.$row['street'].'" required/>
                                        </div>
                                        <div class="form-group">
                                            <label for="city">City: </label>
                                            <input id="city" name="city" type="text" class="form-control" value="'.$row['city'].'" required/>
                                        </div>
                                        <div class="form-group">
                                            <label for="province">Province: </label>
                                            <input id="province" name="province" type="text" class="form-control" value="'.$row['province'].'" required/>
                                        </div>
                                        <div class="form-group">
                                            <label for="postal">Postal Code: </label>
                                            <input id="postal" name="postal" type="text" class="form-control" value="'.$row['postal'].'" required/>
                                        </div>
                                        <div class="form-group">
                                            <label for="birthday">Birthday: </label>
                                            <input id="birthday" name="birthday" type="text" class="form-control" value="'.$row['birthday'].'" required/>
                                        </div>'
                                        ;
                            }
                        ?>
                        <div class="form-group">
                            <input type="submit" class="btnSubmit" value="Update!!" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>