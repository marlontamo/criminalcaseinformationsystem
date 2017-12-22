<?php	
	foreach($data as $dataIndex => $dataValue){
				$dataIndex = $dataValue;
				$agentNo	= $dataIndex['agentNo'];
				$firstName	= $dataIndex['firstName'];
				$lastName	= $dataIndex['lastName'];
				$middleName	= $dataIndex['middleName'];
				$gender	= $dataIndex['gender'];
				$address = $dataIndex['address'];
				$contactNo = $dataIndex['contactNo'];
				$birthdate = $dataIndex['birthdate'];
				$rank = $dataIndex['rank'];
				$description = $dataIndex['qualifications'];
				$photo = $dataIndex['photo'];
				
        echo "<div class='container'>
		
		<div class='alert alert-success' >
				<a class='close' data-dismiss='alert' href=''>x</a>
				<strong>".$lastName.", ".$firstName."</strong> was successfully added as Agent! 
			</div>
		
			<div class='span8'>
               
						
				
					<div id='data' class='span8'>
					 <div class='well'><img src='". base_url().'photo/'.$photo."' width='200px'></div>
						<table class='table'>
							<tbody>
								<tr>
								  <td><strong>Name:</strong></td>
								  <td><h4>". strtoupper($lastName).", ".$firstName."</h4></td>
								</tr>
								<tr>
								  <td><strong>AgentNo:</strong></td>
								  <td>".$agentNo."</td>
								</tr>
								<tr>
								  <td><strong>Rank:</strong></td>
								  <td>".$rank."</td>
								</tr>
								
								<tr>
								  <td><strong>Address:</strong></td>
								  <td>".$address."</td>
								</tr>
								<tr>
								  <td><strong>Gender:</strong></td>
								  <td>".$gender."</td>
								</tr>
								<tr>
								  <td><strong>Date of Birth:</strong></td>
								  <td>".$birthdate."</td>
								</tr>
								<tr>
								  <td><strong>Address:</strong></td>
								  <td>".$address."</td>
								</tr>
								<tr>
								  <td><strong>Contact No:</strong></td>
								  <td>".$contactNo."</td>
								</tr>
								<tr>
								  <td><strong>Qualifications:</strong></td>
								  <td><div class='alert alert-success'>".$description."</div></td>
								</tr>
						    </tbody>
						</table>
					
					</div>
                
            </div>
        </div>
		
		
		<div class='pull-right '>
			<button class='btn btn-warning' onclick='javascript:window.print();' data-original-title=''><span class='icon-print' ></span>Print</button>
		</div>
		</div>";
				}?>