<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_global extends CI_Model {
	private $tree;
	private $ub='';
	function __construct() {
        parent::__construct();
    }
	function total_row($q) {
		$query = $this->db->query($q);
        return $query->num_rows(); 
    }
	
	
	function getcombo($sq='',$uk)
	 {
		 $data=array();
	
		 if($sq!=''){
		 $query = $this->db->query($sq);
		 
		 if ($query->num_rows()> 0){
			 if(isset($uk) && $uk=='a') 
			 {				
				 $data[''] = '- Semua -';
			 }elseif(isset($uk) && $uk=='p'){$data[''] = '- Pilih -';}
			 foreach ($query->result_array() as $row)
			 {
			 	$data[$row['id']] = $row['nama'];
			 }
		 
		 }else{
			{$data[''] = '- Pilih -';}
			 }
			 $query->free_result();
		 }else{
			{$data[''] = '- Semua -';}
			 }
		
		 return $data;
	 }
	
	function ajax_combo($sq,$uk)
	 {
		 $hasil='';
		 if($sq!=''){
		 $query = $this->db->query($sq);
		 
		 if ($query->num_rows()> 0){
			 if(isset($uk) && $uk=='a') 
			 {				
				$hasil="<option value=''>-Semua-</option>";
			 }elseif(isset($uk) && $uk=='p'){$hasil="<option value=''>-Pilih-</option>";}
			
			foreach($query->result_array() as $row){
			$hasil.="<option value='".$row['id']."'>".$row['nama']."</option>";
			
			}
		 
		 }else{
			{
				$hasil="<option value=''>-Semua-</option>";}
			 }
		 }else{
			{$hasil="<option value=''>-Semua-</option>";}
			 }
		$query->free_result();
		 return $hasil;
	 }
	
	 function tglSQL($tgl){
	   $t=explode(" ",$tgl);
	   $t=explode("-",$t[0]);
	   $t=$t[2].'-'.$t[1].'-'.$t[0];
	   return $t;
	}
	function tampil_tahun($q){
		$data = array();
		$awal=$q-5;
		$akhir=$q+5;
		for($awal=$awal; $awal<=$akhir; $awal++) { 
		
			$data[$awal] = $awal;
		
		
		} 
		return $data;
		}
		
		function mapTree($arr) {
			//param yang harus ada [title sebagai teks child]
			$q = $this->db->query($arr['sql']);
			$json=$q->result_array();
			return $json;
		}


		function buildTree(array $elements, $parentId = 0,$checkbox=false) {
			$branch = array();
			foreach ($elements as $element) {

				if($checkbox==true){
					if($element['select']==1){
					$element['select']=true;
					}else{
						$element['select']=false;
					}

				}
				
				if ($element['parent_id'] == $parentId) {
					$children = $this->buildTree($elements, $element['id'],$checkbox);
					if ($children) {
						$element['children'] = $children;
					}
					$branch[] = $element;
				}
			}
		
			return $branch;
		}
		
		
		
		function array_view($q) {
		
		return $this->db->query($q)->result_array();
		}
	
		function tampil_header(){
			if($this->session->userdata('logged_in')){
			$q="SELECT d_menu.menu_id id, d_menu.menu nama, d_menu.menu_link url, d_menu.parent_id FROM d_menu WHERE (d_menu.aktif =1 and d_menu.hak_akses ='".$this->session->userdata('hak_akses_user')."') order by kode";
			}else{
				$q="SELECT d_menu.menu_id id, d_menu.menu nama, d_menu.menu_link url, d_menu.parent_id FROM d_menu WHERE (d_menu.aktif =1 and d_menu.hak_akses ='1') order by kode";
				
				}
			$q1= $this->array_view($q);
			$q2= $this->map_menu($q1);
			return $this->display_tree_menu($q2);
			
			}
		function map_menu(array $elements, $parentId = 0) {
			$tree = array();
			foreach ($elements as $element) {

			
				
				if ($element['parent_id'] == $parentId) {
					$children = $this->buildTree($elements, $element['id']);
					if ($children) {
						$element['children'] = $children;
					}
					$tree[] = $element;
				}
			}
			
			return $tree;
		}
			
		function display_tree_menu($nodes, $indent=0) {
			//if ($indent >= 20) return;	// Stop at 20 sub levels
			if($indent==0){
				$this->ub.= "<ul  class='collapse navbar-collapse nav navbar-nav top-menu'>";
			}else{
				$this->ub.= "<ul class='dropdown-menu' role='menu'>";
				}
			foreach ($nodes as $node) {
				
				if (isset($node['children'])){
					if($indent==0){
					$this->ub.= "<li class='dropdown'>";
					$this->ub.= "<a href='' class='dropdown-toggle'  data-toggle='dropdown'><!--<i class='glyphicon glyphicon-plus'></i>--><strong>".$node['nama']."</strong><span
                            class='caret'></span></a>";
					
					$this->display_tree_menu($node['children'],1);
					$this->ub.= "</li>";
					}
					else{
						$this->ub.= "<li class='dropdown-submenu'>";
					$this->ub.= "<a href='#' class='dropdown-toggle' data-toggle='dropdown'><strong>".$node['nama']."</strong></a>";
					
					$this->display_tree_menu($node['children'],1);
					$this->ub.= "</li>";
						
						
						}
				}else{
					if($indent==0){
					$this->ub.= "<li>";
					$this->ub.= "<a href=".site_url($node['url'])."><!--<i class='glyphicon glyphicon-home'></i>--><strong>".$node['nama']."</strong></a>";
					$this->ub.= "</li>";
					}else{
						
					$this->ub.= "<li>";
					$this->ub.= "<a href=".site_url($node['url']).">".$node['nama']."</a>";
					$this->ub.= "</li>";
						
						}
					
					
					}
				
			}
			$this->ub.= "</ul>";
			
			return  $this->ub;
		}

}