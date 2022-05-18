<?php
   
require APPPATH . 'libraries/REST_Controller.php';
     
class Auth extends REST_Controller {
    
	  /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function __construct() {
       parent::__construct();
       $this->load->database();
       $this->load->helper('general');
       $this->load->model('User', 'user');
    }
       
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function login_post()
    {
        $input = $this->input->post();
        $response = $this->user->checkLogin($input);
        if($response) {
            $this->response(['status' => 'success', 'data' => $response], REST_Controller::HTTP_OK);    
        } else {
            $this->response(['status' => 'failed', 'message' => 'Incorrect login credentials!'], REST_Controller::HTTP_OK);
        }
        
    }
    	
}