<?php
echo "<div>
<ol class='breadcrumb'>
	<li><a href='".base_url()."index.php/case_default/index'><i class='glyphicon glyphicon-list'></i>List</a></li>
 
</ol>
</div>";
?>
<div id="page-content-wrapper">
    
        <h4>
            <a id="menu-toggle" href="#" class="btn btn-default"><i class="icon-reorder"></i></a>
            Case List:
        </h4>
    
    <!-- Keep all page content within the page-content inset div! -->
    <!--div class="page-content inset">
        <div class="row">
            <div class="col-md-12">
                <div class="tabbable" id="tabs-154785">
                    <div class="tab-content">
                        <div class="tab-pane active" id="panel-2944">
                            <!--form class="navbar-form navbar-left" role="search">
                                <div class="form-group">
                                    <input class="form-control" type="text"/>
                                </div>
                                <button type="submit" class="btn btn-default">Search</button>
                            </form-->
                           
                            <!--/form>
                        </div>
                    </div>
                </div-->
    <table class="table">
        <thead>
        <tr>
            <th>
                Case Number
            </th>
            <th>
                Victim
            </th>
            <th>
                Type Of Crime
            </th>
            <th>
                Case Status
            </th>
            <th>
                To Do
            </th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <?php
            foreach ($allcase as $row) {
                echo"<tr>";
                echo "<td>$row->caseNo</td>";
                echo "<td>$row->victim</td>";
                echo "<td>$row->typeOfCrime</td>";
                echo "<td>$row->caseStatus</td>";

                echo "<td><a href='" . base_url() . "/index.php/case_update/updateCase_info/" . $row->caseNo . "'  name='Update'><i class='glyphicon glyphicon-pencil'></i></a>&nbsp
               
                <a href='" . base_url() . "/index.php/case_view/view_profile/" . $row->caseNo . "'  name='view'><i class='glyphicon glyphicon-eye-open'></i></a> 
				 <a href='javascript:confirmDelete(".$row->caseNo.")' name='Delete'><i class='glyphicon glyphicon-trash'></i></a>&nbsp</td>";
                echo "</tr>";
            }
            ?>
        </tr>
        </tbody>
    </table>
	 <div class="btn-group pull-right">
                                
                                    <a  class= "btn btn-primary btn-xs" href="<?php echo base_url() ?>index.php/case_add/addCase">Add New Case</a>
                                

                               
                            </div><br/><br/>
</div>
</div>
</div>
</div
 
    