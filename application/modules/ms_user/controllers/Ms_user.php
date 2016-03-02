
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Ms_user extends CI_Controller {
        public function __construct() {
                parent::__construct();
               $this->load->model('ms_user_model');
               
	}
		function index(){
			$data_header=array();$data=array();
			$data_header=array("edit_txt"=>false,"tree"=>false,"valid"=>true,"jq"=>true,"dt"=>false,"ac"=>false,"dd"=>true,"dp"=>false);
			$data_header["edit_txt"]=true; 
			$data_header["tampil_menu"]=$this->m_global->display_tree_menu($this->session->userdata('menu')); 
			$data_header["profil"] =$this->session->userdata('profil'); 
			$data["jsku"]='ms_user_js.js';
			$data["user_group_id07"]=$this->ms_user_model->user_group_id07();
			$data["user_aktif07"]=array(1=>'Aktif',0=>'Tidak Aktif');
			$this->load->view('design/header',$data_header);
			$this->load->view('v_ms_user',$data);
			$this->load->view('design/footer');
			
		}  
		function view_grid07(){
			return $this->ms_user_model->mgrid07();
		}

		function crud07() {
			return $this->ms_user_model->proses_simpan07();
		}
	}