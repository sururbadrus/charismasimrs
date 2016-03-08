
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Bms_diag extends CI_Controller {
        public function __construct() {
                parent::__construct();
               $this->load->model('bms_diag_model');
               
	}
		function index(){
			$data_header=array();$data=array();
			$data_header=array("edit_txt"=>false,"tree"=>false,"valid"=>true,"jq"=>true,"dt"=>false,"ac"=>false,"dd"=>true,"dp"=>false);
			$data_header["tampil_menu"]=$this->m_global->display_tree_menu($this->session->userdata('menu')); 
			$data_header["profil"] =$this->session->userdata('profil'); 
			$data["jsku"]='bms_diag_js.js';
			$data["diag_aktif39"]=array(1=>'Aktif',0=>'Tidak Aktif');
			$this->load->view('design/header',$data_header);
			$this->load->view('v_bms_diag',$data);
			$this->load->view('design/footer');
			
		}  
		function view_grid39(){
			return $this->bms_diag_model->mgrid39();
		}

		function crud39() {
			return $this->bms_diag_model->proses_simpan39();
		}
	}