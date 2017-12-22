<?php
class suspect_assigned extends CI_controller{
	//constructor to initialize everything that you need at once
	public function __construct(){
		parent::__construct();
		
		$this->load->helper("url");
		$this->load->helper("form");
		$this->load->database();
		$this->load->model("model_suspect_verify");//call the class model
		$this->load->library("form_validation");
		$this->load->library('session');
	}
	
	/*=========================================================================================================================
	|loads all needed data that will be passed in the view(Suspect adding form)
	*/
	public function add_suspect_form(){
		$this->load->view('header_fragment');
		$data['data'] = $this->model_suspect_verify->get_all_suspectNo();
		$data['caseNo'] = $this->model_suspect_verify->get_all_caseNo();
		$this->load->view("suspect_add_form",$data);//call the view 
		$this->load->view('footer_fragment');
	}
	/*========================================================================================================================
	collector for all data that is being passed by view add suspect page and
	validating all entered data before passing it to model(add_model_suspect) class
	*/
	public function add_suspect(){
		if($this->input->post("input_submit") === false)
			return;
			
		//setting rules for the input form
		//$this->form_validation->set_rules('suspectAssignedNo','Suspect Assigned Number', "trim|required|exact_length[6]|numeric|xss_clean");
		$this->form_validation->set_rules('suspectNo','Suspect No', "required|xss_clean");
		$this->form_validation->set_rules('caseNo','Case No', "required|xss_clean");
		$this->form_validation->set_rules('case/s','Case/s', "trim|required|max_length[45]|alpha_dash|xss_clean");
		$this->form_validation->set_rules('status','Status', "trim|required|max_length[45]|alpha_dash|xss_clean");
		$this->form_validation->set_rules('description','Description', "trim|required|max_length[255]|alpha-numeric|xss_clean");
								
		$validation = $this->form_validation->run();
			if($validation == false){
			//if validation is false it sends the user back to index page
				$this->add_suspect_form();
			}else{
				$data = array(
		//'suspectAssignedNo' => $this->input->post("suspectAssignedNo", true),
				  'suspectNo' => $this->input->post("suspectNo", true),
					 'caseNo' => $this->input->post("caseNo", true),
					 'case/s' => $this->input->post("case/s", true),
					 'status' => $this->input->post("status", true),
				'description' => $this->input->post("description",true)
							);
				
			//assign a table name you want to use and pass the collected data in model
				$this->model_suspect_verify->dbtable = 'suspectassigned';
				$this->model_suspect_verify->add_model_suspect($data);
				$this->session->set_flashdata();
				
				//display success page for new added suspect
						$this->load->view('header_fragment');
		$data['dat'] = $this->model_suspect_verify->get_all_suspectAssigned();
						$this->load->view('add_message',$data);
		                $this->load->view('suspect_add_success',$data);
		                $this->load->view('footer_fragment');
				
			}
	}
	/*========================update suspect assigned===============================================================|
	| loads all data needed at view(suspect_update_form)                                                            |
	================================================================================================================*/
	public function update_suspect(){
		$this->load->view('header_fragment');
		$data['olddata'] = $this->model_suspect_verify->get_old_suspectAssigned();
		$data['data'] = $this->model_suspect_verify->get_all_suspectNo();
		$data['caseNo'] = $this->model_suspect_verify->get_all_caseNo();
		$this->load->view("suspect_update_form",$data);
		//$this->load->view("sampleform",$data);
		$this->load->view('footer_fragment');
		
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
				$this->model_suspect_verify->update_model_suspect($data);
				$this->session->set_flashdata();
				
				$this->load->view('header_fragment');
				$data['dat'] = $this->model_suspect_verify->update_model_suspect($data);
				$this->load->view('update_message',$data);
				$this->load->view('suspect_add_success',$data);
				$this->load->view('footer_fragment');
				
	}
	/*=======================================================================================================================
	*/
	
}
?>