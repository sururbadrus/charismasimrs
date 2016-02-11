<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_diagnosa extends CI_Model {
	private $tree;
	private $ub='';
	function __construct() {
        parent::__construct();
    }
function mgrid(){
		
		$page  = $this->input->post("page");
		$limit = $this->input->post("rows");
		$sidx  = $this->input->post("sidx");
		$sord  = $this->input->post("sord");
		
		
		
		if(!$sidx) $sidx=1;
		
	
			
		$wh = "";
		$searchOn = $_REQUEST["_search"];
				
		
		if($searchOn=="true") {
		$filters = $_REQUEST["filters"];
	    $obj = json_decode($filters,true);
	    $arr=$obj["rules"];
	    	foreach( $arr as $field=>$data) {
				switch($data["field"]){
	   				 
					case "diag_kode":
						
						$wh .= " and diag_kode like '%".$data["data"]."%'";
					break; 
					case "diag_nama":
						
						$wh .= " and diag_nama like '%".$data["data"]."%'";
					break; 
					case "status":
						
						$wh .= " and status like '%".$data["data"]."%'";
					break; 
					default:
						$wh .= " and " .$data["field"]." like '".$data["data"]."%'";
					break;
				}
	    	}
		} 
		
		$sql="select diag_kode,diag_nama, case when diag_aktif=1 then 'aktif' else 'non aktif' end status, diag_aktif, diag_id from  b_ms_diagnosa  where 0=0 $wh"; 
		$count = $this->m_global->total_row($sql);
		$count > 0 ? $total_pages = ceil($count/$limit) : $total_pages = 0;
		if ($page > $total_pages) $page=$total_pages;
		$start = $limit*$page - $limit;
		if($start <0) $start = 0;
		
		$sql=$sql. " order by ". $sidx ." ".  $sord ." limit ". $limit. "offset ". $start ;
		
		$data1 = $this->m_global->array_view($sql);
		
		$responce = new StdClass;
		$responce->page = $page;
		$responce->total = $total_pages;
		$responce->records = $count;
		$i=0;
		$no=1;
		foreach($data1 as $line){
			$responce->rows[$i]['id']=array($line['diag_aktif'],$line['diag_id']);
	    	$responce->rows[$i]['cell']=array($line['diag_kode'],$line['diag_nama'],$line['status']); 
			
			$i++;
			$no++;
		}
		echo json_encode($responce);
		
		} 
		
		
		function proses_simpan() {
			
			
	    $data_post=$this->security->xss_clean($_POST);
	    switch (element("action", $data_post)) {
			
	        case 'Simpan':
			$arr_insr_['diag_kode']=element('diag_kode', $data_post);
				$arr_insr_['diag_nama']=element('diag_nama', $data_post);
				$arr_insr_['diag_aktif']=element('diag_aktif', $data_post);
				
				 $sql_q[0]= $this->db->insert_string('b_ms_diagnosa', $arr_insr_); 
				 
			 try {
			 	$this->db->trans_begin();
				
					for($iub=0; $iub<count($sql_q); $iub++){
						$this->db->query($sql_q[$iub]);
					}
					$this->db->trans_commit();
					echo json_encode(array('ket'=>"Penambahan Data Berhasil")) ;
				} catch (Exception $e) {
					$this->db->trans_rollback();
					echo json_encode(array('ket'=>$error = $e->getMessage())) ;
					
				}
			
				
			 
				
				break;
	        case 'Ubah':
				$arr_insr_['diag_kode']=element('diag_kode', $data_post);
				$arr_insr_['diag_nama']=element('diag_nama', $data_post);
				$arr_insr_['diag_aktif2']=element('diag_aktif', $data_post);
				$arr_insr_['diag_id']=element('diag_id', $data_post);
				
				$where[0] = 'diag_id  ='. element('diag_id', $data_post);
				 $sql_q[0]=  $this->db->update_string('b_ms_diagnosa', $arr_insr_,$where[0]); 
				
				 try {
			 		$this->db->trans_begin();
				
					for($iub=0; $iub<count($sql_q); $iub++){
						$res=$this->db->query($sql_q[$iub]);
						if(!$res) throw new Exception($this->db->_error_message(), $this->db->_error_number());
					}
					$this->db->trans_commit();
					echo json_encode(array('ket'=>"Update Data Berhasil")) ;
				} catch (Exception $e) {
					$this->db->trans_rollback();
					echo json_encode(array('ket'=>"Gagal Update")) ;
					
				}
				
				
	            break;
	        case 'del':
			
				$this->db->where('diag_id', element('diag_id', $data_post));
				$this->db->delete('b_ms_diagnosa');
				 
			echo json_encode(array('ket'=>"Hapus Data Berhasil")) ;
	           
	        break;
		}
	} 
		
}