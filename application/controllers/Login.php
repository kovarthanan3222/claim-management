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
class Login extends REST_Controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->database();
        $this->load->model('User_model');
    }

    public function verify_user_post()
    {   
        if ($this->post('username') and $this->post('password')) {
                $users = $this->User_model->login($this->post('username'), $this->post('password'));                
                if ($users) {
                            $this->response([
                    'status' => true,
                    'message' => 'Congrats!! You got the access',
                    'id' => $users[0]["id"]
                ], REST_Controller::HTTP_UNAUTHORIZED); // HTTP_UNAUTHORIZED (401) being the HTTP response code
                }
                else 
                {
                    $this->response([
                    'status' => FALSE,
                    'message' => 'You naughty!! Give me valid credentails'
                ], REST_Controller::HTTP_UNAUTHORIZED); // HTTP_UNAUTHORIZED (401) being the HTTP response code
                }
        }
        else 
        {
               $this->response([
                    'status' => FALSE,
                    'message' => 'OOPS!! Please provoide valid username or password'
                ], REST_Controller::HTTP_UNAUTHORIZED); // HTTP_UNAUTHORIZED (401) being the HTTP response code 
        }
    }
}
