<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
	class Kunjungan_model extends CI_Model { 
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
						 
						case "noinduk":
							$wh .= " and LOWER(noinduk) like '%".strtolower($data["data"])."%'";
							break; 
						case "pas_nama":
							$wh .= " and LOWER(pas_nama) like '%".strtolower($data["data"])."%'";
							break; 
						case "pas_tgl_lahir":
							$wh .= " and LOWER(pas_tgl_lahir) like '%".strtolower($data["data"])."%'";
							break; 
						case "kun_th":
							$wh .= " and LOWER(kun_th) like '%".strtolower($data["data"])."%'";
							break; 
						case "pas_sex":
							$wh .= " and LOWER(pas_sex) like '%".strtolower($data["data"])."%'";
							break; 
						case "pas_alamat":
							$wh .= " and LOWER(pas_alamat) like '%".strtolower($data["data"])."%'";
							break; 
						case "tujuan_nama":
							$wh .= " and LOWER(tujuan_nama) like '%".strtolower($data["data"])."%'";
							break; 
						case "unit_nama":
							$wh .= " and LOWER(unit_nama) like '%".strtolower($data["data"])."%'";
							break; 
						default:
							$wh .= " and " .LOWER($data["field"])." like '".strtolower($data["data"])."%'";
						break;
					}
				}
			} 
		
			$sql="select  pas_no, pas_kode_kk, concat(pas_no,'-',pas_kode_kk) noinduk,
pas_nama, pas_iskk, pas_kk, pas_sex,pas_noktp,pas_pekerjaan_id,pas_tgl_lahir, kun_th, kun_bln, kun_hr,kun_ku_id,
pas_asal, pas_kec_id, pas_desa_id, pas_alamat, pas_rt, pas_rw, 
kun_tujuan_id, kun_kp_id, kun_no_penjamin, kun_karcis,kun_no_seri,kun_unit_id, kun_pustu_id,kun_id, kun_tgl, kun_pas_id, tujuan_nama,
kec_nama,desa_nama,unit_nama from v_kunjungan  where 0=0 $wh"; 
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
				$responce->rows[$i]['id']=array($line['pas_no'],$line['pas_kode_kk'],$line['pas_iskk'],$line['pas_kk'],$line['pas_noktp'],$line['pas_pekerjaan_id'],$line['kun_bln'],$line['kun_hr'],$line['kun_ku_id'],$line['pas_rt'],$line['pas_rw'],$line['pas_asal'],$line['pas_kec_id'],$line['pas_desa_id'],$line['kun_tujuan_id'],$line['kun_kp_id'],$line['kun_no_penjamin'],$line['kun_karcis'],$line['kun_no_seri'],$line['kun_unit_id'],$line['kun_pustu_id'],$line['kun_id'],$line['kun_tgl'],$line['kun_pas_id']);
				$responce->rows[$i]['cell']=array($line['noinduk'],$line['pas_nama'],$line['pas_tgl_lahir'],$line['kun_th'],$line['pas_sex'],$line['pas_alamat'],$line['tujuan_nama'],$line['unit_nama']); 
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
		$data_post=$this->security->xss_clean($_GET);
		 
		$this->form_validation->set_rules('noinduk17', 'no induk', 'required'); 
		$this->form_validation->set_rules('pas_nama17', 'nama pasien', 'required'); 
		$this->form_validation->set_rules('pas_kk17', 'nama kk', 'required'); 
		$this->form_validation->set_rules('pas_sex17', 'l/p', 'required'); 
		$this->form_validation->set_rules('pas_pekerjaan_id17', 'pekerjaan', 'required'); 
		$this->form_validation->set_rules('pas_tgl_lahir17', 'tgl lahir', 'required'); 
		$this->form_validation->set_rules('kun_th17', 'thn', 'required'); 
		$this->form_validation->set_rules('kun_bln17', 'bln', 'required'); 
		$this->form_validation->set_rules('kun_hr17', 'hr', 'required'); 
		$this->form_validation->set_rules('kun_ku_id17', 'kel umur', 'required'); 
		$this->form_validation->set_rules('pas_asal17', 'asal pasien', 'required'); 
		$this->form_validation->set_rules('pas_kec_id17', 'kecamatan', 'required'); 
		$this->form_validation->set_rules('pas_desa_id17', 'desa', 'required'); 
		$this->form_validation->set_rules('pas_alamat17', 'alamat', 'required'); 
		$this->form_validation->set_rules('kun_tgl17', 'tgl kunj', 'required'); 
		$this->form_validation->set_rules('kun_tujuan_id17', 'tujuan', 'required'); 
		$this->form_validation->set_rules('kun_kp_id17', 'kategori pas', 'required'); 
		$this->form_validation->set_rules('kun_karcis17', 'karcis', 'required'); 
		$this->form_validation->set_rules('kun_unit_id17', 'unit', 'required'); 
		$this->form_validation->set_rules('kun_pustu_id17', 'pelayanan', 'required');
		
		if ($this->form_validation->run() == FALSE) {
			if(form_error('noinduk17')){
				$data['inputerror'][] = 'noinduk17';
				$data['error_string'][] = 'Field no induk Harus Diisi';
				$data['status'] = FALSE;
			}
			
			if(form_error('pas_nama17')){
				$data['inputerror'][] = 'pas_nama17';
				$data['error_string'][] = 'Field nama pasien Harus Diisi';
				$data['status'] = FALSE;
			}
			
			if(form_error('pas_kk17')){
				$data['inputerror'][] = 'pas_kk17';
				$data['error_string'][] = 'Field nama kk Harus Diisi';
				$data['status'] = FALSE;
			}
			
			if(form_error('pas_sex17')){
				$data['inputerror'][] = 'pas_sex17';
				$data['error_string'][] = 'Field l/p Harus Diisi';
				$data['status'] = FALSE;
			}
			
			if(form_error('pas_pekerjaan_id17')){
				$data['inputerror'][] = 'pas_pekerjaan_id17';
				$data['error_string'][] = 'Field pekerjaan Harus Diisi';
				$data['status'] = FALSE;
			}
			
			if(form_error('pas_tgl_lahir17')){
				$data['inputerror'][] = 'pas_tgl_lahir17';
				$data['error_string'][] = 'Field tgl lahir Harus Diisi';
				$data['status'] = FALSE;
			}
			
			if(form_error('kun_th17')){
				$data['inputerror'][] = 'kun_th17';
				$data['error_string'][] = 'Field thn Harus Diisi';
				$data['status'] = FALSE;
			}
			
			if(form_error('kun_bln17')){
				$data['inputerror'][] = 'kun_bln17';
				$data['error_string'][] = 'Field bln Harus Diisi';
				$data['status'] = FALSE;
			}
			
			if(form_error('kun_hr17')){
				$data['inputerror'][] = 'kun_hr17';
				$data['error_string'][] = 'Field hr Harus Diisi';
				$data['status'] = FALSE;
			}
			
			if(form_error('kun_ku_id17')){
				$data['inputerror'][] = 'kun_ku_id17';
				$data['error_string'][] = 'Field kel umur Harus Diisi';
				$data['status'] = FALSE;
			}
			
			if(form_error('pas_asal17')){
				$data['inputerror'][] = 'pas_asal17';
				$data['error_string'][] = 'Field asal pasien Harus Diisi';
				$data['status'] = FALSE;
			}
			
			if(form_error('pas_kec_id17')){
				$data['inputerror'][] = 'pas_kec_id17';
				$data['error_string'][] = 'Field kecamatan Harus Diisi';
				$data['status'] = FALSE;
			}
			
			if(form_error('pas_desa_id17')){
				$data['inputerror'][] = 'pas_desa_id17';
				$data['error_string'][] = 'Field desa Harus Diisi';
				$data['status'] = FALSE;
			}
			
			if(form_error('pas_alamat17')){
				$data['inputerror'][] = 'pas_alamat17';
				$data['error_string'][] = 'Field alamat Harus Diisi';
				$data['status'] = FALSE;
			}
			
			if(form_error('kun_tgl17')){
				$data['inputerror'][] = 'kun_tgl17';
				$data['error_string'][] = 'Field tgl kunj Harus Diisi';
				$data['status'] = FALSE;
			}
			
			if(form_error('kun_tujuan_id17')){
				$data['inputerror'][] = 'kun_tujuan_id17';
				$data['error_string'][] = 'Field tujuan Harus Diisi';
				$data['status'] = FALSE;
			}
			
			if(form_error('kun_kp_id17')){
				$data['inputerror'][] = 'kun_kp_id17';
				$data['error_string'][] = 'Field kategori pas Harus Diisi';
				$data['status'] = FALSE;
			}
			
			if(form_error('kun_karcis17')){
				$data['inputerror'][] = 'kun_karcis17';
				$data['error_string'][] = 'Field karcis Harus Diisi';
				$data['status'] = FALSE;
			}
			
			if(form_error('kun_unit_id17')){
				$data['inputerror'][] = 'kun_unit_id17';
				$data['error_string'][] = 'Field unit Harus Diisi';
				$data['status'] = FALSE;
			}
			
			if(form_error('kun_pustu_id17')){
				$data['inputerror'][] = 'kun_pustu_id17';
				$data['error_string'][] = 'Field pelayanan Harus Diisi';
				$data['status'] = FALSE;
			}
			
			echo json_encode(array('dt'=>$data));
			exit();
		}
					$arr_insr_['sps_ms_pasien']['pas_nama']=$data_post["pas_nama17"];
					$arr_insr_['sps_ms_pasien']['pas_sex']=$data_post["pas_sex17"];
					$arr_insr_['sps_ms_pasien']['pas_tgl_lahir']=$data_post["pas_tgl_lahir17"];
					$arr_insr_['sps_ms_pasien']['pas_kk']=$data_post["pas_kk17"];
					if($this->session->user_data('profil_kec_id')==$data_post["pas_kec_id17"]){
						$asal=1;	
					}else{
							if($data_post["pas_kec_id17"]=='0'){
								$asal=2;
							}else{
								$asal=3;
							}
					}
					$arr_insr_['sps_ms_pasien']['pas_asal']=$asal;
					$arr_insr_['sps_ms_pasien']['pas_alamat']=$data_post["pas_alamat17"];
					$arr_insr_['sps_ms_pasien']['pas_rt']=$data_post["pas_rt17"];
					$arr_insr_['sps_ms_pasien']['pas_rw']=$data_post["pas_rw17"];
					$arr_insr_['sps_ms_pasien']['pas_pekerjaan_id']=$data_post["pas_pekerjaan_id17"];
					$arr_insr_['sps_ms_pasien']['pas_kec_id']=$data_post["pas_kec_id17"];
					$arr_insr_['sps_ms_pasien']['pas_desa_id']=$data_post["pas_desa_id17"];
					$arr_insr_['sps_ms_pasien']['pas_iskk']=$data_post["pas_iskk17"];
					$arr_insr_['sps_ms_pasien']['pas_noktp']=$data_post["pas_noktp17"];
					$noinduk=explode('-',trim($data_post["noinduk17"]));
					$arr_insr_['sps_ms_pasien']['pas_no']=$noinduk[1];
					$arr_insr_['sps_ms_pasien']['pas_kode_kk']=$noinduk[0];
					
					$arr_insr_['sps_ms_kunjungan']['kun_tgl']=$data_post["kun_tgl17"];
					$arr_insr_['sps_ms_kunjungan']['kun_pas_id']=$data_post["kun_pas_id17"];
					$arr_insr_['sps_ms_kunjungan']['kun_tujuan_id']=$data_post["kun_tujuan_id17"];
					$arr_insr_['sps_ms_kunjungan']['kun_ku_id']=$data_post["kun_ku_id17"];
					$arr_insr_['sps_ms_kunjungan']['kun_kp_id']=$data_post["kun_kp_id17"];
					$arr_insr_['sps_ms_kunjungan']['kun_karcis']=$data_post["kun_karcis17"];
					$arr_insr_['sps_ms_kunjungan']['kun_no_seri']=$data_post["kun_no_seri17"];
					$arr_insr_['sps_ms_kunjungan']['kun_pustu_id']=$data_post["kun_pustu_id17"];
					$arr_insr_['sps_ms_kunjungan']['kun_th']=$data_post["kun_th17"];
					$arr_insr_['sps_ms_kunjungan']['kun_bln']=$data_post["kun_bln17"];
					$arr_insr_['sps_ms_kunjungan']['kun_hr']=$data_post["kun_hr17"];
					$arr_insr_['sps_ms_kunjungan']['kun_no_penjamin']=$data_post["kun_no_penjamin17"];
					$arr_insr_['sps_ms_kunjungan']['kun_unit_id']=$data_post["kun_unit_id17"];
					
					
					
			switch ($data_post["act"]) {
				case 'Simpan':
				$arr_insr_['sps_ms_kunjungan']['kun_is_baru']=$data_post["kun_is_baru17"];
				$sql_q[0]= $this->db->insert_string('sps_ms_pasien', $arr_insr_['sps_ms_pasien']);		
			 	$sql_q[1]= $this->db->insert_string('sps_ms_kunjungan', $arr_insr_['sps_ms_kunjungan']); 
					 
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
				
				$where[0] = 'pas_id ='.$data_post['pas_id17']; 
				$sql_q[0]=  $this->db->update_string('sps_ms_pasien', $arr_insr_['sps_ms_pasien'],$where[0]);
				$where[1] = 'kun_id ='.$data_post['kun_id17']; 
				$sql_q[1]=  $this->db->update_string('sps_ms_kunjungan', $arr_insr_['sps_ms_kunjungan'],$where[1]); 
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
				
					$this->db->where('pas_id',$data_post['pas_id17']);
					$this->db->delete('sps_ms_pasien');
					
					$this->db->where('kun_id',$data_post['kun_id17']);
					$this->db->delete('sps_ms_kunjungan');
					
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
		
		
		
		function kunjung_baru(){
			
			}
		
		function pas_pekerjaan_id17()
			{
				return $this->m_global->getcombo("select pekerjaan_id id,pekerjaan_nama nama from sps_ms_pekerjaan","");
				}
		function pas_asal17()
			{
				return $this->m_global->getcombo("select asal_id id,asal_nama nama from sps_ms_asal_pasien","");
				}
		function pas_kec_id17()
			{
				return $this->m_global->getcombo("select kec_id id,kec_nama nama from sps_ms_kecamatan ","");
				}
		function pas_desa_id17()
			{
				return $this->m_global->getcombo("select desa_id id,desa_nama nama from sps_ms_desa where desa_kec_id='".$this->session->userdata('profil_kec_id')."'","");
				}
		function kun_tujuan_id17()
			{
				return $this->m_global->getcombo("select tujuan_id id,tujuan_nama nama from sps_ms_tujuan","");
				}
		function kun_kp_id17()
			{
				return $this->m_global->getcombo("select kp_id id,kp_nama nama from sps_ms_kp","");
				}
		function kun_karcis17()
			{
				return $this->m_global->getcombo("select karcis_harga id,karcis_harga nama from sps_ms_karcis","");
				}
		function kun_unit_id17()
			{
				return $this->m_global->getcombo("SELECT unit_id id,unit_nama nama FROM sps_ms_unit WHERE unit_ispel=1 AND unit_parent_id=20","");
				}
		function kun_pel_unit17()
			{
				return $this->m_global->getcombo("SELECT unit_id id,unit_nama nama FROM sps_ms_unit WHERE unit_ispel=1 AND unit_parent_id=0","");
				}
				
				
		function kun_pustu_id17()
			{
				return $this->m_global->getcombo("select pusk_id id,pusk_nama nama from sps_ms_puskesmas","");
				} 
		
				
				
		
		function excell17(){
			header("Content-type: application/octet-stream");
			header("Content-Disposition: attachment; filename=exceldata.xls");
			header("Pragma: no-cache");
			header("Expires: 0");
			$tbl='';
			$tbl.='
				<h3><u>REGISTRASI PASIEN</u></h3>
				<table border="0"  cellpadding="0" cellspacing="0" >
				 <tr >';
				 $tbl.='<th  align="center" bgcolor="#359AFF" width="30" >NO</th>';
				 $tbl.='<th   valign="middle" bgcolor="#359AFF" width="100" >NO INDUK</th>';
					 $tbl.='<th   valign="middle" bgcolor="#359AFF" width="150" >NAMA</th>';
					 $tbl.='<th   valign="middle" bgcolor="#359AFF" width="100" >TGL LAHIR</th>';
					 $tbl.='<th   valign="middle" bgcolor="#359AFF" width="50" >UMUR</th>';
					 $tbl.='<th   valign="middle" bgcolor="#359AFF" width="50" >L/P</th>';
					 $tbl.='<th   valign="middle" bgcolor="#359AFF" width="200" >ALAMAT</th>';
					 $tbl.='<th   valign="middle" bgcolor="#359AFF" width="120" >TUJUAN</th>';
					 $tbl.='<th   valign="middle" bgcolor="#359AFF" width="120" >UNIT</th>';
					  $tbl.='</tr>';
				$sql="select  pas_no, pas_kode_kk, concat(pas_no,'-',pas_kode_kk) noinduk,
pas_nama, pas_iskk, pas_kk, pas_sex,pas_noktp,pas_pekerjaan_id,pas_tgl_lahir, kun_th, kun_bln, kun_hr,kun_ku_id,
pas_asal, pas_kec_id, pas_desa_id, pas_alamat, pas_rt, pas_rw, 
kun_tujuan_id, kun_kp_id, kun_no_penjamin, kun_karcis,kun_no_seri,kun_unit_id, kun_pustu_id,kun_id, kun_tgl, kun_pas_id, tujuan_nama,
kec_nama,desa_nama,unit_nama from v_kunjungan";
				$data= $this->m_global->grid_view($sql)->result_array();
				$no=1;
				foreach($data as $row){
					$bg=$no%2;
					if($bg==0){$bg=' bgcolor="#E1F0FF" ';}else{$bg=' bgcolor="#FFFFFF" ';}
					
					$tbl.= '
					<tr>
					<td '.$bg.'  align="center" width="30">'.$no.'</td>';
					
					$tbl.='<td '.$bg.'  width="100" >'.$row['noinduk'].'</td>';
					
					$tbl.='<td '.$bg.'  width="150" >'.$row['pas_nama'].'</td>';
					
					$tbl.='<td '.$bg.'  width="100" >'.$row['pas_tgl_lahir'].'</td>';
					
					$tbl.='<td '.$bg.'  width="50" >'.$row['kun_th'].'</td>';
					
					$tbl.='<td '.$bg.'  width="50" >'.$row['pas_sex'].'</td>';
					
					$tbl.='<td '.$bg.'  width="200" >'.$row['pas_alamat'].'</td>';
					
					$tbl.='<td '.$bg.'  width="120" >'.$row['tujuan_nama'].'</td>';
					
					$tbl.='<td '.$bg.'  width="120" >'.$row['unit_nama'].'</td>';
					
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
				<h3><u>REGISTRASI PASIEN</u></h3>
				<table border="0"  cellpadding="0" cellspacing="0" >
				 <tr >';
				 $tbl.='<th  align="center" bgcolor="#359AFF" width="30" >NO</th>';
				 $tbl.='<th   valign="middle" bgcolor="#359AFF" width="100" >NO INDUK</th>';
					 $tbl.='<th   valign="middle" bgcolor="#359AFF" width="150" >NAMA</th>';
					 $tbl.='<th   valign="middle" bgcolor="#359AFF" width="100" >TGL LAHIR</th>';
					 $tbl.='<th   valign="middle" bgcolor="#359AFF" width="50" >UMUR</th>';
					 $tbl.='<th   valign="middle" bgcolor="#359AFF" width="50" >L/P</th>';
					 $tbl.='<th   valign="middle" bgcolor="#359AFF" width="200" >ALAMAT</th>';
					 $tbl.='<th   valign="middle" bgcolor="#359AFF" width="120" >TUJUAN</th>';
					 $tbl.='<th   valign="middle" bgcolor="#359AFF" width="120" >UNIT</th>';
					  $tbl.='</tr>';
				$sql="select  pas_no, pas_kode_kk, concat(pas_no,'-',pas_kode_kk) noinduk,
pas_nama, pas_iskk, pas_kk, pas_sex,pas_noktp,pas_pekerjaan_id,pas_tgl_lahir, kun_th, kun_bln, kun_hr,kun_ku_id,
pas_asal, pas_kec_id, pas_desa_id, pas_alamat, pas_rt, pas_rw, 
kun_tujuan_id, kun_kp_id, kun_no_penjamin, kun_karcis,kun_no_seri,kun_unit_id, kun_pustu_id,kun_id, kun_tgl, kun_pas_id, tujuan_nama,
kec_nama,desa_nama,unit_nama from v_kunjungan";
				$data= $this->m_global->grid_view($sql)->result_array();
				$no=1;
				foreach($data as $row){
					$bg=$no%2;
					if($bg==0){$bg=' bgcolor="#E1F0FF" ';}else{$bg=' bgcolor="#FFFFFF" ';}
					
					$tbl.= '
					<tr>
					<td '.$bg.'  align="center" width="30">'.$no.'</td>';
					
					$tbl.='<td '.$bg.'  width="100" >'.$row['noinduk'].'</td>';
					
					$tbl.='<td '.$bg.'  width="150" >'.$row['pas_nama'].'</td>';
					
					$tbl.='<td '.$bg.'  width="100" >'.$row['pas_tgl_lahir'].'</td>';
					
					$tbl.='<td '.$bg.'  width="50" >'.$row['kun_th'].'</td>';
					
					$tbl.='<td '.$bg.'  width="50" >'.$row['pas_sex'].'</td>';
					
					$tbl.='<td '.$bg.'  width="200" >'.$row['pas_alamat'].'</td>';
					
					$tbl.='<td '.$bg.'  width="120" >'.$row['tujuan_nama'].'</td>';
					
					$tbl.='<td '.$bg.'  width="120" >'.$row['unit_nama'].'</td>';
					
					$tbl.='</tr>';
					$no++;
				}
				
				$tbl.='</table>';
				$pdf->AddPage();
				$pdf->SetFont('helvetica', '', 8);
				$pdf->writeHTML($tbl, true, false, false, false, '');
				$pdf->Output('example_048.pdf', 'I');
      }
	  
	  function ajax_kec($par){
		  $sql="select desa_id id,desa_nama nama from sps_ms_desa where desa_kec_id='".$par."'";
		  
		   return $this->m_global->ajax_combo($sql,'p');
		  }
		  
	function getKelompokUmur($d,$ut = 0)
	{
		$txt;
		if($ut>0):
			switch($ut):
				case ($ut<5):
					$ku = "1-4 thn";
					$txt = 4;
					break;
				case ($ut<10):
					$ku = "5-9 thn";
					$txt = 5;
					break;
				case ($ut<15):
					$ku = "10-14 thn";
					$txt = 6;
					break;
				case ($ut<20):
					$ku = "15-19 thn";
					$txt = 7;
					break;
				case ($ut<45):
					$ku = "20-44 thn";
					$txt = 8;
					break;
				case ($ut<55):
					$ku = "45-54 thn";
					$txt = 9;
					break;
				case ($ut<60):
					$ku = "55-59 thn";
					$txt = 10;
					break;
				case ($ut<70):
					$ku = "60-69 thn";
					$txt = 11;
					break;
				default:
					$ku = ">=70 thn";
					$txt = 12;
			endswitch;
		else:
			$umur = getUmurThnBlnHr($d);
			//if($umur["bln"]>0):
				//$ku = "1-<12 bln";
				//$txt = 3;
			//else:
			if($umur["bln"]==0):
				if($umur["hr"]<=7):
					$ku = "0-7 Hr";
					$txt = 1;
				elseif($umur["hr"]>7 && $umur["hr"]<=28):
					$ku = "8-28 Hr";
					$txt = 2;
				elseif($umur["hr"]>28 && $umur["hr"]<=31):
					$ku = "1-<12 bln";
					$txt = 3;
				endif;
			elseif($umur["bln"]==0 && $umur["thn"]==1):
				$ku = "1-4 thn";
					$txt = 4;
			else:
				$ku = "1-<12 bln";
					$txt = 3;
			endif;		
		endif;
		return $txt;
	}	  
	
	function getUmurThnBlnHr($dt)
		{
			$d = explode("-",$dt);
			$thn = date("Y") - $d[2];
			$bln = date("m") - $d[1];
			$hr = date("d") - $d[0];
			$jumHr = cal_days_in_month(CAL_GREGORIAN,(int)$d[1],$d[2]);
			if($hr < 0):		
				$bln--; $hr = $jumHr+$hr;
			endif;
			if($bln < 0){ $thn -= 1; $bln = 12+$bln; }
			$inerth=date("Y").date("m").date("d");
			$inerth1=$d[2].$d[1].$d[0];
			if(($inerth-$inerth1)<0){
				return array("thn"=>0,"bln"=>0,"hr"=>0);
				}
			else
			{
				//echo $inerth1;
				return array("thn"=>$thn,"bln"=>$bln,"hr"=>$hr);
				}
		}
	function pel_unit($par){
		
		return $this->m_global->ajax_combo("SELECT unit_id id,unit_nama nama FROM sps_ms_unit WHERE unit_ispel=1 AND unit_parent_id='".$par."'","p");
		}
		 }