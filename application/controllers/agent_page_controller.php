<?php
class agent_page_controller extends CI_Controller{
    public function __construct(){
        parent::__construct();
		
		$this->load->model("admin_login_model");
		$this->admin_login_model->is_logged_in();
		//$this->admin_login_model->select_user();
		$this->load->model("agent_page_model");
		$this->load->model("suspect_assigned_model");
        $this->load->helper("url");
		$this->load->helper("form");
		$this->load->view('agent_login_view/agent_page_header_fragment');
		$this->load->view('agent_login_view/agent_page_sidebar_fragment');
	}

	public function agent(){
		$user = $this->session->userdata('username');
		$agentNo = $this->agent_page_model->get_agent_no($user);
		$agent = $agentNo->agentNo;
		if($this->agent_page_model->get_assigned_case($agent) == null){
			$data['case'] = $this->agent_page_model->get_assigned_case($agent);
			$this->load->view('agent_login_view/agent_page_content',$data);
			$this->load->view('suspect_management/footer_fragment');
		
		}else{
			$data['case'] = $this->agent_page_model->get_assigned_case($agent);
			$this->load->view('agent_login_view/agent_page_content',$data);
			$this->load->view('suspect_management/footer_fragment');
		}
	}
	/*========================================================================================*/
	public function agent_view_full_desc($caseNo = null){
		if($caseNo == null){
		$this->agent();
		return;
		}
		$data['case'] = $this->agent_page_model->agent_view_per_case($caseNo);
		
		$this->load->view('agent_login_view/agent_page_view_case_detail',$data);
		$this->load->view('suspect_management/footer_fragment');
	}
	
	public function agent_view_suspect($caseNo = null){
		if($caseNo == null){
		$this->agent();
		return;
		}
		$user = $this->session->userdata('username');
		$agentNo = $this->agent_page_model->get_agent_no($user);
		$agent = $agentNo->agentNo;
		if($this->agent_page_model->get_case_number_suspect($caseNo) == null || $this->agent_page_model->agent_view_per_suspect($caseNo) == null){
				$data['caseNo'] = $this->agent_page_model->get_temp_number($caseNo);
				$data['case'] = $this->agent_page_model->agent_view_per_suspect($caseNo);
				$this->load->view('agent_login_view/agent_page_view_suspect',$data);
				$this->load->view('suspect_management/footer_fragment');
		}else{
				$data['caseNo'] = $this->agent_page_model->get_case_number_suspect($caseNo);
				$data['case'] = $this->agent_page_model->agent_view_per_suspect($caseNo);
				$this->load->view('agent_login_view/agent_page_view_suspect',$data);
				$this->load->view('suspect_management/footer_fragment');
		}
	
	}
	
	public function add_suspect_to_case_form($caseNo = null){
		if($caseNo == null){
		$this->agent();
		return;
		}
		$user = $this->session->userdata('username');
		$agentNo = $this->agent_page_model->get_agent_no($user);
		$agent = $agentNo->agentNo;
		if($this->agent_page_model->get_case_number_suspect($caseNo) == null || $this->agent_page_model->agent_view_per_suspect($caseNo) == null ){
					$data['caseNo'] = $this->agent_page_model->get_temp_number($caseNo);
					$data['data'] = $this->suspect_assigned_model->get_all_suspectNo();
					$data['case'] = $this->agent_page_model->agent_view_per_suspect($caseNo);
					$this->load->view("agent_login_view/agent_page_add_suspect_form",$data);
					$this->load->view('suspect_management/footer_fragment');
		}else{
					$data['caseNo'] = $this->agent_page_model->get_case_number_suspect($caseNo);
					$data['data'] = $this->suspect_assigned_model->get_all_suspectNo();
					$data['case'] = $this->agent_page_model->agent_view_per_suspect($caseNo);
					$this->load->view("agent_login_view/agent_page_add_suspect_form",$data);
					$this->load->view('suspect_management/footer_fragment');
		}
	}
	public function add_case_to_suspect($caseNo = null){
		if($this->input->post("input_submit") === false || $caseNo == null){
			redirect('suspect_default/home_page');
			return;
		}

				$data = array(
				  'suspectNo' => $this->input->post("suspectNo", true),
					 'caseNo' => $caseNo,
					 );
				$this->suspect_assigned_model->dbtable = 'suspectassigned';
				$this->suspect_assigned_model->add_model_suspect($data);
				
			$this->agent_view_suspect($caseNo);
	}
	/*============================================================================================*/
	public function agent_delete_suspect_to_case($caseNo = null,$suspectAssignedNo = null){
	if($caseNo == null || $suspectAssignedNo == null){
		$this->agent();
		return;
		}
			$caseNo = $this->uri->segment(3);
			$suspectAssignedNo = $this->uri->segment(4);
			$query = $this->agent_page_model->delete_suspect_to_case($suspectAssignedNo);
	
			$this->agent_view_suspect($caseNo);

	}
	public function logout()  {  
		$this->session->sess_destroy();  
		redirect('admin_login_controller/index');  
	}   
	
}
?>