<?php
class agent_assigned_controller extends CI_controller{
    public function __construct(){
        parent::__construct();

        $this->load->model("admin_login_model");
        $this->admin_login_model->is_logged_in();
        $this->admin_login_model->select_user();
		$this->load->model("agent_page_model");
		$this->load->model("Agent_model");
        $this->load->helper("url");
        $this->load->helper("form");
        $this->load->model("agent_assigned_model");
        $this->load->library("form_validation");
    }

    public function add_case_to_agent_form(){
        $this->load->view('suspect_management/header_fragment');
        $this->load->view('suspect_management/sidebar_fragment');
        $data['data'] = $this->agent_assigned_model->get_all_agentNo();
        $data['caseNo'] = $this->agent_assigned_model->get_all_caseNo();
        $this->load->view("agent_management/add_case_to_agent_form",$data);
        $this->load->view('suspect_management/footer_fragment');
    }
    public function add_case_to_agent(){
        if($this->input->post("input_submit") === false)
            return;


        $this->form_validation->set_rules('agentNo','Agent No', "required|xss_clean");
        $this->form_validation->set_rules('caseNo','Case No', "required|xss_clean");


        $validation = $this->form_validation->run();
        if($validation == false){
            echo $validation;
            $this->add_case_to_agent_form();
        }else{
            $data = array(
                'agentNo' => $this->input->post("agentNo", true),
                'caseNo' => $this->input->post("caseNo", true),

            );

            $this->agent_assigned_model->dbtable = 'agentassigned';
            $this->agent_assigned_model->add_model_agent($data);
            $this->session->set_flashdata();

           $data['agent'] = $this->Agent_model->get_agent($data['agentNo']);
		
		// load view
		$this->load->view('suspect_management/header_fragment');
		$this->load->view('suspect_management/sidebar_fragment');
		$this->load->view('agent_management/add_case_to_agent_success', $data);
		$cases['case'] = $this->agent_page_model->get_assigned_case($data['agentNo']);
		$this->load->view('agent_management/agent_all_case_view', $cases);
		$this->load->view('suspect_management/footer_fragment');
        
        }
    }
    public function update_agent(){
        $this->load->view('suspect_management/header_fragment');
        $data['olddata'] = $this->agent_assigned_model->get_old_agentAssigned();
        $data['data'] = $this->agent_assigned_model->get_all_agentNo();
        $data['caseNo'] = $this->agent_assigned_model->get_all_caseNo();
        $this->load->view("agent_management/agent_update_form",$data);
        $this->load->view('suspect_management/footer_fragment');

    }
    public function update_agent_control(){
        if($this->input->post('submit') === false)
            return;

        $data = array(
            'agentAssignedNo' => $this->input->post("agentAssignedNo", true),
            'agentNo' => $this->input->post("agentNo", true),
            'caseNo' => $this->input->post("caseNo", true),
            'status' => $this->input->post("status", true),
            );
        $this->agent_assigned_model->update_model_agent($data);
        $this->session->set_flashdata();

        $this->load->view('header_fragment');
        $data['dat'] = $this->agent_assigned_model->update_model_agent($data);
        $this->load->view('agent_management/update_message',$data);
        $this->load->view('agent_management/agent_add_success',$data);
        $this->load->view('suspect_management/footer_fragment');

    }
    public function delete_case_to_assigned_agent($agentAssign = null, $agent = null){
        if($agentAssign == null || $agent == null){
			redirect('suspect_default/home_page');
			return;
		}
		$agentAssignedNo = $agentAssign;
		$agentNo = $agent;
        $deleted = $this->agent_assigned_model->delete_selected_agent_to_case($agentAssignedNo);

        redirect('agent_default/view/'.$agentNo);



    }

}
?>