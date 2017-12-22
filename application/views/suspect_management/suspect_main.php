<?php
echo "<div>
<ol class='breadcrumb'>
	<li><a href='".base_url()."index.php/suspect_default/index'><i class='glyphicon glyphicon-list'></i>List</a></li>
 
</ol>
</div>";
echo "<h4>Suspect List:</h4>";
     echo "<table class='table table-bordered'>
				";
			
			echo "<thead>
					<tr>
                        <th>Suspect</th>
                        <th>Last Name</th>
                        <th>First Name</th>
                        <th>Middle Name</th>
                        <th>Gender</td>
                        <th>Action</th>
                    </tr>
			</thead>		";
			
			 for ($i = 0; $i < count($view) ; $i++){
			        $data = $view[$i];
					$photo = $data['photo'];

					echo "<tr >";
						echo "<td><img class='img-thumbnail' src='". base_url().'photo/'.$photo."' width='50px' height='50px' id='photo2'></td>";
						echo "<td>". $data['lastName'] ."</td>";
						echo "<td>". $data['firstname'] ."</td>";
						echo "<td>". $data['middleName'] ."</td>";
						echo "<td>". $data['gender'] ."</td>";
						echo "<td>
								  <center>
								  
								  <a title='Add Attribute' href='".base_url()."index.php/suspect_view_controller/view_and_add_attribute/".$data['suspectNo']."/''><i class='glyphicon glyphicon-plus'></i></a>&nbsp
								   <a title='View Profile'  href='".base_url()."index.php/suspect_view_controller/viewer/".$data['suspectNo']."''><i class='glyphicon glyphicon-eye-open'></i></a>&nbsp
								   <a title='Update Profile'  href='".base_url()."index.php/suspect_update_controller/update_form/".$data['suspectNo']."'><i class='glyphicon glyphicon-pencil'></i></a>&nbsp
								   <a title='Delete Suspect'  href='".base_url()."index.php/suspect_delete_controller/delete_suspect/".$data['suspectNo']."'' ><i class='glyphicon glyphicon-trash'></i></span>";
								  
						echo		   "</a> 
								   </center>
							</td>";
                   
                    echo "</tr>"; }
       
    echo "</table>";
    echo "<div class='pull-right'>".anchor('suspect_add_controller/add_suspect_form', 'add new suspect','class="btn btn-primary btn-xs"');
	echo "</div><br/><br />";
    ?>



