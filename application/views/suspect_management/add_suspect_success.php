
<?php
//==================SUCCESS PAGE FOR NEW ADDED SUSPECT=================================================================================	
	foreach($data as $dataIndex ){
				$suspectNo	= $dataIndex['suspectNo'];
				$firstName	= $dataIndex['firstname'];
				$lastName	= $dataIndex['lastName'];
				$middleName	= $dataIndex['middleName'];
				$gender	= $dataIndex['gender'];
				$birthdate = $dataIndex['birthdate'];
				$photo = $dataIndex['photo'];
//echo "<a href='".base_url().'index.php/suspect_assigned_controller/add_case_to_suspect_form/'.$suspectNo."'>add case</a><br />";
echo "<div>
<ol class='breadcrumb'>
	<li><a href='".base_url()."index.php/suspect_default/index'><i class='glyphicon glyphicon-list'></i>List</a></li>
	<li><a href='".base_url()."index.php/suspect_view_controller/view_and_add_attribute/".$suspectNo."'><i class='glyphicon glyphicon-eye-open'></i>View</a></li>
 
</ol>
</div>";
echo "<img src='". base_url().'photo/'.$photo."' class='img-thumbnail' width='100px' height='100px'><br/><br/><label>Basic Info</label>
		<br/>
			<table class='table table-hover'>
				<tbody>
					<tr>
					  <td><strong>Name:</strong></td>
					  <td><b>". strtoupper($lastName).", ".$firstName."</b></td>
					</tr>
					<tr>
					  <td><strong>Suspect Number:</strong></td>
					  <td><b>".$suspectNo."</b></td>
					</tr>
					<tr>
					  <td><strong>Gender:</strong></td>
					  <td><b>".$gender."</b></td>
					</tr>
					<tr>
					  <td><strong>Date of Birth:</strong></td>
					  <td><b>".$birthdate."</b></td>
					</tr>
					
				</tbody>
			</table>";
}?>
				
				