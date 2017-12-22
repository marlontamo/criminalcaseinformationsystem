<label>Attributes</label>
<table class='table table-hover'>
							<tbody>
								
							<?php	 
							for($i = 0 ; $i < count($att); $i++){
									$data = $att[$i];
	
						echo	"<tr>
									  <th><strong>".$data['attributeName'] .":</strong></th>
									  <td><b>".$data['attributeValue']."</b></td>
								 </tr>";
							
							}	
						 echo   "</tbody>
						</table>
							
						"; 
//=================================FRAGMENT for displaying all attribute names and values from table suspect attributes=========================================================	
						?>