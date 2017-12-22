<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Crime Information System</title>
	<link rel='icon' href="<?php echo base_url().'bootstrap/favicon.png' ?>" rel="stylesheet" type="image/x-icon"">
	<link href="<?php echo base_url().'bootstrap/css/bootstrap.css' ?>" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url().'bootstrap/css/style.css' ?>" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url().'bootstrap/css/bootstrap-responsive.css' ?>" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url().'bootsrap/bootstrap_custom.css' ?>" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url().'bootstrap/css/design.css' ?>" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url().'bootstrap/css/jumbotron-narrow.css' ?>" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url().'bootstrap/css/calendar.css' ?>" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url().'bootstrap/css/style.css '?>" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url().'bootstrap/css/style_2.css '?>" rel="stylesheet" type="text/css" />
	
	<script type="text/javascript" src="<?php echo base_url(); ?>bootstrap/js/calendar.js"></script>
	<style>
	strong{color:#fff}
	</style>
	
</head>

<body>
	<!-- Header -->
    <div class="container">
      <div class="header">
        <ul class="nav nav-pills pull-right :control-group">
		  <li ><button type="submit" class="btn btn-danger"><i class="glyphicon glyphicon-user">_<?php echo anchor('admin_login_controller/logout','Signout', array('onclick' => "return confirm('Are you sure want to Logout?')")); ?></i></button></li>
        </ul>
        <h3 class="text-muted">Criminal Case Information System</h3>
      </div>
         
	    
		