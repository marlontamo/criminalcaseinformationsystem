<?php
class agent_page_model extends CI_Model{
	
	public function get_agent_no($user){
		$query = $this->db->select('agentNo,photo')
						  ->from('agent')
						  ->where('firstName',$user)
						  ->get('');
				
				return $query->row();
	}
	public function get_assigned_case($agentNo){
		$query = $this->db->select('agentassigned.agentAssignedNo, agentassigned.agentNo, agentassigned.caseNo, 
									allcase.victim as case_victim, allcase.typeOfCrime as type_of_crime, allcase.caseStatus as status')
						  ->from('agentassigned')
		                  ->join('allcase','agentassigned.caseNo = allcase.caseNo','inner')
		                  ->where("agentassigned.agentNo", $agentNo) 
						  
		                  ->get('');
					
				return $query->result_array();
				
	}
	
	public function get_case_number_CA($agentNo){
		$query = $this->db->select('caseNo')
						  ->from('agentassigned')
						  ->where('agentNo',$agentNo)
						  ->get('');
				
				return $query->row();
	}
	
	/*for evidence*/
	public function get_case_number_evidence($caseNo){
		$query = $this->db->select('caseNo')
						  ->from('evidence')
						  ->where('caseNo', $caseNo)
						  ->get('');
        if($query->result()) 
        {
            $data = array();
            foreach($query->result() as $row) 
            {
                $data[$row -> caseNo] = $row->caseNo;
			}
            return $data;
        }
	}
	/*for suspect*/
	public function get_case_number_suspect($caseNo){
		$query = $this->db->select('caseNo')
						  ->from('suspectassigned')
						   ->where('caseNo', $caseNo)
						  ->get('');
        if($query->result()) 
        {
            $data = array();
            foreach($query->result() as $row) 
            {
                $data[$row -> caseNo] = $row->caseNo;
			}
            return $data;
        }
	}
	public function get_temp_number($caseNo){
		$query = $this->db->select('caseNo')
						  ->from('agentassigned')
						   ->where('caseNo', $caseNo)
						  ->get('');
        if($query->result()) 
        {
            $data = array();
            foreach($query->result() as $row) 
            {
                $data[$row -> caseNo] = $row->caseNo;
			}
            return $data;
        }
	}
	public function get_temp_number2($agentNo){
		$query = $this->db->select('agentNo')
						  ->from('agent')
						   ->where('agentNo', $agentNo)
						  ->get('');
        if($query->result()) 
        {
            $data = array();
            foreach($query->result() as $row) 
            {
                $data[$row -> agentNo] = $row->agentNo;
			}
            return $data;
        }
	}
	public function delete_suspect_to_case($suspectAssignedNo){
		$query = $this->db->where('suspectAssignedNo', $suspectAssignedNo)
						  ->delete('suspectassigned');
		if($query){
			
		}
	}
	
	
	public function agent_view_per_suspect($caseNo){
		$query = $this->db->select('suspectassigned.suspectAssignedNo, suspectassigned.suspectNo, suspectassigned.caseNo, 
									suspect.firstname as suspect_fname, suspect.lastName as suspect_lname, suspect.photo as suspect_photo')
						  ->from('suspectassigned')
		                  ->join('suspect','suspectassigned.suspectNo = suspect.suspectNo','inner')
		                  ->where("caseNo", $caseNo) 
		                  ->get('');
       
			                  return $query->result_array(); 
	
	}
	public function agent_view_per_case($caseNo){
		$query = $this->db->where('caseNo', $caseNo)
						  ->get('allcase');
					
				return $query->result_array();
				
	}
	public function agent_view_per_evidence($caseNo){
		$query = $this->db->select('*')
							->where('caseNo', $caseNo)
						  ->get('evidence');
					
				return $query->result_array();
				
	}
	public function get_case_detail($caseNo){
		$query = $this->db->select('allcase.caseNo,allcase.victim,allcase.typeOfCrime,allcase.precinctNo,allcase.caseStatus,
									evidence.evidenceNo as evidence_no, evidence.description as evidence_desc')
							->from('evidence')
							->join('allcase','allcase.agentNo = evidence.agentNo','inner')
							->where('allcase.caseNo',$caseNo)
							->get('');
			 
			 return $query->result_array(); 
	
	}
	
}

?>