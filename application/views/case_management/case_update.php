
<?php echo validation_errors(); ?>
<?php echo form_open(base_url()."index.php/case_update/updateCase");?>

<div id="page-content-wrapper">
 <?php
                                foreach($allcase as $row){
                                }
                                ?>

  <?php
echo "<div>
<ol class='breadcrumb'>
	<li><a href='".base_url()."index.php/case_default/index'><i class='glyphicon glyphicon-list'></i>List</a></li>
	<li><a href='".base_url()."index.php/case_update/updateCase_info/".$row->caseNo."'><i class='glyphicon glyphicon-pencil'></i>Edit</a></li>
</ol>
</div>";
?>  
        <h4>
            <a id="menu-toggle" href="#" class="btn btn-default"><i class="icon-reorder"></i></a>
            Case Management Form:
        </h4>
   
    <!-- Keep all page content within the page-content inset div! -->
   
                    <div class="panel panel-default">
                       
                        <div id="panel-element-206107" class="panel-collapse collapse in">
                            <div class="panel-body">

                               
                                <div class="form-group">
                                    <label class="inline control-label">Case Number</label>
                                    <div class="controls">
                                        <?php
                                        $cn = array(
                                            'id' => 'cn',
                                            'name' => 'caseNo',
                                            'style' => 'height:25px; width: 500px;',
                                            'readonly' => 'true',
                                            'value' => $row->caseNo);
                                        echo form_input($cn);?>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="inline control-label">Victim</label>
                                    <div class="controls">
                                        <?php
                                        $v = array(
                                            'id' => 'v',
                                            'name' => 'victim',
                                           'style' => 'height:25px; width: 500px;',
                                            'value' => $row->victim);
                                        echo form_input($v);?>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Type Of Crime</label>
                                    <div class="controls">
                                        <?php
                                        $toc = array(
                                            'id' => 'toc',
                                            'name' => 'typeOfCrime',
                                           'style' => 'height:25px; width: 500px;',
                                            'value' => $row->typeOfCrime);
                                        echo form_input($toc);?>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Case Status</label>
                                    <div class="controls">
                                        <?php
                                        $cs = array(
                                            'id' => 'cs',
                                            'name' => 'caseStatus',
                                           'style' => 'height:25px; width: 500px;',
                                            'value' => $row->caseStatus);
                                        echo form_input($cs);?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pull-right">
                        <div class="btn-group btn-xs">
                       
                            

                                
                                   
                                        <?php
                                        $idSubmit = array('id'=>'idSubmitButton',
                                            'value' =>'Update Case',
                                            'name'=> 'addCaseButton',
                                            'class' => 'btn btn-primary btn-xs'
                                        );

                                        echo form_submit($idSubmit);?>

                                        <?php
                                        $idCancel = array('id'=>'idCancelButton',
                                            'value' =>'Cancel',
                                            'name'=> 'cancel',
                                            'class' => 'btn btn-danger btn-xs');
                                        echo form_submit($idCancel);?>
                                    
                               
                            
                        </div>
                     </div><br/><br/>
</div>