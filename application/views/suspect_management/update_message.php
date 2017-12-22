<?php	
	foreach($dat as $dataIndex ){
				$suspectAssignedNo	= $dataIndex['suspectAssignedNo'];
				$cases	= $dataIndex['case/s'];
				$lastname = $dataIndex['suspect_fname'];
				$firstname = $dataIndex['suspect_lname'];

        echo "<div class='alert alert-success'>
				<a class='close' data-dismiss='alert' href=''>&times;</a>
				<strong>".$lastname." ".$firstname."</strong> was successfully updated! 
			</div>";
	}		
?>			