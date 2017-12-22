<!DOCTYPE html>
<?php
foreach($olddata as $dataIndex => $dataValue){
				$dataIndex = $dataValue;
				$dataArr	= $dataIndex;
				$suspectAssignedNo	= $dataIndex['suspectAssignedNo'];
				$suspectNo	= $dataIndex['suspectNo'];
				$casenumber	= $dataIndex['caseNo'];
				$case = $dataIndex['case/s'];
				$status	= $dataIndex['status'];
				$description	= $dataIndex['description'];
				$lastname = $dataIndex['suspect_fname'];
				$firstname = $dataIndex['suspect_lname'];
				
/*========================================================================================*/
//echo "<div id='oldform'></div>";
echo "<div id='form'>";
	echo form_open('suspect_assigned/update_suspect_control'); 
echo	"<table class ='table table-bordered' >
			<h4 class='well'>Suspect Assigned No ".$suspectAssignedNo."  Update Suspect Form:</h4>
			<tr>
				<th>Suspect Name:</th>
				<td><strong>".strtoupper($lastname).", ".$firstname."</strong> 
		</td><th></th>
			<td><div class='hidden'>". form_input('suspectAssignedNo', $suspectAssignedNo, 'readonly')."</div></td>
			</tr>
			<tr>
				<th>Suspect Number</th>
				<td><strong>".$suspectNo."</strong></td> 
				<th>new suspect no.</th>
				<td>".form_dropdown("suspectNo",$data)."</td>

			</tr>
			<tr>
				<th>Case Number</th>
				<td><strong>".$casenumber."</strong></td>
				<th>new case no. </th>";
				echo "<td>".form_dropdown('caseNo',$caseNo)."</td>
			</tr>
			<tr>
				<th>Case Type</th>
				<td><strong>".$case."</strong></td>
				<th>new case </th>
				<td>"; $options = array('0'=>'select a case',
						'Murder'=>'Murder','Homicide'=>'Homicide','Rubbery'=>'Rubbery','Arson'=>'Arson','child_abuse'=>'Child Abuse','Harassment'=>'Harassment','Rape'=>'Rape','Kidnapping'=>'Kidnapping','Fraud'=>'Fraud',
						'Drug_Trafficking'=>'Drug Trafficking',);
						echo form_dropdown("case/s", $options);
						
echo			"</td>
			</tr>
			<tr>
				<th>Status</th>
				<td><strong>".$status."</strong></td>
				<th>new status </th>
				<td>"; $options = array('0'=>'select a status',
						'new'=>'New Case','on_going'=>'On Going','dismissed'=>'Dismissed',);
						echo form_dropdown("status", $options);
						
echo			"</td>
			</tr>
			<tr>
				<th>Description</th>
				<td><strong>".$description."</strong></td>
				<th>new description </th>
				<td>"; echo form_input("description", set_value("description"),'row="10"');
						
echo			"</td>
			</tr>
	</table>";
	 
	
			echo form_submit("submit", "Update",'class="btn btn-danger"');
			
echo		"</form><br/><hr/>";

}?>
