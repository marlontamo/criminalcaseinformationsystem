<?php
class Case_update extends CI_Controller{
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

    public function index()
    {
        $data['allcase'] = $this->case_model->get_all_case();
        $this->load->view('suspect_management/header_fragment');
		$this->load->view('suspect_management/sidebar_fragment');
        $this->load->view('case_management/case_view', $data);
        $this->load->view('suspect_management/footer_fragment');
		

    }

    public function updateCase_info($caseNo = null){
	   if($caseNo == null){
	     redirect('suspect_default/home_page');
			return;
	   }
        $data['allcase'] = $this->case_model->getById($caseNo);
        $this->load->view('suspect_management/header_fragment');
		$this->load->view('suspect_management/sidebar_fragment');
        $this->load->view('case_management/case_update',$data);
        $this->load->view('suspect_management/footer_fragment');
		
    }


    public function updateCase(){

        $this->form_validation->set_rules("victim","Victim", "required|min_length[2]|max_length[45]|xss_clean|alpha");
        $this->form_validation->set_rules("typeOfCrime","Type Of Crime", "required|min_length[2]|max_length[45]|xss_clean|alpha");
        $this->form_validation->set_rules("caseStatus","Case Status", "required|min_length[2]|max_length[45]|xss_clean|alpha");
        $validation_result = $this->form_validation->run();
        if ($validation_result == false){
            $this->updateCase_info;
        }else{

            $data['caseNo'] = $this->input->post('caseNo');
            $data['victim'] = $this->input->post('victim');
            $data['typeOfCrime'] = $this->input->post('typeOfCrime');
            $data['caseStatus'] = $this->input->post('caseStatus');
            $this->case_model->updateCaseInfo($data);
            $this->index();
        }
    }
}