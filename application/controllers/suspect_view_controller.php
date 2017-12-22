<?php
class suspect_view_controller extends CI_Controller{
	//constructor to initialize everything that you need at once
	public function __construct(){
		parent::__construct();
		
		$this->load->model("admin_login_model");
		$this->admin_login_model->is_logged_in();
		$this->admin_login_model->select_user();
		$this->load->helper("url");
		$this->load->helper("form");
		$this->load->model("profile_viewer");
		$this->load->model("queries");
	}
	
	public function view_and_add_attribute($suspectNo = null){
		if($suspectNo == null){
			redirect('suspect_default/home_page');
			return;
		}
			
		$this->profile_viewer->selected_suspect($suspectNo);
		$this->profile_viewer->selected_attribute($suspectNo);
		
		$this->load->view('suspect_management/header_fragment');
		$this->load->view('suspect_management/sidebar_fragment');
		$data['data'] = $this->profile_viewer->selected_suspect($suspectNo);
		$this->load->view('suspect_management/add_suspect_success',$data);
		$this->load->view('suspect_management/add_attribute_form',$data);
		$dat['att'] = $this->profile_viewer->selected_attribute($suspectNo);
		$this->load->view('suspect_management/add_attribute',$dat);
		$this->load->view('suspect_management/footer_fragment');
	}
	public function viewer($suspectNo = null){
		if($suspectNo == null){
			redirect('suspect_default/home_page');
			return;
		}
			
		$this->profile_viewer->selected_suspect($suspectNo);
		$this->profile_viewer->selected_attribute($suspectNo);
		
		$this->load->view('suspect_management/header_fragment');
		$this->load->view('suspect_management/sidebar_fragment');
		$data['data'] = $this->profile_viewer->selected_suspect($suspectNo);
		$this->load->view('suspect_management/add_suspect_success',$data);
		$cases['case'] = $this->profile_viewer->selected_suspect_case($suspectNo);
		$this->load->view('suspect_management/view_suspect_case',$cases);
		$dat['att'] = $this->profile_viewer->selected_attribute($suspectNo);
		$this->load->view('suspect_management/edit_attribute',$dat);
		$this->load->view('suspect_management/footer_fragment');
	}
	
}
?>