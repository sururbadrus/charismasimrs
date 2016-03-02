<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Ms_menu_tree extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('m_global');
		$this->load->helper("url" ); 

	}

	function index(){
		$this->load->view('v_menu_tree');
	}

	function getTree(){
		    	$data_post=$this->security->xss_clean($_REQUEST);
		    	$data['dataTree'] = $this->m_global->mapTree(array('sql'=>"
		 				SELECT m.menu_id ,CONCAT(m.menu_kode,' ',m.menu_nama) AS title,m.menu_url url,m.menu_parent_id ,m.menu_nama nama,m.menu_kode kode, m2.menu_kode AS parent_kode,m.menu_aktif aktif
						FROM m_menu m
						LEFT JOIN m_menu m2 ON m2.menu_id =m.menu_parent_id 
						ORDER BY m.menu_kode ASC"));
				$dtree = $this->m_global->buildTree($data['dataTree']);
				echo json_encode($dtree);
	}
}