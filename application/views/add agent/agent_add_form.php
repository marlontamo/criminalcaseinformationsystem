<div id="form">
	
	<?php echo form_open_multipart('profile/add_agent'); ?>
	<table class ="table" >
			<h4 class="well">Add Agent Form:</h4>
			<tr>
				<th>Photo</th>
				<td><?php echo form_upload('userfile');?><?php echo form_error('photo' ,'&nbsp<code class="btn-danger">', '</code>'); ?>
				</div></td>
			</tr>
			<tr>
				<th>First Name</th>
				<td><?php echo form_input("firstName", set_value("firstName"),10);?><?php echo form_error('firstName' ,'&nbsp<code class="btn-danger">', '</code>'); ?>
				</td>
			</tr>
			<tr>
				<th>Last Name</th>
				<td><?php echo form_input("lastName", set_value("lastName"));?><?php echo form_error('lastName' ,'&nbsp<code class="btn-danger">', '</code>'); ?>
				</td>
			</tr>
			<tr>
				<th>Middle Name</th>
				<td><?php echo form_input("middleName", set_value("middleName"));?><?php echo form_error('middleName','&nbsp<code class="btn-danger">', '</code>'); ?>
				</td>
			</tr>
			<tr>
				<th>Gender</th>
				<td>Male
						   <?php
							$radio_is_checked = $this->input->post('gender') === 'M';
							echo form_radio('gender', 'M', $radio_is_checked, 'id=male');
							?>
					Female
							<?php
							$radio_is_checked = $this->input->post('gender') === 'F';
							echo form_radio('gender', 'F', $radio_is_checked, 'id=female');
							?></td>
			</tr>
			<tr>
				<th>Address</th>
				<td><?php echo form_input("address", set_value("address"));?><?php echo form_error('address','&nbsp<code class="btn-danger">', '</code>'); ?></td>
			</tr>
			<tr>
				<th>Contact Number</th>
				<td><?php echo form_input("contactNo", set_value("contactNo"));?><?php echo form_error('contactNo','&nbsp<code class="btn-danger">', '</code>'); ?>
				</td>
			</tr>
			<tr>
				<th>Date of Birth</th>
				<td> <div id="cal"><?php
						$options = array('month' => 'Month',
							'1'  => 'Jan','2'  => 'Feb',
							'3'  => 'Mar','4'  => 'Apr',
							'5'  => 'May','6'  => 'Jun',
							'7'  => 'Jul','8'  => 'Aug',
							'9'  => 'Sep','10' => 'Oct',
							'11' => 'Nov','12' => 'Dec');
						echo form_dropdown("month",$options); ?>
						
					<?php
					$options = array('Day',
						'1','2','3', '4','5','6','7','8','9','10','11','12',
						'13','14','15','16','17','18','19','20','21','22',
						'23','24','25','26','27','28','29','30','31');

					echo form_dropdown("day",$options); ?>
					<?php
					$options = array('0'=>'Year',
						'1'=>'1980','2'=>'1981','3'=>'1982','4'=>'1983','5'=>'1984','6'=>'1985','7'=>'1986','8'=>'1987','9'=>'1988',
						'10'=>'1989','11'=>'1990','12'=>'1991','13'=>'1992','14'=>'1993','15'=>'1994','16'=>'1995','17'=>'1996','18'=>'1997',
						'19'=>'1998','20'=>'1999','21'=>'2000','22'=>'2001','23'=>'2002','24'=>'2003','25'=>'2004','26'=>'2005','27'=>'2006',
						'28'=>'2007','29'=>'2008','30'=>'2009','31'=>'2010','32'=>'2011','33'=>'2012','34'=>'2013','35'=>'2014','36'=>'2015',);
					echo form_dropdown("year",$options); ?></div></td>
			</tr>
			<tr>
				<th>Rank</th>
				<td><?php echo form_input("rank", set_value("rank"));?><?php echo form_error('rank','&nbsp<code class="btn-danger">', '</code>'); ?></td>
			</tr>
			<tr>
				<th>Description</th>
				<td><?php echo form_input("description", set_value("description"),'row="10"');?><?php echo form_error('description','&nbsp<code class="btn-danger">', '</code>'); ?></td>
			</tr>
	</table>
	 
	<div class='pull-right control-group'>
	<?php echo form_submit("", "Cancel",'class="btn btn-danger"');?>
	<?php echo form_submit("input_submit", "Add Agent",'class="btn btn-primary"');?></div>
</form>


</div>
