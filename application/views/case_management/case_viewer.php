<div>
    <?php
    foreach($allcase as $row){
    }
    ?>
	 <?php
echo "<div>
<ol class='breadcrumb'>
	<li><a href='".base_url()."index.php/case_default/index'><i class='glyphicon glyphicon-list'></i>List</a></li>
	<li><a href='".base_url()."index.php/case_view/view_profile/".$row->caseNo."'><i class='glyphicon glyphicon-eye-open'></i>View Case Details</a></li>
</ol>
</div>";
?>  
    <?php echo "<legend>Case Number: $row->caseNo</legend>"?>
   
    <h4>Case Details</h4>
    <?php echo "<h4>Victim: $row->victim  <br>
                    Type Of Crime: $row->typeOfCrime <br>
                     Case Status: $row->caseStatus</h4>"?>
    <hr/>


</div>