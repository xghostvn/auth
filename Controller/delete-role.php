<?php 
        if(isset($_GET['id'])){
            include("../Model/connect_db.php"); // include model
            include("validate.php");
        
            $conn = connect_db(); // connect database33
            $id = $_GET['id'];

            $sql = "select * from role_has_permissions where role_id='$id'";

            $result=query($conn, $sql);

        if (num_rows($result) > 0)
        {
            $sql = "delete  from role_has_permissions where role_id='$id'";
            $result=query($conn, $sql);
            echo '<script language="javascript">alert("delete role success"); window.location="../View/manager-roles.php";</script>';
          
       
        }
            
        else {
            echo '<script language="javascript">alert("delete role fail"); window.location="../View/manager-roles.php";</script>';
            die();
        }


            $sql = "delete from roles where id='$id'";

            query($conn, $sql);

       

    }

?>