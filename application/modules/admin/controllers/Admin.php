<?php

(defined('BASEPATH')) OR exit('No direct script access allowed');

class Admin extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('AdminModel','adminModel');
    }

    function index() {        
       $this->login();
    }

    function login() {        
        $data = [];
	    $data['view_file'] = 'login';
	    admin_nakedview($data);
    }

    function dashboard() {        
        $data = [];
		$data['category_count'] = $this->adminModel->get_category_count();
		$data['job_count'] = $this->adminModel->get_job_count();
		$data['employers_count'] = $this->adminModel->get_company_count();

	    $data['view_file'] = 'dashboard';
	    admin_view($data);
    }

    public function doLoginValidate(){
		try { 
            
			$data=$_POST;
			$resposne=["status"=>"0","message"=>"","field"=>''];
			if(!empty($data)){
				if(!(isset($data["username"]) && trim($data["username"])!=='')){
					$resposne=["status"=>"1","message"=>"Please Enter User Name.","field"=>'username'];
				}else if(!(isset($data["password"]) && trim($data["password"])!=='')){
					$resposne=["status"=>"1","message"=>"Please Enter password.","field"=>'password'];
				}else{

					$user_data=$this->adminModel->doLoginCheck($data);
					
					if(count($user_data)==1){
						$token=$this->adminModel->generateToken();
						$user_data=current($user_data);
						//$this->userModel->updateUser(["token_id"=>$token],$user_data);
						//set_cookie('token_id',$token,'3600000'); 
						
						$resposne=["status"=>"0","message"=>"Login Successful"];
					}else{
						$resposne=["status"=>"1","message"=>"Wrong User Name Or Password.","field"=>'user_name'];
					}
				}
			}else{
				$resposne=["status"=>"1","message"=>"Invalid credential","field"=>'user_name'];
			}
		} catch (Exception $e) {
		 	$resposne=["status"=>"1","e"=>$e,"message"=>"Unexpected server error.Please try again some time.","field"=>'user_name'];
		 // var_dump($e->getMessage());
		}
		echo json_encode($resposne);
	}

}

