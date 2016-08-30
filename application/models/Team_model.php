<?php

class Team_model extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
        $this->load->model('User_model');
    }
    
    public function get_team_id($team_name)
    {
        $this->db->select('id');
        $this->db->from("Team");
        $this->db->where('name', $team_name);
        $sql = $this->db->get();
        $result = $sql->result_array();
        if ($result) {
            return $result[0]["id"];   
        }else{
            return 0;
        }             
    }    

    public function insertTeam ($team_name, $user_id) {

        $id = $this->get_team_id($team_name);        
        if ($id) {     
            return 1062; //Duplicate record
        } else {
            //insert record in db
            $team_detail = [
                'name' => $team_name                
            ];
            $this->db->insert('Team', $team_detail );
            $team_id = $this->db->insert_id();

            //maintain the role of the user
            $role_id = $this->get_role_id(); 
            $user_role_details = [
                'team_id' => $team_id,
                'user_id' => $user_id,
                'role_id' => $role_id
            ];
            $this->insert_user_role($user_role_details);   
            return  $team_id;
        }
    }

    public function insert_user_role($team_detail)
    {
        $this->db->insert('Team_user_role', $team_detail );     
        return  $this->db->insert_id();       
    }

    public function add_users_to_team($user_detail)
    {
        $users = $user_detail["user_ids"];
        $team_id = $this->get_team_id($user_detail["team_name"]);  
        echo "\nTeam_id". $team_id;
        if ($team_id == 0 or $team_id == 1062) {     
            return 0; 
        } else {
            $user_info = 0;
            for ($i=0; $i < count($users) ; $i++) { 
                echo "\n". $users[$i];
                if ( $this->check_user_existence($users[$i], $team_id) ) {
                    $user_id = $this->User_model->get_user($users[$i]);
                    $user_role_details = [
                        "team_id" => $team_id,
                        "user_id" => $user_id,
                        "role_id" => 3
                    ];
                    $this->insert_user_role($user_role_details);   
                }
                else{
                    $user_info += 1;
                }
            }  
            if ($user_info) {
                return 0;
            }
            return  1;     
        }
  
    }

    public function check_user_existence($username, $team_id)
    {
        $user_id = $this->User_model->get_user($username);
        if ( $user_id ) {
                    echo "\nuser_id". $user_id;
            $this->db->select('team_id');
            $this->db->from("Team_user_role");
            $this->db->where('user_id', $user_id);
            $sql = $this->db->get();
            $result = $sql->result_array();
            if ($result) {
                return 0;           
            }else{
                return 1;
            }
        }else{
            return 0;
        }             
    }    

    public function get_role_id()
    {
        $this->db->select('id');
        $this->db->from("Role");
        $this->db->where('name', 'manager');
        $sql = $this->db->get();
        $result = $sql->result_array();
        if ($result) {
            return $result[0]["id"];   
        }else{
            return 0;
        }        
    }           
}

?>