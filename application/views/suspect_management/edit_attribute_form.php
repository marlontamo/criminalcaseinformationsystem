<?php
//========================================================FRAGMENT FORM FOR ADDING ATTRIBUTES NAMES AND VALUES=========================================================
foreach($data as $dataIndex ){
				$suspectNo	= $dataIndex['suspectNo'];
				$suspectAttributeNo = $dataIndex['suspectAttributeNo'];
				$attributeName	= $dataIndex['attributeName'];
				$attributeValue	= $dataIndex['attributeValue'];
				
echo "<div class= well>";
				 echo form_open_multipart('suspect_update_controller/update_suspect_attribute'); 
								 echo "Attname: " .form_input("attributeName", set_value("attributeName"))."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp"; 
								 echo "Attvalue: " .form_input("attributeValue", set_value("attributeValue")); 
								 echo form_hidden("suspectNo", "$suspectNo"); 
								 echo form_error('attributeName' ,'&nbsp<code class="btn-danger">', '</code>');
								 echo form_error('attributeValue' ,'&nbsp<code class="btn-danger">', '</code>'); 
								 echo "<div class='pull-right btn-xs'>";
								 echo "<a title='update Attribute' class='btn btn-danger' href='".base_url()."index.php/suspect_view_controller/viewer/".$suspectAttributeNo."'>update</a>";
								 echo "<a title='cancel' class='btn btn-danger' href='".base_url()."index.php/suspect_view_controller/viewer/".$suspectNo."'>cancel</a>";
								 echo "</div>";
				                 echo "</form><br/>
				</div>" ; }
?>