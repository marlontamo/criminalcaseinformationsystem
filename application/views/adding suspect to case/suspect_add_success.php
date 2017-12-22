<?php	
	foreach($dat as $dataIndex ){
				$suspectAssignedNo	= $dataIndex['suspectAssignedNo'];
				$suspectNo	= $dataIndex['suspectNo'];
				$casenumber	= $dataIndex['caseNo'];
				$cases	= $dataIndex['case/s'];
				$status	= $dataIndex['status'];
				$description	= $dataIndex['description'];
				$lastname = $dataIndex['suspect_fname'];
				$firstname = $dataIndex['suspect_lname'];
 echo "
		<div class='row' >
			<div class='span10'>
                <div id='photo'><img src='img/user.png' width='186px'><br />
						<div class=''>Name:<h4>". $lastname." ".$firstname."</h4>
						</div>
				</div>
					<div id='data' class='well'>
						<table class='table table-hover'>
							<tbody>
								<tr>
									<td><strong>Suspect Assigned No:</strong></td>
									<td>".$suspectAssignedNo."</td>
								</tr>
								<tr>
								  <td><strong>Suspect No:</strong></td>
								  <td>".$suspectNo."</td>
								</tr>
								<tr>
								  <td><strong>Case No:</strong></td>
								  <td>".$casenumber."</td>
								</tr>
								<tr>
								  <td><strong>Case/s:</strong></td>
								  <td>".$cases."</td>
								</tr>
								<tr>
								  <td><strong>Status:</strong></td>
								  <td>".$status."</td>
								</tr>
								<tr>
								  <td><strong>Description:</strong></td>
								  <td><div class='alert alert-info'>".$description."</div></td>
								</tr>
						    </tbody>
						</table>
					
					</div>
                
            </div>
        </div>
		
		<div>
		<div class='pull-right '>
				<div class='btn-group btn-group-lg'>
					<button class='btn btn-primary '>Profile</button>
					<button class='btn btn-danger'>Cases</button>
					<button class='btn btn-info'><span class='icon-print' onclick='javascript:window.print();' data-original-title='assigned suspect'>Print</span></button>
				</div>
		</div>
		</div>
		</div>";
				}?>
<!------------------------------------------------------------------------------------------->
