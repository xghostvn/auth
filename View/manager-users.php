<?php include('home.php') ;

include("../Model/connect_db.php");
    $conn = connect_db(); 
    $sql="SELECT * FROM permissions"; 
        $query=query($conn,$sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Permission</h2>
  <p>The .table class adds basic styling (light padding and only horizontal dividers) to a table:</p>            
  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Description</th>
        <th>Roles</th>
      </tr>
    </thead>
    <tbody>
    <?php 
                  $sql = "SELECT * FROM users ORDER BY id ASC";
                  $query = query($conn,$sql);
                    while($row1 = fetch_array($query))
                    {

                  ?>
                    <tr>
                    
                            <td><?php echo $row1['id']; ?></td>
                            <td><?php echo $row1['name']; ?></td>
                            <td><?php echo $row1['email']; ?></td>
                            <td>
                            <?php 
                                $id = $row1['id'];
                             $sql = "select * from user_has_role where id='$id'";
                             $result = query($conn, $sql);
                             //check username exist                    
                             if (num_rows($result)  ==  0)
                             {   
                                echo "chua co vai tro";
                             }else {
                                
                                while($row = fetch_array($result)){
                                    $role_id=$row['role_id'];
                                    $sql_s="select * from roles where id='$role_id'";
                                    $result_s = query($conn, $sql_s);
                                    while($row_s=fetch_array($result_s)){
                                        echo $row_s['name'].",";
                                    }

                                }
                            
                             }

                            ?>
                            </td>
                            <td><a href="edit-user-roles.php?id=<?php echo $row['id']; ?>">Edit Role</a></td>
                          

                    </tr>

                <?php 
                
                    }

                
                ?>
    </tbody>
  </table>
</div>

</body>
</html>
