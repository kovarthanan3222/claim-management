<?php

class User_model extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }
    
   public function userList()
    {
        $this->db->select('*');
        $this->db->from("User");
        $sql = $this->db->get();
        $result = $sql->result_array();
        return $result;
        
    }
    
    public function deleteUser($id) {
        $this->db->where('id', $id);
        $this->db->delete('User');
    }
   
}

?>