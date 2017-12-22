<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Criminal Case Information System</title>
	<link rel='icon' href="<?php echo base_url().'bootstrap/favicon.png' ?>"  type="image/x-icon"">
	<link href="<?php echo base_url().'bootstrap/css/bootstrap.css' ?>" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url().'bootstrap/css/style.css' ?>" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url().'bootstrap/css/bootstrap-responsive.css' ?>" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url().'bootsrap/bootstrap_custom.css' ?>" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url().'bootstrap/css/design.css' ?>" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url().'bootstrap/css/jumbotron-narrow.css' ?>" rel="stylesheet" type="text/css">
	
	
</head>
<style type="text/css">
    .rightside{
        border-left: 5px solid #fff;
        margin-left: 10px;
    }input{
        height: 27px!important;
        border-radius: 2px!important;
    }
</style>
<body >

<div class="container">
<div class="row">
<div class="col-lg-6 left">
<div class="row"><h1 style='text-align:center'>Registration Form</h1>
<?php echo form_open(base_url()."index.php/User_Reg_controller/reg");?>
<div class="row">
     <div class="control-group col-md-4">
        <div class="controls"><label class="inline control-label">FirstName:</label>
            <?php
            $admin_username = array(
                'id' => 'username',
                'name' => 'firstname',
                'class'=>"form-control",
                'value' => '',
                'style'=> "width:100%",
                 );
            echo form_input($admin_username,$admin_username['value'],set_value($admin_username['value']));?>
        </div>
    </div>
    <div class="control-group col-md-4">
        <div class="controls"><label class="inline control-label">Middlename:</label>
            <?php
            $admin_username = array(
                'id' => 'username',
                'name' => 'middlename',
                'class'=>"form-control",
                'value' => '',
                'style'=> "width:100%",
                 );
            echo form_input($admin_username,$admin_username['value'],set_value($admin_username['value']));?>
        </div>
    </div>
    
       <div class="control-group col-md-4">
        <div class="controls"><label class="inline control-label">Lastname:</label>
            <?php
            $admin_username = array(
                'id' => 'username',
                'name' => 'lastname',
                'class'=>"form-control",
                'value' => '',
                'style'=> "width:100%",
                 );
            echo form_input($admin_username,$admin_username['value'],set_value($admin_username['value']));?>
        </div>
    
   </div>
</div>
<?php 
echo "<div class='row'>";
       ?>
       <div class="row">
           <div class="col-md-3"></div>
           <div class="control-group col-md-8">
        <div class="controls"><label class="inline control-label">Username/Email:</label>
            <?php
            $admin_username = array(
                'id' => 'username',
                'type'=>'Email',
                'name' => 'email',
                'class'=>"form-control",
                'value' => '',
                'style'=> "width:70%",
                 );
            echo form_input($admin_username,$admin_username['value'],set_value($admin_username['value']));?>
        </div>
    </div>
        <div class="col-md-2"></div>
       </div>
        <div class='col-lg-6 left'>
            
    
    <!--2-->
   <div class="row">
       <div class="control-group">
        <div class="controls"><label class="inline control-label">Password:</label>
            <?php
            $admin_username = array(
                'id' => 'username',
                'name' => 'Password',
                'class'=>"form-control",
                'value' => '',
                'type'=> 'password',
                'style'=> "width:100%",
                 );
            echo form_input($admin_username,$admin_username['value'],set_value($admin_username['value']));?>
        </div>
    </div>
   </div>
    <div class="control-group">
        <div class="controls"><label class="inline control-label">Birth date:</label>
            <?php
            $admin_username = array(
                'id' => 'username',
                'name' => 'birthdate',
                'class'=>"form-control",
                'value' => '',
                'type'  =>'date',
                'style'=> "width:100%",
                 );
            echo form_input($admin_username,$admin_username['value'],set_value($admin_username['value']));?>
        </div>
    </div>
        </div><!--end leftside-->
        <div class='col-lg-6 right'>
            <!--username-->
    
    <div class="row">
       <div class="col-md-4"><input type="hidden"></div>
   </div>
    <!--2-->
    <div class="row pass">
       <div class="control-group">
        <div class="controls"><label class="inline control-label">confirm Password:</label>
            <?php
            $admin_username = array(
                'id' => 'username',
                'name' => 'password',
                'class'=>"form-control",
                'value' => '',
                'type'  => 'password',
                'style'=> "width:100%",
                 );
            echo form_input($admin_username,$admin_username['value'],set_value($admin_username['value']));?>
        </div>
    </div>
   </div>
   </div>
   
        <?php echo form_submit('mysubmit', 'Submit Post!');?>
        </div>
      

	
    
   </div>

   </div></div>
   

<!--end of leftsidepart-->
   </div><!--main container-->