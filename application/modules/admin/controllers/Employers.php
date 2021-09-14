<?php

(defined('BASEPATH')) OR exit('No direct script access allowed');
error_reporting(E_ALL^E_NOTICE);

class Employers extends MY_Controller {

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

        $employers_count = $this->adminModel->get_company_count();

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

		$total_page = round($employers_count/$limit);

		$data['total_page'] = $total_page;
		$data['current_page'] = $page;
		if($employers_count < $limit)
        {
            $data['showing_record'] = '1-'.$employers_count;
            $data['enable_pagination'] = 'N';

        }else{
            $data['showing_record'] = ($offset == 0)? '1-'.$limit : ($offset.'-'.($offset+$limit));
            $data['enable_pagination'] = 'Y';
        }
        
        $data['total_record'] = $employers_count;

        $employers_data = $this->adminModel->get_all_company(['offset'=>$offset,'limit'=>$limit]);
        $data['employers'] = $employers_data;
	    $data['view_file'] = 'view_all_employers';
	    admin_view($data);
    }

    function create_new_employer() {        
        $data = [];
        
        if (isset($_POST) && count($_POST)>0) {
            
            $this->form_validation->set_rules('company_name', 'Company Name', 'trim|required');

            if ($this->form_validation->run() !== FALSE) {

                $update_data = [];

                $update_data['company_name'] = $this->input->post('company_name');
                $update_data['company_url'] = $this->input->post('company_url');
                $update_data['company_desc'] = $this->input->post('company_desc');

                if(!empty($_FILES) && isset($_FILES["image"]) && trim($_FILES["image"]["name"])!='')
                {
                    $this->load->library('image_lib');
                    
                    //die;         
                    if ((($_FILES["image"]["type"] == "image/gif")  || ($_FILES["image"]["type"] == "image/jpeg")  || ($_FILES["image"]["type"]== "image/jpg")  || ($_FILES["image"]["type"] == "image/png")) )
                    {
                        // File upload configuration
                        
                        //echo 'ok1';
                        $uploadPath = './assets/uploads/employers/';
                        $fileName = time().'-'.$_FILES["image"]["name"];

                        $ext = strtolower(pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION));
                        $newfileName = time().'-hb.'.$ext;
                                        
                        if ( move_uploaded_file($_FILES['image']['tmp_name'],  $uploadPath."".$newfileName))
                        {
                            //echo 'ok2';
                        
                            $config['image_library'] = 'gd2';
                            $config['source_image'] = $uploadPath."".$newfileName;
                            $config['create_thumb'] = false;
                            $config['maintain_ratio'] = TRUE;
                            $config['width']     = 400;
                            $config['height']   = 400;
                            $this->image_lib->clear();
                            $this->image_lib->initialize($config);
                            $this->image_lib->resize();
                                                
                            $update_data["company_logo"] = 'assets/uploads/employers/'.$newfileName;
                            
                        }
                    }
                }
                
                $result = $this->adminModel->add_new_company($update_data);
                redirect('admin/employers/view_all');

            } else {
				$data['error'] = 'error occurred during saving data: all fields are mandatory';
            }
            
        }
       
	    $data['view_file'] = 'new_employer';
	    admin_view($data);
    }

    function edit($companyId='') {        
        $data = [];

        $employers_data = $this->adminModel->get_company_details(['id'=>$companyId]);
        $data['employers'] = current($employers_data);
        

       
	    $data['view_file'] = 'edit_employer';
	    admin_view($data);
    }

    function saveeditemployer(){
        
        if (isset($_POST['edit_id']) && $_POST['edit_id'] != '') {
            
            $this->form_validation->set_rules('company_name', 'Company Name', 'trim|required');
            $this->form_validation->set_rules('edit_id', 'Company ID', 'trim|required');

            if ($this->form_validation->run() !== FALSE) {

                $update_data = [];

                $update_data['company_name'] = $this->input->post('company_name');
                $update_data['company_url'] = $this->input->post('company_url');
                $update_data['company_desc'] = $this->input->post('company_desc');

                if(!empty($_FILES) && isset($_FILES["image"]) && trim($_FILES["image"]["name"])!='')
                {
                    $this->load->library('image_lib');
                    
                    //die;         
                    if ((($_FILES["image"]["type"] == "image/gif")  || ($_FILES["image"]["type"] == "image/jpeg")  || ($_FILES["image"]["type"]== "image/jpg")  || ($_FILES["image"]["type"] == "image/png")) )
                    {
                        // File upload configuration
                        
                        //echo 'ok1';
                        $uploadPath = './assets/uploads/employers/';
                        $fileName = time().'-'.$_FILES["image"]["name"];

                        $ext = strtolower(pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION));
                        $newfileName = time().'-hb.'.$ext;
                                        
                        if ( move_uploaded_file($_FILES['image']['tmp_name'],  $uploadPath."".$newfileName))
                        {
                            //echo 'ok2';
                        
                            $config['image_library'] = 'gd2';
                            $config['source_image'] = $uploadPath."".$newfileName;
                            $config['create_thumb'] = false;
                            $config['maintain_ratio'] = TRUE;
                            $config['width']     = 400;
                            $config['height']   = 400;
                            $this->image_lib->clear();
                            $this->image_lib->initialize($config);
                            $this->image_lib->resize();
                                                
                            $update_data["company_logo"] = 'assets/uploads/employers/'.$newfileName;
                            
                        }
                    }
                }
                
                $result = $this->adminModel->update_company($update_data, $this->input->post('edit_id'));
                
                redirect('admin/employers/view_all');

            } else {
				$data['error'] = 'error occurred during saving data: all fields are mandatory';
            }
            
        }
    }

    

}
