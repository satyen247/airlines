<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class JobModel extends CI_model {	
	
	private $collectionJobs = ALL_JOBS;
	private $collectionCompany = COMPANY_MASTER;
	private $collectionAdmin = ADMIN_MASTER;
	private $collectionCategory = CATEGORY_MASTER;

	private $limit = 50;
	
	function __construct() {
		parent::__construct();
		$this->load->library('mongo_db');
		
	}

	function get_all_company() {
		try {			

			$allCompany = $this->mongo_db->select(['company_id','company_name','company_logo','company_desc','company_url','signup_date'], [])->get($this->collectionCompany);	
			
			// Clears query.
			$this->mongo_db->reset_query();
						
			return $allCompany;

		} catch(MongoDB\Driver\Exception\RuntimeException $ex) {
			show_error('Error while fetching users: ' . $ex->getMessage(), 500);
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

					
			/* $resultJob = $this->mongo_db->select(['company_id','job_id','job_title','job_position_title','job_function','job_desc','job_type','job_start_date','job_end_date','job_duration','job_city','job_state','job_zip','job_country','min_education','min_experience','required_travel','salary_type','min_salary','max_salary','salary_amount','job_status','job_posting_date'], [])->get($this->collectionJobs);

			// Clears query.
			$this->mongo_db->reset_query();
			
			 if(is_array($result) && count($result)>0)
			{
				foreach($result as $k=>$user) 
				{
					$result[$k]['timestamp'] = isset($user['reg_date']['$timestamp']['t'])?date('d-m-Y H:i:s', $user['reg_date']['$timestamp']['t']): '';
					
				}

			} */

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

	function get_job_list_like_search($params) {
		try {			

			if($params['search_keywords']!='')
			{

				//$resultJob = $this->mongo_db->like('job_position_title', $params['search_keywords'],'i',false,false)->get($this->collectionJobs);

				/* $this->mongo_db->reset_query();
				$this->mongo_db->like('job_position_title', $params['search_keywords'],'i',false,false);
				$this->mongo_db->offset(0);
				$this->mongo_db->limit(25);
				$resultJob = $this->mongo_db->get($this->collectionJobs);				
				// Clears query.
				$this->mongo_db->reset_query(); */

				$limit = $params['limit'];
				$offset = $params['offset'];

				$this->mongo_db->reset_query();
				$this->mongo_db->or_where(['job_position_title' => $this->mongo_db->regex($params['search_keywords'], iU, FALSE,FALSE), 'company_name' => $this->mongo_db->regex($params['search_keywords'], iU, FALSE, FALSE)]);
				$countJobs = $this->mongo_db->count($this->collectionJobs);

			
				
				$this->mongo_db->reset_query();								
				$this->mongo_db->or_where(['job_position_title' => $this->mongo_db->regex($params['search_keywords'], iU, FALSE,FALSE), 'company_name' => $this->mongo_db->regex($params['search_keywords'], iU, FALSE, FALSE)]);

				$this->mongo_db->offset($offset);
				$this->mongo_db->limit($this->limit);
				$resultJob = $this->mongo_db->get($this->collectionJobs);
				$this->mongo_db->reset_query();

				
				
			}elseif($params['search_location']!='')
			{

				$limit = $params['limit'];
				$offset = $params['offset'];

				//$this->mongo_db->like('job_city', $params['search_location'],'i',false,false);
				$this->mongo_db->reset_query();
				$this->mongo_db->or_where(['job_city' => $this->mongo_db->regex($params['search_location'], iU, FALSE,FALSE), 'job_state' => $this->mongo_db->regex($params['search_location'], iU, FALSE,FALSE), 'job_zip' => $this->mongo_db->regex($params['search_location'], iU, FALSE,FALSE), 'job_country' => $this->mongo_db->regex($params['search_location'], iU, FALSE,FALSE)]);
				$countJobs = $this->mongo_db->count($this->collectionJobs);


				$this->mongo_db->reset_query();
				$this->mongo_db->or_where(['job_city' => $this->mongo_db->regex($params['search_location'], iU, FALSE,FALSE), 'job_state' => $this->mongo_db->regex($params['search_location'], iU, FALSE,FALSE), 'job_zip' => $this->mongo_db->regex($params['search_location'], iU, FALSE,FALSE), 'job_country' => $this->mongo_db->regex($params['search_location'], iU, FALSE,FALSE)]);
				$this->mongo_db->offset($offset);
				$this->mongo_db->limit($this->limit);
				$resultJobCity = $this->mongo_db->get($this->collectionJobs);

				// Clears query.
				$this->mongo_db->reset_query();
				
			}

			if(count($resultJob) > 0 && count($resultJobCity) == 0)
			{
				$final = $resultJob;

			}elseif(count($resultJob) == 0 && count($resultJobCity) > 0)
			{
				$final = $resultJobCity;

			}elseif(count($resultJob)>0 && count($resultJobCity)>0)
			{
				$final = array_unique(array_merge($resultJob,$resultJobCity), SORT_REGULAR);
			}else{
				$final = array();
			}
			
			
					
			  /* echo '<pre>';
			print_r($resultJob);
			print_r($resultJobCity);
			print_r($final);
			//print_r($resultFinal);
			die;    */
			
			/* if(is_array($result) && count($result)>0)
			{
				foreach($result as $k=>$user) 
				{
					$result[$k]['timestamp'] = isset($user['reg_date']['$timestamp']['t'])?date('d-m-Y H:i:s', $user['reg_date']['$timestamp']['t']): '';
					
				}

			} */

						
			return array('data'=>$final,'total'=>$countJobs);

		} catch(MongoDB\Driver\Exception\RuntimeException $ex) {
			show_error('Error while fetching users: ' . $ex->getMessage(), 500);
		}
	}
	
	function get_job_list_sort($params) {
		try {			

			$sort_type = ($params['sort_type'] == 'asc') ? 'asc':  'desc';

			if($params['sort_key'] == 'title')
			{

				$this->mongo_db->sort(['job_position_title' => $sort_type, '_id' => FALSE]);
				$this->mongo_db->offset(0);
				$this->mongo_db->limit($this->limit);
				$resultJob = $this->mongo_db->get($this->collectionJobs);

				// Clears query.
				$this->mongo_db->reset_query();

			}elseif($params['sort_key'] == 'location')
			{

				$this->mongo_db->sort(['job_state' => $sort_type, '_id' => FALSE]);
				$this->mongo_db->offset(0);
				$this->mongo_db->limit($this->limit);
				$resultJob = $this->mongo_db->get($this->collectionJobs);

				// Clears query.
				$this->mongo_db->reset_query();

			}elseif($params['sort_key'] == 'company')
			{

				$this->mongo_db->sort(['company_name' => $sort_type, '_id' => FALSE]);
				$this->mongo_db->offset(0);
				$this->mongo_db->limit($this->limit);
				$resultJob = $this->mongo_db->get($this->collectionJobs);

				// Clears query.
				$this->mongo_db->reset_query();

			}elseif($params['sort_key'] == 'posted')
			{

				$this->mongo_db->sort(['job_posting_date' => $sort_type, '_id' => FALSE]);
				$this->mongo_db->offset(0);
				$this->mongo_db->limit($this->limit);
				$resultJob = $this->mongo_db->get($this->collectionJobs);

				// Clears query.
				$this->mongo_db->reset_query();

			}		
			
			return $resultJob;

		} catch(MongoDB\Driver\Exception\RuntimeException $ex) {
			show_error('Error while fetching users: ' . $ex->getMessage(), 500);
		}
	}

	function get_category_details($params) {
		try {	

			$id = $params['category_id'];

			if(!empty($id))
			{
				$this->mongo_db->reset_query();
				$this->mongo_db->and_where(['_id' => $this->mongo_db->create_document_id($id)]);
				$this->mongo_db->offset(0);
				$this->mongo_db->limit(1);		

				$result = $this->mongo_db->get($this->collectionCategory);

				$this->mongo_db->reset_query();

			}
			

						
			return $result[0];

		} catch(MongoDB\Driver\Exception\RuntimeException $ex) {
			show_error('Error while fetching users: ' . $ex->getMessage(), 500);
		}
	}

	function get_company_details($params) {
		try {	

			$id = $params['company_id'];

			if(!empty($id))
			{
				$this->mongo_db->reset_query();
				$this->mongo_db->and_where(['_id' => $this->mongo_db->create_document_id($id)]);
				$this->mongo_db->offset(0);
				$this->mongo_db->limit(1);		

				$result = $this->mongo_db->get($this->collectionCompany);

				$this->mongo_db->reset_query();

			}
			

						
			return $result[0];

		} catch(MongoDB\Driver\Exception\RuntimeException $ex) {
			show_error('Error while fetching users: ' . $ex->getMessage(), 500);
		}
	}
		
	
}