<?php

(defined('BASEPATH')) OR exit('No direct script access allowed');

class Opms extends MY_Controller {

    function __construct() {
        parent::__construct();
    }

    function index() { 
               
        $this->login();
    }

    function dashboard() {        
        $data = [];
	    $data['view_file'] = 'dashboard';
	    opms_view($data);
    }

    function login() {        
        $data = [];
	    $data['view_file'] = 'login';
	    opms_nakedview($data);
    }

}
