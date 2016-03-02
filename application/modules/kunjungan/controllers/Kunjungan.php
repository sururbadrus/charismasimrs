
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Kunjungan extends CI_Controller {
        public function __construct() {
                parent::__construct();
               $this->load->model('kunjungan_model');
               
	}
		function index(){
			$data_header=array();$data=array();
			$data_header=array("edit_txt"=>false,"tree"=>false,"valid"=>true,"jq"=>true,"dt"=>false,"ac"=>false,"dd"=>true,"dp"=>true);
			$data_header["tampil_menu"]=$this->m_global->display_tree_menu($this->session->userdata('menu')); 
			$data_header["profil"] =$this->session->userdata('profil'); 
			$data["jsku"]='kunjungan_js.js';
			$data["pas_sex17"]=array(1=>'Laki-Laki',0=>'Perempuan');
			$data["pas_pekerjaan_id17"]=$this->kunjungan_model->pas_pekerjaan_id17();
			$data["pas_asal17"]=$this->kunjungan_model->pas_asal17();
			$data["pas_kec_id17"]=$this->kunjungan_model->pas_kec_id17();
			$data["pas_desa_id17"]=$this->kunjungan_model->pas_desa_id17();
			$data["kun_tujuan_id17"]=$this->kunjungan_model->kun_tujuan_id17();
			$data["kun_kp_id17"]=$this->kunjungan_model->kun_kp_id17();
			$data["kun_karcis17"]=$this->kunjungan_model->kun_karcis17();
			$data["kun_pel_unit17"]=$this->kunjungan_model->kun_pel_unit17();
			$data["kun_unit_id17"]=$this->kunjungan_model->kun_unit_id17();
			
			$data["kun_pustu_id17"]=$this->kunjungan_model->kun_pustu_id17();
			$data["pas_tgl_lahir17"]=gmdate("d-m-Y",mktime(date("H")+7));
			$data["def_kec_id"]=$this->session->userdata('profil_kec_id');
				
			$data["kun_tgl17"]=gmdate("d-m-Y",mktime(date("H")+7));	
			$data["kun_is_baru17"]=array(0=>'Lama',1=>'Baru');
				
			$this->load->view('design/header',$data_header);
			$this->load->view('v_kunjungan',$data);
			$this->load->view('design/footer');
			
		}  
		function view_grid17(){
			return $this->kunjungan_model->mgrid17();
		}

		function crud17() {
			return $this->kunjungan_model->proses_simpan17();
		}
		function change_kec(){
			echo $this->kunjungan_model->ajax_kec($this->input->post('kec_id'));
			}
			
		function change_pel_unit(){
			echo $this->kunjungan_model->pel_unit($this->input->post('pel_unit'));
			}
		function umur(){
			$tgl_lahir=$this->input->post('tgl_lahir');
			$tgl_lahir=$this->m_global->tglSQL($tgl_lahir);
			$awal=gmdate("Y-m-d",mktime(date("H")+7));
			$umur_date=trim($this->m_global->hitung_umur($tgl_lahir,$awal));
			$umur_par=explode('-',$umur_date);
			$kl=$this->kunjungan_model->getKelompokUmur($umur_par[0],$umur_par[2]);
			echo $umur_date.'-'.$kl;
			}
	}