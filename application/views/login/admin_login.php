<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Crime Information System</title>
	<link rel='icon' href="<?php echo base_url().'bootstrap/favicon.png' ?>"  type="image/x-icon"">
	<link href="<?php echo base_url().'bootstrap/css/bootstrap.css' ?>" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url().'bootstrap/css/style.css' ?>" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url().'bootstrap/css/bootstrap-responsive.css' ?>" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url().'bootsrap/bootstrap_custom.css' ?>" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url().'bootstrap/css/design.css' ?>" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url().'bootstrap/css/jumbotron-narrow.css' ?>" rel="stylesheet" type="text/css">
	
	
</head>

<body >

<div class="container">
<div class="well"><h1 style='text-align:center'>Crime Information System</h1>
<?php 

echo "<div class='well'><div class='span4 ; well' style='background-color: white; margin-left: 140px; margin-right: 140px; margin-top:130px; margin-bottom: auto;'>";
echo form_open(base_url()."index.php/admin_login_controller/admin_login");?>
	<!--username-->
    <div class="control-group">
        <div class="controls"><label class="inline control-label">Username:</label>
            <?php
            $admin_username = array(
                'id' => 'username',
                'name' => 'username',
                'style' => 'height:30px; width: 300px; background-color: white; font-family: arial; font-size: 15px ;line-height: 1.5;',
				'value' => ''
                 );
            echo form_input($admin_username,$admin_username['value'],set_value($admin_username['value']));?>
        </div>
    </div>

    <!--password-->
    <div class="control-group">
        <div class="controls"><label class="control-label">Password:</label>
            <?php

            $admin_password = array(
                'id' => 'password',
                'name' => 'password',
                'style' => 'height:30px; width: 300px',
                'value' => ''
				);
            echo form_password($admin_password, set_value($admin_password['name']));?>
        </div>
		<br/>
		<div class='pull-right'>
        <div class="control-group">
            <div class="controls">
                
              
				<?php echo form_submit( "login", "LogIn",'class="btn btn-primary"');?>
			</div>
	</div>
	</div>
    </div><br/><br/>

    
        <!--SUBMIT AND CANCEL-->
		
	</form>
 </div>
</div>





