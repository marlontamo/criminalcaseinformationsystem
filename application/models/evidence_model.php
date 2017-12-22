<?php
class evidence_model extends CI_Model{
	public function add($agentNumber,$caseNumber,$evidenceType,$evidenceFile,$evidencefileDescription) {
		$sql = "INSERT INTO evidence
		(dateSubmitted, timeSubmitted, agentNo, caseNo, evidence_type, evidence_file, file_description) 
		VALUES((select current_date()),(select current_time()),?, ?, ?, ?, ?)";
		$data = array($agentNumber,$caseNumber,$evidenceType,$evidenceFile,$evidencefileDescription);
		
		$this->db->query($sql, $data);
	}
	//Evidence model file
	public function getAllEvidence() {
		$sql = "SELECT * from evidence ORDER BY caseNo ASC;";
		$query = $this->db->query($sql);
		
		//return result as array
		return $query->result_array();
	}
	public function getAllEvidencePerCase($case) {
		$sql = "SELECT * from evidence WHERE caseNo = ".$case.";";
		$query = $this->db->query($sql);
		
		//return result as array
		if($query){
		return $query->result_array();
		}else
		return false;
	}
	public function deleteEvidence($evidence){
		$sql = "DELETE FROM evidence WHERE evidenceNo = ?;";
		$data = array($evidence);
		
		$this->db->query($sql, $data);
	}
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
	public function get_all_agentNo(){
		$query = $this->db->select('agentNo, firstname ,lastName')
						  ->from('agent')
						  ->get('');
        if($query->result()) 
        {
            $data = array();
            foreach($query->result() as $row) 
            {
                $data[$row -> agentNo] = $row->firstname." ".strtoupper($row->lastName);
			}
            return $data;
        }
	}
	
	public function getEvidenceFile($evidence) {
	 $sql = "SELECT evidence_file from evidence where evidenceNo = ?;";
	$query = $this->db->query($sql, array($evidence));
		
		//return result as array
		$evidences = $query->result_array();
		$evidence = $evidences[0];
		
		return $evidence["evidence_file"];
}
}
?>