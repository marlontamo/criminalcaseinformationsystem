<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Camille
 * Date: 11/10/13
 * Time: 6:21 PM
 * To change this template use File | Settings | File Templates.
 */

class Admin_model extends CI_Model {

    var $img_path;

    /*function __construct(){
        parent::__construct();
        $this->img_path = realpath(APPPATH . '../images');
    }*/

    public function add($data) {
       $query = $this->db->insert('admin',$data);
	         if($query){
			      
			   $value = array( 'username' => $this->input->post("employeeName", true),
								'password' => md5($this->input->post("password", true)),
								'type' => 'admin'
			   );
				$this->db->insert('user',$value);
			 }
    }

    public function do_upload(){

        $config = array(
            'allowed_types' => 'jpeg|jpg|gif|png|fw',
            'upload_path' => './admin_photo/'

        );
        $this->load->library('upload', $config);
        $this->upload->do_upload();
        $image_data = $this->upload->data();

        return $image_data;
    }

    public function delete_admin($adminNo) {

        $sql = "DELETE FROM admin WHERE adminNo = ?";
        $data = array($adminNo);

        $this->db->query($sql,$data);
    }

    public function listOfAdminNames() {
        $sql = "SELECT adminNo, photo, employeeName, position, dateRegistered FROM admin";
        $query = $this->db->query($sql);

        return $query->result_array();
    }

    public function search_admin($keyword) {
        $sql = "SELECT adminNo, photo, employeeName, position, dateRegistered FROM admin WHERE employeeName LIKE ?";
        $data = array("%" . $keyword . "%");

        $query = $this->db->query($sql,$data);
        return $query->result_array();
    }

    public function getById($adminNo){
        $query = $this->db->get_where('admin',array('adminNo' => $adminNo));
        return $query->result();
    }

    public function adminUpdate($data){

        $adminNo = $data['adminNo'];
        $query = $this->db->where('adminNo',$adminNo)->update('admin', $data);

        if($query){
            $q = $this->db->select('*')
                ->from('admin')
                ->where('admin.adminNo', $data['adminNo'])
                ->get('');
            return $q->result_array();
        }
    }

}