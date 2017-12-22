<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Agent_edit extends CI_Controller {

	
	
	function __construct(){
		parent::__construct();
		$this->load->model("admin_login_model");
		$this->admin_login_model->is_logged_in();
		
		
		// load library
		$this->load->library(array('table','form_validation'));
		
		// load helper
		$this->load->helper('url');
		$this->load->helper('HTML');
		
		// load model
		$this->load->model('Agent_model','',TRUE);
	}

	

	function edit($agentNo = null){
		if($agentNo == null){
			redirect('suspect_default/home_page');
			return;
		}
		
		
		$agent = $this->Agent_model->get_by_id($agentNo)->row();
		// fill the input fields with data
		$data['agentno'] = $agentNo;
		$data['fname'] = $agent->firstName;
		$data['mname'] = $agent->middleName;
		$data['lname'] = $agent->lastName;
		$data['dob'] = $agent->birthdate;
		$data['address'] = $agent->address;
		$data['contactno'] = $agent->contactNo;
		$data['qualification'] = $agent->qualification;
		$data['password'] = $agent->password;
		$data['rank'] = array(
                  'Police Officer 1'  => 'Police Officer 1',
                  'Police Officer 2'  => 'Police Officer 2',
                  'Police Officer 3'  => 'Police Officer 3',
                  'Senior Police Officer 1'  => 'Senior Police Officer 1',
				  'Senior Police Officer 2'  => 'Senior Police Officer 2',
				  'Senior Police Officer 3'  => 'Senior Police Officer 3',
				  'Inspector'  => 'Inspector',
				  'Senior Inspector'  => 'Senior Inspector'
        );
		if($agent->gender == 'Male'){
			$data['mgender'] = array(
                  'selected' => 'selected'
			);
			$data['fgender'] = array(
            );
		}else{
			$data['mgender'] = array(
                  
			);
			$data['fgender'] = array(
				'selected' => 'selected'
            );
		}
		
		// set common properties
		$data['title'] = 'Edit an Agent';
		$data['message'] = '';
		$data['action'] = site_url('agent_edit/edit_agent');
		
		// load view
		$this->load->view('suspect_management/header_fragment');
		$this->load->view('suspect_management/sidebar_fragment');
		$this->load->view('agent_management/edit_form', $data);
		$this->load->view('suspect_management/footer_fragment');
		
	}
	
	function edit_agent(){
		$data['title'] = 'Edit an Agent';
		$data['action'] = site_url('agent_edit/edit_agent');
		$data['agentno'] = $this->input->post('agentno');
		$data['fname'] = $this->input->post('fname');
		$data['mname'] = $this->input->post('mname');
		$data['lname'] = $this->input->post('lname');
		$data['dob'] = $this->input->post('dob');
		$data['address'] = $this->input->post('address');
		$data['contactno'] = $this->input->post('contactno');
		$data['qualification'] = $this->input->post('qualification');
		$data['password'] = $this->input->post('password');
		
		$data['rank'] = array(
                  'Police Officer 1'  => 'Police Officer 1',
                  'Police Officer 2'  => 'Police Officer 2',
                  'Police Officer 3'  => 'Police Officer 3',
                  'Senior Police Officer 1'  => 'Senior Police Officer 1',
				  'Senior Police Officer 2'  => 'Senior Police Officer 2',
				  'Senior Police Officer 3'  => 'Senior Police Officer 3',
				  'Inspector'  => 'Inspector',
				  'Senior Inspector'  => 'Senior Inspector'
        );
		
		if($this->input->post('gender') == 'Male'){
			$data['mgender'] = array(
                  'selected' => 'selected'
			);
			$data['fgender'] = array(
            );
		}else{
			$data['mgender'] = array(
                  
			);
			$data['fgender'] = array(
				'selected' => 'selected'
            );
		}
		$this->_set_rules();
				
		// run validation
		if ($this->form_validation->run() == FALSE){
			$data['message'] = '<div><p class="lead">Please check the errors:<br /> <br /></p></div>';
			$this->load->view('suspect_management/header_fragment');
			$this->load->view('suspect_management/sidebar_fragment');
			$this->load->view('agent_management/edit_form', $data);
			$this->load->view('suspect_management/footer_fragment');
		
		}else{
			$config['upload_path'] = "./images/";
			$config['allowed_types'] = 'jpg|jpeg|gif|png';
			// do the upload
			$this->load->library('upload',$config);
			
			if(!$this->upload->do_upload()){
				$data['message'] = '<div><p class="lead">Upload error<br /> <br /></p></div>';
				
				$this->load->view('suspect_management/header_fragment');
				$this->load->view('suspect_management/sidebar_fragment');
				$this->load->view('agent_management/edit_form', $data);
				$this->load->view('suspect_management/footer_fragment');
		
			}else{
			
			//if file is accepted
            $file_data = $this->upload->data();
            // get filename of thumbnail
			$thumbnail = $file_data['raw_name'].'_thumb'.$file_data['file_ext'];
			$configThumb = array();
		    $configThumb['image_library'] = 'gd2';
		    $configThumb['source_image'] = '';
		    $configThumb['create_thumb'] = TRUE;
		    $configThumb['maintain_ratio'] = false;
			// set height and width of thumbnail
		    $configThumb['width'] = 100;
		    $configThumb['height'] = 75;
		    /* Load the image library */
		    $this->load->library('image_lib');
		    $configThumb['source_image'] = $file_data['full_path'];
            $this->image_lib->initialize($configThumb);
            $this->image_lib->resize();
            $photo = $thumbnail;

            //check if save button is clicked
            $save_value = $this->input->post('upload');
				if ($save_value == false){
					return;
				}
				// save data
				$agentNo = $this->input->post('agentno');
				$agent = array('firstName' => $this->input->post('fname'),
								'middleName' => $this->input->post('mname'),
								'lastName' => $this->input->post('lname'),
								'password' => $this->input->post('password'),
								'birthdate' => $this->input->post('dob'),
								'gender' => $this->input->post('gender'),
								'address' => $this->input->post('address'),
								'contactNo' => $this->input->post('contactno'),
								'rank' => $this->input->post('rank'),
								'qualification' => $this->input->post('qualification'),
								'photo' => $photo);
				$res = $this->Agent_model->update($agentNo, $agent);
				if($res){
					$data['message'] = '<div><p class="lead">DAT EDITING ERROR</p></div>';
					
					$this->load->view('suspect_management/header_fragment');
		            $this->load->view('suspect_management/sidebar_fragment');
					$this->load->view('agent_management/agent_message', $data);
					$this->load->view('suspect_management/footer_fragment');
		
				}else{
					$data['message'] = '<div><p class="lead">Successfully edited Agent</p></div>';
					$this->load->view('suspect_management/header_fragment');
					$this->load->view('suspect_management/sidebar_fragment');
					$this->load->view('agent_management/agent_message', $data);
					$this->load->view('suspect_management/footer_fragment');
		
					
				}
			}
		}
	}
	
	// validation rules
	function _set_rules(){
		$this->form_validation->set_rules('password', 'Password', 'trim|required|alpha-numeric|xss_clean');
		$this->form_validation->set_rules('fname', 'First Name', 'trim|required|alpha|xss_clean');
		$this->form_validation->set_rules('mname', 'Middle Name', 'trim|required|alpha|xss_clean');
		$this->form_validation->set_rules('lname', 'Last Name', 'trim|required|alpha|xss_clean');
		$this->form_validation->set_rules('dob', 'DoB', 'trim|required|callback_valid_date|xss_clean');
		$this->form_validation->set_rules('gender', 'Gender', 'trim|required|xss_clean');
		$this->form_validation->set_rules('address', 'Address', 'trim|required|xss_clean');
		$this->form_validation->set_rules('contactno', 'Contact Number', 'trim|required|exact_length[10]|callback_valid_contactno|xss_clean');
		
		$this->form_validation->set_message('required', '* required');
		$this->form_validation->set_message('isset', '* required');
		$this->form_validation->set_message('valid_name', 'is invalid.');
		$this->form_validation->set_message('valid_date', 'date format invalid. yyyy-mm-dd');
		$this->form_validation->set_message('valid_contactno', 'contcat number format invalid. ex: 9192031992');
		$this->form_validation->set_error_delimiters('<p class="error">', '</p>');
	}
	
	// date validation callback
	function valid_date($str){
		//match the format of the date
		if (preg_match ("/^([0-9]{4})-([0-9]{2})-([0-9]{2})$/", $str, $parts))
		{
			//check weather the date is valid or not
			if(checkdate($parts[1],$parts[2],$parts[3]))
				return false;
			else
				return true;
		}
		else
			return false;
	}
	
	// contact number validation
	function valid_contactno($str){
		//match the format of the date
		if (preg_match ("/^([1-9]{1})([0-9]{9})$/", $str, $parts))
		{
			//check if the number is valid
			if($parts[1] == 0)
				return false;
			else
				return true;
		}
		else
			return false;
	}
}
?>