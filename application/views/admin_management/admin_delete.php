<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Camille
 * Date: 11/22/13
 * Time: 12:47 AM
 * To change this template use File | Settings | File Templates.
 */
class admin_delete extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->helper(array('url','form'));

        $this->load->database();
        $this->load->model("admin_model");
    }

    public function delete($adminNo = null) {
        if($adminNo == null)
            return;
        $this->admin_model->delete_admin($adminNo);

        $data["views"] = $this->admin_model->listOfAdminNames();
        $this->load->view('admin_management/header');
        $this->load->view('admin_management/sidebar');
        $this->load->view("admin_management/admin_lists", $data);
        $this->load->view('admin_management/footer');
    }
}