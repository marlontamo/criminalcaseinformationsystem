
      <!-- Page content -->
<?php
echo "<div>
<ol class='breadcrumb'>
	<li><a href='".base_url()."index.php/agent_default/index'><i class='glyphicon glyphicon-list'></i>Agent List</a></li>
	<li><a href='".base_url()."index.php/agent_default/view/".$agent->agentNo."'><i class='glyphicon glyphicon-eye-open'></i>View Agent Details</a></li>
 
</ol>
</div>";
?>		     
          
        </div>
        <!-- Keep all page content within the page-content inset div! -->
        <div class="content-header">
			
				
				<table class="table table-responsive table-striped">
					<tr>
					<td style="text-align:center">Agent Photo</td>
					<td style="text-align:center"><img  style="width:50px; height:50px;" src="<?php echo base_url().'images/'.$agent->photo?>" class="img img-thumbnail img-lg"/></td>
					</tr>
					<tr style="text-align:center">
						<td style="text-align:center">Agent Number</td>
						<td style="text-align:center"><?php echo $agent->agentNo; ?></td>
					</tr>
					<tr>
						<td style="text-align:center">Name</td>
						<td style="text-align:center"><?php echo $agent->firstName.' '.$agent->middleName.' '.$agent->lastName; ?></td>
					</tr>
					<tr>
						<td style="text-align:center">Birthdate</td>
						<td style="text-align:center"><?php echo $agent->birthdate; ?></td>
					</tr>
					<tr>
						<td style="text-align:center">Gender</td>
						<td style="text-align:center"><?php echo $agent->gender; ?></td>
					</tr>
					<tr>
						<td style="text-align:center">Address</td>
						<td style="text-align:center"><?php echo $agent->address; ?></td>
					</tr>
					<tr>
						<td style="text-align:center">Contact Number</td>
						<td style="text-align:center"><?php echo $agent->contactNo; ?></td>
					</tr>
					<tr>
						<td style="text-align:center">Rank</td>
						<td style="text-align:center"><?php echo $agent->rank; ?></td>
					</tr>
					<tr>
						<td style="text-align:center">Qualifications</td>
						<td style="text-align:center"><?php echo $agent->qualification; ?></td>
					</tr>
					
					
					
				</table>
			
    
      
	