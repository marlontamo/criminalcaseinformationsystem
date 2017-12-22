
<?php
//==================SUCCESS PAGE FOR NEW ADDED SUSPECT=================================================================================	

	foreach($case as $dataIndex ){
				$suspectAssignedNo	= $dataIndex['suspectAssignedNo'];
				$suspectNo	= $dataIndex['suspectNo'];
				$caseNo	= $dataIndex['caseNo'];
				$crime	= $dataIndex['type_of_crime'];
				$agentNo	= $dataIndex['agent_No'];
				$victim	= $dataIndex['case_victim'];
				$status = $dataIndex['status'];
//echo "<a href='".base_url().'index.php/suspect_assigned_controller/add_case_to_suspect_form/'.$suspectNo."'>add case</a><br />";
echo "<table class='table table-hover'>
			<thead>
					<tr>
					  <th><b>Information</b></th>
					  <th><b>Data</b></th>
					  <th><b>Option</b></th>
					</tr>
			</thead>
				<tbody>
					<tr>
					  <td><strong>Case No:</strong></td>
					  <td><b>".$caseNo ."</b></td>
					  <td><a href='".base_url()."index.php/suspect_assigned_controller/delete_case_to_assigned_suspect/".$suspectNo."/".$suspectAssignedNo."''><i class='glyphicon glyphicon-trash'></i></a></td>
					</tr>
					<tr>
					  <td><strong>Crime Type:</strong></td>
					  <td><b>".$crime."</b></td>
					  <td></td>
					</tr>
					<tr>
					  <td><strong>Victim:</strong></td>
					  <td><b>".$victim."</b></td>
					  <td></td>
					</tr>
					<tr>
					  <td><strong>Agent No:</strong></td>
					  <td><b>".$agentNo."</b></td>
					  <td></td>
					</tr>
					<tr>
					  <td><strong>Case Status:</strong></td>
					  <td><b>".$status."</b></td>
					  <td></td>
					</tr>
					
				</tbody>
			</table>";
}?>
				
				