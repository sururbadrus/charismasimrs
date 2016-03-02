
	<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	   class Tab_kec extends CI_Controller {
        public function __construct() {
                parent::__construct();
				
		}
		
    function index(){
		$data_header=array();$data=array();
		$data_header=array("edit_txt"=>false,"tree"=>false,"valid"=>true,"jq"=>true,"dt"=>false,"ac"=>false,"dd"=>false,"dp"=>true);
		$data_header["tampil_menu"]=$this->session->userdata('menu'); 
		$data_header["profil"] =$this->session->userdata('profil'); 
		$data["jsku00"]='tab_kec_js00.js';
		
		$this->load->view('design/header',$data_header);
        $this->load->view('v_tab_kec',$data);
        $this->load->view('design/footer');
    }  
		}