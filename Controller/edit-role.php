<?php 
        if(isset($_GET['id'])){
            include("../Model/connect_db.php"); // include model
            include("validate.php");
        
            $conn = connect_db(); // connect database33
            $id = $_GET['id'];
            $name = $_POST['name'];
            $description = $_POST['description'];

            $sql = "UPDATE roles SET name='$name' WHERE id ='$id'";

           

            
           if(query($conn,$sql)){
            echo '<script language="javascript">alert("change roles success"); window.location="../View/manager-roles.php";</script>';
       }else {
            echo '<script language="javascript">alert("Error Handler"); window.location="../View/manager-roles.php";</script>';
       }

       

    }

?>