<?php
	// Controller File for: EVIDENCE Management
	class evidence_add_controller extends CI_Controller{
		// Constructor to initialize everything that you need at once
		public function __construct() {
			parent::__construct();
			$this->load->helper("url");
			$this->load->helper("form");
			$this->load->database();
			$this->load->model("evidence_model");
			$this->load->view('suspect_management/header_fragment');
			$this->load->view('suspect_management/sidebar_fragment');
		}
		// Entry point of the page
		public function index() {
			$this->load->view("evidence_management/evidence_add.php");
			$this->load->view('suspect_management/footer_fragment');
		}
		public function add_evidence(){
			// Do nothing if the submit button is not clicked
			if($this->input->post("input_submit") == false){
				return;
				}
			$this->load->library("form_validation");
		    $this->form_validation->set_rules('input_agent_number','Agent No.',
											'required|max_length[9]|numeric' );

		    $this->form_validation->set_rules('input_case_number', 'Case No.',
											"required|max_length[9]|numeric");
			$validation = $this->form_validation->run();
			if($validation == false){
				//if validation is false it sends the user back to index page
				$this->index();
			}
			else{
				$agentNumber = $this->input->post("input_agent_number", true);
				$caseNumber = $this->input->post("input_case_number", true);
				$evidenceType = $this->input->post("input_type_of_evidence", true);
				$evidencefileDescription = $this->input->post("input_file_description", true);
				
				// Form-validation here
				// Assuming data is valid, i'll just skip validation, but validation should happen before processing data
				
				$config['upload_path'] = './upload/';
				$config['allowed_types'] = '*';
				
				$this->load->library("upload", $config);
				$res = $this->upload->do_upload("input_file");
				$data = $this->upload->data();
				$evidenceFile = $data['file_name'];
				
				
				$this->evidence_model->add($agentNumber,$caseNumber,$evidenceType,$evidenceFile,$evidencefileDescription);
				
				//we're done, show the evidence
				$data["evidences"] = $this->evidence_model->getAllEvidence();
				echo 'Successfully Added';
				$this->load->view("evidence_management/evidence_list", $data);
				$this->load->view('suspect_management/footer_fragment');
			}
		}
	}
?>