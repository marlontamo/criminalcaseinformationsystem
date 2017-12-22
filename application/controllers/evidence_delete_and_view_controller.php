<?php
	// Controller File for: EVIDENCE Management
	class evidence_add extends CI_Controller{
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
			$this->load->view("evidence_management/evidence_list.php");
			$this->load->view('suspect_management/footer_fragment');
		}
		public function view_evidence(){
			// Retrieve all cases with evidences from the database
			$data["evidences"] = $this->evidence_model->getAllEvidence();
			
			// Pass data to view for display
			$this->load->view("evidence_management/evidence_list", $data);
			$this->load->view('suspect_management/footer_fragment');
		}
		public function view_evidence2($caseNo){
			// Retrieve evidences of a certain case from the database
			$data["evidences"] = $this->evidence_model->getAllEvidencePerCase($caseNo);
			
			// Pass data to view for display
			$this->load->view("evidence_management/evidence_per_case_list", $data);
			$this->load->view('suspect_management/footer_fragment');
		}
		
		public function delete_evidence($evidence = null) {
			// Do nothing if no parameter is provided
			if($evidence == null)
				return;
			
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