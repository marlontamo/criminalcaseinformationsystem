<label>Attributes</label>
<table class='table table-hover'>
							<tbody>
								
							<?php	 
							for($i = 0 ; $i < count($att); $i++){
											$data = $att[$i];
	
						echo	"<tr>
								  <th><strong>".$data['attributeName'] .":</strong></th>
								  <td><center><b class='pull-right'>".$data['attributeValue']."</b></center></td>
								  <td><center class='pull-right'>
										<a title='Add Attribute'  href='".base_url()."index.php/suspect_view_controller/view_and_add_attribute/".$data['suspectNo']."'><i class='glyphicon glyphicon-plus'></i></a>&nbsp
										<a title='Update'  href='".base_url()."index.php/suspect_update_controller/update_form/".$data['suspectAttributeNo']."'><i class='glyphicon glyphicon-pencil'></i></a>&nbsp
										<a title='Delete'  href='".base_url()."index.php/suspect_delete_controller/delete_attribute/".$data['suspectAttributeNo']."/".$data['suspectNo']."''><i class='glyphicon glyphicon-trash'></i></span>
								    
								  </center></td>
								</tr>";
							
							}	
						 echo   "</tbody>
						</table>
							
						"; 
//=================================FRAGMENT for displaying all attribute names and values from table suspect attributes=========================================================	
						?>