<?php

(defined('BASEPATH')) OR exit('No direct script access allowed');

/**
 * Description of site
 *
 * @author https://www.roytuts.com
 */
class Api extends MY_Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
        $this->load->view('api');
    }

}

/* End of file Site.php */
/* Location: ./application/modules/site/controllers/site.php */
