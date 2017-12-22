<h1>agent page</h1>
<table class='table table-hover'>
							<tbody>
								
							<?php	 
							for($i = 0 ; $i < count($att); $i++){
											$data = $att[$i];
	
						echo	"<tr>
								  <th><strong>".$data['attributeName'] .":</strong></th>
								  <td><center><b class='pull-right'>".$data['attributeValue']."</b></center></td>
								  <td><center class='pull-right'>
										<a title='View case full details'  href='".base_url()."index.php/suspect_view_controller/view_and_add_attribute/".$data['suspectNo']."'>view</a>
								    
								  </center></td>
								</tr>";
							
							}	
						 echo   "</tbody>
						</table>
							
						"; 
//=================================FRAGMENT for displaying all attribute names and values from table suspect attributes=========================================================	
						?>