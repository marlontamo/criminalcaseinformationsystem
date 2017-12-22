<?php
class suspect_default extends CI_Controller{
    public function __construct(){
        parent::__construct();
		
		$this->load->model("admin_login_model");
		$this->admin_login_model->is_logged_in();
		$this->admin_login_model->select_user();
        $this->load->helper("url");
		$this->load->helper("form");
		$this->load->model("queries");//call the class model
		$this->load->model("admin_login_model");// call the admin info
		
		
    }

	/*============================================================================================================================
	@desc this function displays the main content of all suspects
	this the first page when user clicks on the SUSPECT tab
	================================================================================================================================*/
    public function index(){
		$this->load->view('suspect_management/header_fragment');
		$this->load->view('suspect_management/sidebar_fragment');
		$data['view'] = $this->queries->get_all_suspect();
        $this->load->view('suspect_management/suspect_main',$data);
        $this->load->view('suspect_management/footer_fragment');
    }
	/*==========================================================================================================================
	@desc is_logged_in
	 
	/*=================================================================*/
		public function home_page(){
				$this->load->view('suspect_management/header_fragment');
				$this->load->view('suspect_management/sidebar_fragment');
				$this->load->view('suspect_management/home_page_content');
				$this->load->view('suspect_management/footer_fragment');
	
	}
	
}
?>