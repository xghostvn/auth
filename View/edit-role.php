<?php  include('home.php');
include("../Model/connect_db.php");
$conn = connect_db(); 
$id = $_GET['id'];
$sql="SELECT * FROM roles where id='$id'"; 
    $query=query($conn,$sql);
    $row = fetch_array($query);

?>




<h2> Roles </h2>
<div class="col-md-6">
<h3> Add new </h3>
<div class="panel">
<form method="post" action ="../Controller/edit-role.php?id=<?php echo $row['id']; ?>">
<div class="form-group">
<label for="name"> Name </label>
<input type="text" name="name" value="<?php  echo $row['name']; ?>" required class="form-control">
</div>
<div class="form-group">
<label for="description"> Description </label>
<input type="text" name="description" value="<?php  echo $row['description']; ?>" required class="form-control">
</div>
<div class="form-group">
<input type="hidden" name="edit-role" value="1">
<input type="submit" class="btn btn-sm btn-warning"
value="Edit Role" name="submit">
</div>
</form>


</tbody>
</table>
</div>
</div>