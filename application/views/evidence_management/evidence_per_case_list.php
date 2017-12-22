<?php
foreach($caseNo as $data)	{

echo "<div>
<ol class='breadcrumb'>
  <li><a href='".base_url()."index.php/agent_page_controller/agent/".$data."'><i class='glyphicon glyphicon-home'>Home</i></a></li>
  <li><a href='".base_url()."index.php/agent_page_controller/agent_view_full_desc/".$data."'><i class='glyphicon glyphicon-briefcase'>Case</i></a></li>
  <li><a href='".base_url()."index.php/evidence/view_evidence2/".$data."'><i class='glyphicon glyphicon-record'>Evidences</i></a></li>
  
</ol>
</div>";} ?>		
	<!-- evidence_per_case_list.php -->
	
	
	
				<table class="table table-bordered">
				<tr>
					<th> Evidence No. </th>
					<th> Added in Case No.: </th>
					<th> Added by Agent: </th>
					<th> Evidence type </th>
					<th> Evidence file </th>
					<th> Evidence Description </th>
					<th> Options </th>
				</tr>
				<?php
					for($i = 0; $i < count($evidences); $i++){
						$evidence = $evidences[$i];
						
						echo "<tr>";
						echo "	<td>".$evidence["evidenceNo"]."</td>";
						echo "	<td>".$evidence["caseNo"]."</td>";
						echo "	<td>".$evidence["agentNo"]."</td>";
						echo "	<td>".$evidence["evidence_type"]."</td>";
						echo "	<td>".$evidence["evidence_file"]."</td>";
						echo "	<td>".$evidence["file_description"]."</td>";
						echo "  <td><a href='javascript:confirmDelete(".$evidence["evidenceNo"].")'><i class='glyphicon glyphicon-trash'></i></a></td>";
						echo "</tr>";
					}
				?>
				</table>
			<?php	
				echo "<div class='pull-right'><div class='btn-group btn-group-xs'>";
						echo "<a title='add evidence to this case' class='btn btn-primary' href='".base_url()."index.php/evidence/index/".$data."'>Add Evidence</a>
								<a title='view suspect for this case' class='btn btn-default' href='".base_url()."index.php/agent_page_controller/agent_view_suspect/".$data."'>View Suspects</a>
					</div></div><br/><br/><br/>";
					
					?>