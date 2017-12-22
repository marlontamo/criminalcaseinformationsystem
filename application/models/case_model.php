<?php
class case_model extends CI_Model{
    public function get_all_case(){
        $query = $this->db->query("SELECT * FROM allcase");
        return $query->result();
    }
    public function add_case_db($data){
        return $this->db->insert('allcase',$data);
    }
    public function getById($caseNo){
        $query = $this->db->get_where('allcase', array('caseNo'=>$caseNo));
        return $query->result();
    }
    public function updateCaseInfo($data){
        $caseNo = $data['caseNo'];
       $this->db->update('allcase',$data,array('caseNo'=> $caseNo));
    }
    public function deleteCase($caseNo){
        $this->db->where('allcase.caseNo',$caseNo);
        return $this->db->delete('allcase');
    }
}