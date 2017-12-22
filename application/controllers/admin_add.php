<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Camille
 * Date: 11/10/13
 * Time: 4:27 PM
 * To change this template use File | Settings | File Templates.
 */

class admin_add extends CI_Controller {

    public function __construct(){
        parent::__construct();
		$this->load->model("admin_login_model");
		$this->admin_login_model->is_logged_in();
		$this->admin_login_model->select_user();
        $this->load->helper(array('url','form','file'));

        $this->load->database();
        $this->load->model("admin_model");
    }

    public function index(){

       $this->load->view('suspect_management/header_fragment');
		$this->load->view('suspect_management/sidebar_fragment');
        $this->load->view('admin_management/admin_add', array('error' => ' ' ));
        $this->load->view('suspect_management/footer_fragment');
		
    }

    public function add_admin(){
        if ($this->input->post("submit")===false)
            return;

        $image = $this->admin_model->do_upload();
        $data = array(
            'photo' => $image['file_name'],
			'type' => '',
            'employeeName' => $this->input->post("employeeName", true),
            'password' => md5($this->input->post("password", true)),
            'position'=> $this->input->post("position", true),
            'dateRegistered'=> $this->input->post("dateRegistered", true)
        );
       
        $this->admin_model->add($data);
        $data["views"] = $this->admin_model->listOfAdminNames();

          
       $this->load->view('suspect_management/header_fragment');
		$this->load->view('suspect_management/sidebar_fragment');
        $this->load->view("admin_management/admin_lists", $data);
        $this->load->view('suspect_management/footer_fragment');
		

    }
}