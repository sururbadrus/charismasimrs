<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
		
        class Ms_menu extends CI_Controller {

        public function __construct() {
                parent::__construct();
               
               $this->load->helper('array');
            
        }



     
     
    function index(){
		
		$data_header=array();$data=array();
		$data_header=array("edit_txt"=>false,"tree"=>true,"valid"=>true,"jq"=>false,"dt"=>false,"ac"=>false,"dd"=>false,"dp"=>false);
		$data_header["tampil_menu"]=$this->m_global->display_tree_menu($this->session->userdata('menu')); 
		$data_header["profil"] =$this->session->userdata('profil'); 
		$this->load->view('design/header',$data_header);
        $this->load->view('v_ms_menu');
        $this->load->view('design/footer');
		
    }  

	
		
		
		function crud() {
			
			
	    $data_post=$this->security->xss_clean($_POST);
	    switch (element("action", $data_post)) {
			
	        case 'Simpan':
			$arr_insr_['menu_kode']=element('kode', $data_post);
				$arr_insr_['menu_nama']=element('nama', $data_post);
				$arr_insr_['menu_url']=element('url', $data_post);
				$arr_insr_['menu_parent_id']=element('parent_id', $data_post);
				$arr_insr_['menu_aktif']=element('aktif', $data_post);
				
				 $sql_q[0]= $this->db->insert_string('m_menu', $arr_insr_); 
				 
			 
			 	$this->db->trans_begin();
				
				for($iub=0; $iub<count($sql_q); $iub++){
					
					$this->db->query($sql_q[$iub]);
					
				}
			
				if ($this->db->trans_status() === FALSE)
				{
						$this->db->trans_rollback();
						echo json_encode(array('ket'=>"Gagal Insert")) ;
				}
				else
				{
						$this->db->trans_commit();
						echo json_encode(array('ket'=>"Penambahan Data Berhasil")) ;
				}
			 
				
				break;
	        case 'Ubah':
				$arr_insr_['menu_kode']=element('kode', $data_post);
				$arr_insr_['menu_nama']=element('nama', $data_post);
				$arr_insr_['menu_url']=element('url', $data_post);
				$arr_insr_['menu_parent_id']=element('parent_id', $data_post);
				$arr_insr_['menu_aktif']=element('aktif', $data_post);
				
				$where[0] = 'menu_id ='. element('id', $data_post);
				 $sql_q[0]=  $this->db->update_string('m_menu', $arr_insr_,$where[0]); 
				 
				$this->db->trans_begin();
				
				for($iub=0; $iub<count($sql_q); $iub++){
					
					$this->db->query($sql_q[$iub]);
					
				}
			
				if ($this->db->trans_status() === FALSE)
				{
						$this->db->trans_rollback();
						echo json_encode(array('ket'=>"Gagal Update")) ;
				}
				else
				{
						$this->db->trans_commit();
						echo json_encode(array('ket'=>"Update Data Berhasil")) ;
				}
			 
	          
	            break;
	        case 'del':
			
				$this->db->where('menu_id', element('id', $data_post));
				$this->db->delete('m_menu');
				 
			echo json_encode(array('ket'=>"Hapus Data Berhasil")) ;
	           
	        break;
		}
	} 
		


		
		
		  
		}