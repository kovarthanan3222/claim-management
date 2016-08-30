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
class Claim extends REST_Controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->database();
        $this->load->model('Claim_model');
        $this->load->library('form_validation');
    }

    public function create_claim_post()
    {   
        $this->form_validation->set_rules('team_id', 'team_id', 'trim|required');
        $this->form_validation->set_rules('user_id', 'user_id', 'trim|required');
        $this->form_validation->set_rules('claim_title', 'claim_title', 'trim|required');
        $this->form_validation->set_rules('description', 'description', 'trim|required');
        $this->form_validation->set_rules('claim_status_id', 'claim_status_id', 'trim|required');
        $this->form_validation->set_rules('is_submit', 'is_submit', 'trim|required');
        $this->form_validation->set_rules('claim_date', 'claim_date', 'trim|required');
        
        if ($this->form_validation->run() != FALSE) {
            $claimData = array(
                'Team_id' => $this->input->post('team_id'),
                'User_id' => $this->input->post('user_id'),
                'title' => $this->input->post('claim_title'),
                'description' => $this->input->post('description'),
                'ref_claim_status_id' => $this->input->post('claim_status_id'),
                'is_submit' => $this->input->post('is_submit'),
                'apply_date' => date("Y-m-d", strtotime($this->input->post('claim_date')))
            );
            $claim = $this->Claim_model->insertClaim($claimData);
            
            $this->load->library('upload');

            $files = $_FILES;
            $cpt = count($_FILES['claims_docs']['name']);
            for ($i = 0; $i < $cpt; $i++) {
                $_FILES['claims_docs[]']['name'] = time().$files['claims_docs']['name'][$i];
                $_FILES['claims_docs[]']['type'] = $files['claims_docs']['type'][$i];
                $_FILES['claims_docs[]']['tmp_name'] = $files['claims_docs']['tmp_name'][$i];
                $_FILES['claims_docs[]']['error'] = $files['claims_docs']['error'][$i];
                $_FILES['claims_docs[]']['size'] = $files['claims_docs']['size'][$i];
                $this->upload->initialize($this->set_upload_options());
                $this->upload->do_upload('claims_docs[]');
                $claimDocs = array(
                    'upload_url' => $_FILES['claims_docs[]']['name'],
                    'claims_id' => $claim
                );
                $this->Claim_model->insertClaimDocs($claimDocs);
            }

            if($claim) {
            $message = [
                'claim id' => $claim,
                'message' => 'Congrats!! You did it'
            ];
            $response_code = REST_Controller::HTTP_CREATED;
            }
        }else {
            $message = [
                    'status' => FALSE,
                    'message' => "OOPS!! Please provoide valid inputs"
                    ];
                    $response_code = REST_Controller::HTTP_BAD_REQUEST; 
        }   
        
        $this->response( $message,$response_code);
    }
    
    
    public function cliams_list_get() {
        $claimList = $this->Claim_model->claim_list();
        if(count($claimList) > 0) {
            $message = [
                'claim_list' => $claimList,
                'message' => 'Congrats!! You got it'
            ];
            $response_code = REST_Controller::HTTP_OK;
            }
            $this->response( $message,$response_code);
        
    }
    
    public function team_claims_get() {
        $teamId = $this->get('teamId');
        if($teamId > 0) {
            $teamClaimList = $this->Claim_model->team_claim_list($teamId);
        if(count($teamClaimList) > 0) {
            $message = [
                'team_claim_list' => $teamClaimList,
                'message' => 'Congrats!! You got it'
            ];
            $response_code = REST_Controller::HTTP_OK;
            $this->response( $message,$response_code);
            }
        }else {
            $this->set_response([
                'status' => FALSE,
                'message' => 'Team could not be found'
            ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }
    }

    public function user_claims_get() {
        $userId = $this->get('userId');
        if($userId > 0) {
            $userClaimList = $this->Claim_model->user_claim_list($userId);
        if(count($userClaimList) > 0) {
            $message = [
                'user_claim_list' => $userClaimList,
                'message' => 'Congrats!! You got it'
            ];
            }
            else {
                $message = [
                'message' => 'No claims you have'
            ];
            }
            $response_code = REST_Controller::HTTP_OK;
            $this->response( $message,$response_code);
        }else {
            $this->set_response([
                'status' => FALSE,
                'message' => 'User could not be found'
            ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }
    }
    
    
    private function set_upload_options() {
        //upload an image options
        $config = array();
        $config['upload_path'] = 'application/claim_uploaded_docs/';
        $config['allowed_types'] = 'gif|jpg|png|xls|doc|pdf';
        $config['max_size'] = '0';
        $config['overwrite'] = FALSE;

        return $config;
    }

}
