<?php
	// Controller File for: EVIDENCE Management
	class evidence extends CI_Controller{
		// Constructor to initialize everything that you need at once
		public function __construct() {
			parent::__construct();
			$this->load->model("admin_login_model");
			$this->admin_login_model->is_logged_in();
			$this->load->model("agent_page_model");
			$this->load->helper("url");
			$this->load->helper("form");
			$this->load->database();
			$this->load->model("evidence_model");
			$this->load->view('agent_login_view/agent_page_header_fragment');
		    $this->load->view('agent_login_view/agent_page_sidebar_fragment');
		}
		// Entry point of the page
		public function index($caseNo = null) {
			$user = $this->session->userdata('username');
			$agentNo = $this->agent_page_model->get_agent_no($user);
			$agent = $agentNo->agentNo;
			 if($caseNo == null){
			    redirect('agent_page_controller/agent/'.$agent);
				return;
			}
			if($this->agent_page_model->get_case_number_evidence($caseNo) == null){
					$data['caseNo'] = $this->agent_page_model->get_temp_number($caseNo);
					$this->load->view("evidence_management/evidence_add.php",$data);
					$this->load->view('suspect_management/footer_fragment');
			}else{
					$data['caseNo'] = $this->agent_page_model->get_case_number_evidence($caseNo);
					$this->load->view("evidence_management/evidence_add.php",$data);
					$this->load->view('suspect_management/footer_fragment');
			}
		}
		public function add_evidence($agentNo = null,$caseNo = null){
			// Do nothing if the submit button is not clicked
			if($this->input->post("input_submit") == false || $agentNo == null || $caseNo == null){
				return;
				}
			
			
				$agentNumber = $agentNo;
				$caseNumber = $caseNo;
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
		public function view_evidence(){
			// Retrieve all cases with evidences from the database
			
			$data["evidences"] = $this->evidence_model->getAllEvidence();
			
			// Pass data to view for display
			$this->load->view("evidence_management/evidence_list", $data);
			$this->load->view('suspect_management/footer_fragment');
		}
		
		public function view_evidence2($caseNo = null){
		   
			$user = $this->session->userdata('username');
			$agentNo = $this->agent_page_model->get_agent_no($user);
			$agent = $agentNo->agentNo;
			 if($caseNo == null){
			    redirect('agent_page_controller/agent/'.$agent);
				return;
			}
			if($this->agent_page_model->get_case_number_evidence($caseNo) == null || $this->evidence_model->getAllEvidencePerCase($caseNo) == null){
					$data['caseNo'] = $this->agent_page_model->get_temp_number($caseNo);
					$data["evidences"] = $this->evidence_model->getAllEvidencePerCase($caseNo);
					$this->load->view("evidence_management/evidence_per_case_list", $data);
					$this->load->view('suspect_management/footer_fragment');
			}else{
					$data['caseNo'] = $this->agent_page_model->get_case_number_evidence($caseNo);	
					
					// Retrieve evidences of a certain case from the database
					$data["evidences"] = $this->evidence_model->getAllEvidencePerCase($caseNo);
					
					// Pass data to view for display
					$this->load->view("evidence_management/evidence_per_case_list", $data);
					$this->load->view('suspect_management/footer_fragment');
			}
		}
		
		public function delete_evidence($evidence = null) {
			// Do nothing if no parameter is provided
			if($evidence == null){
			redirect('suspect_default/home_page');
			return;
		}
			
			$evidenceFileName = $this->evidence_model->getEvidenceFile($evidence);
			
			$path_to_file = './upload/'.$evidenceFileName;
			if(unlink($path_to_file)) {
				 echo 'deleted successfully';
			}
			else {
				 echo 'errors occured';
			} 
			
			$this->evidence_manager->deleteEvidence($evidence);
		
			// After deleting, we use again the same view to display all students
			$data["evidences"] = $this->evidence_model->getAllEvidence();
			$this->load->view("evidence_management/evidence_list", $data);
			$this->load->view('suspect_management/footer_fragment');
		}
	}
?>