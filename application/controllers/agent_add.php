<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Agent_add extends CI_Controller {

	
	
	function __construct()
	{
		parent::__construct();
		
		$this->load->model("admin_login_model");
		$this->admin_login_model->is_logged_in();
		$this->admin_login_model->select_user();
		
		// load library
		$this->load->library(array('table','form_validation'));
		
		// load helper
		$this->load->helper('url');
		$this->load->helper('HTML');
		$this->load->helper('form');
		
		// load model
		$this->load->model('Agent_model','',TRUE);
	}
	
	function add(){
		$data['fname'] = array(
			'name' => 'fname',
			'class' => 'form-control input-sm'
		);
		$data['mname'] = array(
			'name' => 'mname',
			'class' => 'form-control input-sm'
		);
		$data['lname'] = array(
			'name' => 'lname',
			'class' => 'form-control input-sm'
		);
		$data['password'] = array(
			'name' => 'password',
			'class' => 'form-control input-sm',
			'style' => 'width:90%'
		);
		$data['birthdate'] = array(
			'name' => 'dob',
			'class' => 'form-control input-sm',
			'style' => 'width:80%'
		);
		$data['mgender'] = array(
			
		);
		$data['fgender'] = array(
			
		);
		$data['address'] = array(
			'name' => 'address',
			'class' => 'form-control input-sm'
		);
		$data['contactno'] = array(
			'name' => 'contactno',
			'class' => 'form-control input-sm'
		);
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
		$data['qualification'] = array(
			'name' => 'qualification',
			'class' => 'form-control input-sm'
		);
		$data['save'] = array(
			'name' => 'upload',
			'class' => 'btn btn-default btn-sm',
			'value' => 'SAVE'
		);
		// set empty default form field values
		//$this->_set_fields();
		// set validation properties
		$this->_set_rules();
		// set common properties
		$data['title'] = 'Add new Agent';
		$data['message'] = '';
		$data['action'] = site_url('agent_add/add_agent');
		// load view
		$this->load->view('suspect_management/header_fragment');
		$this->load->view('suspect_management/sidebar_fragment');
		$this->load->view('agent_management/add_form', $data);
		$this->load->view('suspect_management/footer_fragment');
		
	}
	
	public function add_agent(){
		// set common properties
		$data['title'] = 'Add new Agent';
		$data['action'] = site_url('agent_add/add_agent');
		$data['message'] = '';
		
		$data['fname'] = array(
			'name' => 'fname',
			'class' => 'form-control input-sm'
		);
		$data['mname'] = array(
			'name' => 'mname',
			'class' => 'form-control input-sm'
		);
		$data['lname'] = array(
			'name' => 'lname',
			'class' => 'form-control input-sm'
		);
		$data['password'] = array(
			'name' => 'password',
			'class' => 'form-control input-sm',
			'style' => 'width:90%'
		);
		$data['birthdate'] = array(
			'name' => 'dob',
			'class' => 'form-control input-sm',
			'style' => 'width:80%'
		);
		$data['mgender'] = array(
			
		);
		$data['fgender'] = array(
			
		);
		$data['address'] = array(
			'name' => 'address',
			'class' => 'form-control input-sm'
		);
		$data['contactno'] = array(
			'name' => 'contactno',
			'class' => 'form-control input-sm'
		);
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
		$data['qualification'] = array(
			'name' => 'qualification',
			'class' => 'form-control input-sm'
		);
		$data['save'] = array(
			'name' => 'upload',
			'class' => 'btn btn-default btn-sm',
			'value' => 'SAVE'
		);
		// set empty default form field values
		//$this->_set_fields();
		// set validation properties
		$this->_set_rules();
		
		if ($this->form_validation->run() == FALSE){
			$data['message'] = '<div><p class="lead">Please check the errors:<br /> <br /></p></div>';
			$this->load->view('suspect_management/header_fragment');
			$this->load->view('suspect_management/sidebar_fragment');
			$this->load->view('agent_management/add_form', $data);
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
				$this->load->view('agent_management/add_form', $data);
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
								'photo' => $photo,
								'type' => 'agent',
								
								);
				$agentNo = $this->Agent_model->add_agent($agent);
				
				// set user message
				$data['message'] = '<div><p class="lead">Successfully added Agent</p></div>';
				$this->load->view('suspect_management/header_fragment');
		        $this->load->view('suspect_management/sidebar_fragment');
				$this->load->view('agent_management/agent_message', $data);
				$this->load->view('suspect_management/footer_fragment');
		
			}
		}
	}
	
	
	
	/* function _set_fields(){
		$this->form_data->agentno = '';
		$this->form_data->fname = '';
		$this->form_data->mname = '';
		$this->form_data->lname = '';
		$this->form_data->password = '';
		$this->form_data->dob = '';
		$this->form_data->gender = '';
		$this->form_data->address = '';
		$this->form_data->contactno = '';
		$this->form_data->rank = '';
		$this->form_data->qualification = '';
	} */
	
	// validation rules
	function _set_rules(){
		$this->form_validation->set_rules('password', 'Password', 'trim|required|alpha-numeric|xss_clean');
		$this->form_validation->set_rules('fname', 'First Name', 'trim|required|alpha|xss_clean');
		$this->form_validation->set_rules('mname', 'Middle Name', 'trim|required|alpha|xss_clean');
		$this->form_validation->set_rules('lname', 'Last Name', 'trim|required|alpha|xss_clean');
		$this->form_validation->set_rules('dob', 'DoB', 'trim|required|callback_valid_date|xss_clean');
		$this->form_validation->set_rules('gender', 'Gender', 'trim|required|xss_clean');
		$this->form_validation->set_rules('address', 'Address', 'trim|required|xss_clean');
		$this->form_validation->set_rules('contactno', 'Contact Number', 'trim|required|max_length[15]|xss_clean');
		
		$this->form_validation->set_message('required', '* required');
		$this->form_validation->set_message('isset', '* required');
		$this->form_validation->set_message('valid_name', 'is invalid.');
		$this->form_validation->set_message('valid_date', 'date format invalid. yyyy-mm-dd');
		$this->form_validation->set_message('valid_contactno', 'first number must not be zero. ex: 9192031992');
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