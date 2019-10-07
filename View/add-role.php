<?php  include('home.php');
include("../Model/connect_db.php");
$conn = connect_db(); 
$sql="SELECT * FROM permissions"; 
    $query=query($conn,$sql);


?>

<div class="row">
<div class="col-md-6">
<h2> Thêm mới vai trò </h2>
</div>
<div class="col-md-6">
<h2> Chọn quyền cho vai trò </h2>
</div>
</div>
<form method="post" action="../Controller/add-roles.php">
<div class="col-md-12" style="margin-top:30px;">
<div class="col-md-6" style="max-width:500px;border:1px solid
#eee;padding:20px;">
<div class="form-group">
<label for="name">Tên:</label>
<input type="text" class="form-control" name="name">
</div>
<div class="form-group">
<label for="description">Mô tả:</label>
<textarea class="form-control" name="description" cols="30"
rows="10"></textarea>
</div>
</div>
<div class="col-md-6">
<div class="col-md-12">
<div class="panel panel-info">
<div class="panel-heading"> Chọn quyền: </div>
<div class="panel-body">

<?php 
                  $sql = "SELECT * FROM permissions ORDER BY id ASC";
                  $query = query($conn,$sql);
                    while($row = fetch_array($query))
                    {

                  ?>
                    
                <div class="form-group">
    <label><input name="permissions[]" type="checkbox" value="<?php echo $row['id']; ?>"> <?php echo $row['name']; ?> </label>
        
  
    </div>
                <?php 
                
                    }

                
                ?>
</div>
</div>
</div>
</div>
<div class="col-md-12">
<input type="submit" class="btn btn-info" value="Thêm mới" name="submit">
<a class="btn btn-default" href="roles.php"> Hủy </a>
</div>
</form>