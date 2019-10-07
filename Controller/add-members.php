<?php 

if(isset($_POST['submit'])){  

    include("../Model/connect_db.php"); // include model
    include("validate.php");

    $conn = connect_db(); // connect database33


    $name   = isset($_POST['name']) ? mysqli_real_escape_string($conn,$_POST['name']) : '';
    $email      = isset($_POST['email'])    ? mysqli_real_escape_string($conn,$_POST['email']) : '';
    $password = $_POST['password'] ? mysqli_real_escape_string($conn,$_POST['password']) : '';



    // include _ and – having a length of 3 to 16 characters –
    $pattern_username = '/^[a-z0-9_-]{3,16}$/';

    //Should have 1 lowercase letter, 1 uppercase letter, 1 number, and be at least 8 characters long
    $pattern_password = "/(?=(.*[0-9]))((?=.*[A-Za-z0-9])(?=.*[A-Z])(?=.*[a-z]))^.{8,}$/";

    if (!validation($pattern_password, $password)){
        echo '<script language="javascript">alert("invalid password.Should have 1 lowercase letter, 1 uppercase letter, 1 number, and be at least 8 characters long"); window.location="../View/index.php";</script>';
        die();
    }

    $pattern_email = "/^([a-zA-Z0-9._%-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6})*$/";

    if (!validation($pattern_email, $email)){
        echo '<script language="javascript">alert("invalid email address"); window.location="../View/add-members.php";</script>';
        die();
    }

    //md6 encrypt

    $password = md5($password);
 

        // password and re-pass not match
 




    $sql = "SELECT * FROM users WHERE name = '$name' OR email = '$email'";


    $result = query($conn, $sql);

    //check username exist
    if (num_rows($result) > 0)
    {
     
        echo '<script language="javascript">alert("username or email already exist"); window.location="../View/add-members.php";</script>';
          
        die ();
    }
    else {
        $date = date_create();
        $time = $date->getTimestamp();
        
        // not exist = > insert database
        $sql = "INSERT INTO users (name, password, email,created_at,updated_at) VALUES ('$name','$password','$email','$time','$time')";
          
        if (query($conn, $sql)){

            echo '<script language="javascript">alert("add members success"); window.location="../View/add-members.php";</script>';
        }
        else {
            echo '<script language="javascript">alert("Error Handler"); window.location="../View/add-members.php";</script>';
            die();
        }
    }


    
















}





