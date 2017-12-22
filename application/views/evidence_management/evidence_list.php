	<!-- evidence_list.php -->
	<h3>
		<a id="menu-toggle" href="#" class="btn btn-default"><i class="icon-reorder"></i></a>
		View Cases
	</h3>
	</div>
		<!-- Keep all page content within the page-content inset div! -->
		<div class="page-content inset">
		<div class="row">
			<div class="col-md-12">
			<p class="lead">
				<table class="table table-striped">
				<tr>
					<th> Case No. </th>
					<th> Options </th>
				</tr>
				<?php
					for($i = 0; $i < count($evidences); $i++){
						$evidence = $evidences[$i];
						
						echo "<tr>";
						echo "	<td>".$evidence["caseNo"]."</td>";
						echo "  <td><a href="; 
						echo base_url()."index.php/evidence/view_evidence2/".$evidence["caseNo"];
						echo ">View Evidences</a></td>";
						echo "</tr>";
					}
				?>
				</table>
			</div>
			