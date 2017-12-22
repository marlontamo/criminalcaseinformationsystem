<?php
class suspect_delete_controller extends CI_controller{
	//constructor to initialize everything that you need at once
	public function __construct(){
		parent::__construct();
		
		$this->load->model("admin_login_model");
		$this->admin_login_model->is_logged_in();
		$this->admin_login_model->select_user();
		$this->load->helper("url");
		$this->load->helper("form");
		$this->load->helper("file");
		$this->load->model("queries");
		$this->load->model("suspect_delete_model");
		$this->load->model("profile_viewer");
		$this->load->library("form_validation");

	}
	/*================================================================================================================================================
	@desc delete_suspect is for deleting suspect from the suspect table 
	===================================================================================================================================================*/
	public function delete_suspect($suspectNo = null){
		if($suspectNo == null){
			redirect('suspect_default/home_page');
			return;
		}
		$path_file = $this->suspect_delete_model->select_suspect_photo($suspectNo);
		$path_to_file = './photo/'.$path_file;
		unlink($path_to_file);
		
		$this->suspect_delete_model->delete_selected_suspect($suspectNo);
		
		$this->load->view('suspect_management/header_fragment');
		$this->load->view('suspect_management/sidebar_fragment');
		$data['view'] = $this->queries->get_all_suspect();
        $this->load->view('suspect_management/suspect_main',$data);
		$this->load->view('suspect_management/footer_fragment');
	
	}
	public function delete_attribute($suspectAttributeNo = null, $suspectNo = null){
		if($suspectAttributeNo == null || $suspectNo == null){
			redirect('suspect_default/home_page');
			return;
		}
		
		$this->suspect_delete_model->delete_selected_attribute($suspectAttributeNo);
		$this->profile_viewer->selected_suspect($suspectNo);
		$this->profile_viewer->selected_attribute($suspectNo);
		
		$this->load->view('suspect_management/header_fragment');
		$this->load->view('suspect_management/sidebar_fragment');
		$data['data'] = $this->profile_viewer->selected_suspect($suspectNo);
		$this->load->view('suspect_management/add_suspect_success',$data);
		$dat['att'] = $this->profile_viewer->selected_attribute($suspectNo);
		$this->load->view('suspect_management/edit_attribute',$dat);
		$this->load->view('suspect_management/footer_fragment');
		
		
		
	}
	
	
}
?>