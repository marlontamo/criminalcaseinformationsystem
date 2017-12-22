<?php
echo "<div>
<ol class='breadcrumb'>
	<li><a href='".base_url()."index.php/admin_default/index'><i class='glyphicon glyphicon-list'></i>List of Admin</a></li>
	<li><a href='".base_url()."index.php/admin_add'><i class='glyphicon glyphicon-plus'></i>Add New Admin</a></li>
</ol>
</div>";
?>
    
    <?php echo form_open_multipart('admin_add/add_admin'); ?>
	
    <div class="control-group">
       
        <div class="controls">
             <label class="inline control-label">photo</label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<?php echo form_upload('userfile');?>
        </div>
    </div>
<br/>
    <div class="control-group">
       
        <div class="controls">
             <label class="inline control-label">Name:</label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
			 <?php $em = array('id' => 'ph', 'name' => 'employeeName', 'style' => 'height:25px; width: 500px', 'required' => 'required');
            echo form_input($em);?>
        </div>
    </div>
<br/>
    <div class="control-group">
        
        <div class="controls">
            <label class="inline control-label">Password:</label>&nbsp&nbsp<?php $pa = array('id' => 'ph', 'name' => 'password', 'style' => 'height:25px; width: 500px', 'required' => 'required');
            echo form_password($pa);?>
        </div>
    </div>
<br/>
    <div class="control-group">
       
        <div class="controls">
            <label class="inline control-label">Position:</label>&nbsp&nbsp&nbsp&nbsp
			<?php $po = array('id' => 'ph', 'name' => 'position', 'style' => 'height:25px; width: 500px', 'required' => 'required');
            echo form_input($po);?>
        </div>
    </div>
<br/>
    <div class="control-group">
        
        <div class="controls">
            <label class="inline control-label">Date:</label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
			<?php $date = array('id' => 'ph', 'name' => 'dateRegistered', 'style' => 'height:25px; width: 500px', 'required' => 'required');
            echo form_input($date);?>
        </div>
    </div>
	<br/>
<div class="pull-right">
    <div class="btn-group btn-group-xs ">
        
            <?php
            $idSubmit = array('id'=>'addButton',
                'value' =>'Add',
                'name'=> 'submit',
                'class' => 'btn btn-primary'
            );

            echo form_submit($idSubmit);?>

            <?php
            $idCancel = array('id'=>'cancelButton',
                'value' =>'Cancel',
                'name'=> 'cancelButton',
                'class' => 'btn btn-default');
            echo form_submit($idCancel);?>
 </div>       
    </div><br/><br/>

   
    </form>