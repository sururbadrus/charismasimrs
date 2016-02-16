<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
	class Pasien_model extends CI_Model { 
		function __construct() {
			parent::__construct();
		}  
		function mgrid18(){
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
						 
						case "pas_no_rm":
							$wh .= " and LOWER(pas_no_rm) like '%".strtolower($data["data"])."%'";
							break; 
						case "pas_nama":
							$wh .= " and LOWER(pas_nama) like '%".strtolower($data["data"])."%'";
							break; 
						case "pas_sex":
							$wh .= " and LOWER(pas_sex) like '%".strtolower($data["data"])."%'";
							break; 
						case "pas_tgl_lahir":
							$wh .= " and LOWER(pas_tgl_lahir) like '%".strtolower($data["data"])."%'";
							break; 
						case "pas_alamat":
							$wh .= " and LOWER(pas_alamat) like '%".strtolower($data["data"])."%'";
							break; 
						case "pas_rt":
							$wh .= " and LOWER(pas_rt) like '%".strtolower($data["data"])."%'";
							break; 
						case "pas_rw":
							$wh .= " and LOWER(pas_rw) like '%".strtolower($data["data"])."%'";
							break; 
						case "pas_ortu":
							$wh .= " and LOWER(pas_ortu) like '%".strtolower($data["data"])."%'";
							break; 
						case "pas_telp":
							$wh .= " and LOWER(pas_telp) like '%".strtolower($data["data"])."%'";
							break; 
						case "pas_no_identitas":
							$wh .= " and LOWER(pas_no_identitas) like '%".strtolower($data["data"])."%'";
							break; 
						default:
							$wh .= " and " .LOWER($data["field"])." like '".strtolower($data["data"])."%'";
						break;
					}
				}
			} 
		
			$sql="select pas_aktif,pas_no_rm, pas_nama, pas_sex , pas_tempat_lahir, pas_tgl_lahir, pas_alamat,pas_agama_id, pas_rt, 
  pas_rw, pas_desa_id, pas_kec_id,pas_kab_id, pas_prop_id, pas_pendidikan_id, pas_pekerjaan_id, pas_ortu, 
  pas_telp, pas_meninggal, pas_no_rm_lm, pas_identitas_id, pas_no_identitas, pas_user_act, pas_tgl_act, pas_id, 
  pekerjaan_nama,kec_nama, kel_nama, kota_nama, prov_nama, pend_nama,identitas_nama,agama_nama
from vpasien  where 0=0 $wh"; 
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
				$responce->rows[$i]['id']=array($line['pas_aktif'],$line['pas_tempat_lahir'],$line['pas_agama_id'],$line['pas_desa_id'],$line['pas_kec_id'],$line['pas_kab_id'],$line['pas_prop_id'],$line['pas_pendidikan_id'],$line['pas_pekerjaan_id'],$line['pas_meninggal'],$line['pas_no_rm_lm'],$line['pas_identitas_id'],$line['pas_user_act'],$line['pas_tgl_act'],$line['pas_id'],$line['pekerjaan_nama'],$line['kec_nama'],$line['kel_nama'],$line['kota_nama'],$line['pro_provinsi'],$line['pend_nama'],$line['identitas_nama'],$line['agama_nama']);
				$responce->rows[$i]['cell']=array($line['pas_no_rm'],$line['pas_nama'],$line['pas_sex'],$line['pas_tgl_lahir'],$line['pas_alamat'],$line['pas_rt'],$line['pas_rw'],$line['pas_ortu'],$line['pas_telp'],$line['pas_no_identitas']); 
				$i++;
				$no++;
			}
			echo json_encode($responce);
			} 
			
	function proses_simpan18() {
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;
		$data_post=$this->security->xss_clean($_POST);
		 
		$this->form_validation->set_rules('pas_no_rm18', 'no rm', 'required'); 
		$this->form_validation->set_rules('pas_nama18', 'nama pasien', 'required'); 
		$this->form_validation->set_rules('pas_sex18', 'l/p', 'required'); 
		$this->form_validation->set_rules('pas_tempat_lahir18', 'tempat lahir', 'required'); 
		$this->form_validation->set_rules('pas_tgl_lahir18', 'tgl lahir', 'required'); 
		$this->form_validation->set_rules('pas_alamat18', 'alamat pasien', 'required'); 
		$this->form_validation->set_rules('pas_agama_id18', 'agama', 'required'); 
		$this->form_validation->set_rules('pas_rt18', 'rt', 'required'); 
		$this->form_validation->set_rules('pas_rw18', 'rw', 'required'); 
		$this->form_validation->set_rules('pas_ortu18', 'orang tua', 'required'); 
		$this->form_validation->set_rules('pas_prop_id18', 'propinsi', 'required'); 
		$this->form_validation->set_rules('pas_kab_id18', 'kabupaten', 'required'); 
		$this->form_validation->set_rules('pas_desa_id18', 'desa', 'required'); 
		$this->form_validation->set_rules('pas_kec_id18', 'kecamatan', 'required'); 
		$this->form_validation->set_rules('pas_pendidikan_id18', 'pendidikan', 'required'); 
		$this->form_validation->set_rules('pas_pekerjaan_id18', 'pekerjaan', 'required'); 
		$this->form_validation->set_rules('pas_telp18', 'no tlp', 'required'); 
		$this->form_validation->set_rules('pas_meninggal18', 'status', 'required'); 
		$this->form_validation->set_rules('pas_no_rm_lm18', 'rm lama', 'required'); 
		$this->form_validation->set_rules('pas_identitas_id18', 'jenis identitas', 'required'); 
		$this->form_validation->set_rules('pas_no_identitas18', 'no identitas', 'required'); 
		$this->form_validation->set_rules('pas_aktif18', 'aktif', 'required');
		
		if ($this->form_validation->run() == FALSE) {
			if(form_error('pas_no_rm')){
				$data['inputerror'][] = 'pas_no_rm18';
				$data['error_string'][] = 'Field no rm Harus Diisi';
				$data['status'] = FALSE;
			}
			
			if(form_error('pas_nama')){
				$data['inputerror'][] = 'pas_nama18';
				$data['error_string'][] = 'Field nama pasien Harus Diisi';
				$data['status'] = FALSE;
			}
			
			if(form_error('pas_sex')){
				$data['inputerror'][] = 'pas_sex18';
				$data['error_string'][] = 'Field l/p Harus Diisi';
				$data['status'] = FALSE;
			}
			
			if(form_error('pas_tempat_lahir')){
				$data['inputerror'][] = 'pas_tempat_lahir18';
				$data['error_string'][] = 'Field tempat lahir Harus Diisi';
				$data['status'] = FALSE;
			}
			
			if(form_error('pas_tgl_lahir')){
				$data['inputerror'][] = 'pas_tgl_lahir18';
				$data['error_string'][] = 'Field tgl lahir Harus Diisi';
				$data['status'] = FALSE;
			}
			
			if(form_error('pas_alamat')){
				$data['inputerror'][] = 'pas_alamat18';
				$data['error_string'][] = 'Field alamat pasien Harus Diisi';
				$data['status'] = FALSE;
			}
			
			if(form_error('pas_agama_id')){
				$data['inputerror'][] = 'pas_agama_id18';
				$data['error_string'][] = 'Field agama Harus Diisi';
				$data['status'] = FALSE;
			}
			
			if(form_error('pas_rt')){
				$data['inputerror'][] = 'pas_rt18';
				$data['error_string'][] = 'Field rt Harus Diisi';
				$data['status'] = FALSE;
			}
			
			if(form_error('pas_rw')){
				$data['inputerror'][] = 'pas_rw18';
				$data['error_string'][] = 'Field rw Harus Diisi';
				$data['status'] = FALSE;
			}
			
			if(form_error('pas_ortu')){
				$data['inputerror'][] = 'pas_ortu18';
				$data['error_string'][] = 'Field orang tua Harus Diisi';
				$data['status'] = FALSE;
			}
			
			if(form_error('pas_prop_id')){
				$data['inputerror'][] = 'pas_prop_id18';
				$data['error_string'][] = 'Field propinsi Harus Diisi';
				$data['status'] = FALSE;
			}
			
			if(form_error('pas_kab_id')){
				$data['inputerror'][] = 'pas_kab_id18';
				$data['error_string'][] = 'Field kabupaten Harus Diisi';
				$data['status'] = FALSE;
			}
			
			if(form_error('pas_desa_id')){
				$data['inputerror'][] = 'pas_desa_id18';
				$data['error_string'][] = 'Field desa Harus Diisi';
				$data['status'] = FALSE;
			}
			
			if(form_error('pas_kec_id')){
				$data['inputerror'][] = 'pas_kec_id18';
				$data['error_string'][] = 'Field kecamatan Harus Diisi';
				$data['status'] = FALSE;
			}
			
			if(form_error('pas_pendidikan_id')){
				$data['inputerror'][] = 'pas_pendidikan_id18';
				$data['error_string'][] = 'Field pendidikan Harus Diisi';
				$data['status'] = FALSE;
			}
			
			if(form_error('pas_pekerjaan_id')){
				$data['inputerror'][] = 'pas_pekerjaan_id18';
				$data['error_string'][] = 'Field pekerjaan Harus Diisi';
				$data['status'] = FALSE;
			}
			
			if(form_error('pas_telp')){
				$data['inputerror'][] = 'pas_telp18';
				$data['error_string'][] = 'Field no tlp Harus Diisi';
				$data['status'] = FALSE;
			}
			
			if(form_error('pas_meninggal')){
				$data['inputerror'][] = 'pas_meninggal18';
				$data['error_string'][] = 'Field status Harus Diisi';
				$data['status'] = FALSE;
			}
			
			if(form_error('pas_no_rm_lm')){
				$data['inputerror'][] = 'pas_no_rm_lm18';
				$data['error_string'][] = 'Field rm lama Harus Diisi';
				$data['status'] = FALSE;
			}
			
			if(form_error('pas_identitas_id')){
				$data['inputerror'][] = 'pas_identitas_id18';
				$data['error_string'][] = 'Field jenis identitas Harus Diisi';
				$data['status'] = FALSE;
			}
			
			if(form_error('pas_no_identitas')){
				$data['inputerror'][] = 'pas_no_identitas18';
				$data['error_string'][] = 'Field no identitas Harus Diisi';
				$data['status'] = FALSE;
			}
			
			if(form_error('pas_aktif')){
				$data['inputerror'][] = 'pas_aktif18';
				$data['error_string'][] = 'Field aktif Harus Diisi';
				$data['status'] = FALSE;
			}
			
			echo json_encode(array('dt'=>$data));
			exit();
		}
			switch ($data_post["act"]) {
				case 'Simpan':
				
					$arr_insr_['pas_no_rm']=$data_post["pas_no_rm18"];
					
					$arr_insr_['pas_nama']=$data_post["pas_nama18"];
					
					$arr_insr_['pas_sex']=$data_post["pas_sex18"];
					
					$arr_insr_['pas_agama_id']=$data_post["pas_agama_id18"];
					
					$arr_insr_['pas_tempat_lahir']=$data_post["pas_tempat_lahir18"];
					
					$arr_insr_['pas_tgl_lahir']=$data_post["pas_tgl_lahir18"];
					
					$arr_insr_['pas_alamat']=$data_post["pas_alamat18"];
					
					$arr_insr_['pas_rt']=$data_post["pas_rt18"];
					
					$arr_insr_['pas_rw']=$data_post["pas_rw18"];
					
					$arr_insr_['pas_desa_id']=$data_post["pas_desa_id18"];
					
					$arr_insr_['pas_kec_id']=$data_post["pas_kec_id18"];
					
					$arr_insr_['pas_kab_id']=$data_post["pas_kab_id18"];
					
					$arr_insr_['pas_prop_id']=$data_post["pas_prop_id18"];
					
					$arr_insr_['pas_pendidikan_id']=$data_post["pas_pendidikan_id18"];
					
					$arr_insr_['pas_pekerjaan_id']=$data_post["pas_pekerjaan_id18"];
					
					$arr_insr_['pas_ortu']=$data_post["pas_ortu18"];
					
					$arr_insr_['pas_telp']=$data_post["pas_telp18"];
					
					$arr_insr_['pas_meninggal']=$data_post["pas_meninggal18"];
					
					$arr_insr_['pas_no_rm_lm']=$data_post["pas_no_rm_lm18"];
					
					$arr_insr_['pas_identitas_id']=$data_post["pas_identitas_id18"];
					
					$arr_insr_['pas_no_identitas']=$data_post["pas_no_identitas18"];
					
					$arr_insr_['pas_aktif']=$data_post["pas_aktif18"];
					
			 $sql_q[0]= $this->db->insert_string('b_ms_pasien', $arr_insr_); 
					 
			$this->db->trans_begin();
			for($iub=0; $iub<count($sql_q); $iub++){
				$this->db->query($sql_q[$iub]);
			}
				if ($this->db->trans_status() === FALSE)
					{
							$this->db->trans_rollback();
							echo json_encode(array('ket'=>"Gagal Insert",'dt'=>$data)) ;
					}
					else
					{
							$this->db->trans_commit();
							echo json_encode(array('ket'=>"Penambahan Data Berhasil",'dt'=>$data)) ;
					}
					break;
				case 'Ubah':
					$arr_insr_['pas_no_rm']=$data_post['pas_no_rm18'];
				
				$arr_insr_['pas_nama']=$data_post['pas_nama18'];
				
				$arr_insr_['pas_sex']=$data_post['pas_sex18'];
				
				$arr_insr_['pas_agama_id']=$data_post['pas_agama_id18'];
				
				$arr_insr_['pas_tempat_lahir']=$data_post['pas_tempat_lahir18'];
				
				$arr_insr_['pas_tgl_lahir']=$data_post['pas_tgl_lahir18'];
				
				$arr_insr_['pas_alamat']=$data_post['pas_alamat18'];
				
				$arr_insr_['pas_rt']=$data_post['pas_rt18'];
				
				$arr_insr_['pas_rw']=$data_post['pas_rw18'];
				
				$arr_insr_['pas_desa_id']=$data_post['pas_desa_id18'];
				
				$arr_insr_['pas_kec_id']=$data_post['pas_kec_id18'];
				
				$arr_insr_['pas_kab_id']=$data_post['pas_kab_id18'];
				
				$arr_insr_['pas_prop_id']=$data_post['pas_prop_id18'];
				
				$arr_insr_['pas_pendidikan_id']=$data_post['pas_pendidikan_id18'];
				
				$arr_insr_['pas_pekerjaan_id']=$data_post['pas_pekerjaan_id18'];
				
				$arr_insr_['pas_ortu']=$data_post['pas_ortu18'];
				
				$arr_insr_['pas_telp']=$data_post['pas_telp18'];
				
				$arr_insr_['pas_meninggal']=$data_post['pas_meninggal18'];
				
				$arr_insr_['pas_no_rm_lm']=$data_post['pas_no_rm_lm18'];
				
				$arr_insr_['pas_identitas_id']=$data_post['pas_identitas_id18'];
				
				$arr_insr_['pas_no_identitas']=$data_post['pas_no_identitas18'];
				
				$arr_insr_['pas_aktif']=$data_post['pas_aktif18'];
				
				
				$where[0] = 'pas_id ='.$data_post['pas_id18']; 
				$sql_q[0]=  $this->db->update_string('b_ms_pasien', $arr_insr_,$where[0]); 
					 
				$this->db->trans_begin();
					for($iub=0; $iub<count($sql_q); $iub++){
						$this->db->query($sql_q[$iub]);
					}
				if ($this->db->trans_status() === FALSE)
					{
						$this->db->trans_rollback();
						echo json_encode(array('ket'=>"Gagal Update",'dt'=>$data)) ;
					}
					else
					{
						$this->db->trans_commit();
						echo json_encode(array('ket'=>"Update Data Berhasil",'dt'=>$data)) ;
					}
					 break;
				case 'Hapus':
				
					$this->db->where('pas_id',$data_post['pas_id18']);
					$this->db->delete('b_ms_pasien');
					 
				echo json_encode(array('ket'=>"Hapus Data Berhasil",'dt'=>$data)) ;
				break;
			}
	}
		function pas_agama_id18()
			{
				return $this->m_global->getcombo("select agama_id id,agama_nama nama from b_ms_agama","");
				}
		function pas_prop_id18()
			{
				return $this->m_global->getcombo("select prov_id id ,prov_nama nama from b_ms_provinsi where prov_def='0' limit 10","");
				}
		function pas_kab_id18()
			{
				return $this->m_global->getcombo("select kota_id id , kota_nama nama from b_ms_kota where kota_def='0' limit 10","");
				}
		function pas_desa_id18()
			{
				return $this->m_global->getcombo("select kel_id id ,kel_nama nama from b_ms_kelurahan where kel_def='0' limit 10","");
				}
		function pas_kec_id18()
			{
				return $this->m_global->getcombo("select kec_id id ,kec_nama nama from b_ms_kecamatan where kec_def='0' limit 10","");
				}
		function pas_pendidikan_id18()
			{
				return $this->m_global->getcombo("select pend_id id, pend_nama nama from b_ms_pendidikan","");
				}
		function pas_pekerjaan_id18()
			{
				return $this->m_global->getcombo("select pekerjaan_id id,pekerjaan_nama nama from b_ms_pekerjaan where pekerjaan_def='0'","");
				} 
		
		function excell18(){
			header("Content-type: application/octet-stream");
			header("Content-Disposition: attachment; filename=exceldata.xls");
			header("Pragma: no-cache");
			header("Expires: 0");
			$tbl='';
			$tbl.='
				<h3><u>LIST PASIEN</u></h3>
				<table border="0"  cellpadding="0" cellspacing="0" >
				 <tr >';
				 $tbl.='<th  align="center" bgcolor="#359AFF" width="30" >NO</th>';
				 $tbl.='<th   valign="middle" bgcolor="#359AFF" width="140" >NO RM</th>';
					 $tbl.='<th   valign="middle" bgcolor="#359AFF" width="250" >NAMA PASIEN</th>';
					 $tbl.='<th   valign="middle" bgcolor="#359AFF" width="50" >L/P</th>';
					 $tbl.='<th   valign="middle" bgcolor="#359AFF" width="120" >TGL LAHIR</th>';
					 $tbl.='<th   valign="middle" bgcolor="#359AFF" width="350" >ALAMAT PASIEN</th>';
					 $tbl.='<th   valign="middle" bgcolor="#359AFF" width="50" >RT</th>';
					 $tbl.='<th   valign="middle" bgcolor="#359AFF" width="50" >RW</th>';
					 $tbl.='<th   valign="middle" bgcolor="#359AFF" width="200" >ORTU</th>';
					 $tbl.='<th   valign="middle" bgcolor="#359AFF" width="100" >NO TELP</th>';
					 $tbl.='<th   valign="middle" bgcolor="#359AFF" width="100" >NO IDENTITAS</th>';
					  $tbl.='</tr>';
				$sql="select pas_aktif,pas_no_rm, pas_nama, pas_sex , pas_tempat_lahir, pas_tgl_lahir, pas_alamat,pas_agama_id, pas_rt, 
  pas_rw, pas_desa_id, pas_kec_id,pas_kab_id, pas_prop_id, pas_pendidikan_id, pas_pekerjaan_id, pas_ortu, 
  pas_telp, pas_meninggal, pas_no_rm_lm, pas_identitas_id, pas_no_identitas, pas_user_act, pas_tgl_act, pas_id, 
  pekerjaan_nama,kec_nama, kel_nama, kota_nama, prov_nama, pend_nama,identitas_nama,agama_nama
from vpasien";
				$data= $this->m_global->grid_view($sql)->result_array();
				$no=1;
				foreach($data as $row){
					$bg=$no%2;
					if($bg==0){$bg=' bgcolor="#E1F0FF" ';}else{$bg=' bgcolor="#FFFFFF" ';}
					
					$tbl.= '
					<tr>
					<td '.$bg.'  align="center" width="30">'.$no.'</td>';
					
					$tbl.='<td '.$bg.'  width="140" >'.$row['pas_no_rm'].'</td>';
					
					$tbl.='<td '.$bg.'  width="250" >'.$row['pas_nama'].'</td>';
					
					$tbl.='<td '.$bg.'  width="50" >'.$row['pas_sex'].'</td>';
					
					$tbl.='<td '.$bg.'  width="120" >'.$row['pas_tgl_lahir'].'</td>';
					
					$tbl.='<td '.$bg.'  width="350" >'.$row['pas_alamat'].'</td>';
					
					$tbl.='<td '.$bg.'  width="50" >'.$row['pas_rt'].'</td>';
					
					$tbl.='<td '.$bg.'  width="50" >'.$row['pas_rw'].'</td>';
					
					$tbl.='<td '.$bg.'  width="200" >'.$row['pas_ortu'].'</td>';
					
					$tbl.='<td '.$bg.'  width="100" >'.$row['pas_telp'].'</td>';
					
					$tbl.='<td '.$bg.'  width="100" >'.$row['pas_no_identitas'].'</td>';
					
					$tbl.='</tr>';
					$no++;
				}
				
				$tbl.='</table>';
				echo $tbl;
			}
		
		
		function export_pdf18() {
			
			$this->load->library('pdf');
			ob_clean();
			$pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
			$tbl='';
			$tbl.='
				<h3><u>LIST PASIEN</u></h3>
				<table border="0"  cellpadding="0" cellspacing="0" >
				 <tr >';
				 $tbl.='<th  align="center" bgcolor="#359AFF" width="30" >NO</th>';
				 $tbl.='<th   valign="middle" bgcolor="#359AFF" width="140" >NO RM</th>';
					 $tbl.='<th   valign="middle" bgcolor="#359AFF" width="250" >NAMA PASIEN</th>';
					 $tbl.='<th   valign="middle" bgcolor="#359AFF" width="50" >L/P</th>';
					 $tbl.='<th   valign="middle" bgcolor="#359AFF" width="120" >TGL LAHIR</th>';
					 $tbl.='<th   valign="middle" bgcolor="#359AFF" width="350" >ALAMAT PASIEN</th>';
					 $tbl.='<th   valign="middle" bgcolor="#359AFF" width="50" >RT</th>';
					 $tbl.='<th   valign="middle" bgcolor="#359AFF" width="50" >RW</th>';
					 $tbl.='<th   valign="middle" bgcolor="#359AFF" width="200" >ORTU</th>';
					 $tbl.='<th   valign="middle" bgcolor="#359AFF" width="100" >NO TELP</th>';
					 $tbl.='<th   valign="middle" bgcolor="#359AFF" width="100" >NO IDENTITAS</th>';
					  $tbl.='</tr>';
				$sql="select pas_aktif,pas_no_rm, pas_nama, pas_sex , pas_tempat_lahir, pas_tgl_lahir, pas_alamat,pas_agama_id, pas_rt, 
  pas_rw, pas_desa_id, pas_kec_id,pas_kab_id, pas_prop_id, pas_pendidikan_id, pas_pekerjaan_id, pas_ortu, 
  pas_telp, pas_meninggal, pas_no_rm_lm, pas_identitas_id, pas_no_identitas, pas_user_act, pas_tgl_act, pas_id, 
  pekerjaan_nama,kec_nama, kel_nama, kota_nama, prov_nama, pend_nama,identitas_nama,agama_nama
from vpasien";
				$data= $this->m_global->grid_view($sql)->result_array();
				$no=1;
				foreach($data as $row){
					$bg=$no%2;
					if($bg==0){$bg=' bgcolor="#E1F0FF" ';}else{$bg=' bgcolor="#FFFFFF" ';}
					
					$tbl.= '
					<tr>
					<td '.$bg.'  align="center" width="30">'.$no.'</td>';
					
					$tbl.='<td '.$bg.'  width="140" >'.$row['pas_no_rm'].'</td>';
					
					$tbl.='<td '.$bg.'  width="250" >'.$row['pas_nama'].'</td>';
					
					$tbl.='<td '.$bg.'  width="50" >'.$row['pas_sex'].'</td>';
					
					$tbl.='<td '.$bg.'  width="120" >'.$row['pas_tgl_lahir'].'</td>';
					
					$tbl.='<td '.$bg.'  width="350" >'.$row['pas_alamat'].'</td>';
					
					$tbl.='<td '.$bg.'  width="50" >'.$row['pas_rt'].'</td>';
					
					$tbl.='<td '.$bg.'  width="50" >'.$row['pas_rw'].'</td>';
					
					$tbl.='<td '.$bg.'  width="200" >'.$row['pas_ortu'].'</td>';
					
					$tbl.='<td '.$bg.'  width="100" >'.$row['pas_telp'].'</td>';
					
					$tbl.='<td '.$bg.'  width="100" >'.$row['pas_no_identitas'].'</td>';
					
					$tbl.='</tr>';
					$no++;
				}
				
				$tbl.='</table>';
				$pdf->AddPage();
				$pdf->SetFont('helvetica', '', 8);
				$pdf->writeHTML($tbl, true, false, false, false, '');
				$pdf->Output('example_048.pdf', 'I');
      }
		 
		function pas_aktif(){
			$data=array();
			$ftr  = element('pas_aktif',$_POST);
			$sql="select agama_id id,agama_nama nama from b_ms_agama where pas_aktif like '%".trim($ftr)."%'";
			
			$hasil = $this->db->query($sql);
			 foreach ($hasil->result_array() as $row)
				 {
					$data[] = $row;
				 }
			echo json_encode($data);
			}
			 }