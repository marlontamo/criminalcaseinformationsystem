 
          <h4>
            <a id="menu-toggle" href="#" class="btn btn-default"><i class="icon-reorder"></i></a>
            <?php echo $title; ?> Form:
          </h4><?php echo $message; ?>
        </div>
        <!-- Keep all page content within the page-content inset div! -->
        <div class="page-content inset">
          <div class="content"><br />
		  
		<table class="table table-hover">
			
		</table>
		
		<div class="data">
		
		<table class="table table-hover">
			<tr>
				<td>Photo</td>
				<td><?php echo form_open_multipart($action);
					echo form_upload('userfile');
					
					echo form_error('userfile'); ?></td>
			</tr>
			<tr>
				<td valign="top">First Name<span style="color:red;">*</span></td>
				<td><?php echo form_hidden('agentno', set_value('agentno')); ?><?php echo form_input('fname', set_value('fname', ''), 'class="form-control input-sm"'); ?><?php echo form_error('fname'); ?>
				</td>
			</tr>
			<tr>
				<td valign="top">Middle Name<span style="color:red;">*</span></td>
				<td><?php echo form_input('mname', set_value('mname', ''), 'class="form-control input-sm"'); ?><?php echo form_error('mname'); ?>
				</td>
			</tr>
			<tr>
				<td valign="top">Last Name<span style="color:red;">*</span></td>
				<td><?php echo form_input('lname', set_value('lname', ''), 'class="form-control input-sm"'); ?><?php echo form_error('lname'); ?>
				</td>
			</tr>
			<tr>
				<td valign="top">Password<span style="color:red;">*</span></td>
				<td><?php echo form_password('password', set_value('password', ''), 'class="form-control input-sm"'); ?><?php echo form_error('password'); ?>
				</td>
			</tr>
			<tr>
				<td valign="top">Birthdate<span style="color:red;">*</span></td>
				<td><?php echo form_input('dob', set_value('dob', ''), 'class="form-control input-sm" style="width:80%;"'); ?>
				<a href="javascript:void(0);" onclick="displayDatePicker('dob');"><img style="float:right; margin-top:-30px;" src="<?php echo base_url(); ?>bootstrap/dist/css/images/cal_icon.jpg" alt="calendar" border="0"></a><?php echo form_error('dob'); ?></td>
				</td>
			</tr>
			<tr>
				<td valign="top">Gender<span style="color:red;">*</span></td>
				<td><?php echo form_radio('gender', 'Male', $mgender, 'class="radio-inline"'); ?> Male
					<?php echo form_radio('gender', 'Female', $fgender, 'class="radio-inline"'); ?> Female
<?php echo form_error('gender'); ?>
					</td>
			</tr>
			<tr>
				<td valign="top">Address<span style="color:red;">*</span></td>
				<td><?php echo form_input('address', set_value('address', ''), 'class="form-control input-sm"'); ?><?php echo form_error('address'); ?>
				</td>
			</tr>
			<tr>
				<td valign="top">Contact Number<span style="color:red;">*</span></td>
				<td><?php echo form_input('contactno', set_value('contactno', ''), 'class="form-control input-sm"'); ?>
				</td>
			</tr>
			<tr>
				<td valign="top">Rank</td>
				<td><?php echo form_dropdown('rank', $rank, 'Inspector', 'class="form-control input-sm"'); ?></td>
			</tr>
			<tr>
				<td valign="top">Qualification</td>
				<td><?php echo form_input('qualification', set_value('qualification', ''), 'class="form-control input-sm"'); ?>
				</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td><?php echo form_submit('upload', 'SAVE', 'class="btn btn-default btn-sm"');?></td>
			</tr>
		</table>
		</div>
		</form>
		
	
   
 
      
     