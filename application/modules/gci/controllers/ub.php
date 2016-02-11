<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ub extends CI_Controller {
	
	function __construct() {
        parent::__construct();
	}
	
	function index() {
		
		$data_header["edit_txt"]=true; 
		$data_header["tree"]=false; 
		$data_header["valid"]=true; 
		$data_header["jq"]=true; 
		$data_header["dt"]=true; 
		$data_header["ac"]=false; 
		$data_header["dd"]=false; 
		$data_header["dp"]=false; 
		$tgl=gmdate('d-m-Y',mktime(date('H')+7));
		
		$this->load->view('design/header',$data_header);
        $this->load->view('master/gci');
        $this->load->view('design/footer');
		
		
	}
	function punya(){
		echo 'punya';
		die;
		}
	
	
	
	
	
	
}