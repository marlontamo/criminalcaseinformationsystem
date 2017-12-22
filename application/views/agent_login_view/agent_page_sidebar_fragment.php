<!-- Sidebar ================================================================================================-->
      <div id="sidebar-wrapper">
        <ul class="sidebar-nav">
		<li><?php 	$user = $this->session->userdata('username');
		$agentNo = $this->agent_page_model->get_agent_no($user);
		$agent = $agentNo->photo;
echo "<img class='img-thumbnail' src='". base_url().'images/'.$agent."' width='120px' height='120px' id='photo2'>"; ?></li>
          <li class="sidebar-brand">Agent:  <?php echo strtoupper($this->session->userdata('username'));?>!</li>
          <li><a href=''>Cases</a></li>
          <li><a href="about_us.php">About Us</a></li>

        </ul>
      </div>
<!--end side bar==============================================================================================-->

        
        <!-- Keep all page content within the page-content inset div! -->
        
     <div class='page-content inset'>
		<div class='well'>   