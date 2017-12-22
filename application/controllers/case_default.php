<?php
class Case_default extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
		
		$this->load->model("admin_login_model");
		$this->admin_login_model->is_logged_in();
		$this->admin_login_model->select_user();
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
}