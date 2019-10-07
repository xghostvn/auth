<?php  include('home.php');?>




<h2> Quyền </h2>
<div class="col-md-6">
<h3> Thêm mới </h3>
<div class="panel">
<form method="post" action ="../Controller/add-permission.php">
<div class="form-group">
<label for="name"> Tên: </label>
<input type="text" name="name" required class="form-control">
</div>
<div class="form-group">
<label for="description"> Mô tả: </label>
<textarea name="description" cols="30" rows="10" class="formcontrol"></textarea>
</div>
<div class="form-group">
<input type="hidden" name="add-permission" value="1">
<input type="submit" class="btn btn-sm btn-warning"
value="Thêm mới" name="submit">
</div>
</form>


</tbody>
</table>
</div>
</div>