<?php 





    if(isset($_POST['submit'])){
        
include("../Model/connect_db.php"); // include model
include("validate.php");

$conn = connect_db(); // connect database33
        $name=$_POST['name'];
        $description = $_POST['description'];
        $date = date_create();
        $time = $date->getTimestamp();
       
        if(isset($_POST['permissions'])){
            $sql = "INSERT INTO roles (name,description,created_at,updated_at) VALUES ('$name','$description','$time','$time')";
            query($conn, $sql);
              foreach($_POST['permissions'] as $selected){
              
                $sql = "select * from roles where name='$name'";
                $result = query($conn, $sql);
                    $row = fetch_array($result);
                    $role_id = $row['id'];
                    $permission_id=$selected;
                
                $sql = "INSERT INTO role_has_permissions (role_id,permission_id,created_at,updated_at) VALUES ('$role_id','$permission_id','$time','$time')";
                query($conn, $sql);
                echo '<script language="javascript">alert("add success"); window.location="../View/add-role.php";</script>';
              }
          
        }
     

    }





?>