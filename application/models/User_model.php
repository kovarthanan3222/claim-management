<?php

class User_model extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }
    
   public function userList()
    {
        $this->db->select('id, username, is_admin, is_active, last_login');
        $this->db->from("User");
        $sql = $this->db->get();
        $result = $sql->result_array();
        return $result;        
    }

    public function get_user($username)
    {
        $this->db->select('id');
        $this->db->from("User");
        $this->db->where('username', $username);
        $sql = $this->db->get();
        $result = $sql->result_array();
        if ($result) {                
            return $result[0]["id"];   
        }else{
            return 0;
        }
             
    }    
    
    public function deleteUser($id) {
        $this->db->where('id', $id);
        $this->db->delete('User');
    }

    public function createUser($userDetail) {

        $id = $this->get_user($userDetail['username']);        
        if ($id) {     
            return 1062;
        } else {
            $this->db->insert('User', $userDetail );
            return  $this->db->insert_id();
        }
        
    }

    public function login($username, $password)
    {       
        $this->db->select('id, username, password');
        $this->db->from('User');
        $this->db->where('username', $username);
        $this->db->where('password', md5($password));
        $query = $this->db->get();
        // echo "string"; 
        if($query -> num_rows())
        {
            // echo print_r($query->result_array());
            return $query->result_array();
        }
        else
        {
            return false;
        }
    }
   
}

?>