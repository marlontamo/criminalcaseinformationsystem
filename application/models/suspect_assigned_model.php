<?php
class suspect_assigned_model extends CI_Model{
	var $table; 
	/**=============================================================================================
	@desc function get_all_suspectNo retrieves all the data from the suspect table
	@returns $data that will be passed on to the controller and the view(dropdown)
	*fetching all suspect number from SUSPECT table
	===============================================================================================
	*/
	public function get_all_suspectNo(){
		$query = $this->db->select('suspectNo, firstname ,lastName')
						  ->from('suspect')
						  ->get('');
        if($query->result()) 
        {
            $data = array();
            foreach($query->result() as $row) 
            {
                $data[$row -> suspectNo] = $row->firstname." ".strtoupper($row->lastName);
			}
            return $data;
        }
	}
	/**================================================================================================
	@desc get_all_caseNo is a function which will get all available case numbers in the allcase table 
	@returns $data that will be passed on to the controller and the view(dropdown)
	*get all case number in the ALLCASE table
	===================================================================================================*/
	public function get_all_caseNo(){
		$query =$this->db->select('caseNo')
						 ->from('allcase')
		                 ->get('');
        if($query->result() > 0) 
        {
            $data = array();
            foreach($query->result() as $row) 
            {
                $data[$row -> caseNo] = $row->caseNo;
			}
            return $data;
        }else
			return;
	}
	/**=======================================================================================================
	@desc this function retrieves the last entered data in the database(table suspect assigned)
	@return data array
	*connecting SUSPECTASSIGNED and SUSPECT table then fetching all selected data from the 2 tables but only the last inserted suspect
	==============================================================================================================*/
	public function get_all_suspectAssigned(){
		$query = $this->db->select('suspectassigned.suspectAssignedNo, suspectassigned.suspectNo, suspectassigned.caseNo, 
									suspect.firstname as suspect_fname, suspect.lastName as suspect_lname, suspect.photo as suspect_photo')
						  ->from('suspectassigned')
		                  ->join('suspect','suspectassigned.suspectNo = suspect.suspectNo','inner')
		                  ->order_by("suspectAssignedNo", "desc") 
		                  ->limit(1)
		                  ->get('');
       
			                  return $query->result_array(); 
       
	}
	/**===============================================================================================================
	@desc this add_model_suspect function inserts the data into the database
	@param $data is an array which holds all the data 
	@returns true if the data was inserted 
	@return false if data was not inserted
	*insert all data in SUSPECTASSIGNED table
	===================================================================================================================*/
	public function add_model_suspect($data){
			$table = $this->dbtable;
			$query = $this->db->insert($table, $data);
				
	}
	/*================================================================================================================
	@desc get_old_suspectAssigned function in for fetching data from the suspectassigned table and suspect table 
	@returns the all the data from the suspectassigned table
	=================================================================================================================
	*/
	public function get_old_suspectAssigned(){
			$query = $this->db->select('suspectassigned.suspectAssignedNo, suspectassigned.suspectNo, suspectassigned.caseNo, 
								
									suspect.firstname as suspect_fname, suspect.lastName as suspect_lname')
						  ->from('suspectassigned')
			              ->join('suspect','suspectassigned.suspectNo = suspect.suspectNo','inner')
			              ->get('');
		   
								return $query->result_array(); 
		   
	}
	/*==================================================================================================================
	@desc update_model_suspect function is use to update all the data from the table suspectAssigned
	@returns true if data are updated 
	@returns the data updated array to be shown in the update success view
	======================================================================================================================
	*/
	public function update_model_suspect($data){
			
			extract($data);
			$query = $this->db->where('suspectAssignedNo', $data['suspectAssignedNo'])
							  ->update('suspectassigned', $data);
			if($query){
			  $q = $this->db->select('suspectassigned.suspectAssignedNo, suspectassigned.suspectNo, suspectassigned.caseNo, 
								suspect.firstname as suspect_fname, suspect.lastName as suspect_lname')
						->from('suspectassigned')
						->join('suspect','suspectassigned.suspectNo = suspect.suspectNo','inner')
						->where('suspectassigned.suspectAssignedNo', $data['suspectAssignedNo'])
						->limit(1) 
						->get('');
		   
					return $q->result_array(); 
			}
	}
	/*===========================================================================================================================
	*/
	public function find($suspectId){
		
			
			  $q = $this->db->select('suspectassigned.suspectAssignedNo, suspectassigned.suspectNo, suspectassigned.caseNo, 
								suspect.firstname as suspect_fname, suspect.lastName as suspect_lname')
						->from('suspectassigned')
						->join('suspect','suspectassigned.suspectNo = suspect.suspectNo','inner')
						->where('suspectassigned.suspectAssignedNo', $suspectId['suspectAssignedNo'])
						->limit(1) 
						->get('');
		   
					return $q->result_array(); 
			
	}
	/*=================================================================================================================
	@desc delete suspect to the assigned case
	=================================================================================================================*/
	public function delete_selected_suspect_to_case($suspectAssignedNo){
	    
		$query = $this->db->where('suspectAssignedNo', $suspectAssignedNo)
						->delete('suspectassigned');
		
	}

}

?>