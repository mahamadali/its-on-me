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
    public function province_get()
    {
        $response = $this->db->get('provinces')->result_array();
        $this->response(['status' => 'success', 'data' => $response], REST_Controller::HTTP_OK);
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

    public function register_post()
    {
        $input = $this->input->post();

        if($input['password'] != $input['confirmPassword']) {
            return $this->response(['status' => 'failed', 'message' => 'Password and Confirm password must be same!'], REST_Controller::HTTP_OK);
        }

        $emailCount = $this->user->findByColumn('email', $input['email']);
        
        if(!empty($emailCount)) {
            return $this->response(['status' => 'failed', 'message' => 'Email already exist'], REST_Controller::HTTP_OK);
        }

        $data = [
            'first_name' => $input['firstname'],
            'last_name' => $input['surname'],
            'dob' => $input['dob'],
            'phone' => $input['phoneNumber'],
            'email' => $input['email'],
            'password' => md5($input['password']),
            'province' => $input['province']
        ];
        
        $id = $this->user->insert_data_getid($data, 'users');
        if($id) {
            $this->response(['status' => 'success', 'message' => 'Account created successfully', 'user_id' => $id], REST_Controller::HTTP_OK);
        } else {
            $this->response(['status' => 'failed', 'message' => 'Incorrect login credentials!'], REST_Controller::HTTP_OK);
        }
        
    }

    public function forgotPassword_post()
    {
        $input = $this->input->post();

        $emailCount = $this->user->findByColumn('email', $input['email']);
        
        if(empty($emailCount)) {
            return $this->response(['status' => 'failed', 'message' => 'Email does not exist'], REST_Controller::HTTP_OK);
        }

        $id = $emailCount->id;

        $code = rand(111111, 999999);
        $data = [
            'verification_code' => $code,
        ];
        
        $this->user->updateColumn($data, $id);
        if($id) {
            $this->response(['status' => 'success', 'message' => 'verification code sent to email', 'user_id' => $id, 'code' => $code], REST_Controller::HTTP_OK);
        } else {
            $this->response(['status' => 'failed', 'message' => 'Something went wrong!'], REST_Controller::HTTP_OK);
        }
        
    }
    	
}