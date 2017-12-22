<?php
class admin_login_model extends CI_Model{
	
	
	/*===================================================================================
	@desc validate function is use for validating username and password of the admin
	@returns true value;
	===================================================================================*/
	function validate(){
	   $this->db-> where('username', $this->input->post('username'));
	   $this->db-> where('password', md5($this->input->post('password')));
	   $query = $this->db->get('user');
	   
		   if($query->num_rows == 1){
			return true;
		   }
		   
	}
	function get_user_agent_no(){
				$query = $this->db->select('agentNo')
						  ->from('agent')
						  ->where('firstName',$this->input->post('username'))
						  ->get('');
				return $query->row();
	
	}
	function select_user(){
	   $user = $this->session->userdata('type');
			$user_value = $user->type;
		
					if( $user_value == 'agent'){
							redirect('agent_page_controller/agent',$user_value);
					}
	}
	function is_logged_in(){
	   $is_logged_in = $this->session->userdata('is_logged_in');
	  
		if(!isset($is_logged_in)|| $is_logged_in != true) {
			redirect('admin_login_controller/index');
		}
			
	}
	
	function select_type(){
		$query = $this->db->select('type')
						->from('user')
						-> where('username',$this->input->post('username'))
						->get('');
	   
	   return $query->row();
	  
	}
	
}

?>