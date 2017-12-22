<?php
class suspect_assigned_controller extends CI_controller{
	//constructor to initialize everything that you need at once
	public function __construct(){
		parent::__construct();
		
		$this->load->model("admin_login_model");
		$this->admin_login_model->is_logged_in();
		$this->admin_login_model->select_user();
		$this->load->helper("url");
		$this->load->helper("form");
		$this->load->model("suspect_assigned_model");
		$this->load->library("form_validation");
	}
	
	/*=========================================================================================================================
	|loads all needed data that will be passed in the view(Suspect adding form)
	*/
	public function add_case_to_suspect_form(){
		$this->load->view('suspect_management/header_fragment');
		$this->load->view('suspect_management/sidebar_fragment');
		$data['data'] = $this->suspect_assigned_model->get_all_suspectNo();
		$data['caseNo'] = $this->suspect_assigned_model->get_all_caseNo();
		$this->load->view("suspect_management/add_case_to_suspect_form",$data);
		$this->load->view('suspect_management/footer_fragment');
	}
	/*========================================================================================================================
	collector for all data that is being passed by view add suspect page and
	validating all entered data before passing it to model(add_model_suspect) class
	================================================================================================================*/
	public function add_case_to_suspect(){
		if($this->input->post("input_submit") === false)
			return;
			
		//setting rules for the input form
		
		$this->form_validation->set_rules('suspectNo','Suspect No', "required|xss_clean");
		$this->form_validation->set_rules('caseNo','Case No', "required|xss_clean");
		
								
		$validation = $this->form_validation->run();
			if($validation == false){
			//if validation is false it sends the user back to index page
			    echo $validation;
				$this->add_case_to_suspect_form();
			}else{
				$data = array(
		//'suspectAssignedNo' => $this->input->post("suspectAssignedNo", true),
				  'suspectNo' => $this->input->post("suspectNo", true),
					 'caseNo' => $this->input->post("caseNo", true),
					 
							);
				
			//assign a table name you want to use and pass the collected data in model
				$this->suspect_assigned_model->dbtable = 'suspectassigned';
				$this->suspect_assigned_model->add_model_suspect($data);
				$this->session->set_flashdata();
				
				//display success page for new added suspect
						$this->load->view('suspect_management/header_fragment');
						$data['dat'] = $this->suspect_assigned_model->get_all_suspectAssigned();
						//$this->load->view('add_message',$data);
		                $this->load->view('suspect_management/add_case_to_suspect_success',$data);
		                $this->load->view('suspect_management/footer_fragment');
						
						redirect('suspect_view_controller/viewer/'.$data['suspectNo']);
				
			}
	}
	/*========================update suspect assigned===============================================================|
	| loads all data needed at view(suspect_update_form)                                                            |
	================================================================================================================*/
	public function update_suspect(){
		$this->load->view('suspect_management/header_fragment');
		$data['olddata'] = $this->suspect_assigned_model->get_old_suspectAssigned();
		$data['data'] = $this->suspect_assigned_model->get_all_suspectNo();
		$data['caseNo'] = $this->suspect_assigned_model->get_all_caseNo();
		$this->load->view("suspect_management/suspect_update_form",$data);
		//$this->load->view("sampleform",$data);
		$this->load->view('suspect_management/footer_fragment');
		
	}
	/*===============================================================================================================
	collector for all data that is being passed by view (suspect_update_form)page and
	validating all entered data before passing it to model(update_model_suspect()) class	
	*/
	public function update_suspect_control(){
		if($this->input->post('submit') === false)
			return;
				
				$data = array(
							'suspectAssignedNo' => $this->input->post("suspectAssignedNo", true),
									'suspectNo' => $this->input->post("suspectNo", true),
									   'caseNo' => $this->input->post("caseNo", true),
									   'case/s' => $this->input->post("case/s", true),
							           'status' => $this->input->post("status", true),
							      'description' => $this->input->post("description",true)
							);
				$this->suspect_assigned_model->update_model_suspect($data);
				$this->session->set_flashdata();
				
				$this->load->view('header_fragment');
				$data['dat'] = $this->suspect_assigned_model->update_model_suspect($data);
				$this->load->view('suspect_management/update_message',$data);
				$this->load->view('suspect_management/suspect_add_success',$data);
				$this->load->view('suspect_management/footer_fragment');
				
	}
	/*=======================================================================================================================
	@desc delete assigned suspect to case
	========================================================================================================================*/
	public function delete_case_to_assigned_suspect($suspectAssignedNo = null, $suspectNo = null){
		if($suspectAssignedNo == null || $suspectNo == null){
			redirect('suspect_default/home_page');
			return;
		}
		$suspectAssignedNo = $this->uri->segment(4);
		$suspectNo = $this->uri->segment(3);
		
		$deleted = $this->suspect_assigned_model->delete_selected_suspect_to_case($suspectAssignedNo);
		redirect('suspect_view_controller/viewer/'.$suspectNo);
		
		
		
		
		
	}
	
}
?>