
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Ms_group extends CI_Controller {
        public function __construct() {
                parent::__construct();
               $this->load->model('ms_group_model');
               
	}
		function index(){
			$data_header=array();$data=array();
			$data_header=array("edit_txt"=>false,"tree"=>false,"valid"=>true,"jq"=>true,"dt"=>false,"ac"=>false,"dd"=>true,"dp"=>false);
			$data_header["tampil_menu"]=$this->m_global->display_tree_menu($this->session->userdata('menu')); 
			$data_header["profil"] =$this->session->userdata('profil'); 
			$data["jsku"]='ms_group_js.js';
			$data["group_aktif17"]=array(1=>'Aktif',0=>'Tidak Aktif');
			$this->load->view('design/header',$data_header);
			$this->load->view('v_ms_group',$data);
			$this->load->view('design/footer');
			
		}  
		function view_grid17(){
			return $this->ms_group_model->mgrid17();
		}

		function crud17() {
			return $this->ms_group_model->proses_simpan17();
		}
	}