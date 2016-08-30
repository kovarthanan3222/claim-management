<?php

class Claim_model extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }
    
       

    public function insertClaim ($claimData) {

            $this->db->insert('claims', $claimData );
            return $this->db->insert_id();
    }
    
    public function insertClaimDocs ($claimDocs) {

            $this->db->insert('claims_doc', $claimDocs );
            return $this->db->insert_id();
    }
    
    public function claim_list() {
        $this->db->select('c.id, c.apply_date, c.Team_id, c.User_id, c.title, c.description, c.ref_claim_status_id, c.is_submit');
        $this->db->from('claims c');
        $this->db->join('Team t', 't.id = c.Team_id', 'left');
        $sql = $this->db->get();
        $result = $sql->result_array();
        return $result;   
    }
    
    public function team_claim_list($teamId) {
        $this->db->select('c.id, c.apply_date, c.Team_id, c.User_id, c.title, c.description, c.ref_claim_status_id, c.is_submit,t.name');
        $this->db->from('claims c');
        $this->db->join('Team t', 't.id = c.Team_id', 'left');
        $this->db->where('c.Team_id', $teamId);
        $sql = $this->db->get();
        $result = $sql->result_array();
        return $result;   
    }
    
    public function user_claim_list($userId) {
        $this->db->select('c.id, c.apply_date, c.Team_id, c.User_id, c.title, c.description, c.ref_claim_status_id, c.is_submit,t.name');
        $this->db->from('claims c');
        $this->db->join('Team t', 't.id = c.Team_id', 'left');
        $this->db->where('c.User_id', $userId);
        $sql = $this->db->get();
        $result = $sql->result_array();
        return $result;   
    }
    
    
           
}

?>