<?php
echo "<div>
<ol class='breadcrumb'>
	<li><a href='".base_url()."index.php/agent_default/index'><i class='glyphicon glyphicon-list'></i>Agent List</a></li>
	<li><a href='".base_url()."index.php/agent_default/view/".$agentno."'><i class='glyphicon glyphicon-pencil'></i>Update Agent</a></li>
 
</ol>
</div>";
?>		  
          <?php echo $message; ?>
        
        <!-- Keep all page content within the page-content inset div! -->
        
			<div class="content"><br />
				<div>
					<table class="table table-hover">
						<tr><td>Photo</td>
							<td><?php echo form_open_multipart($action);
								echo form_upload('userfile');
								echo form_error('userfile'); ?></td>
						</tr>
						<tr>
							<td valign="top">First Name<span style="color:red;">*</span></td>
							<td><?php echo form_hidden('agentno', set_value('agentno', $agentno));
									echo form_input('fname', set_value('fname', $fname), 'class="form-control input-sm"');
									echo form_error('fname'); ?>
							</td>
						</tr>
						<tr>
							<td valign="top">Middle Name<span style="color:red;">*</span></td>
							<td><?php echo form_input('mname', set_value('mname', $mname), 'class="form-control input-sm"');
									echo form_error('mname'); ?>
							</td>
						</tr>
						<tr>
							<td valign="top">Last Name<span style="color:red;">*</span></td>
							<td><?php echo form_input('lname', set_value('lname', $lname), 'class="form-control input-sm"');
									echo form_error('lname'); ?>
							</td>
						</tr>
						<tr>
							<td valign="top">Password<span style="color:red;">*</span></td>
							<td><?php echo form_password('password', set_value('password', $password), 'class="form-control input-sm"');
									echo form_error('password'); ?>
							</td>
						</tr>
						<tr>
							<td valign="top">Birthdate<span style="color:red;">*</span></td>
							<td><?php echo form_input('dob', set_value('dob', $dob), 'class="form-control input-sm" style="width:80%;"'); ?>
							<a href="javascript:void(0);" onclick="displayDatePicker('dob');"><i class='glyphicon glyphicon-calendar pull-right'></i><!--img style="float:right; margin-top:-30px;" src="<//?php echo base_url(); ?>bootstrap/dist/css/images/cal_icon.jpg" alt="calendar" border="0"--></a><?php echo form_error('dob'); ?></td>
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
							<td><?php echo form_input('address', set_value('address', $address), 'class="form-control input-sm"');
									echo form_error('address'); ?>
							</td>
						</tr>
						<tr>
							<td valign="top">Contact Number<span style="color:red;">*</span></td>
							<td><?php echo form_input('contactno', set_value('contactno', $contactno), 'class="form-control input-sm"');
									echo form_error('contactno'); ?>
							</td>
						</tr>
						<tr>
							<td valign="top">Rank</td>
							<td><?php echo form_dropdown('rank', $rank, 'Inspector', 'class="form-control input-sm"'); ?></td>
						</tr>
						<tr>
							<td valign="top">Qualification</td>
							<td><?php echo form_input('qualification', set_value('qualification', $qualification), 'class="form-control input-sm"'); ?>
							</td>
						</tr>
						<tr>
							<td>&nbsp;</td>
							<td><?php echo form_submit('upload', 'SAVE', 'class="btn btn-default btn-sm"');?></td>
						</tr>
		</table>
		</div>
		</form>
		
	
   
 
      
     