                            
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Diagnosa extends CI_Controller {
        public function __construct() {
                parent::__construct();
               $this->load->model('diagnosa_model');
               
	}
		function index(){
			$data_header=array();$data_footer=array();$data=array();
			$data_header=array("edit_txt"=>false,"tree"=>false,"valid"=>true,"jq"=>true,"dt"=>false,"ac"=>false,"dd"=>false,"dp"=>false);
			$data_header["edit_txt"]=true; 
			$data_header["tampil_menu"]=$this->session->userdata('menu'); 
			$data_header["profil"] =$this->session->userdata('profil'); 
			$data_footer["jsku"]='diagnosa_js.js';
			$data["diag_aktif12"]=array(1=>'Aktif',0=>'Tidak Aktif');			
		
			$this->load->view('design/header',$data_header);
			$this->load->view('v_diagnosa',$data);
			$this->load->view('design/footer',$data_footer);
			
		}  
		
		function view_grid12(){
			return $this->diagnosa_model->mgrid12();
		}

		function crud12() {
			return $this->diagnosa_model->proses_simpan12();
		}
	}                        