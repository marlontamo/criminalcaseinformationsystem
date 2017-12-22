<?php
foreach($case as $data){	

echo "<div>
<ol class='breadcrumb'>
  <li><a href='".base_url()."index.php/agent_page_controller/agent/".$data['caseNo']."'><i class='glyphicon glyphicon-home'>Home</i></a></li>
  <li><a href='".base_url()."index.php/agent_page_controller/agent_view_full_desc/".$data['caseNo']."'><i class='glyphicon glyphicon-briefcase'>Case</i></a></li>
  <li><a href='".base_url()."index.php/agent_page_controller/agent_view_evidence/".$data['caseNo']."'><i class='glyphicon glyphicon-record'>Evidences</i></a></li>
  
</ol>
</div>
<table class='table table-hover'>
		<thead>
							<tr>
								<th>Description</th>
								<th>Image</th>
								<th>Option</th>
							</tr>
							</thead>
							<tbody>;"

					
						echo	"<tr>
								  <th><strong>".$data['description']."</strong></th>
								  <td><img class='img-thumbnail' src='". base_url().'photo/'.$data['photo_files']."' width='50px' height='50px' id='photo2'></td>
								  <td><a href=''>edit</a>|
									<a href=''>del</a></td>
								</tr>";
						
echo "</tbody></table>"; 
						echo "<div class='pull-right'><div class='btn-group btn-group-xs'>";
						echo "<a title='add evidence to this case' class='btn btn-primary' href='".base_url()."index.php/agent_page_controller/agent/".$data['caseNo']."'>Add Evidence</a>
								<a title='view suspect for this case' class='btn btn-default' href='".base_url()."index.php/agent_page_controller/agent_view_suspect/".$data['caseNo']."'>View Suspects</a>
					</div></div><br/><br/>";
}				
?>


