<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Agent_delete extends CI_Controller {

	
	
	function __construct(){
		parent::__construct();
	
		$this->load->model("admin_login_model");
		$this->admin_login_model->is_logged_in();
		$this->admin_login_model->select_user();
		
		// load library
		$this->load->library(array('table','form_validation'));
		
		// load helper
		$this->load->helper('url');
		$this->load->helper('HTML');
		
		// load model
		$this->load->model('Agent_model','',TRUE);
	}
	
	function delete($agentNo = null)
	{
		if($agentNo == null){
		
			redirect('suspect_default/home_page');
			return;
		}
		
		$data['title'] = 'Delete an Agent';
		$agent = $this->Agent_model->get_by_id($agentNo)->row();
		
		//delete the photo
		//define the path to image
		$photopath = './images/'.$agent->photo;
		 
		//from here, delete the file off using unlink
		$result = unlink($photopath);
		 
			if($result){
			
			// delete an agent
				$this->Agent_model->delete($agentNo);
				$data['message'] = '<div><p class="lead">Agent successfully Deleted<br /> <br /></p></div>';
				
				$this->load->view('suspect_management/header_fragment');
		        $this->load->view('suspect_management/sidebar_fragment');
				$this->load->view('agent_management/agent_message', $data);
				$this->load->view('suspect_management/footer_fragment');
		
			}else{
				// delete error
				$data['message'] = '<div><p class="lead">Agent and agent photo NOT Deleted<br /> <br /></p></div>';
				
				$this->load->view('suspect_management/header_fragment');
		        $this->load->view('suspect_management/sidebar_fragment');
				$this->load->view('agent_management/agent_message', $data);
				$this->load->view('suspect_management/header_fragment');
		
			}
		
	}
}
?>