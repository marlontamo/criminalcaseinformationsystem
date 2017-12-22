<?php
echo "<div>
<ol class='breadcrumb'>
	<li><a href='".base_url()."index.php/agent_default/index'><i class='glyphicon glyphicon-list'></i>Agent List</a></li>
 
</ol>
</div>";
?>		
          
            <?php echo $table; echo anchor('agent_add/add/','Add a new Agent', 'class="btn btn-primary btn-xs btn-active pull-right"')."<br/><br/>";  ?>
          
        
        <!-- Keep all page content within the page-content inset div! -->
        <div class="content-header">
            
              <div class="content-header" style="margin-top:-50px;"><?php echo $pagination; ?></div>
		<div class="content-header" style="margin-top:20px;"></div>
		<br />
	
      
	