<!--move(<s>,<d>);-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap.min.css';?>">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" > -->
</head>

    
<body>


    <div class="navbar navbar-dark bg-dark">
    <div class="container">
        <a href="#" class="navbar-brand">CRUD APPLICATION</a>
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
<div
    class="container" style="padding-top: 10px;">
   
    <div class="row">
        <div class="col-md-8">
        <div class="row">
    <div class="col-8"><h3>View Users</h3></div>
    <div class="col-6 text-right">
        <a href="<?php echo base_url().'index.php/user/create';?>" class="btn btn-primary">Create</a>
    </div>
    </div>
    </div>
    <hr>
    </div>
  
    <div class="row">
        <div class="col-md-8">
        <div class="container">
    
      

<div class="row">
<div class="col-md-8">
<div class="container">
    <table align ="center" border="1px" style="width:900px; line-height:30px"> 
     
<table class="table table-striped">
    <tr>
        <th>ID</th>
        <th>Profile pic</th>
        <th>User name</th>
        
        <th>Contact Number</th>
        <th>Email</th>
        <th>Address</th>
        
        <th width="80">Edit</th>
        <th width="100">Delete</th>
    </tr>
   <?php if(!empty($users)){
        foreach($users as $user) {?>
        <tr>
            <td><?php echo $user['user_id']?></td>
            <td><img src="<?php echo base_url().$user['image_path']; ?>"
  height="50px" weight="50px"></td>
            
            <td><?php echo $user['user_name']?></td>
            <td><?php echo $user['contact_number']?></td>
            <td><?php echo $user['email']?></td>
            <td><?php echo $user['address']?></td>
            


            <td>
                <a href="<?php echo base_url().'index.php/user/edit/'.$user['user_id']?>" class="btn btn-primary">EDIT</a>
        </td>
        <td>
            <a href="<?php echo base_url().'index.php/user/delete/'.$user['user_id']?>" class="btn btn-danger">DELETE</a>
        </td>
        </tr>
        <?php
            }}
             else { ?>
             <tr>
                 <td colspan="5">Records not found</td>
             </tr>
             <?php } ?>
            
          

</table>
             </div>
             </div>
             </div>
             </body>
             </html>



