<?php
foreach($caseNo as $c){

echo "<div >
		<ol class='breadcrumb' >
		  <li><a href='".base_url()."index.php/agent_page_controller/agent/".$c."'><i class='glyphicon glyphicon-home'>Home</i></a></li>
		  <li><a href='".base_url()."index.php/agent_page_controller/agent_view_full_desc/".$c."'><i class='glyphicon glyphicon-briefcase'>Case</i></a></li>
		  <li><a href='".base_url()."index.php/agent_page_controller/agent_view_suspect/".$c."'><i class='glyphicon glyphicon-paperclip'>Suspect</i></a></li>
		  
		</ol>
	</div>";
 
 }
echo "<table class='table table-hover'>
		<thead>
			<tr>
				<th>Name</th>
				<th>Image</th>
				<th>Option</th>
			</tr>
		</thead>
		<tbody>";

for($i = 0 ; $i < count($case); $i++){
		$data = $case[$i];
       
		echo	"<tr>
				  <th><strong>".$data['suspect_lname'].", ".$data['suspect_fname']."</strong></th>
				  <td><img class='img-thumbnail' src='". base_url().'photo/'.$data['suspect_photo']."' width='50px' height='50px' id='photo2'></td>
				
					<td><a title='delete'   href='".base_url()."index.php/agent_page_controller/agent_delete_suspect_to_case/".$c."/".$data['suspectAssignedNo']."'><i class='glyphicon glyphicon-trash'></i></a></td>
				</tr>";
}			
echo   "</tbody>
	 </table>";

echo "<div class='pull-right'>
		<div class='btn-group btn-group-xs'>";
foreach($caseNo as $c){
			echo "<a title='add suspect to this case' class='btn btn-primary' href='".base_url()."index.php/agent_page_controller/add_suspect_to_case_form/".$c."'>Add Suspect</a>
			<a title='view evidence of this case'  class='btn btn-default' href='".base_url()."index.php/evidence/view_evidence2/".$c."'>View Evidences</a>";
			}
echo		"</div>
	</div>
	<br/>
	<br/>";
					
			
?>


