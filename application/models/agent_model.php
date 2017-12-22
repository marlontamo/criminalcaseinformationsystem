<?php

class Agent_model extends CI_Model {

	private $tbl_agent= 'agent';
	
	function __construct(){
		parent::__construct();
	}
	
	function list_all(){
		//$this->db->order_by('id','asc');
		return $this->db->get($tbl_agent);
	}
	
	function count_all(){
		return $this->db->count_all($this->tbl_agent);
	}
	
	function get_paged_list($limit = 10, $offset = 0){
		//$this->db->order_by('id','asc');
		return $this->db->get($this->tbl_agent, $limit, $offset);
	}
	
	function get_by_id($agentNo){
		$this->db->where('agentNo', $agentNo);
		return $this->db->get($this->tbl_agent);
	}
	/*=============================================
	nadagdag ako ng query para mailagay yung ilang info na kelangan sa user table
	===========================================*/
	function add_agent($agent){
		$query = $this->db->insert($this->tbl_agent, $agent);
		if ($query){
		   $value = array( 'username' => $this->input->post("fname", true),
								'password' => md5($this->input->post("password", true)),
								'type' => 'agent'
			   );
			   $this->db->insert('user',$value);
		}
		return $this->db->insert_id();
	}
	
	function update($agentNo, $agent){
		$this->db->where('agentNo', $agentNo);
		$this->db->update($this->tbl_agent, $agent);
	}
	
	function delete($agentNo){
		$this->db->where('agentNo', $agentNo);
		$this->db->delete($this->tbl_agent);
	}
	
	function insert_images($image_data = array()){
		$data = array(
		  'filename' => $image_data['file_name'],
		  'fullpath' => $image_data['full_path']
		);
		$this->db->insert('photo', $data);
	}
	function get_agent($agentNo){
	  $query = $this->db->select('*')
			         ->from('agent')
					 ->where('agentNo', $agentNo)
					 ->get('');
					 
	    return $query->result_array();
	
	}
}
?>

