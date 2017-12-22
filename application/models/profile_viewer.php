<?php
class profile_viewer extends CI_Model{
	/*=========================================================================================================================================
	@desc selected_suspect retrives all data from table suspect where the value of the selected suspectNo is equal to suspectNo in the database
	@param $suspectNo int value which will be compared to the suspectNo field of the suspect table
	@returns data array
	===========================================================================================================================================*/
	public function selected_suspect($suspectNo){
		$sql = "SELECT * FROM suspect where suspectNo = ?";
		$data = array($suspectNo);
		
		$query = $this->db->query($sql, $data);
		return $query->result_array();
	}
	/*=========================================================================================================================================
	@desc selected_attributes retrives all data from table suspectAttribute where the value of the selected suspectNo is equal to suspectNo in the database
	@param $suspectNo int value which will be compared to the suspectNo field of the suspectAttribute table
	@returns data array
	===========================================================================================================================================*/
	public function selected_attribute($suspectNo){
		$sql = "SELECT * FROM suspectAttributes where suspectNo = ?";
		$data = array($suspectNo);
		
		$query = $this->db->query($sql, $data);
		return $query->result_array();
	}
	public function selected_suspect_case($suspectNo){
		$query = $this->db->select('suspectassigned.suspectAssignedNo, suspectassigned.suspectNo, suspectassigned.caseNo, 
									allcase.typeOfCrime as type_of_crime, allcase.victim as case_victim, allcase.agentNo as agent_No, allcase.caseStatus as status')
						  ->from('suspectassigned')
			              ->join('allcase','suspectassigned.caseNo = allcase.caseNo','inner')
						  ->where('suspectNo', $suspectNo)
			              ->get('');
		   
								return $query->result_array(); 
	}
	
		   
}


?>