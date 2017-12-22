<!DOCTYPE html>
<div id="form">
	<?php echo form_open('suspect_assigned_controller/add_case_to_suspect'); ?>
	<table class ="table table-hover" >
			<h4 class="">Add New Case to Suspect Form:</h4>
			
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
			
	</table>
	 
	<div class='pull-right control-group'>
		<div class='btn-group'>
			
			<?php echo form_submit("input_submit", "Add Suspect",'class="btn btn-primary btn-xs"');?>
		</div>
	</div><br/><br/>
	
</div>
</form>


