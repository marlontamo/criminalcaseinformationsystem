<?php
class adduser extends CI_Model{
	

	var $table; 

	function __construct(){
		parent::__construct();
	}
	
	/*========================================================================================================================================================================
	@desc add_suspect_profile is for inserting basic info about the suspect into the suspect table
	@param data is the new suspect basic profile to be added in the suspect table 
	=========================================================================================================================================================================*/
	public function add_user_data($data){
		$table = 'users';
		 $this->db->insert($table, $data);
		//echo "<pre>";
	//print_r($data);
	    					
	}
	
}

?>