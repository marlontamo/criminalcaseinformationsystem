<?php	
	foreach($dat as $dataIndex ){
				$suspectAssignedNo	= $dataIndex['suspectAssignedNo'];
				$suspectNo	= $dataIndex['suspectNo'];
				$casenumber	= $dataIndex['caseNo'];
				$lastname = $dataIndex['suspect_fname'];
				$firstname = $dataIndex['suspect_lname'];
				$photo = $dataIndex['suspect_photo'];
 echo "
		<div class='row' >
			<div class='span7'>
                <div id='photo'><img src='". base_url().'photo/'.$photo."' class='img-thumbnail' width='200px' height='200px'><br />
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
						    </tbody>
						</table>
					
					</div>
                
            </div>
        </div>
		
		<div>
		
		</div>
		</div>";
				}?>
<!------------------------------------------------------------------------------------------->
