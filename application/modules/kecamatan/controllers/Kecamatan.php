
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Kecamatan extends CI_Controller {
        public function __construct() {
                parent::__construct();
               $this->load->model('kecamatan_model');
               
	}
		function index(){
			$data_header=array();$data=array();
			$data_header=array("edit_txt"=>false,"tree"=>false,"valid"=>true,"jq"=>true,"dt"=>false,"ac"=>false,"dd"=>true,"dp"=>false);
			$data_header["tampil_menu"]=$this->m_global->display_tree_menu($this->session->userdata('menu')); 
			$data_header["profil"] =$this->session->userdata('profil'); 
			$data["jsku"]='kecamatan_js.js';
			$data["kec_aktif33"]=array(1=>'Aktif',0=>'Tidak Aktif');
			$this->load->view('design/header',$data_header);
			$this->load->view('v_kecamatan',$data);
			$this->load->view('design/footer');
			
		}  
		function view_grid33(){
			return $this->kecamatan_model->mgrid33();
		}

		function crud33() {
			return $this->kecamatan_model->proses_simpan33();
		}
	}