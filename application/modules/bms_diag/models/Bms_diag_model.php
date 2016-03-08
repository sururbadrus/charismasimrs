<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
	class Bms_diag_model extends CI_Model { 
		function __construct() {
			parent::__construct();
		}  
		function mgrid39(){
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
							$wh .= " and LOWER(diag_kode) like '%".strtolower($data["data"])."%'";
							break; 
						case "diag_nama":
							$wh .= " and LOWER(diag_nama) like '%".strtolower($data["data"])."%'";
							break; 
						case "st_diag":
							$wh .= " and LOWER(st_diag) like '%".strtolower($data["data"])."%'";
							break; 
						default:
							$wh .= " and " .LOWER($data["field"])." like '".strtolower($data["data"])."%'";
						break;
					}
				}
			} 
		
			$sql="select diag_kode, diag_nama, diag_level,case when diag_aktif=1 then 'aktif' else 'tidak aktif' end 
as st_diag,  diag_aktif,diag_id from billing.b_ms_diagnosa  where 0=0 $wh"; 
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
				$responce->rows[$i]['id']=array($line['diag_id'],$line['diag_aktif']);
				$responce->rows[$i]['cell']=array($line['diag_kode'],$line['diag_nama'],$line['st_diag']); 
				$i++;
				$no++;
			}
			echo json_encode($responce);
			} 
			
	function proses_simpan39() {
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;
		$data_post=$this->input->post();
		 
		$this->form_validation->set_rules('diag_kode39', 'kode icd', 'required'); 
		$this->form_validation->set_rules('diag_nama39', 'nama penyakit', 'required'); 
		$this->form_validation->set_rules('diag_aktif39', 'status', 'required');
		
		if ($this->form_validation->run() == FALSE) {
			if(form_error('diag_kode39')){
				$data['inputerror'][] = 'diag_kode39';
				$data['error_string'][] = 'Field kode icd Harus Diisi';
				$data['status'] = FALSE;
			}
			
			if(form_error('diag_nama39')){
				$data['inputerror'][] = 'diag_nama39';
				$data['error_string'][] = 'Field nama penyakit Harus Diisi';
				$data['status'] = FALSE;
			}
			
			if(form_error('diag_aktif39')){
				$data['inputerror'][] = 'diag_aktif39';
				$data['error_string'][] = 'Field status Harus Diisi';
				$data['status'] = FALSE;
			}
			
			echo json_encode(array('dt'=>$data));
			exit();
		}
			switch ($data_post["act"]) {
				case 'Simpan':
				
				$this->db->trans_begin();
				$arr_insr_['billing.b_ms_diagnosa']['diag_kode']=$data_post["diag_kode39"];
				$arr_insr_['billing.b_ms_diagnosa']['diag_nama']=$data_post["diag_nama39"];
				$arr_insr_['billing.b_ms_diagnosa']['diag_aktif']=$data_post["diag_aktif39"];
				$this->db->insert('billing.b_ms_diagnosa',$arr_insr_['billing.b_ms_diagnosa']);
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
				$this->db->trans_begin();
				$arr_insr_['billing.b_ms_diagnosa']['diag_kode']=$data_post['diag_kode39'];
				$arr_insr_['billing.b_ms_diagnosa']['diag_nama']=$data_post['diag_nama39'];
				$arr_insr_['billing.b_ms_diagnosa']['diag_aktif']=$data_post['diag_aktif39'];
				
				$this->db->where(array('diag_id' =>$data_post['diag_id39']));
				$this->db->update('billing.b_ms_diagnosa',$arr_insr_['billing.b_ms_diagnosa']);
				
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
				
					$this->db->where('diag_id',$data_post['diag_id39']);
					$this->db->delete('billing.b_ms_diagnosa');
					
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
		
		function excell39(){
			header("Content-type: application/octet-stream");
			header("Content-Disposition: attachment; filename=exceldata.xls");
			header("Pragma: no-cache");
			header("Expires: 0");
			$tbl='';
			$tbl.='
				<h3><u>MASTER DIAGNOSA</u></h3>
				<table border="0"  cellpadding="0" cellspacing="0" >
				 <tr >';
				 $tbl.='<th  align="center" bgcolor="#359AFF" width="30" >NO</th>';
				 $tbl.='<th   valign="middle" bgcolor="#359AFF" width="100" >DIAG_KODE</th>';
					 $tbl.='<th   valign="middle" bgcolor="#359AFF" width="230" >DIAG_NAMA</th>';
					 $tbl.='<th   valign="middle" bgcolor="#359AFF" width="80" >ST_DIAG</th>';
					  $tbl.='</tr>';
				$sql="select diag_kode, diag_nama, diag_level,case when diag_aktif=1 then 'aktif' else 'tidak aktif' end 
as st_diag,  diag_aktif,diag_id from billing.b_ms_diagnosa";
				$data= $this->m_global->grid_view($sql)->result_array();
				$no=1;
				foreach($data as $row){
					$bg=$no%2;
					if($bg==0){$bg=' bgcolor="#E1F0FF" ';}else{$bg=' bgcolor="#FFFFFF" ';}
					
					$tbl.= '
					<tr>
					<td '.$bg.'  align="center" width="30">'.$no.'</td>';
					
					$tbl.='<td '.$bg.'  width="100" >'.$row['diag_kode'].'</td>';
					
					$tbl.='<td '.$bg.'  width="230" >'.$row['diag_nama'].'</td>';
					
					$tbl.='<td '.$bg.'  width="80" >'.$row['st_diag'].'</td>';
					
					$tbl.='</tr>';
					$no++;
				}
				
				$tbl.='</table>';
				echo $tbl;
			}
		
		
		function export_pdf39() {
			
			$this->load->library('pdf');
			ob_clean();
			$pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
			$tbl='';
			$tbl.='
				<h3><u>MASTER DIAGNOSA</u></h3>
				<table border="0"  cellpadding="0" cellspacing="0" >
				 <tr >';
				 $tbl.='<th  align="center" bgcolor="#359AFF" width="30" >NO</th>';
				 $tbl.='<th   valign="middle" bgcolor="#359AFF" width="100" >DIAG_KODE</th>';
					 $tbl.='<th   valign="middle" bgcolor="#359AFF" width="230" >DIAG_NAMA</th>';
					 $tbl.='<th   valign="middle" bgcolor="#359AFF" width="80" >ST_DIAG</th>';
					  $tbl.='</tr>';
				$sql="select diag_kode, diag_nama, diag_level,case when diag_aktif=1 then 'aktif' else 'tidak aktif' end 
as st_diag,  diag_aktif,diag_id from billing.b_ms_diagnosa";
				$data= $this->m_global->grid_view($sql)->result_array();
				$no=1;
				foreach($data as $row){
					$bg=$no%2;
					if($bg==0){$bg=' bgcolor="#E1F0FF" ';}else{$bg=' bgcolor="#FFFFFF" ';}
					
					$tbl.= '
					<tr>
					<td '.$bg.'  align="center" width="30">'.$no.'</td>';
					
					$tbl.='<td '.$bg.'  width="100" >'.$row['diag_kode'].'</td>';
					
					$tbl.='<td '.$bg.'  width="230" >'.$row['diag_nama'].'</td>';
					
					$tbl.='<td '.$bg.'  width="80" >'.$row['st_diag'].'</td>';
					
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