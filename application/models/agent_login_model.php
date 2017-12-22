<?php
class agent_login_model extends CI_Model{
	
	
	/*===================================================================================
	@desc validate function is use for validating username and password of the admin
	@returns true value;
	===================================================================================*/
	
	function is_logged_in_(){
	   $is_logged_in = $this->session->userdata('is_logged_in');
		if(!isset($is_logged_in)|| $is_logged_in != true ){
			redirect('agent_page_controller/agent');
		}
			
	}
	
}

?>