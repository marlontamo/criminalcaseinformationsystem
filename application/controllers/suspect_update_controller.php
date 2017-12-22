<?php
class suspect_update_controller extends CI_controller{
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
	/*==============================================================================
	@desc for updating suspects basic information
	@param $suspecNo int value
	==================================================================================*/
	public function update_form($suspectNo = null){
		if($suspectNo == null){
			redirect('suspect_default/home_page');
			return;
		}
		
		$this->profile_viewer->selected_suspect($suspectNo);
		
		$this->load->view('suspect_management/header_fragment');
		$this->load->view('suspect_management/sidebar_fragment');
		$data['data'] = $this->profile_viewer->selected_suspect($suspectNo);
		$this->load->view('suspect_management/update_suspect_form',$data);
		$this->load->view('suspect_management/footer_fragment');
	}
	public function update_suspect($suspectNo = null){
		if($suspectNo == null){
			redirect('suspect_default/home_page');
			return;
		}
		
		
		$image = $this->queries->do_upload();
		$this->form_validation->set_rules('firstname','First Name', "trim|required|max_length[10]|alpha|xss_clean");
		$this->form_validation->set_rules('lastName','Last Name', "trim|required|max_length[45]|alpha|xss_clean");
		$this->form_validation->set_rules('middleName','Middle Name', "trim|required|max_length[45]|alpha|xss_clean");
		$this->form_validation->set_rules('gender','Gender',"required");
		
		
								
		$validation = $this->form_validation->run();
			if($validation == false){
			//if validation is false it sends the user back to index page
				return;
			}else{
				$data = array(
				'suspectNo' => $suspectNo,
				'firstname' => $this->input->post("firstname", true),
				'lastName' => $this->input->post("lastName", true),
				'middleName' => $this->input->post("middleName", true),
				'gender' => $this->input->post("gender", true),
				'photo' => $image['file_name'] );
			
			//assign a table name you want to use and pass the collected data in model
				$this->queries->dbtable = 'suspect';
				$this->queries->update_suspect_profile($data);
				$this->session->set_flashdata();
				
				$this->load->view('suspect_management/header_fragment');
				$this->load->view('suspect_management/sidebar_fragment');
				$data['data'] = $this->queries->update_suspect_profile($data);
				$this->load->view('suspect_management/add_suspect_success',$data);
				$this->load->view('suspect_management/footer_fragment');
				
			}
				
	}
	
	/*=========================*/
	
}
?>