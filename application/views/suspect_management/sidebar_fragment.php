<!-- Sidebar ================================================================================================-->
      <div id="sidebar-wrapper">
        <ul class="sidebar-nav">
		
          <li class="sidebar-brand"><a href="#">Welcome Back <?php echo strtoupper($this->session->userdata('username'));?>!</a></li>
		  <li><?php echo anchor('suspect_default/home_page', 'Home'); ?></li>
          <li><a href='<?php echo base_url().'index.php/agent_default/index' ?>'>Agents</a></li>
		  <li><a href='<?php echo base_url().'index.php/admin_default/index' ?>'>Admin</a></li>
          <li><a href='<?php echo base_url().'index.php/case_default/index' ?>'>Cases</a></li>
          <li><a href='<?php echo base_url().'index.php/suspect_default/index' ?>'>Suspects</a></li>
		  <li><a href='<?php echo base_url().'index.php/suspect_assigned_controller/add_case_to_suspect_form' ?>'>Assign Case to Suspect</a></li>
		  <li><a href='<?php echo base_url().'index.php/agent_assigned_controller/add_case_to_agent_form' ?>'>Assign Case to Agent</a></li>
          <li><a href="about_us.php">About Us</a></li>

        </ul>
      </div>
<!--end side bar==============================================================================================-->

        
        <!-- Keep all page content within the page-content inset div! -->
        
     <div class='page-content inset'>
		<div class='well'>   
		