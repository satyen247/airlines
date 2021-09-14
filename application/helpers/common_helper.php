<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}


if (!function_exists('view')) {

    function view($data = '') {
      	$CI = & get_instance();
		$data["header"]=$CI->load->view("site/header",$data,TRUE);
		$data["footer"]=$CI->load->view("site/footer",$data,TRUE);
		if(isset($data["view_file"])){
			$data["content"]=$CI->load->view($data["view_file"],$data,TRUE);
		}
		$CI->load->view( "site/layout", $data);
    }

}

if (!function_exists('customview')) {

    function customview($data = '') {
      	$CI = & get_instance();
		if(isset($data["view_file"])){
			$data["content"]=$CI->load->view($data["view_file"],$data,TRUE);
		}
		$CI->load->view( "site/layout", $data);
    }

}

if (!function_exists('admin_view')) {

    function admin_view($data = '') {
      	$CI = & get_instance();
		$data["header"]=$CI->load->view("admin/admin_header",$data,TRUE);
		$data["footer"]=$CI->load->view("admin/admin_footer",$data,TRUE);
		if(isset($data["view_file"])){
			$data["content"]=$CI->load->view($data["view_file"],$data,TRUE);
		}
		$CI->load->view( "admin/admin_layout", $data);
    }

}

if (!function_exists('admin_customview')) {

    function admin_customview($data = '') {
      	$CI = & get_instance();
		if(isset($data["view_file"])){
			$data["content"]=$CI->load->view($data["view_file"],$data,TRUE);
		}
		$CI->load->view( "admin/admin_layout", $data);
    }

}

if (!function_exists('admin_nakedview')) {

    function admin_nakedview($data = '') {
      	$CI = & get_instance();
		if(isset($data["view_file"])){
			$data["content"]=$CI->load->view($data["view_file"],$data,TRUE);
		}
		$CI->load->view( "admin/admin_naked_layout", $data);
    }

}

if (!function_exists('opms_view')) {

    function opms_view($data = '') {
      	$CI = & get_instance();
		$data["header"]=$CI->load->view("employee/opms_header",$data,TRUE);
		$data["footer"]=$CI->load->view("employee/opms_footer",$data,TRUE);
		if(isset($data["view_file"])){
			$data["content"]=$CI->load->view($data["view_file"],$data,TRUE);
		}
		$CI->load->view( "employee/opms_layout", $data);
    }

}

if (!function_exists('opms_customview')) {

    function opms_customview($data = '') {
      	$CI = & get_instance();
		if(isset($data["view_file"])){
			$data["content"]=$CI->load->view($data["view_file"],$data,TRUE);
		}
		$CI->load->view( "employee/opms_layout", $data);
    }

}

if (!function_exists('opms_nakedview')) {

    function opms_nakedview($data = '') {
      	$CI = & get_instance();
		if(isset($data["view_file"])){
			$data["content"]=$CI->load->view($data["view_file"],$data,TRUE);
		}
		$CI->load->view( "employee/opms_naked_layout", $data);
    }

}