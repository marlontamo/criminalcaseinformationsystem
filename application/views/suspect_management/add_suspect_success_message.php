<?php	
	foreach($data as $dataIndex ){
				$suspectNo = $dataIndex['suspectNo'];
				$firstName	= $dataIndex['firstname'];
				$lastName	= $dataIndex['lastName'];
				
echo "<div class='alert alert-success' >
				<a title='add attribute for this suspect' class='close' data-dismiss='alert' href='".base_url()."index.php/suspect_view_controller/view_and_add_attribute/".$suspectNo."'>+</a>
				<strong>".$lastName.", ".$firstName."</strong> was successfully added as Agent! 
			</div>";
	}		
?>