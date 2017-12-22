<?php
class agent_assigned_model extends CI_Model{
    var $table;
    public function get_all_agentNo(){
        $query = $this->db->select('agentNo, firstName ,lastName')
            ->from('agent')
            ->get('');
        if($query->result())
        {
            $data = array();
            foreach($query->result() as $row)
            {
                $data[$row -> agentNo] = $row->firstName." ".strtoupper($row->lastName);
            }
            return $data;
        }
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
    public function get_all_agentAssigned(){
        $query = $this->db->select('agentassigned.agentAssignedNo, agentassigned.agentNo, agentassigned.caseNo
									')
            ->from('agentassigned')
            ->join('agent','agentassigned.agentNo = agent.agentNo','inner')
            ->order_by("agentAssignedNo", "desc")
            ->limit(1)
            ->get('');

        return $query->result_array();

    }
    public function add_model_agent($data){
        $table = $this->dbtable;
        $query = $this->db->insert($table, $data);

    }
    public function get_old_agentAssigned(){
        $query = $this->db->select('agentassigned.agentAssignedNo, agentassigned.agentNo, agentassigned.agentNo,
									')
            ->from('agentassigned')
            ->join('agent','agentassigned.agentNo = agent.agentNo','inner')
            ->get('');

        return $query->result_array();

    }
    public function update_model_agent($data){

        extract($data);
        $query = $this->db->where('agentAssignedNo', $data['agentAssignedNo'])
            ->update('agentassigned', $data);
        if($query){
            $q = $this->db->select('agentassigned.agentAssignedNo, agentassigned.agentNo, agentassigned.agentNo,
									agentassigned.status,
									agent.firstName as agent_fname, agent.lastName as agent_lname')
                ->from('agentassigned')
                ->join('agent','agentassigned.agentNo = agent.agentNo','inner')
                ->where('agentassigned.agentAssignedNo', $data['agentAssignedNo'])
                ->limit(1)
                ->get('');

            return $q->result_array();
        }
    }
    public function find($agentId){


        $q = $this->db->select('agentassigned.agentAssignedNo, agentassigned.agentNo, agentassigned.agentNo,
									agentassigned.status,
									agent.firstName as agent_fname, agent.lastName as agent_lname')
            ->from('agentassigned')
            ->join('agent','agentassigned.agentNo = agent.agentNo','inner')
            ->where('agentassigned.agentAssignedNo', $agentId['agentAssignedNo'])
            ->limit(1)
            ->get('');

        return $q->result_array();

    }

    public function delete_selected_agent_to_case($agentAssignedNo){

        $query = $this->db->where('agentAssignedNo', $agentAssignedNo)
            ->delete('agentassigned');
			if($query){
			return true;
            }
    }

}

?>