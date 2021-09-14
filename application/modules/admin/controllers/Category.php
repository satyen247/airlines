<?php

(defined('BASEPATH')) OR exit('No direct script access allowed');
error_reporting(E_ALL^E_NOTICE);

class Category extends MY_Controller {

    private $limit = 50;
	private $offset = 0;

    function __construct() {
        parent::__construct();
        $this->load->model('AdminModel','adminModel');
    }

    function index() {
        $this->view_all();
    }

    function view_all() {
        $data = [];

        $category_count = $this->adminModel->get_category_count();

        $url = parse_url($_SERVER['REQUEST_URI']);
		parse_str($url['query'], $url_params);

        $limit = $this->limit;
		

		$page = $url_params['page'];

        if(!isset($page) || $page < 1)
		{
			$offset = $this->offset;
			$page = 1;
		}else{
			$offset = ($limit * $page) - $limit;
		}
		
		//echo 'sss--'.$page;

		$total_page = round($category_count/$limit);

		$data['total_page'] = $total_page;
		$data['current_page'] = $page;
		if($category_count < $limit)
        {
            $data['showing_record'] = '1-'.$category_count;
            $data['enable_pagination'] = 'N';

        }else{
            $data['showing_record'] = ($offset == 0)? '1-'.$limit : ($offset.'-'.($offset+$limit));
            $data['enable_pagination'] = 'Y';
        }
        
        $data['total_record'] = $category_count;

        $category_data = $this->adminModel->get_all_categories(['offset'=>$offset,'limit'=>$limit]);
        $data['categories'] = $category_data;
	    $data['view_file'] = 'view_all_categories';
	    admin_view($data);
    }

    

    

}
