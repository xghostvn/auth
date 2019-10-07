<?php 

    if(isset($_POST['submit'])){
        
        include('../Model/connect_db.php');
        $name = $_POST['name'];
        $description = $_POST['description'];

        $conn = connect_db(); // connect database33


        $sql =  $sql = "SELECT * FROM permissions WHERE name = '$name'";

       
        $result = query($conn, $sql);

        //check username exist
        if (num_rows($result) > 0)
        {
           
            echo '<script language="javascript">alert("permission exist"); window.location="../View/permissions.php";</script>';
              
            die ();
        }else {
            $date = date_create();
            $time = $date->getTimestamp();
            $sql = "INSERT INTO permissions (name,description,created_at,updated_at) VALUES ('$name','$description','$time','$time')";
            $result = query($conn, $sql);
            if($result){
                echo '<script language="javascript">alert("add success"); window.location="../View/permissions.php";</script>';
            }else {
                echo '<script language="javascript">alert("add fail"); window.location="../View/permissions.php";</script>';
                die();
            }
           
            
        }


    }


?>