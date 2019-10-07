<?php  include('home.php');?>
<style>
.form_add_user {
max-width: 500px;
margin: 0 auto;
border: 1px solid #eee;
border-radius: 3px;
padding: 20px;
margin-top: 50px;
}
</style>
<div class="panel" style="box-shadow: none;">
<h2 style="text-align: center;"> Add Members </h2>
<form class="form_add_user" method="post" action="../Controller/add-members.php">
<div class="form-group">
<input type="text" id="login" class="form-control"
name="name" placeholder="Tên tài khoản">
</div>
<div class="form-group">
<input type="email" id="login" class="form-control"
name="email" placeholder="Email">
</div>
<div class="form-group">
<input type="password" id="password" class="formcontrol" name="password" placeholder="Mật khẩu">
</div>
<div class="form-group">
<input type="submit" class="btn btn-sm btn-warning"
value="Thêm thành viên" name="submit">
</div>
</form>
</div>
