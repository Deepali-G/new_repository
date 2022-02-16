<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap.min.css';?>">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" > -->
</head>
<body>
    <div class="container">
        <?php
        $msg=$this->session->flashdata('msg');
        if($msg !=""){
            echo "<div class='alert alert_success'>'.$msg.'</div>";
        }
        ?>

        <div class="col-md-6"></div>
        <div class="card mt-4">
  <div class="card-header">
  <b><h2>CRUD APPLICATION </b>
  </div>
  <form action="<?php echo base_url().'user/create'?>" name="registerForm" id="registerForm" method="post" enctype="multipart/form-data">


  <div class="card-body register">
  <p class="card-text"><b><h3>Register Here</h3></b></p>
    <p class="card-text"><h4>Please fill your detail here</h4></p>
    
    
    <div  class="form-group">
    Select Image File to Upload:
    <input type="file" name="image_path" id="image_path" value="<?php echo set_value('image_path') ?>" class="form-control" <?php echo strip_tags(form_error('image_path') != "")? 'is-invalid' : '';?> placeholder="Profile pic"> 
</div>

    <div class="form-group">
        <label for="name">User Name</label>
        <input type="text" name="user_name" id="user_name" value="<?php echo set_value('user_name') ?>" class="form-control" <?php echo strip_tags(form_error('user_name') != "")? 'is-invalid' : '';?> placeholder="User Name"> 
        
</div>

<div class="form-group">
        <label for="name">Email ID</label>
        <input type="text" name="email" id="email" value="<?php echo set_value('email') ?>" class="form-control" placeholder="Email">
        <p class="invalid-feedback"> <?php echo form_error('email') ;?></p>
</div>
<div class="form-group">
        <label for="name">Contact Number</label>
        <input type="text" name="contact_number" id="phoncontact_number" value="<?php echo set_value('contact_number') ?>" class="form-control" placeholder="contact_number">
        <p class="invalid-feedback">  <?php echo form_error('contact_number') ;?></p>
</div>
<div class="form-group">
        <label for="name">Address</label>
        <input type="address" name="address" id="address" value="<?php echo set_value('address') ?>" class="form-control" placeholder="address">
        <p class="invalid-feedback"> <?php echo form_error('address') ;?></p>
</div><br>

<div class="form-group">
        <button class="btn btn-block btn-primary">CREATE</button>
        <a href="<?php echo base_url().'index.php/user/index';?>" class ="btn-secondary btn"> CANCEL</a>
</div>
</div>
<div class="container" style="padding-top:10px;">
<div class="row">
    <div class="col-md-12">
        <?php
        $success=$this->session->userdata('success');
        if($success !=""){
            ?>
            <div class="alert alert-success"><?php echo $success;?>
        </div>
            <?php
        }
        ?>
         <?php
        $failure=$this->session->userdata('failure');
        if($failure !=""){
            ?>
            <div class="alert alert-success"><?php echo $failure;?>
        </div>
            <?php
        }
        ?>
  </div>
  </div>
  </form>
</div>
</div>       
</div>
</body>
</html>