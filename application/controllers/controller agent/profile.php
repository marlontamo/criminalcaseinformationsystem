<?php
class profile extends CI_controller{
	//constructor to initialize everything that you need at once
	public function __construct(){
		parent::__construct();
		
		$this->load->helper("url");
		$this->load->helper("form");
		$this->load->database();
		$this->load->model("verify");
		$this->load->library("form_validation");
		$this->load->library('session');
	}
	public function index(){
		$this->load->view('header_fragment');
		$this->load->view('sidebar_fragment');
		$this->load->view("agent_add_form");
		$this->load->view('footer_fragment');
	}
	public function add_agent(){
		if($this->input->post("input_submit") === false)
			return;
			
		//setting rules for the input form
		$image = $this->verify->do_upload();
		 $this->form_validation->set_rules('firstName','First Name', "trim|required|max_length[10]|alpha|xss_clean");
		$this->form_validation->set_rules('lastName','Last Name', "trim|required|max_length[45]|alpha|xss_clean");
		$this->form_validation->set_rules('middleName','Middle Name', "trim|required|max_length[45]|alpha|xss_clean");
		$this->form_validation->set_rules('gender','Gender',"required");
		$this->form_validation->set_rules('address','Address', "trim|required|max_length[45]|alpha-numeric|xss_clean");
		$this->form_validation->set_rules('contactNo','Contact Number', "trim|required|exact_length[6]|numeric|xss_clean");
		$this->form_validation->set_rules('month','Month',"required");
		$this->form_validation->set_rules('day','Day',"required");
		$this->form_validation->set_rules('year','Year',"required");
		$this->form_validation->set_rules('rank','Rank', "trim|required|max_length[45]|alpha-numeric|xss_clean");
		$this->form_validation->set_rules('description','Description', "trim|required|max_length[255]|alpha-numeric|xss_clean");
								
		$validation = $this->form_validation->run();
			if($validation == false){
			//if validation is false it sends the user back to index page
				$this->index();
			}else{
				$data = array(
				'firstName' => $this->input->post("firstName", true),
				'lastName' => $this->input->post("lastName", true),
				'middleName' => $this->input->post("middleName", true),
				'gender' => $this->input->post("gender", true),
				'address' => $this->input->post("address", true),
				'contactNo' => $this->input->post("contactNo",true),
				'birthdate' => $this->input->post("year",true)."-".$this->input->post("month",true)."-".$this->input->post("day",true),
				'rank' => $this->input->post("rank",true),
				'qualifications' => $this->input->post("description",true),
				'photo' => $image['file_name'] );
			
			//assign a table name you want to use and pass the collected data in model
				$this->verify->dbtable = 'agent';
				$this->verify->add_agent_profile($data);
				$this->session->set_flashdata();
			}
	}
	public function agent_add_success(){
		
		//retrieve all data from table suspectAssigned
		$this->load->view('header_fragment');
		$this->load->view('sidebar_fragment');
		$data['data'] = $this->verify->get_agent_profile();
		$this->load->view('agent_add_success',$data);
		$this->load->view('footer_fragment');
	}

}
?>