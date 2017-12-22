<?php

echo "<h4>Cases:</h4>";
echo "<table class='table table-hover'>
							<thead>
							<tr>
								<th>Case Status</th>
								<th>Type of Crime</th>
								<th>Victim</th>
								<th>Option</th>
								
							</tr>
							</thead>";
							
							
							
							for($i = 0 ; $i < count($case); $i++){
											$data = $case[$i];
							
							
						echo	"<tbody>
								<tr>
								  <th><strong>".$data['status'] .":</strong></th>
								  <td>".$data['type_of_crime']."</td>
								<td>".$data['case_victim']."</td>
								<td><a title='delete case from this agent'  href='".base_url()."index.php/agent_assigned_controller/delete_case_to_assigned_agent/".$data['agentAssignedNo']."/".$data['agentNo']."'><i class='glyphicon glyphicon-trash'></i></a></td>
								</tr>";
							}
						echo	"</tbody>
						</table><br/><br/>
							
						"; 
//=================================FRAGMENT for displaying all attribute names and values from table suspect attributes=========================================================	
						?>
						