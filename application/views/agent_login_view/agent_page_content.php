<?php
	
		
echo "<div>
			<ol class='breadcrumb'>
			  <li><a href='".base_url()."index.php/agent_page_controller/agent'><i class='glyphicon glyphicon-home'>Home</i></a></li>
			 </ol>
	</div>";
if($case != null){
echo "<table class='table table-hover'>
							<thead>
							<tr>
								<th>Case Status</th>
								<th>Type of Crime</th>
								<th>Option</th>
								
							</tr>
							</thead>";
							
							
							
							for($i = 0 ; $i < count($case); $i++){
											$data = $case[$i];
							
							
						echo	"<tbody>
								<tr>
								  <th><strong>".$data['status'] .":</strong></th>
								  <td>".$data['type_of_crime']."</td>
								<td><a title='View case full details'  href='".base_url()."index.php/agent_page_controller/agent_view_full_desc/".$data['caseNo']."'><i class='glyphicon glyphicon-folder-open'></i></a></td>
								";
							}
							}else{
						echo "Sorry! There are no assigned Cases yet for this Agent";}
						echo	"</tr></tbody>
						</table>
							
						"; 
						

						?>
						