<?php

(defined('BASEPATH')) OR exit('No direct script access allowed');
error_reporting(E_ALL^E_NOTICE);

class Jobs extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('JobModel','jobmodel');
    }

    function index() {
        $data = [];
        $url = parse_url($_SERVER['REQUEST_URI']);
		parse_str($url['query'], $url_params);

		$job_details_id = $url_params['id'];


		$count_jobs = $this->jobmodel->get_job_count();

		$limit = 50;
		$offset = 0;

		if($this->session->has_userdata('current_page'))
		{
			$page = $this->session->userdata('current_page');
		}
		

		if(!isset($page) || $page < 1)
		{
			$offset = 0;
			$page = 1;
		}else{
			$offset = ($limit * $page) - $limit;
		}
		
		//echo 'sss--'.$page;

		$total_page = round($count_jobs/$limit);

		$data['total_page'] = $total_page;
		$data['current_page'] = $page;
		$data['showing_record'] = ($offset == 0)? '1-'.$limit : ($offset.'-'.($offset+$limit));

		//$all_company = $this->jobmodel->get_all_company();
		$all_jobs = $this->jobmodel->get_job_list(['offset'=>$offset,'limit'=>$limit]);

		/* echo '<pre>';
		print_r(['offset'=>$offset,'limit'=>$limit]);
		print_r($all_jobs);
		die; */

		if(is_array($all_jobs) && count($all_jobs)>0)
		{
			foreach($all_jobs as $k=>$jobs) 
			{
				$all_jobs[$k]['post_time_ago'] = $this->timeago($jobs['job_start_date']);
				$all_jobs[$k]['seo_title'] = preg_replace("/[^a-zA-Z0-9]+/", "-", $jobs['job_position_title']);

				$company_data = $this->jobmodel->get_company_details(['company_id'=>$jobs['company_id']]);

				$all_jobs[$k]['company_name'] = $company_data['company_name'];
				$all_jobs[$k]['company_logo'] = $company_data['company_logo'];
				$all_jobs[$k]['company_desc'] = $company_data['company_desc'];
				$all_jobs[$k]['company_url'] = $company_data['company_url'];

				$category_data = $this->jobmodel->get_category_details(['category_id'=>$jobs['cat_id']]);
				$all_jobs[$k]['category_name'] = $category_data['cat_name'];

				

				if($job_details_id == $jobs['_id'])
				{
					$data['details_job'] = $all_jobs[$k];
				}

			}
		}

		/* echo '<pre>';
		print_r($all_jobs);
		die; */
		$data['all_jobs'] = $all_jobs;
		$data['count_jobs'] = $count_jobs;
		if($job_details_id == '')
		{
			$data['details_job'] = $all_jobs[0];
		}
		
		$data['search_keywords'] = '';
		$data['search_location'] = '';
		$data['sort_key'] = '';
		$data['sort_type'] = '';
		$data['view_file'] = 'all_jobs';

		view($data);
    }

    function search() {
        $data = [];
		$url = parse_url($_SERVER['REQUEST_URI']);
		parse_str($url['query'], $url_params);
		
		$search_keywords = urldecode($url_params['keywords']);
		$search_location = urldecode($url_params['location']);

		if(empty($search_keywords) && empty($search_location))
		{
			redirect(base_url());
		}

		$limit = 50;
		$offset = 0;

		if($this->session->has_userdata('current_page'))
		{
			$page = $this->session->userdata('current_page');
		}
		

		if(!isset($page) || $page < 1)
		{
			$offset = 0;
			$page = 1;
		}else{
			$offset = ($limit * $page) - $limit;
		}
		
		//echo 'sss--'.$page;

		
		$data['current_page'] = $page;
		$data['showing_record'] = ($offset == 0)? '1-'.$limit : ($offset.'-'.($offset+$limit));

		//$all_company = $this->jobmodel->get_all_company();
		$all_jobs_array = $this->jobmodel->get_job_list_like_search(['search_keywords'=>$search_keywords,'search_location'=>$search_location,'offset'=>$offset,'limit'=>$limit]);

		$total_page = round( $all_jobs_array['total']/$limit);

		$data['total_page'] = $total_page;

		$data['count_jobs'] = $all_jobs_array['total'];
		$all_jobs = $all_jobs_array['data'];

		if(is_array($all_jobs) && count($all_jobs)>0)
		{
			foreach($all_jobs as $k=>$jobs) 
			{
				$all_jobs[$k]['post_time_ago'] = $this->timeago($jobs['job_start_date']);
				$all_jobs[$k]['seo_title'] = preg_replace("/[^a-zA-Z0-9]+/", "-", $jobs['job_position_title']);

				$company_data = $this->jobmodel->get_company_details(['company_id'=>$jobs['company_id']]);

				$all_jobs[$k]['company_name'] = $company_data['company_name'];
				$all_jobs[$k]['company_logo'] = $company_data['company_logo'];
				$all_jobs[$k]['company_desc'] = $company_data['company_desc'];
				$all_jobs[$k]['company_url'] = $company_data['company_url'];

				$category_data = $this->jobmodel->get_category_details(['category_id'=>$jobs['cat_id']]);
				$all_jobs[$k]['category_name'] = $category_data['cat_name'];

				if($job_details_id == $jobs['_id'])
				{
					$data['details_job'] = $all_jobs[$k];
				}
				

			}
		}

		/* echo '<pre>';
		print_r($all_jobs);
		die; */
		$data['all_jobs'] = $all_jobs;
		if($job_details_id == '')
		{
			$data['details_job'] = $all_jobs[0];
		}

		$data['search_keywords'] = $search_keywords;
		$data['search_location'] = $search_location;
		$data['sort_key'] = '';
		$data['sort_type'] = '';
		$data['view_file'] = 'search_jobs_all';

		view($data);
	}

    function jobsort() {
        $data = [];
		$url = parse_url($_SERVER['REQUEST_URI']);
		parse_str($url['query'], $url_params);
		
		$sort_key = urldecode($url_params['key']);
		$stype = urldecode($url_params['stype']);

		//$all_company = $this->jobmodel->get_all_company();
		$all_jobs = $this->jobmodel->get_job_list_sort(['sort_key'=>$sort_key,'sort_type'=>$stype]);

		if(is_array($all_jobs) && count($all_jobs)>0)
		{
			foreach($all_jobs as $k=>$jobs) 
			{
				$all_jobs[$k]['post_time_ago'] = $this->timeago($jobs['job_start_date']);
				$all_jobs[$k]['seo_title'] = preg_replace("/[^a-zA-Z0-9]+/", "-", $jobs['job_position_title']);

				$company_data = $this->jobmodel->get_company_details(['company_id'=>$jobs['company_id']]);

				$all_jobs[$k]['company_name'] = $company_data['company_name'];
				$all_jobs[$k]['company_logo'] = $company_data['company_logo'];
				$all_jobs[$k]['company_desc'] = $company_data['company_desc'];
				$all_jobs[$k]['company_url'] = $company_data['company_url'];

				$category_data = $this->jobmodel->get_category_details(['category_id'=>$jobs['cat_id']]);
				$all_jobs[$k]['category_name'] = $category_data['cat_name'];

				if($job_details_id == $jobs['_id'])
				{
					$data['details_job'] = $all_jobs[$k];
				}

			}
		}

		/* echo '<pre>';
		print_r($all_jobs);
		die; */
		$data['all_jobs'] = $all_jobs;
		if($job_details_id == '')
		{
			$data['details_job'] = $all_jobs[0];
		}

		$data['search_keywords'] = $search_keywords;
		$data['search_location'] = $search_location;
		$data['sort_key'] = $sort_key;
		$data['sort_type'] = $stype;
		$data['count_jobs'] = $this->jobmodel->get_job_count();
		$data['showing_record'] = '1-50';
		
		$data['view_file'] = 'all_jobs';

		view($data);
	}

    function viewjob($jobName='',$jobId='') {
        
        $data = [];
        $job_details_id = $jobId;

		$url = parse_url($_SERVER['REQUEST_URI']);
		parse_str($url['query'], $url_params);

		if(is_array($url_params) && count($url_params)>0)
		{
			$search_keywords = urldecode($url_params['keywords']);
			$search_location = urldecode($url_params['location']);

			$limit = 50;
			$offset = 0;

			if($this->session->has_userdata('current_page'))
			{
				$page = $this->session->userdata('current_page');
			}
			

			if(!isset($page) || $page < 1)
			{
				$offset = 0;
				$page = 1;
			}else{
				$offset = ($limit * $page) - $limit;
			}
			
			//echo 'sss--'.$page;

			
			$data['current_page'] = $page;
			$data['showing_record'] = ($offset == 0)? '1-'.$limit : ($offset.'-'.($offset+$limit));

			//$all_company = $this->jobmodel->get_all_company();
			$all_jobs_array = $this->jobmodel->get_job_list_like_search(['search_keywords'=>$search_keywords,'search_location'=>$search_location,'offset'=>$offset,'limit'=>$limit]);

			$total_page = round( $all_jobs_array['total']/$limit);

			$data['total_page'] = $total_page;

			$data['count_jobs'] = $all_jobs_array['total'];
			$all_jobs = $all_jobs_array['data'];

			$data['search_keywords'] = $search_keywords;
			$data['search_location'] = $search_location;

		}else{		

			$count_jobs = $this->jobmodel->get_job_count();

			$limit = 50;
			$offset = 0;

			if($this->session->has_userdata('current_page'))
			{
				$page = $this->session->userdata('current_page');
			}

			if(!isset($page) || $page < 1)
			{
				$offset = 0;
				$page = 1;
			}else{
				$offset = ($limit * $page) - $limit;
			}
			
			$total_page = round($count_jobs/$limit);

			$data['total_page'] = $total_page;
			$data['current_page'] = $page;
			$data['showing_record'] = ($offset == 0)? '1-'.$limit : ($offset.'-'.($offset+$limit));

			//$all_company = $this->jobmodel->get_all_company();
			$all_jobs = $this->jobmodel->get_job_list(['offset'=>$offset,'limit'=>$limit]);


			$data['count_jobs'] = $count_jobs;
			$data['search_keywords'] = '';
			$data['search_location'] = '';


		}
		


		if(is_array($all_jobs) && count($all_jobs)>0)
		{
			foreach($all_jobs as $k=>$jobs) 
			{
				$all_jobs[$k]['post_time_ago'] = $this->timeago($jobs['job_start_date']);
				$all_jobs[$k]['seo_title'] = preg_replace("/[^a-zA-Z0-9]+/", "-", $jobs['job_position_title']);

				$company_data = $this->jobmodel->get_company_details(['company_id'=>$jobs['company_id']]);

				$all_jobs[$k]['company_name'] = $company_data['company_name'];
				$all_jobs[$k]['company_logo'] = $company_data['company_logo'];
				$all_jobs[$k]['company_desc'] = $company_data['company_desc'];
				$all_jobs[$k]['company_url'] = $company_data['company_url'];

				

				/* if($job_details_id == $jobs['_id'])
				{
					$data['details_job'] = $all_jobs[$k];
				} */

			}

			
		}

		 /* echo '<pre>';
		print_r($data['details_job']);
		die; */  
		$data['details_job']  = current($this->jobmodel->get_job_details(['id'=>$job_details_id]));

		$category_data = $this->jobmodel->get_category_details(['category_id'=>$data['details_job']['cat_id']]);
		$data['details_job']['category_name'] = $category_data['cat_name'];


		$data['all_jobs'] = $all_jobs;
				
		$data['sort_key'] = '';
		$data['sort_type'] = '';
		$data['view_file'] = 'view_jobs_all';

		view($data);
    }

    function detailsjob($jobName='',$jobId='') {
        
        $data = [];
        $url = parse_url($_SERVER['REQUEST_URI']);
		parse_str($url['query'], $url_params);
		

		$job_details_id = $jobId;
		

		
		//$all_company = $this->jobmodel->get_all_company();
		$all_jobs = $this->jobmodel->get_job_details(['id'=>$job_details_id]);

		/* echo '<pre>';
		print_r(['offset'=>$offset,'limit'=>$limit]);
		print_r($all_jobs);
		die; */

		if(is_array($all_jobs) && count($all_jobs)>0)
		{
			foreach($all_jobs as $k=>$jobs) 
			{
				$all_jobs[$k]['post_time_ago'] = $this->timeago($jobs['job_start_date']);
				$all_jobs[$k]['seo_title'] = preg_replace("/[^a-zA-Z0-9]+/", "-", $jobs['job_position_title']);

				$company_data = $this->jobmodel->get_company_details(['company_id'=>$jobs['company_id']]);

				$all_jobs[$k]['company_name'] = $company_data['company_name'];
				$all_jobs[$k]['company_logo'] = $company_data['company_logo'];
				$all_jobs[$k]['company_desc'] = $company_data['company_desc'];
				$all_jobs[$k]['company_url'] = $company_data['company_url'];

				$category_data = $this->jobmodel->get_category_details(['category_id'=>$jobs['cat_id']]);
				$all_jobs[$k]['category_name'] = $category_data['cat_name'];

				if($job_details_id == $jobs['_id'])
				{
					$data['details_job'] = $all_jobs[$k];
				}

			}
		}

		/* echo '<pre>';
		print_r($data['details_job']);
		die;  */
		$data['all_jobs'] = $all_jobs;
		$data['count_jobs'] = $count_jobs;
				
		$data['search_keywords'] = '';
		$data['search_location'] = '';
		$data['sort_key'] = '';
		$data['sort_type'] = '';
		$data['view_file'] = 'view_jobs_details';

		view($data);
    }

    function timeago($date) {
		$timestamp = strtotime($date);	
		
		$strTime = array("second", "minute", "hour", "day", "month", "year");
		$length = array("60","60","24","30","12","10");

		$currentTime = time();
		if($currentTime >= $timestamp) {
				$diff     = time()- $timestamp;
				for($i = 0; $diff >= $length[$i] && $i < count($length)-1; $i++) {
				$diff = $diff / $length[$i];
				}

				$diff = round($diff);
				return $diff . " " . $strTime[$i] . "(s) ago ";
		}
	}

	public function setcurrentpage()
	{
		
		if(isset($_POST['cpage']) && $_POST['cpage']>0)
		{
			$this->session->set_userdata('current_page', $_POST['cpage']);
		
		}

		echo json_encode(['success'=>true]);
		
	}

}
