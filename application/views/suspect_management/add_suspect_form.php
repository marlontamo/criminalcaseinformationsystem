<?php
echo "<div>
<ol class='breadcrumb'>
	<li><a href='".base_url()."index.php/suspect_default/index'><i class='glyphicon glyphicon-list'></i>List</a></li>
	<li><a href='".base_url()."index.php/suspect_add_controller/add_suspect_form'><i class='glyphicon glyphicon-pencil'></i>Add New Suspect</a></li>
</ol>
</div>";
?>

<div class='well'>
	
	<?php echo form_open_multipart('suspect_add_controller/add_suspect'); ?>
	<table class ="table table-hover" >
			<h4 class="">Add Suspect Form:</h4>
			<tr>
				<th>Photo</th>
				<td><?php echo form_upload('userfile');?><?php echo form_error('photo' ,'&nbsp<code class="btn-danger">', '</code>'); ?>
				</div></td>
			</tr>
			<tr>
				<th>First Name</th>
				<td><?php echo form_input("firstname", set_value("firstname"),10);?><?php echo form_error('firstname' ,'&nbsp<code class="btn-danger">', '</code>'); ?>
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
					$options = array('invalid'=>'Year',
						'1980'=>'1980','1981'=>'1981','1982'=>'1982','1983'=>'1983','1984'=>'1984','1985'=>'1985','1986'=>'1986','1987'=>'1987','1988'=>'1988',
						'1989'=>'1989','1990'=>'1990','1991'=>'1991','1992'=>'1992','1993'=>'1993','1994'=>'1994','1995'=>'1995','1996'=>'1996','1997'=>'1997',
						'1998'=>'1998','1999'=>'1999','2000'=>'2000','2001'=>'2001','2002'=>'2002','2003'=>'2003','2004'=>'2004','2005'=>'2005','2006'=>'2006',
						'2007'=>'2007','2008'=>'2008','2009'=>'2009','2010'=>'2010','2011'=>'2011','2012'=>'2012','2013'=>'2013','2014'=>'2014','2015'=>'2015',);
					echo form_dropdown("year",$options); ?></div></td>
			</tr>
			
	</table>
	 
	<div class='pull-right control-group btn-group-xs'>
	<a class='btn btn-danger' href='<?php echo base_url().'index.php/suspect_default/index' ?>'>Cancel</a>
	<?php echo form_submit("input_submit", "Add Suspect",'class="btn btn-primary"');?></div><br/><br/>
</form>

</div>
