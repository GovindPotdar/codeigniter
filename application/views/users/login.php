<?php include "header.php"; ?>
<div class="container">
<div class="alert alert-info mt-4">Login</div>
    <p style="color:red"; >
    <?php echo $this->session->flashdata("error"); ?>
    </p>
    <?php echo form_open("Admin/index"); ?>
    Name : <?php echo form_input(array("class"=>"form-control","name"=>"name","value"=>set_value("name"))); ?><br>
    <?php echo form_error("name"); ?>
    
    password : <?php echo form_password(array("class"=>"form-control","name"=>"password","value"=>set_value("password"))); ?><br>
    <?php echo form_error("password"); ?>
    <?php echo form_submit(array("value"=>"submit","name"=>"submit")); ?>
    <?php echo  form_reset(array("value"=>"reset")); ?>
    <a href="<?php echo base_url("Admin/register"); ?>">or sign up?</a>
    <?php echo form_close(); ?>
    
    
    </div>

    
<?php include "footer.php"; ?>

