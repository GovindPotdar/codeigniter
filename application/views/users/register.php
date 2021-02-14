<?php include "header.php"; ?>
<div class="container row"><div class="col-lg-6">
<div class="alert alert-info mt-4">Sign up</div>

<?php 
echo form_open("Admin/mail");
echo "username ".form_input(array("name"=>"username","class"=>"form-control","value"=>set_value("username")));
echo form_error('username');
echo "password ".form_password(array("class"=>"form-control","name"=>"password","value"=>set_value("password")));
echo form_error('password');
echo "firstname ".form_input(array("name"=>"firstname","class"=>"form-control","value"=>set_value("firstname")));
echo form_error('firstname');
echo "lastname ".form_input(array("name"=>"lastname","class"=>"form-control","value"=>set_value("lastname")));
echo form_error('lastname');
echo "email ".form_input(array("name"=>"email","type"=>"email","class"=>"form-control","value"=>set_value("email")));
echo form_error('email');
echo br(1);
echo form_submit(["name"=>"submit","value"=>"submit"]);
?>
</div>
</div>
<?php include "footer.php"; ?>