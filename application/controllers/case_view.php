<?php
class Case_view extends CI_Controller{
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

    public function view_profile($caseNo = null){
		if($caseNo == null){
			redirect('suspect_default/home_page');
			return;
		}
        $data['allcase'] = $this->case_model->getById($caseNo);
       $this->load->view('suspect_management/header_fragment');
		$this->load->view('suspect_management/sidebar_fragment');
        $this->load->view('case_management/case_viewer',$data);
       $this->load->view('suspect_management/footer_fragment');
		
    }
}