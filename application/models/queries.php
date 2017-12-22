<?php
class queries extends CI_Model{
	
	var $table; 
	/*========================================================================================================================================================================
	@desc add_suspect_profile is for inserting basic info about the suspect into the suspect table
	@param data is the new suspect basic profile to be added in the suspect table 
	=========================================================================================================================================================================*/
	public function add_suspect_profile($data){
		$table = $this->dbtable;
		$query = $this->db->insert($table, $data);
							
	}
	/*============================================================================================================================================================================
	@desc add_suspect_attribute function is use for inserting/adding new attributes for suspect and at the same time retrieving all inserted attibutes from suspectAttribute table
	@param data is data the was entered by the user to be added as the suspects attribute
	@returns all data from suspectAttribute table
	=============================================================================================================================================================================*/
	public function add_suspect_attribute($data){
		
			$query = $this->db->insert('suspectAttributes', $data);
							if ($query){
								$q = $this->db->select('suspectAttributes.attributeName, suspectAttributes.attributeValue')
												->from('suspectAttributes')
												->where("suspectAttributes.suspectNo",$data['suspectNo'])
												->get('');
        
									return $q->result_array();
									
							}
							
	}
	/*===================================================================================================================================
	@function get_suspect_profile gets the last inserted suspect into the database
	@returns array data of the newly inserted suspect
	====================================================================================================================================*/
	public function get_suspect_profile(){
		$q = $this->db->select('suspectNo, photo, firstname ,lastName, middleName,gender,birthdate')
					->from('suspect')
					->order_by("suspectNo", "desc")
					->limit(1)
					->get('');
        
		return $q->result_array();
	}
	/*===========================================================================================================================
	@desc function do_upload is use to photos 
	@returns the data array of the image that is being uploaded
	==============================================================================================================================*/
	public function do_upload(){
		$config = array(
            'allowed_types' => 'jpeg|jpg|png|bmp', 
            'upload_path'=>'./photo/', 
            'max_size'=>2000
            );
			if($config['allowed_types'] === false){
				return false;
			}else{

				$this->load->library('upload',$config);
				$this->upload->do_upload();
				$image_data = $this->upload->data();
					return $image_data;
			}
    }  
	/*=============================================================================================================================
	@desc get_all_suspect is use for retrieving all suspect basic information which are located at suspect table
	@return values inside the database in array form.
	===============================================================================================================================*/
	public function get_all_suspect(){
	  $q = $this->db->select('suspectNo, photo, firstname ,lastName, middleName,gender,birthdate')
					->from('suspect')
					->order_by("suspectNo", "desc")
					->get('');
        
		return $q->result_array();
	}
	/*====================================================================================================================================
	@desc update_suspect_profile is function for updating suspect basic information and at the same time it will 
	@param data is the new set of data
	@return the updated suspect data
	======================================================================================================================================*/
	public function update_suspect_profile($data){
	    extract($data);
			$query = $this->db->where('suspectNo', $data['suspectNo'])
							  ->update('suspect', $data);
			if($query){
			  
			  $q = $this->db->select('*')
						->from('suspect')
						->where('suspect.suspectNo', $data['suspectNo'])
						->limit(1) 
						->get('');
		   
					return $q->result_array(); 
			}
	
	}
	
	
	
	
	
	
	
	
	
	
}

?>