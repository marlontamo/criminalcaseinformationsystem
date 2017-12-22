<?php
class suspect_delete_model extends CI_Model{
	
	/*================================================================================================================================
	@desc delete the selected suspect from the main suspect page
	==================================================================================================================================*/
	public function delete_selected_suspect($suspectNo){
	    
		$query = $this->db->where('suspectNo', $suspectNo)
						->delete('suspect');
						
		
	}
	/*===================================================================================================================================
	@desc function to delete the selected attributeName and attributeValue
	=====================================================================================================================================*/
	public function delete_selected_attribute($suspectAttributeNo){
	    
		$query = $this->db->where('suspectAttributeNo', $suspectAttributeNo)
						->delete('suspectattributes');
		
								
	}
	public function select_suspect_photo($suspectNo) {
	$query = $this->db->select('photo')
					  ->from('suspect')
					  ->where('suspectNo',$suspectNo)
					  ->get('');
		
		//return result as array
		$suspect = $query->result_array();
		$data = $suspect[0];
		
		return $data["photo"];
	}
	
	
	
	
	
	
	
	
	
}

?>