<?php echo validation_errors(); ?>
<?php echo form_open(base_url()."index.php/case_add/addCaseDB");?>

<div id="page-content-wrapper">
 <?php
echo "<div>
<ol class='breadcrumb'>
	<li><a href='".base_url()."index.php/case_default/index'><i class='glyphicon glyphicon-list'></i>List</a></li>
	<li><a href='".base_url()."index.php/case_add/addCase'><i class='glyphicon glyphicon-plus'></i>Add New Case</a></li>
</ol>
</div>";
?>  
   <h4>Add Case Form:</h4>
    <!-- Keep all page content within the page-content inset div! -->
    <div class="page-content inset">
        <div class="row">
            <div class="col-md-12">
                <div class="panel-group" id="panel-273760">
                    <div class="panel panel-default">
                       
                        <div id="panel-element-206107" class="panel-collapse collapse in">
                            <div class="panel-body">
                            
                             <!--div class="form-group">
                                    <label class="inline control-label">Admin Number</label>
                                    <div class="controls">
                                        <//?php
                                        $adminno = array(
                                            'id' => 'adminno',
                                            'name' => 'adminNo',
                                            'style' => 'height:30px',
                                            'required' => 'required');
                                        echo form_input($adminno);?>
                                    </div>
                                </div>
                                
                                 <div class="form-group">
                                    <label class="inline control-label">Agent Number</label>
                                    <div class="controls">
                                        <//?php
                                        $agentno = array(
                                            'id' => 'agentno',
                                            'name' => 'agentNo',
                                            'style' => 'height:30px',
                                            'required' => 'required');
                                        echo form_input($agentno);?>
                                    </div>
                                </div-->
                                
                                <div class="form-group">
                                    <label class="inline control-label">Victim</label>
                                    <div class="controls">
                                        <?php
                                        $v = array(
                                            'id' => 'vic',
                                            'name' => 'victim',
                                            'style' => 'height:25px; width:500px',
                                            'required' => 'required');
                                        echo form_input($v);?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Type Of Crime</label>
                                    <div class="controls">
                                        <?php
                                        $toc = array(
                                            'id' => 'toc',
                                            'name' => 'typeOfCrime',
                                           'style' => 'height:25px; width:500px',
                                            'required' => 'required');
                                        echo form_input($toc);?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Case Status</label>
                                    <div class="controls">
                                        <?php
                                        $cs = array(
                                            'id' => 'cs',
                                            'name' => 'caseStatus',
                                           'style' => 'height:25px; width:500px',
                                            'required' => 'required');
                                        echo form_input($cs);?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                        
                          
							<div class='btn-group pull-right'>
                               <div class=''>
                                        <?php
                                        $idSubmit = array('id'=>'idSubmitButton',
                                            'value' =>'Add Case',
                                            'name'=> 'addCaseButton',
                                            'class' => 'btn btn-primary btn-xs'
                                        );

                                        echo form_submit($idSubmit);?>

                                        
                                 </div>   
                           </div><br/>
                        
                    </br>
                </div>
            </div>
        </div>
    </div>
</div>