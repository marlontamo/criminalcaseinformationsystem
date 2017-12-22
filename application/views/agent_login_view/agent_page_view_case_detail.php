
<?php							
foreach($case as $data){	
						

echo "<div>
<ol class='breadcrumb'>
  <li><a href='".base_url()."index.php/agent_page_controller/agent/".$data['caseNo']."'><i class='glyphicon glyphicon-home'>Home</i></a></li>
  <li><a href='".base_url()."index.php/agent_page_controller/agent_view_full_desc/".$data['caseNo']."'><i class='glyphicon glyphicon-briefcase'>Case</i></a></li>
</ol>
</div>


<table class='table table-hover'>
		<thead>
							<tr>
								<th>Title</th>
								<th>Values</th>
								
							</tr>
							</thead>
							<tbody>";



						
						echo	"<tr>
								  <th><strong>Victim:</strong></th>
								  <td>".$data['victim']."</td>
								  
								</tr>";
						echo	"<tr>
								  <th><strong>Case Number:</strong></th>
								  <td>".$data['caseNo']."</td>
								</tr>";
						echo	"<tr>
								  <th><strong>Type Of Crime:</strong></th>
								  <td>".$data['typeOfCrime']."</td>
								</tr>";
						echo	"<tr>
								  <th><strong>Precinct Number:</strong></th>
								  <td>".$data['precinctNo']."</td>
								</tr>";
						echo	"<tr>
								  <th><strong>Case Status:</strong></th>
								  <td>".$data['caseStatus']."</td>
								</tr>";
						
							
						 echo   "</tbody>
						</table>";
						}
						echo "<div class='pull-right'><div class='btn-group btn-group-xs'>
						<a title='view all evidence of this case' class='btn btn-primary' href='".base_url()."index.php/evidence/view_evidence2/".$data['caseNo']."'>Evidences</a>
						<a title='view all suspect for this case' class='btn btn-default' href='".base_url()."index.php/agent_page_controller/agent_view_suspect/".$data['caseNo']."'>Suspects</a></div></div><br/><br/>";
						
?>