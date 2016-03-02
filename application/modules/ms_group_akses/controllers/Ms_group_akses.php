<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
		
        class Ms_group_akses extends CI_Controller {

        public function __construct() {
                parent::__construct();
               
                
                     $this->load->helper("array" ); 
                   
            
        }



     
     
    function index(){
		
		
		$data_header=array();$data=array();
			$data_header=array("edit_txt"=>false,"tree"=>true,"valid"=>true,"jq"=>false,"dt"=>false,"ac"=>false,"dd"=>false,"dp"=>false);
			$data_header["tampil_menu"]=$this->m_global->display_tree_menu($this->session->userdata('menu')); 
			$data_header["profil"] =$this->session->userdata('profil'); 
		$data["fk_ms_group_id03"]=$this->m_global->getcombo("SELECT group_id id,group_nama nama FROM m_group WHERE group_aktif = 1","");

		$this->load->view('design/header',$data_header);
		$this->load->view('v_ms_group_akses.php',$data);
		$this->load->view('design/footer');
        
    }




    function getTree(){
    	$data_post=$this->security->xss_clean($_REQUEST);
    	$data['dataTree'] = $this->m_global->mapTree(array('sql'=>"SELECT m.*,IF(ga.grp_akses_id IS NOT NULL,true,false) AS 'select' ,CONCAT(m.menu_kode,' ',menu_nama) AS title
			FROM m_menu m
			LEFT JOIN m_group_akses ga ON ga.grp_akses_menu_id = m.menu_id 
			AND grp_akses_group_id ='".element('fk_ms_group_id', $data_post)."' WHERE m.menu_aktif=1 order by m.menu_kode"));
		$dtree = $this->m_global->buildTree($data['dataTree'],0,true);
		echo json_encode($dtree);

    }


    function crud(){
    	$data_post=$this->security->xss_clean($_POST);
	    switch (element("action", $data_post)) {
	    	case 'Simpan':
	    		$arr_insr_['grp_akses_group_id']=element('fk_ms_group_id', $data_post);
				$arr_insr_['grp_akses_menu_id']=element('fk_ms_menu_id', $data_post);
				$arr_insr_['grp_akses_aktif']=1;
				$sql_q[0]= $this->db->insert_string('m_group_akses', $arr_insr_); 
				 
			 
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
						// echo json_encode(array('ket'=>"Penambahan Data Berhasil")) ;
				}
	    	break;
	    	case 'Hapus':
	    		$this->db->where('grp_akses_group_id', element('fk_ms_group_id', $data_post));
	    		$this->db->where('grp_akses_menu_id', element('fk_ms_menu_id', $data_post));
				$this->db->delete('m_group_akses');
				 
				// echo json_encode(array('ket'=>"Hapus Data Berhasil")) ;
	    	break;
	    }
    }

    function getMenuAkses(){
    	$data_post=$this->security->xss_clean($_POST);
    	$data=array();
    	$sql = $this->db->query('SELECT grp_akses_menu_id FROM m_group_akses WHERE grp_akses_group_id='.element('fk_ms_group_id', $data_post));
    	$rs = $sql->result();
    	foreach ($rs as $key => $value) {
    		$data[]=$value->grp_akses_menu_id;
    	}
    	echo json_encode(array('menu'=>$data)) ;

    }


}
