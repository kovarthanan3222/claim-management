<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require APPPATH . '/libraries/REST_Controller.php';

/**
 * Manage user information 
 *
 * @package         CodeIgniter
 * @subpackage      Rest Server
 * @category        Controller
 * @author          Kovarthanan 
 */
class Team extends REST_Controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->database();
        $this->load->model('Team_model');
    }

    public function create_team_post()
    {   

        if ($this->post('user_id') and $this->post('team_name')) {
                $users = $this->Team_model->insertTeam($this->post('team_name'), $this->post('user_id'));
            if ($users) {

                if ($users == 1062) {
                        $message = [
                            'status' => FALSE,
                            'message' => 'OOPS!! Copyrighted!! Please do cahnge your team name'
                        ];    
                        $response_code = REST_Controller::HTTP_BAD_REQUEST;                    
                } 
                else 
                {
                        $message = [
                            'Team id' => $users,
                            'message' => 'Congrats!! You did it'
                        ];
                        $response_code = REST_Controller::HTTP_CREATED;   
                }               
            }
        }            
        else
        {
                $message = [
                    'status' => FALSE,
                    'message' => 'OOPS!! Please provoide valid inputs'
                    ];
                    $response_code = REST_Controller::HTTP_BAD_REQUEST;                
        }   
        
        $this->response( $message,$response_code);
    }

    public function add_users_post()
    {
        if ($this->post('user_id') and $this->post('team_name') and $this->post('users')) {         

            $users_detail = [
                'team_name' => $this->post('team_name'),
                'user_ids' => $this->post('users')
            ];
            $users = $this->Team_model->add_users_to_team($users_detail);
            if ($users && $users == 1 ) {
                           echo print_r($this->post('users'));
                        $message = [
                            'status' => Success,
                            'message' => 'Congrats!! You did it'
                        ];
                        $response_code = REST_Controller::HTTP_CREATED;   
            }
            else {
                $message = [
                    'status' => FALSE,
                    'message' => 'OOPS!! Please provoide valid inputs'
                    ];
                    $response_code = REST_Controller::HTTP_BAD_REQUEST;  
            }
        }
        else
        {
            $message = [
                    'status' => FALSE,
                    'message' => 'OOPS!! Please provoide valid inputs'
                    ];
                    $response_code = REST_Controller::HTTP_BAD_REQUEST;  
        }
        $this->set_response( $message,$response_code);
    }

}
