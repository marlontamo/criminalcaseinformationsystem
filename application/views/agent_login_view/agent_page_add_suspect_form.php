<?php
foreach($caseNo as $c){
echo "<div>
<ol class='breadcrumb'>
	<li><a href='".base_url()."index.php/agent_page_controller/agent/".$c."'><i class='glyphicon glyphicon-home'>Home</i></a></li>
  <li><a href='".base_url()."index.php/agent_page_controller/agent_view_full_desc/".$c."'><i class='glyphicon glyphicon-briefcase'>Case</i></a></li>
  <li><a href='".base_url()."index.php/agent_page_controller/agent_view_suspect/".$c."'><i class='glyphicon glyphicon-paperclip'>Suspect</i></a></li>
  <li><a href='".base_url()."index.php/agent_page_controller/add_suspect_to_case_form/".$c."'><i class='glyphicon glyphicon-link'>Add suspect</i></a></li>
</ol>
</div>
 
<div id='form'>";
}
	echo form_open('agent_page_controller/add_case_to_suspect/'.$c); 
echo	"<table class ='table table-hover' >
			
			
			<tr>
				<th>Suspect List</th>
				<td> ";
				echo form_dropdown("suspectNo",$data);
				echo "</div></td>
			</tr>
			
	</table>
	 
	<div class='pull-right control-group'>
		<div class='btn-group'>" ;
			
			echo form_submit("input_submit", "Submit",'class="btn btn-primary btn-xs"');
	echo	"</div>
	</div><br/><br/>
	
</div>
</form>";

?>