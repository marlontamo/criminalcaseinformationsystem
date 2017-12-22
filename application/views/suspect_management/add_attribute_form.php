<?php
//========================================================FRAGMENT FORM FOR ADDING ATTRIBUTES NAMES AND VALUES=========================================================
foreach($data as $dataIndex ){
				$suspectNo	= $dataIndex['suspectNo'];
				
echo "<div class= '' style='100px: auto;'>";
				 echo form_open_multipart('suspect_add_controller/add_suspect_attribute'); 
								 echo "Attname: " .form_input("attributeName", set_value("attributeName"),'style="width : 200px"')."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp"; 
								 echo "Attvalue: " .form_input("attributeValue", set_value("attributeValue"),'style="width : 200px"'); 
								 echo form_hidden("suspectNo", "$suspectNo"); 
								 echo form_error('attributeName' ,'&nbsp<code class="btn-danger">', '</code>');
								 echo form_error('attributeValue' ,'&nbsp<code class="btn-danger">', '</code>'); 
								 echo "<br/><br/><div class='pull-right'>";
								echo form_submit( "submit", "Add",'class="btn btn-primary btn-xs"');
								// echo "<a title='Add Attribute' class='btn btn-primary btn-xs' href='".base_url()."index.php/suspect_view_controller/viewer/".$suspectNo."'>add</a>";
								 echo "</div>";
				                 echo "</form><br/>
				</div>" ; }
?>