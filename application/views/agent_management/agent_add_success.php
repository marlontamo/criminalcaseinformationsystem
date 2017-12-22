<?php
foreach($dat as $dataIndex ){
    $agentAssignedNo	= $dataIndex['agentAssignedNo'];
    $agentNo	= $dataIndex['agentNo'];
    $casenumber	= $dataIndex['caseNo'];
    $status	= $dataIndex['status'];
    $lastName = $dataIndex['agent_fname'];
    $firstName = $dataIndex['agent_lname'];
    $photo = $dataIndex['suspect_photo'];
    echo "
		<div class='row' >
			<div class='span7'>
                <div id='photo'><img src='". base_url().'photo/'.$photo."' class='img-thumbnail' width='200px' height='200px'><br />
						<div class=''>Name:<h4>". $lastName." ".$firstName."</h4>
						</div>
				</div>
					<div id='data' class='well'>
						<table class='table table-hover'>
							<tbody>
								<tr>
									<td><strong>Suspect Assigned No:</strong></td>
									<td>".$agentAssignedNo."</td>
								</tr>
								<tr>
								  <td><strong>Suspect No:</strong></td>
								  <td>".$agentNo."</td>
								</tr>
								<tr>
								  <td><strong>Case No:</strong></td>
								  <td>".$casenumber."</td>
								</tr>

								<tr>
								  <td><strong>Status:</strong></td>
								  <td>".$status."</td>
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
					<button class='btn btn-info'><span class='icon-print' onclick='javascript:window.print();' data-original-title='assigned agent'>Print</span></button>
				</div>
		</div>
		</div>
		</div>";
}?>
<!------------------------------------------------------------------------------------------->
