
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Pasien extends CI_Controller {
        public function __construct() {
                parent::__construct();
               $this->load->model('pasien_model');
               
	}
		function index(){
			$data_header=array();$data_footer=array();$data=array();
			$data_header=array("edit_txt"=>false,"tree"=>false,"valid"=>true,"jq"=>true,"dt"=>false,"ac"=>false,"dd"=>false,"dp"=>true);
			$data_header["edit_txt"]=true; 
			$data_header["tampil_menu"]=$this->session->userdata('menu'); 
			$data_header["profil"] =$this->session->userdata('profil'); 
			$data_footer["jsku"]='pasien_js.js';
			$data["pas_sex18"]=array(1=>'Aktif',0=>'Tidak Aktif');
			$data["pas_agama_id18"]=$this->pasien_model->pas_agama_id18();
			$data["pas_prop_id18"]=$this->pasien_model->pas_prop_id18();
			$data["pas_kab_id18"]=$this->pasien_model->pas_kab_id18();
			$data["pas_desa_id18"]=$this->pasien_model->pas_desa_id18();
			$data["pas_kec_id18"]=$this->pasien_model->pas_kec_id18();
			$data["pas_pendidikan_id18"]=$this->pasien_model->pas_pendidikan_id18();
			$data["pas_pekerjaan_id18"]=$this->pasien_model->pas_pekerjaan_id18();
			$data["pas_meninggal18"]=array(1=>'Aktif',0=>'Tidak Aktif');
			$data["pas_identitas_id18"]=array(1=>'Aktif',0=>'Tidak Aktif');
			$data["pas_tgl_lahir18"]=gmdate("d-m-Y",mktime(date("H")+7));	
				
			$this->load->view('design/header',$data_header);
			$this->load->view('v_pasien',$data);
			$this->load->view('design/footer',$data_footer);
			
		} 
		function pas_aktif(){
			$data=array();
			$ftr  = $_POST['pas_aktif'];
			$sql="select agama_id id,agama_nama nama from b_ms_agama where pas_aktif like '%".trim($ftr)."%'";
			$hasil = $this->db->query($sql)->result_array();
			 echo json_encode($hasil);
		}
			  
		function view_grid18(){
			return $this->pasien_model->mgrid18();
		}

		function crud18() {
			return $this->pasien_model->proses_simpan18();
		}
	}