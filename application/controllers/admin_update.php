<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Camille
 * Date: 11/15/13
 * Time: 8:26 AM
 * To change this template use File | Settings | File Templates.
 */
class admin_update extends CI_Controller {

    public function __construct(){
        parent::__construct();
		$this->load->model("admin_login_model");
		$this->admin_login_model->is_logged_in();
		$this->admin_login_model->select_user();
        $this->load->helper(array('url','form'));

        $this->load->database();
        $this->load->model("admin_model");
    }
    public function index(){
        $data["views"] = $this->admin_model->listOfAdminNames();
        $this->load->view('suspect_management/header_fragment');
		$this->load->view('suspect_management/sidebar_fragment');
        $this->load->view("admin_management/admin_lists", $data);
       $this->load->view('suspect_management/footer_fragment');
		
    }

    public function update($adminNo = null){
		if($adminNo == null){
			redirect('suspect_default/home_page');
			return;
		}
		
        $data['views'] = $this->admin_model->getById($adminNo);
       $this->load->view('suspect_management/header_fragment');
		$this->load->view('suspect_management/sidebar_fragment');
        $this->load->view('admin_management/admin_update', $data);
       $this->load->view('suspect_management/footer_fragment');
		
    }

    public function update_admin(){

        $data['adminNo'] = $this->input->post('adminNo');
        $data['photo'] = $this->input->post('photo');
        $data['employeeName'] = $this->input->post('employeeName');
        $data['password'] = $this->input->post('password');
        $data['position'] = $this->input->post('position');
        $data['dateRegistered'] = $this->input->post('dateRegistered');

        $this->admin_model->adminUpdate($data);
        $this->index();
    }
}