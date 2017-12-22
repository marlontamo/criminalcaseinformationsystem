<?php
class Case_add extends CI_Controller{
    function __construct(){
        parent::__construct();
		
		$this->load->model("admin_login_model");
		$this->admin_login_model->is_logged_in();
        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('case_model');
        $this->load->database();
    }
	public function addCase(){
       $this->load->view('suspect_management/header_fragment');
		$this->load->view('suspect_management/sidebar_fragment');
        $this->load->view('case_management/case_add');
       $this->load->view('suspect_management/footer_fragment');
		
    }
    public function addCaseDB(){
        if($this->input->post("addCaseButton")== false){
            $this->index();
        }
        $this->form_validation->set_rules("victim","Victim", "required|min_length[2]|max_length[45]|xss_clean|alpha");
        $this->form_validation->set_rules("typeOfCrime","Type Of Crime", "required|min_length[2]|max_length[45]|xss_clean|alpha");
        $this->form_validation->set_rules("caseStatus","Case Status", "required|min_length[2]|max_length[45]|xss_clean|alpha");
        $validation_result = $this->form_validation->run();
        if ($validation_result == false){
            $this->addCase();
        }else{
           // $sdata['agentNo'] = $this->input->post('agentNo');
            //$sdata['adminNo'] = $this->input->post('adminNo');
            $sdata['victim'] = $this->input->post('victim');
            $sdata['typeOfCrime'] = $this->input->post('typeOfCrime');
            $sdata['caseStatus'] = $this->input->post('caseStatus');
            $result = $this->case_model->add_case_db($sdata);
            if($result){
                header('location:'.base_url()."index.php/case_default/index");

            }
        }
    }
}