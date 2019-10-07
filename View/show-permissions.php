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
      </tr>
    </thead>
    <tbody>
    <?php 
                  $sql = "SELECT * FROM permissions ORDER BY id ASC";
                  $query = query($conn,$sql);
                    while($row = fetch_array($query))
                    {

                  ?>
                    <tr>
                    
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['description']; ?></td>
                          
                          

                    </tr>

                <?php 
                
                    }

                
                ?>
    </tbody>
  </table>
</div>

</body>
</html>
