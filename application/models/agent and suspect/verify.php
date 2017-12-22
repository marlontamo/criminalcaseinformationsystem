<?php
class verify extends CI_Model{
	
	var $table; 	
	public function add_agent_profile($data){
		$table = $this->dbtable;
		if($data != null){
			$flag = 1;
			if( is_numeric($data['firstName']) || $data['firstName'] == null || strlen($data['firstName']) <= 0 && strlen($data['firstName']) >= 45)
				$flag = 0;
			if( is_numeric($data['lastName']) || $data['lastName'] == null || strlen($data['lastName']) <= 0 && strlen($data['lastName']) >= 45)
				$flag = 0;
			if( is_numeric($data['middleName']) || $data['middleName'] == null || strlen($data['middleName']) <= 0 && strlen($data['middleName']) >= 45)
				$flag = 0;
			if( $data['gender'] == null || strlen($data['gender']) <= 0 && strlen($data['gender']) >= 1 ) 
				$flag = 0;
			if( $data['address'] == null || strlen($data['address']) <= 0 && strlen($data['address']) >= 45)
				$flag = 0;
			if( !is_numeric($data['contactNo']) ||$data['contactNo'] == null || strlen($data['contactNo']) <= 0 && strlen($data['contactNo']) >= 12)
				$flag = 0;
			if( $data['birthdate'] == null || strlen($data['birthdate']) <= 0 && strlen($data['birthdate']) >= 8 )
				$flag = 0;
			if( $data['rank'] == null || strlen($data['rank']) <= 0 && strlen($data['rank']) >= 45)
				$flag = 0;
			if( $data['qualifications'] == null || strlen($data['qualifications']) <= 0)
				$flag = 0;
			
				if($flag==1){	
						$query = $this->db->insert($table, $data);
							if ($query){
								header("Refresh: 2; url=\"agent_add_success\"");
							}
							else
								echo "no data was inserted";
								//return false;
			}else{
				echo "invalid data";
				$this->load->view('add_agent');
			}
		}
	}
	/*@function get agent profile gets the last inserted agent into the database
		to be printed out in the agent_add_success page
	*/
	public function get_agent_profile(){
		$q = $this->db->select('agentNo, photo, firstName ,lastName, middleName,gender, address,contactNo,birthdate,rank,qualifications')
					->from('agent')
					->order_by("agentNo", "desc")
					->limit(1)
					->get('');
        
		return $q->result_array();
	}
	//---------------------------->
	/*@desc function do_upload is use to photos 
	@returns the data array of the image that is being uploaded
	*/
	
	//---------------------------->
}

?>