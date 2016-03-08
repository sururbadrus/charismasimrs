<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Testing_pdf extends CI_Controller {
 
	public function pdf()
	{
		//$this->load->library('pdfgenerator');
 		//$sql="select * from sps_ms_diag limit 50";
		
		//$data['users']=$this->db->query($sql)->result();
 		$data_header=array("highchart"=>true,"edit_txt"=>false,"tree"=>false,"valid"=>true,"jq"=>true,"dt"=>false,"ac"=>false,"dd"=>true,"dp"=>false);
	    $data_header["tampil_menu"]=$this->m_global->display_tree_menu($this->session->userdata('menu')); 
		$this->load->view('design/header',$data_header);
			
	    $this->load->view('test_hchar');
	   
			$this->load->view('design/footer');
	    //$this->pdfgenerator->generate($html,'contoh');
	}
}