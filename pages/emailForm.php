<?php
     //Check if user is logged in
     require('../tools/loginChecker.php');
?>
<!DOCTYPE html>
<html lang="en">
     <head>
          <meta charset="UTF-8">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <meta http-equiv="X-UA-Compatible" content="ie=edge">
          <title>Email</title>
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
                         <a class="nav-link active" href="./emailForm.php">Email</a>
                    </li>
                    <li class="nav-item">
                         <a class="nav-link" href="../tools/logout.php">Logout</a>
                    </li>
               </ul>
          </nav>
          <div class="container-fluid">
               <div class="row justify-content-center">
                    <div class="col-md-6 login-form-1">
                         <h3>Send an email</h3>
                         <form action="./scripts/mailer.php" method="POST">
                              <div class="form-group">
                                   <label for="subject">Subject: </label>
                                   <input id="subject" name="subject" type="text" class="form-control" placeholder="RE: An Email Subject" value="" maxlength=150 required/>
                              </div>
                              <div class="form-group">
                                   <label for="message">Message:</label>
                                   <textarea id="message" name="message" rows="5" cols="50" required></textarea>
                              </div>
                              <div class="form-group">
                                   <input type="submit" class="btnSubmit" value="Send" />
                              </div>
                         </form>
                    </div>
               </div>
          </div>
          <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
     </body>
</html>