
<!-- Page content -->
<?php
foreach ($views as $row){

        }
echo "<div>
<ol class='breadcrumb'>
	<li><a href='".base_url()."index.php/admin_default/index'><i class='glyphicon glyphicon-list'></i>List of Admin</a></li>
	<li><a href='".base_url()."index.php/admin_update/update/".$row->adminNo."'><i class='glyphicon glyphicon-pencil'></i>Update Admin Profile</a></li>
</ol>
</div>";
?>
<div >
    <div >
        


        <?php echo form_open_multipart(base_url()."index.php/admin_update/update_admin");
        
		


        $ad = array('id' => 'ad', 'name' => 'adminNo','readonly'=>'true', 'value' => $row-> adminNo);
        echo form_hidden($ad)."<br/>

        Photo:<br/>";
       
        echo form_upload('userfile')."<br/>

        Admin Name:<br/>";
        $na = array('id' => 'na', 'name' => 'employeeName','style' => 'height:25px; width:600px;', 'value' => $row-> employeeName);
        echo form_input($na)."<br/>

        Password:<br/>";
        $pa = array('id' => 'pa', 'name' => 'password','style' => 'height:25px; width:600px;', 'value' => $row-> password);
        echo form_password($pa)."<br/>

        Position:<br/>";
        $po = array('id' => 'po', 'name' => 'position','style' => 'height:25px; width:600px;', 'value' => $row-> position);
        echo form_input($po)."<br/>

        Date of Registration: <br/>";
        $da = array('id' => 'da', 'name' => 'dateRegistered','style' => 'height:25px; width:600px;', 'value' => $row-> dateRegistered);
        echo form_input($da)."<br/><br/>";
		echo "<div class='pull-right'>";
        $sub = array('id' => 'submit', 'value' => 'Submit', 'name' => 'updateAdmin','class' => 'btn btn-primary btn-xs');
        echo form_submit($sub)."</div><br/>";
        
		?>

    </div>
</div>
