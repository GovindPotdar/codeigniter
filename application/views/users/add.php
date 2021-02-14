<?php include "header.php"; ?>

<div class="container mt-4">
    <div class="alert alert-success">Add article</div>
    <?php
    echo form_open("Admin/add");
    echo "Title ".form_input(["class"=>"form-control","name"=>"title","value"=>set_value("title")]);
    echo form_error("title");
    echo br(1);
    echo "Discription ".form_textarea(["class"=>"form-control","name"=>"body","value"=>set_value("body")]);
    echo form_error("body");
    echo br(1);
    echo form_submit(["name"=>"submit","value"=>"submit","class"=>"btn btn-danger"]);
    ?>
</div>
<?php include "footer.php"; ?>