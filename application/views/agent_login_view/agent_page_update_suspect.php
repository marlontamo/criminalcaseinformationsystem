<div class='well'>
<?php 
foreach($data as $dataIndex ){
				$suspectNo	= $dataIndex['suspectNo'];
				$firstName	= $dataIndex['firstname'];
				$lastName	= $dataIndex['lastName'];
				$middleName	= $dataIndex['middleName'];
				$gender	= $dataIndex['gender'];
				$birthdate = $dataIndex['birthdate'];
				$photo = $dataIndex['photo'];
				$null = null;
echo form_open_multipart(base_url()."index.php/suspect_update_controller/update_suspect/$suspectNo");?>
    <div class="control-group">
        <label class="inline control-label">Photo</label>
        <div class="controls">
		
	<?php echo "<div class='pull-right'><img src='". base_url().'photo/'.$photo."' width='100px' height='100px' class='img-thumbnail' id='photo2'><br/>".$lastName.", ".$firstName." </div>";
	    $image = array( 'type' => 'file', 'name' => 'userfile' , 'value' => $photo
		);
	echo form_upload($image);?><?php echo form_error('photo' ,'&nbsp<code class="btn-danger">', '</code>'); ?>
	 </div>
    </div>
	<!--LAST NAME FIELD-->
    <div class="control-group">
        <label class="inline control-label">Last Name</label>
        <div class="controls">
            <?php
            $lname = array(
                'id' => 'lastname',
                'name' => 'lastName',
                'style' => 'height:30px ; width: 250px; font-size: 1.3em',
				'value' => $lastName
                 );
            echo form_input($lname);?>
        </div>
    </div>

    <!--FIRST NAME FIELD-->
    <div class="control-group">
        <label class="control-label">First Name</label>
        <div class="controls">
            <?php

            $fname = array(
                'id' => 'firstname',
                'name' => 'firstname',
                'style' => 'height:30px; width: 250px; font-size: 1.3em',
                'value' => $firstName);
            echo form_input($fname);?>
        </div>
    </div>

    <!--MIDDLE NAME FIELD-->
    <div class="control-group">
        <label class="control-label">Middle Name</label>
        <div class="controls">
            <?php
            $mname = array(
                'id' => 'middleName',
                'name' => 'middleName',
                'style' => 'height:30px ; width: 250px; font-size: 1.3em',
				'value' => $middleName);
            echo form_input($mname);?>
        </div>
    </div>

    <!--GENDER FIELD-->
    <div class="form-inline">
        <label class="control-label">Gender</label><br />
        <!--MALE FIELD-->
        <label class="radio control-label">
            <?php
			
				echo form_radio('gender', 'M', $gender);
		   
            ?>
            Male
        </label>
        <!--FEMALE FIELD-->
        <label class="radio control-label">
            <?php
			echo form_radio('gender', 'F', $gender);
			
           ?></td>
            Female
        </label><br />

        <!--SUBMIT AND CANCEL-->
		<div class='pull-right'>
        <div class="control-group btn-group-xs">
            <div class="controls">
              
				<?php echo form_submit( "submit", "Update",'class="btn btn-primary btn-xs"');?>
                <?php echo "<a title='Exit' class='btn btn-danger btn-xs' href='".base_url()."index.php/suspect_view_controller/viewer/".$suspectNo."'>cancel</a>";?>
    </div>
	</div>
	</div><br/><br/></div></form></div>
	<?php } ?>