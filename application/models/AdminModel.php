<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/* Author: Himadri Banerjee. Created at: 09/09/2021 */

class AdminModel extends CI_model {	
	
	private $collectionJobs = ALL_JOBS;
	private $collectionCompany = COMPANY_MASTER;
	private $collectionAdmin = ADMIN_MASTER;
	private $collectionCategory = CATEGORY_MASTER;

	protected $salt='HA{t~xOB;74Dp,Q+$y3F??:}/?LMj_';

	private $limit = 50;
	
	function __construct() {
		parent::__construct();
		$this->load->library('mongo_db');
		
	}

	public function passwordGenerate($password){
    	return md5(crypt($password,$this->salt));
    }

	public function generateToken(){
    	return md5(crypt(rand().time(),$this->salt));
    }

	public function doLoginCheck($data){
    	
		try {
		 	
			if(isset($data["username"]) && isset($data["password"]) ){
			$this->mongo_db->reset_query();
			$this->mongo_db->select(['username','create_date']);
			/*$this->mongo_db->and_where(['username' => $data["username"], 'password' => md5(crypt($data["password"],$this->salt))]);	*/
			$this->mongo_db->and_where(['username' => $data["username"], 'password' => $data["password"]]);							
			$this->mongo_db->offset(0);
			$this->mongo_db->limit(1);	
			$result = $this->mongo_db->get($this->collectionAdmin);

			return $result;

			}else{
				return [];
		   }

	        
	    } catch (Exception $e) {
	       throw new Exception();
	    }	
    }

	function get_company_count() {
		try {	

			//$this->mongo_db->where('job_status', 'A');
			$count = $this->mongo_db->count($this->collectionCompany);
			$this->mongo_db->reset_query();						
			return $count;

		} catch(MongoDB\Driver\Exception\RuntimeException $ex) {
			show_error('Error while fetching users: ' . $ex->getMessage(), 500);
		}
	}

	function get_category_count() {
		try {	

			//$this->mongo_db->where('cat_status', 'A');
			$count = $this->mongo_db->count($this->collectionCategory);
			$this->mongo_db->reset_query();						
			return $count;

		} catch(MongoDB\Driver\Exception\RuntimeException $ex) {
			show_error('Error while fetching users: ' . $ex->getMessage(), 500);
		}
	}

	function get_all_company($params) {
		try {	
			
			$limit = ($params['limit'] >0 ) ? $params['limit']: 50;
			$offset = ($params['offset'] >0 ) ? $params['offset']: 0;

			//$this->mongo_db->where('job_status', 'A');			
			$this->mongo_db->sort(['signup_date' => 'desc', '_id' => FALSE]);
			$this->mongo_db->offset($offset);
			$this->mongo_db->limit($limit);			

			$allCompany = $this->mongo_db->get($this->collectionCompany);

			$this->mongo_db->reset_query();
						
			return $allCompany;

		} catch(MongoDB\Driver\Exception\RuntimeException $ex) {
			show_error('Error while fetching users: ' . $ex->getMessage(), 500);
		}
	}

	function get_all_categories($params) {
		try {	
			
			$limit = ($params['limit'] >0 ) ? $params['limit']: 50;
			$offset = ($params['offset'] >0 ) ? $params['offset']: 0;

			//$this->mongo_db->where('cat_status', 'A');			
			$this->mongo_db->sort(['cat_name' => 'asc', '_id' => FALSE]);
			$this->mongo_db->offset($offset);
			$this->mongo_db->limit($limit);			

			$result = $this->mongo_db->get($this->collectionCategory);

			$this->mongo_db->reset_query();
						
			return $result;

		} catch(MongoDB\Driver\Exception\RuntimeException $ex) {
			show_error('Error while fetching users: ' . $ex->getMessage(), 500);
		}
	}

	function get_company_details($params) {
		try {	

			$id = $params['id'];

			if(!empty($id))
			{
				$this->mongo_db->reset_query();
				$this->mongo_db->and_where(['_id' => $this->mongo_db->create_document_id($id)]);
				$this->mongo_db->offset(0);
				$this->mongo_db->limit(1);		

				$result = $this->mongo_db->get($this->collectionCompany);

				$this->mongo_db->reset_query();

			}
			

						
			return $result;

		} catch(MongoDB\Driver\Exception\RuntimeException $ex) {
			show_error('Error while fetching users: ' . $ex->getMessage(), 500);
		}
	}

	function add_new_company($query) {
		try {
			
			
			$insertId = $this->mongo_db->insert($this->collectionCompany, [
				'_id' => $this->mongo_db->create_document_id(),
				'company_id' =>  ($query['company_id']) ? $query['company_id'] : '0',
				'company_name' => ($query['company_name']) ? $query['company_name'] : '',
				'company_logo'=> ($query['company_logo']) ? $query['company_logo'] : '',
				'company_desc'=> ($query['company_desc']) ? $query['company_desc'] : '',
				'company_url'=> ($query['company_url']) ? $query['company_url'] : '',
				'signup_date'=> date('Y-m-d')
			]);

			$this->mongo_db->reset_query();

			if($insertId) {
				return TRUE;
			}
			
			return FALSE;	


		} catch(MongoDB\Driver\Exception\RuntimeException $ex) {
			show_error('Error while updating users: ' . $ex->getMessage(), 500);
		}
	}

	function update_company($update_query,$_id) {
		try {			
			
			$this->mongo_db->set($update_query)->where('_id', $this->mongo_db->create_document_id($_id));
			$updateStatus = $this->mongo_db->update($this->collectionCompany);	
			$this->mongo_db->reset_query();

			if($updateStatus == 1) {
				return TRUE;
			}
			
			return FALSE;	


		} catch(MongoDB\Driver\Exception\RuntimeException $ex) {
			show_error('Error while updating users: ' . $ex->getMessage(), 500);
		}
	}

	function get_job_count() {
		try {	

			$this->mongo_db->where('job_status', 'A');

			$countJobs = $this->mongo_db->count($this->collectionJobs);

			$this->mongo_db->reset_query();

						
			return $countJobs;

		} catch(MongoDB\Driver\Exception\RuntimeException $ex) {
			show_error('Error while fetching users: ' . $ex->getMessage(), 500);
		}
	}
	
	function get_job_list($params) {
		try {		

			$limit = $params['limit'];
			$offset = $params['offset'];

			$this->mongo_db->reset_query();
			$this->mongo_db->where('job_status', 'A');			
			$this->mongo_db->sort(['job_posting_date' => 'desc', '_id' => FALSE]);
			$this->mongo_db->offset($offset);
			$this->mongo_db->limit($limit);
			

			$resultJob = $this->mongo_db->get($this->collectionJobs);

			$this->mongo_db->reset_query();

						
			return $resultJob;

		} catch(MongoDB\Driver\Exception\RuntimeException $ex) {
			show_error('Error while fetching users: ' . $ex->getMessage(), 500);
		}
	}

	function get_job_details($params) {
		try {			

				

			$id = $params['id'];

			$this->mongo_db->reset_query();
			$this->mongo_db->and_where(['job_status' => 'A', '_id' => $this->mongo_db->create_document_id($id)]);			
			$this->mongo_db->sort(['job_posting_date' => 'desc', '_id' => FALSE]);
			$this->mongo_db->offset(0);
			$this->mongo_db->limit(1);
			

			$resultJob = $this->mongo_db->get($this->collectionJobs);

			$this->mongo_db->reset_query();

						
			return $resultJob;

		} catch(MongoDB\Driver\Exception\RuntimeException $ex) {
			show_error('Error while fetching users: ' . $ex->getMessage(), 500);
		}
	}

	
	
	
		
	
}