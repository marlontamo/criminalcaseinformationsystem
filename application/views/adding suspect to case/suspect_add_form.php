<!DOCTYPE html>
<div id="form">
	<?php echo form_open('suspect_assigned/add_suspect'); ?>
	<table class ="table table-hover" >
			<h4 class="">Add Suspect Form:</h4>
			
			<tr>
				<th>Suspect Number</th>
				<td> <?php echo form_dropdown("suspectNo",$data); ?></div></td>
			</tr>
			<tr>
				<th>Case Number</th>
				<td> <?php if($caseNo == null){ 
								echo "<strong>no cases availabe</strong>"; 
						   }else 
								echo form_dropdown("caseNo",$caseNo); 
					 ?></div></td>
			</tr>
			<tr>
				<th>Case Type</th>
				<td><?php $options = array('0'=>'select a case',
									  'Murder'=>'Murder',
									'Homicide'=>'Homicide',
									 'Rubbery'=>'Rubbery',
									   'Arson'=>'Arson',
								 'child_abuse'=>'Child Abuse',
								  'Harassment'=>'Harassment',
									    'Rape'=>'Rape',
								  'Kidnapping'=>'Kidnapping',
									   'Fraud'=>'Fraud',
							'Drug_Trafficking'=>'Drug Trafficking');
						echo form_dropdown("case/s", $options);?><?php echo form_error('case/s' ,'&nbsp<code class="btn-danger">[invalid data] ', '</code>'); ?>
				
			</tr>
			<tr>
				<th>Status</th>
				<td><?php $options = array('0'=>'select a status',
										 'new'=>'New Case',
									'on_going'=>'On Going',
								   'dismissed'=>'Dismissed');
						echo form_dropdown("status", $options);?><?php echo form_error('status' ,'&nbsp<code class="btn-danger">[invalid data] ', '</code>'); ?>
				</td>
			</tr>
			<tr>
				<th>Description</th>
				<td><?php echo form_input("description", set_value("description"),'row="10"');?><?php echo form_error('description','&nbsp<code class="btn-danger">', '</code>'); ?></td>
			</tr>
	</table>
	 
	<div class='pull-right control-group'>
		<div class='btn-group'>
			<?php echo form_submit("", "Cancel",'class="btn btn-danger"');?>
			<?php echo form_submit("input_submit", "Add Suspect",'class="btn btn-primary"');?>
		</div>
	</div>
	
</div>
</form>


