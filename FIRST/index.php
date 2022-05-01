<?php

    require_once('config.php');


    if(isset($_POST['register'])){
        
        $fname = $_POST['first_name'];
        $lname = $_POST['last_name'];
        $email = $_POST['email_address'];
        $password = $_POST['password'];

        $error = array();

        if($fname==NULL){
            $error['one'] = "First Name is Empty";
        }

        if($lname == NULL){
            $error['two'] = "Last Name is Empty";
        }

        if($email == NULL) {
            $error['three'] = "Email Is Empty";
        }

        if($password == NULL) {
            $error['four'] = "Password is Empty";
        }
        elseif(strlen($password)<=6){
            $error['four'] = "Password Must be 6 chracter long";
        }

        if(count($error)==0){


                $query = mysqli_query($connection, "INSERT INTO user (first_name,last_name,email_address,password) 
                VALUES ('$fname','$lname','$email','$password')");

                if($query){
                    $success ="Successfully Submitted";
                }

          
               
             

            

        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database Connection</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="registration">
        <form action="" method="POST">
            <label for="first_name">First Name</label> <br>
            <input type="text" name="first_name" id="first_name"> <br>

            <div class="error">
                <?php
                    if(isset($error['one'])){
                        echo $error['one'];
                    }
                ?>
            </div>

            <label for="last_name">last Name</label> <br>
            <input type="text" name="last_name" id="last_name"> <br>

            <div class="error">
                <?php
                    if(isset($error['two'])){
                        echo $error['two'];
                    }
                ?>
            </div>


            <label for="email_address">Email Address</label> <br>
            <input type="email_address" name="email_address" id="email_address"> <br>

            <div class="error">
                <?php
                    if(isset($error['three'])){
                        echo $error['three'];
                    }
                ?>
            </div>

            <label for="password">PASSWORD</label> <br>
            <input type="password" name="password" id="password"> <br>

            <div class="error">
                <?php
                    if(isset($error['four'])){
                        echo $error['four'];
                    }
                ?>
            </div>

            <input type="submit" value="Send" name="register">

        </form>

      <div class="success">
          <?php
               if(isset($success)){
                   echo $success;
               } 
          ?>
      </div>
    </div>
</body>
</html>