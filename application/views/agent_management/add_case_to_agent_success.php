<?php 

foreach($agent as $data){
      
     
  echo        "<h4>
            <a id='menu-toggle' href='#' class='btn btn-default'><i class='icon-reorder'></i></a>
            Detailed View
          </h4>
        </div>
       
        <div class='content-header'>
			
				
				<table class='table table-responsive table-striped'>
					<tr>
					<td style='text-align:center'>Agent Photo</td>
					<td style='text-align:center'>";
	echo				"<img  style='width:150px; height:150px;' src='".base_url().'images/'.$data['photo']."' class='img img-thumbnail img-lg'/></td>
					</tr>
					<tr style='text-align:center'>
						<td style='text-align:center'>Agent Number</td>
						<td style='text-align:center'>".$data['agentNo']."</td>
					</tr>
					<tr>
						<td style='text-align:center'>Name</td>
						<td style='text-align:center'>".$data['firstName']." ".$data['middleName']." ".$data['lastName']."</td>
					</tr>
					<tr>
						<td style='text-align:center'>Birthdate</td>
						<td style='text-align:center'>".$data['birthdate']."</td>
					</tr>
					<tr>
						<td style='text-align:center'>Gender</td>
						<td style='text-align:center'>".$data['gender']."</td>
					</tr>
					<tr>
						<td style='text-align:center'>Address</td>
						<td style='text-align:center'>".$data['address']."</td>
					</tr>
					<tr>
						<td style='text-align:center'>Contact Number</td>
						<td style='text-align:center'>".$data['contactNo']."</td>
					</tr>
					<tr>
						<td style='text-align:center'>Rank</td>
						<td style='text-align:center'>".$data['rank']."</td>
					</tr>
					<tr>
						<td style='text-align:center'>Qualifications</td>
						<td style='text-align:center'>".$data['qualification']."</td>
					</tr>
					
					
					
				</table>";
}			
?>    
      
	