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

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contacts</title>
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
                <a class="nav-link active" href="./home.php">Home</a>
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
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8 welcome">
                <h2>Welcome to your address book <?php echo "$email"?></h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4" >
                <form action="../scripts/deleteAll.php" method="POST">
                    <input type="submit" class="btn btn-danger" value="Delete ALL">
                </form>
            </div>
            <div class="col-md-4">
                <form action="./upload.php" method="POST">
                    <input type="submit" class="btn btn-warning" value="Upload csv file">
                </form>
            </div>
            <div class="col-md-4">
                <form action="../scripts/download.php" method="POST">
                    <input type="submit" class="btn btn-success" value="Download csv file">
                </form>
            </div>
        </div>
        <br>
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th>Firstname</th>
                                <th>Lastname</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Street</th>
                                <th>City</th>
                                <th>Province</th>
                                <th>Postal Code</th>
                                <th>Birthday</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                while($row = $result->fetch_assoc()) {
                                    echo "<tr><td>".$row['firstname']."</td>
                                    <td>".$row['lastname']."</td>
                                    <td>".$row['phone']."</td>
                                    <td>".$row['email']."</td>
                                    <td>".$row['street']."</td>
                                    <td>".$row['city']."</td>
                                    <td>".$row['province']."</td>
                                    <td>".$row['postal']."</td>
                                    <td>".$row['birthday']."<td><form action='./edit.php' method='POST'>
                                    <input id='contactID' name='contactID' type='hidden' value='".$row['id']."'>
                                    <input type='submit' class='btn btn-primary' value='Edit'></form></td>
                                    <td><form action='../scripts/deleteSingle.php' method='POST'>
                                    <input id='contactID' name='contactID' type='hidden' value='".$row['id']."'>
                                    <input type='submit' class='btn btn-danger' value='Delete'></form></td></tr>";
                                  }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4" >
                <form action="../scripts/deleteAll.php" method="POST">
                    <input type="submit" class="btn btn-danger" value="Delete ALL">
                </form>
            </div>
            <div class="col-md-4">
                <form action="upload.php" method="POST">
                    <input type="submit" class="btn btn-warning" value="Upload csv file">
                </form>
            </div>
            <div class="col-md-4">
                <form action="../scripts/download.php" method="POST">
                    <input type="submit" class="btn btn-success" value="Download csv file">
                </form>
            </div>
        </div>
        <br>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>