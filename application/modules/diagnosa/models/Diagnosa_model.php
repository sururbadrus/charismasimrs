                            
<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
	class Diagnosa_model extends CI_Model { 
		function __construct() {
			parent::__construct();
		}  
		function mgrid12(){
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
						case "stdiag":
							$wh .= " and LOWER(stdiag) like '%".strtolower($data["data"])."%'";
							break; 
						default:
							$wh .= " and " .LOWER($data["field"])." like '".strtolower($data["data"])."%'";
						break;
					}
				}
			} 
		
			$sql="select diag_kode,diag_nama,diag_level,diag_parent_id,diag_surv,diag_islast,case when diag_aktif=1 then 'aktif' else 'tidak aktif' end stdiag, diag_aktif,diag_kode_kel,diag_id from b_ms_diagnosa
  where 0=0 $wh"; 
			$count = $this->m_global->total_row($sql);
			$count > 0 ? $total_pages = ceil($count/$limit) : $total_pages = 0;
			if ($page > $total_pages) $page=$total_pages;
			$start = $limit*$page - $limit;
			if($start <0) $start = 0;
			$sql=$sql. " order by ". $sidx ." ".  $sord ." offset ". $start ." limit ". $limit;
			$data1 = $this->m_global->grid_view($sql)->result_array();
			$responce = new StdClass;
			$responce->page = $page;
			$responce->total = $total_pages;
			$responce->records = $count;
			$i=0;
			$no=1;
			foreach($data1 as $line){
				$responce->rows[$i]['id']=array($line['diag_id'],$line['diag_aktif']);
				$responce->rows[$i]['cell']=array($line['diag_kode'],$line['diag_nama'],$line['stdiag']); 
				$i++;
				$no++;
			}
			echo json_encode($responce);
			} 
			
		function proses_simpan12() {
			
			$data_post=$this->security->xss_clean($_POST);
			switch (element("action", $data_post)) {
				case 'Simpan':
				
					$arr_insr_['diag_id']=element('diag_id', $data_post);
					
			 $sql_q[0]= $this->db->insert_string('b_ms_diagnosa', $arr_insr_); 
					 
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
					$arr_insr_['diag_kode']=element('diag_kode', $data_post);
				$arr_insr_['diag_nama']=element('diag_nama', $data_post);
				$arr_insr_['diag_aktif']=element('diag_aktif', $data_post);
				
				$where[0] = 'diag_kode ='. element('diag_kode', $data_post);
				$sql_q[0]=  $this->db->update_string('b_ms_diagnosa', $arr_insr_,$where[0]); 
					 
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
				
					$this->db->where('diag_id', element('diag_id', $data_post));
					$this->db->delete('b_ms_diagnosa');
					 
				echo json_encode(array('ket'=>"Hapus Data Berhasil")) ;
				break;
			}
	} 
		
		function excell12(){
			header("Content-type: application/octet-stream");
			header("Content-Disposition: attachment; filename=exceldata.xls");
			header("Pragma: no-cache");
			header("Expires: 0");
			$tbl='';
			$tbl.='
				<h3><u>DIAGNOSA</u></h3>
				<table border="0"  cellpadding="0" cellspacing="0" >
				 <tr >';
				 $tbl.='<th  align="center" bgcolor="#359AFF" width="30" >NO</th>';
				 $tbl.='<th   valign="middle" bgcolor="#359AFF" width="100" >KODE</th>';
					 $tbl.='<th   valign="middle" bgcolor="#359AFF" width="400" >DIAGNOSA</th>';
					 $tbl.='<th   valign="middle" bgcolor="#359AFF" width="150" >STATUS</th>';
					  $tbl.='</tr>';
				$sql="select diag_kode,diag_nama,diag_level,diag_parent_id,diag_surv,diag_islast,case when diag_aktif=1 then 'aktif' else 'tidak aktif' end stdiag, diag_aktif,diag_kode_kel,diag_id from b_ms_diagnosa
";
				$data= $this->m_global->grid_view($sql)->result_array();
				$no=1;
				foreach($data as $row){
					$bg=$no%2;
					if($bg==0){$bg=' bgcolor="#E1F0FF" ';}else{$bg=' bgcolor="#FFFFFF" ';}
					
					$tbl.= '
					<tr>
					<td '.$bg.'  align="center" width="30">'.$no.'</td>';
					
					$tbl.='<td '.$bg.'  width="100" >'.$row['diag_kode'].'</td>';
					
					$tbl.='<td '.$bg.'  width="400" >'.$row['diag_nama'].'</td>';
					
					$tbl.='<td '.$bg.'  width="150" >'.$row['stdiag'].'</td>';
					
					$tbl.='</tr>';
					$no++;
				}
				
				$tbl.='</table>';
				echo $tbl;
			}
		
		
		function export_pdf12() {
			
			$this->load->library('pdf');
			ob_clean();
			$pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
			$tbl='';
			$tbl.='
				<h3><u>DIAGNOSA</u></h3>
				<table border="0"  cellpadding="0" cellspacing="0" >
				 <tr >';
				 $tbl.='<th  align="center" bgcolor="#359AFF" width="30" >NO</th>';
				 $tbl.='<th   valign="middle" bgcolor="#359AFF" width="100" >KODE</th>';
					 $tbl.='<th   valign="middle" bgcolor="#359AFF" width="400" >DIAGNOSA</th>';
					 $tbl.='<th   valign="middle" bgcolor="#359AFF" width="150" >STATUS</th>';
					  $tbl.='</tr>';
				$sql="select diag_kode,diag_nama,diag_level,diag_parent_id,diag_surv,diag_islast,case when diag_aktif=1 then 'aktif' else 'tidak aktif' end stdiag, diag_aktif,diag_kode_kel,diag_id from b_ms_diagnosa
";
				$data= $this->m_global->grid_view($sql)->result_array();
				$no=1;
				foreach($data as $row){
					$bg=$no%2;
					if($bg==0){$bg=' bgcolor="#E1F0FF" ';}else{$bg=' bgcolor="#FFFFFF" ';}
					
					$tbl.= '
					<tr>
					<td '.$bg.'  align="center" width="30">'.$no.'</td>';
					
					$tbl.='<td '.$bg.'  width="100" >'.$row['diag_kode'].'</td>';
					
					$tbl.='<td '.$bg.'  width="400" >'.$row['diag_nama'].'</td>';
					
					$tbl.='<td '.$bg.'  width="150" >'.$row['stdiag'].'</td>';
					
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