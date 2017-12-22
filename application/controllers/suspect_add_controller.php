<?php
class suspect_add_controller extends CI_controller{
	//constructor to initialize everything that you need at once
	public function __construct(){
		parent::__construct();
		
		$this->load->model("admin_login_model");
		$this->admin_login_model->is_logged_in();
		$this->admin_login_model->select_user();
		$this->load->helper("url");
		$this->load->helper("form");
		$this->load->model("queries");
		$this->load->model("profile_viewer");
		$this->load->library("form_validation");
		
	}
	/*================================================================================================================================================
	@desc add_suspect_form is for displaying the form for adding new suspect to the suspect table in the database
	===================================================================================================================================================*/
	public function add_suspect_form(){
		$this->load->view('suspect_management/header_fragment');
		$this->load->view('suspect_management/sidebar_fragment');
		$this->load->view("suspect_management/add_suspect_form");
		$this->load->view('suspect_management/footer_fragment');
	}
	/*================================================================================================================================================
	@desc after filling up the suspect adding form all data entered will be validated here in the add_suspect function before passing the
	validated data to the model which queries.php
	=================================================================================================================================================*/
	public function add_suspect(){
		if($this->input->post("input_submit") === false)
			return;
			
		//setting rules for the input form
		$image = $this->queries->do_upload();
		$this->form_validation->set_rules('firstname','First Name', "trim|required|max_length[10]|alpha|xss_clean");
		$this->form_validation->set_rules('lastName','Last Name', "trim|required|max_length[45]|alpha|xss_clean");
		$this->form_validation->set_rules('middleName','Middle Name', "trim|required|max_length[45]|alpha|xss_clean");
		$this->form_validation->set_rules('gender','Gender',"required");
		$this->form_validation->set_rules('month','Month',"required");
		$this->form_validation->set_rules('day','Day',"required");
		$this->form_validation->set_rules('year','Year',"required");
		
								
		$validation = $this->form_validation->run();
			if($validation == false){
				$this->add_suspect_form();
			}else{
				$data = array(
				'firstname' => $this->input->post("firstname", true),
				'lastName' => $this->input->post("lastName", true),
				'middleName' => $this->input->post("middleName", true),
				'gender' => $this->input->post("gender", true),
				'birthdate' => $this->input->post("year",true)."-".$this->input->post("month",true)."-".$this->input->post("day",true),
				'photo' => $image['file_name'] );
			
				$this->queries->dbtable = 'suspect';
				$this->queries->add_suspect_profile($data);
				$this->session->set_flashdata();
				
				
			}
				$this->load->view('suspect_management/header_fragment');
				$this->load->view('suspect_management/sidebar_fragment');
				$data['data'] = $this->queries->get_suspect_profile();
				$this->load->view('suspect_management/add_suspect_success_message',$data);
				$this->load->view('suspect_management/add_suspect_success',$data);
				$this->load->view('suspect_management/footer_fragment');
	}
	/*======================================================================================================================================================
	@desc add_suspect_attribute is my validator for adding additional attributes for the suspect
	=======================================================================================================================================================*/
	public function add_suspect_attribute(){
		if($this->input->post('cancel') === true){
			$this->suspect_controller_viewer('viewer');
		}
	
		 $this->form_validation->set_rules('attributeName','Attribute Name', "trim|required|max_length[45]|alpha-numeric|xss_clean");
		 $this->form_validation->set_rules('attributeValue','Attribute Value', "trim|required|max_length[45]|alpha-numeric|xss_clean");
		
		 $validated = $this->form_validation->run();
		 if(!$validated){
		   return;
		 }else{
				$data = array(
				'suspectNo'	=> $this->input->post("suspectNo", true),
				'attributeName' => $this->input->post("attributeName", true),
				'attributeValue' => $this->input->post("attributeValue", true)
				);
				
				$dat['att'] = $this->queries->add_suspect_attribute($data);
				$data['data'] = $this->profile_viewer->selected_suspect($data['suspectNo']);
				$this->session->set_flashdata();
				
				$this->load->view('suspect_management/header_fragment');
				$this->load->view('suspect_management/sidebar_fragment');
				$this->load->view('suspect_management/add_suspect_success',$data);
				$this->load->view('suspect_management/add_attribute_form');
				$this->load->view('suspect_management/add_attribute',$dat);
				$this->load->view('suspect_management/footer_fragment');
			}
	}
	/*==============================================================================*/
	
}
?>