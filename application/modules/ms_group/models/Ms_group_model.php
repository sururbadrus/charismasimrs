<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
	class Ms_group_model extends CI_Model { 
		function __construct() {
			parent::__construct();
		}  
		function mgrid17(){
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
						 
						case "group_nama":
							$wh .= " and LOWER(group_nama) like '%".strtolower($data["data"])."%'";
							break; 
						case "stgrp":
							$wh .= " and LOWER(stgrp) like '%".strtolower($data["data"])."%'";
							break; 
						default:
							$wh .= " and " .LOWER($data["field"])." like '".strtolower($data["data"])."%'";
						break;
					}
				}
			} 
		
			$sql="select  group_id, group_nama, if(group_aktif=1,'aktif','tidak aktif') stgrp,group_aktif from m_group   where 0=0 $wh"; 
			$count = $this->m_global->total_row($sql);
			$count > 0 ? $total_pages = ceil($count/$limit) : $total_pages = 0;
			if ($page > $total_pages) $page=$total_pages;
			$start = $limit*$page - $limit;
			if($start <0) $start = 0;
			$sql=$sql. " order by ". $sidx ." ".  $sord ." limit ". $limit." offset ". $start;
			$data1 = $this->m_global->grid_view($sql)->result_array();
			$responce = new StdClass;
			$responce->page = $page;
			$responce->total = $total_pages;
			$responce->records = $count;
			$i=0;
			$no=1;
			foreach($data1 as $line){
				$responce->rows[$i]['id']=array($line['group_id'],$line['group_aktif']);
				$responce->rows[$i]['cell']=array($line['group_nama'],$line['stgrp']); 
				$i++;
				$no++;
			}
			echo json_encode($responce);
			} 
			
	function proses_simpan17() {
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;
		$data_post=$this->security->xss_clean($_POST);
		 
		$this->form_validation->set_rules('group_nama17', 'nama group', 'required|xss_clean'); 
		$this->form_validation->set_rules('group_aktif17', 'status', 'required|xss_clean');
		
		if ($this->form_validation->run() == FALSE) {
			if(form_error('group_nama17')){
				$data['inputerror'][] = 'group_nama17';
				$data['error_string'][] = 'Field nama group Harus Diisi';
				$data['status'] = FALSE;
			}
			
			if(form_error('group_aktif17')){
				$data['inputerror'][] = 'group_aktif17';
				$data['error_string'][] = 'Field status Harus Diisi';
				$data['status'] = FALSE;
			}
			
			echo json_encode(array('dt'=>$data));
			exit();
		}
			switch ($data_post["act"]) {
				case 'Simpan':
				$arr_insr_['m_group']['group_nama']=$data_post["group_nama17"];
					$arr_insr_['m_group']['group_aktif']=$data_post["group_aktif17"];
					
			 $sql_q[0]= $this->db->insert_string('m_group', $arr_insr_['m_group']); 
					 
			$this->db->trans_begin();
			for($iub=0; $iub<count($sql_q); $iub++){
				$this->db->query($sql_q[$iub]);
			}
				if ($this->db->trans_status() === FALSE){
							$this->db->trans_rollback();
							echo json_encode(array('ket'=>"Gagal Insert",'dt'=>$data)) ;
					}
					else{
							$this->db->trans_commit();
							echo json_encode(array('ket'=>"Penambahan Data Berhasil",'dt'=>$data)) ;
					}
					break;
				case 'Ubah':
				$arr_insr_['m_group']['group_nama']=$data_post['group_nama17'];
				$arr_insr_['m_group']['group_aktif']=$data_post['group_aktif17'];
				
				$where[0] = 'group_id ='.$data_post['group_id17']; 
				$sql_q[0]=  $this->db->update_string('m_group', $arr_insr_['m_group'],$where[0]); 
				$this->db->trans_begin();
					for($iub=0; $iub<count($sql_q); $iub++){
						$this->db->query($sql_q[$iub]);
					}
				if ($this->db->trans_status() === FALSE){
						$this->db->trans_rollback();
						echo json_encode(array('ket'=>"Gagal Update",'dt'=>$data)) ;
					}
					else{
						$this->db->trans_commit();
						echo json_encode(array('ket'=>"Update Data Berhasil",'dt'=>$data)) ;
					}
					 break;
				case 'Hapus':
				$this->db->trans_begin();
				
					$this->db->where('group_id',$data_post['group_id17']);
					$this->db->delete('m_group');
					
				if ($this->db->trans_status() === FALSE){
						$this->db->trans_rollback();
						echo json_encode(array('ket'=>"Gagal Update",'dt'=>$data)) ;
					}
					else{
						$this->db->trans_commit();
						echo json_encode(array('ket'=>"Hapus Data Berhasil",'dt'=>$data)) ;
					}
				break;
			}
	} 
		
		function excell17(){
			header("Content-type: application/octet-stream");
			header("Content-Disposition: attachment; filename=exceldata.xls");
			header("Pragma: no-cache");
			header("Expires: 0");
			$tbl='';
			$tbl.='
				<h3><u>LIST GROUP</u></h3>
				<table border="0"  cellpadding="0" cellspacing="0" >
				 <tr >';
				 $tbl.='<th  align="center" bgcolor="#359AFF" width="30" >NO</th>';
				 $tbl.='<th   valign="middle" bgcolor="#359AFF" width="500" >NAMA GROUP</th>';
					 $tbl.='<th   valign="middle" bgcolor="#359AFF" width="100" >STATUS</th>';
					  $tbl.='</tr>';
				$sql="select  group_id, group_nama, if(group_aktif=1,'aktif','tidak aktif') stgrp,group_aktif from m_group ";
				$data= $this->m_global->grid_view($sql)->result_array();
				$no=1;
				foreach($data as $row){
					$bg=$no%2;
					if($bg==0){$bg=' bgcolor="#E1F0FF" ';}else{$bg=' bgcolor="#FFFFFF" ';}
					
					$tbl.= '
					<tr>
					<td '.$bg.'  align="center" width="30">'.$no.'</td>';
					
					$tbl.='<td '.$bg.'  width="500" >'.$row['group_nama'].'</td>';
					
					$tbl.='<td '.$bg.'  width="100" >'.$row['stgrp'].'</td>';
					
					$tbl.='</tr>';
					$no++;
				}
				
				$tbl.='</table>';
				echo $tbl;
			}
		
		
		function export_pdf17() {
			
			$this->load->library('pdf');
			ob_clean();
			$pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
			$tbl='';
			$tbl.='
				<h3><u>LIST GROUP</u></h3>
				<table border="0"  cellpadding="0" cellspacing="0" >
				 <tr >';
				 $tbl.='<th  align="center" bgcolor="#359AFF" width="30" >NO</th>';
				 $tbl.='<th   valign="middle" bgcolor="#359AFF" width="500" >NAMA GROUP</th>';
					 $tbl.='<th   valign="middle" bgcolor="#359AFF" width="100" >STATUS</th>';
					  $tbl.='</tr>';
				$sql="select  group_id, group_nama, if(group_aktif=1,'aktif','tidak aktif') stgrp,group_aktif from m_group ";
				$data= $this->m_global->grid_view($sql)->result_array();
				$no=1;
				foreach($data as $row){
					$bg=$no%2;
					if($bg==0){$bg=' bgcolor="#E1F0FF" ';}else{$bg=' bgcolor="#FFFFFF" ';}
					
					$tbl.= '
					<tr>
					<td '.$bg.'  align="center" width="30">'.$no.'</td>';
					
					$tbl.='<td '.$bg.'  width="500" >'.$row['group_nama'].'</td>';
					
					$tbl.='<td '.$bg.'  width="100" >'.$row['stgrp'].'</td>';
					
					$tbl.='</tr>';
					$no++;
				}
				
				$tbl.='</table>';
				$pdf->AddPage();
				$pdf->SetFont('helvetica', '', 8);
				$pdf->writeHTML($tbl, true, false, false, false, '');
				$pdf->Output('example_048.pdf', 'I');
      }
		 }