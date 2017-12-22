<?php
      $user = $this->session->userdata('username');
		$agentNo = $this->agent_page_model->get_agent_no($user);
		$agent = $agentNo->agentNo;
foreach($caseNo as $c){
echo "<div>
<ol class='breadcrumb'>
  <li><a href='".base_url()."index.php/agent_page_controller/agent/".$c."'><i class='glyphicon glyphicon-home'>Home</i></a></li>
  <li><a href='".base_url()."index.php/agent_page_controller/agent_view_full_desc/".$c."'><i class='glyphicon glyphicon-briefcase'>Case</i></a></li>
  <li><a href='".base_url()."index.php/evidence/view_evidence2/".$c."'><i class='glyphicon glyphicon-record'>Evidences</i></a></li>
  <li><a href='".base_url()."index.php/evidence/index/".$c."'><i class='glyphicon glyphicon-link'>Add Evidences</i></a></li>
  
</ol>
</div>";} ?>		
		
		
					<?php echo validation_errors(); ?>
					<?php echo form_open_multipart(base_url()."index.php/evidence/add_evidence/".$agent."/".$c); ?>
					<!--AGENT NUMBER FIELD-->
					
							<?php echo form_hidden("input_agent_number", $agent); ?>
					

					<!--CASE NUMBER FIELD-->
					
							<?php echo form_hidden("input_case_number", $c); ?>
					
					
					<!--EVIDENCE TYPE FIELD-->
					<div class="control-group">
						<label class="control-label" for="select01">Evidence Type</label>
						<div class="control-group">
							<?php $options = array(
											  'select'  => '--Select--',
											  'Eyewitness'    => 'Eyewitness',
											  'Forensic'   => 'Forensic',
											  'Photographic' => 'Photographic',
											  'Circumstantial' => 'Circumstantial',
											  'Digital' => 'Digital',
											  'Confessions' => 'Confessions',
											  'Hearsay' => 'Hearsay',
											)  ;
									$type_of_evidence = array('select', 'Eyewitness');
									echo form_dropdown('input_type_of_evidence', $options, 'select'); ?>
						</div>
					</div>

					<!--UPLOAD FIELD-->
					<div class="control-group">
						<label class="inline control-label"><h4>Upload File</h4></label>
						<div class="controls">
							<?php
							echo form_upload("input_file");
							echo "<br/>";?>
						</div>
					</div>
					
					
					<!--UPLOAD FILE DESCRIPTION FIELD-->
					<div class="controls">
						<label class="control-label" for="fileInput">File Description</label>
						<?php 
							//		  'rows'   		=> '5','cols'        => '10',
							  $data = array(
							  'name'        => 'input_file_description',
							  'id'          => 'input_file_description',
							  'class'       => 'input-large textarea',
							  'style'       => 'width: 500px; height: 100px'
								);
						echo form_textarea($data); ?>
					</div><br/>
					
					<!--SUBMIT AND CANCEL-->
					
					<div class='pull-right'><div class='btn-group btn-group-xs'>
							<?php
							$idSubmit = array('id'=>'input_submit',
								'value' =>'Submit Evidence',
								'name'=> 'input_submit',
								'class' => 'btn btn-primary '
							);
							echo form_submit($idSubmit);?>
							<?php
							$idClear = array('id'=>'input_reset',
								'value' =>'Clear',
								'name'=> 'input_reset',
								'class' => 'btn btn-default');
							echo form_reset($idClear);?>
						</div>
					</div><br/><br/><br/>
		</form>
