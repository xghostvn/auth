<?php include('home.php');
   include("../Model/connect_db.php");
   $conn = connect_db(); 
   $id = $_GET['id'];
   $sql="SELECT * FROM users where id='$id'"; 
       $query=query($conn,$sql);
       $row = fetch_array($query);
    


?>
<div class="panel" style="box-shadow: none;">
<h2> Chọn vai trò </h2>
<div style="padding:20px;border:1px solid #eee" class="col-md-12">
<form action="user-role.php" method="post" class="col-md-12">
<input type="hidden" name="change_role" value="1">
<input type="hidden" name="us_id" value="<?= $us_id ?>">
<div class="col-md-3">
<div class="panel panel-info">
<div class="panel-heading">Thành viên</div>
<div class="panel-body">
<ul style="padding: 10px 20px;">
<li style="line-height: 25px;">
<p><?php  echo $row['name']; ?></p>
</li>
</ul>
</div>
</div>
</div>
<div class="col-md-3">
<div class="panel panel-info">
<div class="panel-heading">Vai trò</div>
<div class="panel-body">
<?php 
                  $sql = "SELECT * FROM permissions ORDER BY id ASC";
                  $query = query($conn,$sql);
                    while($row = fetch_array($query))
                    {

                  ?>
                    
                <div class="form-group">
                <?php 
                    $role_id = $row['id'];
                    $sql = "select * from user_has_role where role_id='$role_id'";
                    $result = query($conn,$sql);
                
                ?>
            <label><input name="permissions[]" type="checkbox" value="<?php echo $row['id']; ?>"> <?php echo $row['name']; ?> </label>
        
  
    </div>
                <?php 
                
                    }

                
                ?>
</div>
</div>
</div>
<div class="clearfix"></div>
<a class="btn btn-sm btn-default" href="users.php"> Hủy
</a>
<button class="btn btn-sm btn-warning"> Lưu </button>
</form>
</div>
</div>