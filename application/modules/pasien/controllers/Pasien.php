
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Pasien extends CI_Controller {
        public function __construct() {
                parent::__construct();
               $this->load->model('pasien_model');
               
	}
		function index(){
			$data_header=array();$data=array();
			$data_header=array("edit_txt"=>false,"tree"=>false,"valid"=>true,"jq"=>true,"dt"=>false,"ac"=>false,"dd"=>false,"dp"=>true);
			$data_header["edit_txt"]=true; 
			$data_header["tampil_menu"]=$this->session->userdata('menu'); 
			$data_header["profil"] =$this->session->userdata('profil'); 
			$data["jsku"]='pasien_js.js';
			$data["pas_sex47"]=array('L'=>'Laki-Laki','P'=>'Perempuan');
			$data["pas_agama_id47"]=$this->pasien_model->pas_agama_id47();
			$data["pas_prop_id47"]=$this->pasien_model->pas_prop_id47();
			$data["pas_kab_id47"]=$this->pasien_model->pas_kab_id47();
			$data["pas_desa_id47"]=$this->pasien_model->pas_desa_id47();
			$data["pas_kec_id47"]=$this->pasien_model->pas_kec_id47();
			$data["pas_pendidikan_id47"]=$this->pasien_model->pas_pendidikan_id47();
			$data["pas_pekerjaan_id47"]=$this->pasien_model->pas_pekerjaan_id47();
			$data["pas_meninggal47"]=array(1=>'Mati',0=>'Hidup');
			$data["pas_identitas_id47"]=$this->pasien_model->pas_identitas_id47();
			$data["pas_aktif47"]=array(1=>'Aktif',0=>'Tidak Aktif');
			$data["pas_tgl_lahir47"]=gmdate("d-m-Y",mktime(date("H")+7));	
				
			$this->load->view('design/header',$data_header);
			$this->load->view('v_pasien',$data);
			$this->load->view('design/footer');
			
		}  
		function view_grid47(){
			return $this->pasien_model->mgrid47();
		}

		function crud47() {
			return $this->pasien_model->proses_simpan47();
		}
	}