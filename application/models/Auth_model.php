<?php

class Auth_model extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }
    
    public function get_authentication_id($user_id)
    {
        $this->db->select('is_admin');
        $this->db->from("User");
        $this->db->where('id', $user_id);
        $sql = $this->db->get();
        $result = $sql->result_array();   
        if ($result) {
            return $result[0]["is_admin"];   
        }else{
            return 0;
        }             
    }    
}

?>