<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Camille
 * Date: 11/14/13
 * Time: 1:37 PM
 * To change this template use File | Settings | File Templates.
 */

class admin_default extends CI_Controller {

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
        $this->load->view('admin_management/admin_lists', $data);
        $this->load->view('suspect_management/footer_fragment');
		
    }

    public function search() {
        if($this->input->post("input_search")===false)
            return;
        $keyword = $this->input->post("input_admin_name", true);

         $data["views"] = $this->admin_model->search_admin($keyword);
       $this->load->view('suspect_management/header_fragment');
		$this->load->view('suspect_management/sidebar_fragment');
        $this->load->view("admin_management/admin_lists", $data);
        $this->load->view('suspect_management/footer_fragment');
		
    }
}