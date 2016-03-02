                            <?php if (!defined('BASEPATH')) exit('No direct script access allowed');
	class Perusahaan_model extends CI_Model { 
		function __construct() {
			parent::__construct();
		}  
		function mgrid42(){
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
						 
						case "per_nama":
							$wh .= " and LOWER(per_nama) like '%".strtolower($data["data"])."%'";
							break; 
						case "kota_nama":
							$wh .= " and LOWER(kota_nama) like '%".strtolower($data["data"])."%'";
							break; 
						case "per_alamat":
							$wh .= " and LOWER(per_alamat) like '%".strtolower($data["data"])."%'";
							break; 
						case "per_notlp":
							$wh .= " and LOWER(per_notlp) like '%".strtolower($data["data"])."%'";
							break; 
						case "per_fax":
							$wh .= " and LOWER(per_fax) like '%".strtolower($data["data"])."%'";
							break; 
						case "per_dir":
							$wh .= " and LOWER(per_dir) like '%".strtolower($data["data"])."%'";
							break; 
						case "kategori_nama":
							$wh .= " and LOWER(kategori_nama) like '%".strtolower($data["data"])."%'";
							break; 
						case "seksi_nama":
							$wh .= " and LOWER(seksi_nama) like '%".strtolower($data["data"])."%'";
							break; 
						case "parent_utama":
							$wh .= " and LOWER(parent_utama) like '%".strtolower($data["data"])."%'";
							break; 
						default:
							$wh .= " and " .LOWER($data["field"])." like '".strtolower($data["data"])."%'";
						break;
					}
				}
			} 
		
			$sql="select perusahaan.per_nama, m_kota.kota_nama, perusahaan.per_alamat, perusahaan.per_notlp, perusahaan.per_fax, perusahaan.per_dir, perusahaan.per_kp, perusahaan.per_jkp, perusahaan.per_notlp_kp, m_kategori.kategori_nama, m_seksi.seksi_nama, m_struktur.parent_utama , perusahaan.per_id,per_kota_id,per_seksi_id,per_kategori_id
from perusahaan left join m_kota on (perusahaan.per_kota_id = m_kota.kota_id) left join m_kategori on (perusahaan.per_kategori_id = m_kategori.kategori_id) left join m_seksi on (perusahaan.per_seksi_id = m_seksi.seksi_id) left join m_struktur on (perusahaan.per_kode = m_struktur.struktur_id)
  where 0=0 $wh"; 
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
				$responce->rows[$i]['id']=array($line['per_id'],$line['per_kp'],$line['per_jkp'],$line['per_notlp_kp'],$line['per_kota_id'],$line['per_seksi_id'],$line['per_kategori_id']);
				$responce->rows[$i]['cell']=array($line['per_nama'],$line['kota_nama'],$line['per_alamat'],$line['per_notlp'],$line['per_fax'],$line['per_dir'],$line['kategori_nama'],$line['seksi_nama'],$line['parent_utama']); 
				$i++;
				$no++;
			}
			echo json_encode($responce);
			} 
			
		function proses_simpan42() {
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;
		$data_post=$this->security->xss_clean($_POST);
		 
		$this->form_validation->set_rules('per_nama42', 'perusahaan', 'required'); 
		$this->form_validation->set_rules('per_kota_id42', 'kota', 'required'); 
		$this->form_validation->set_rules('per_alamat42', 'alamat', 'required'); 
		$this->form_validation->set_rules('per_notlp42', 'notlp', 'required'); 
		$this->form_validation->set_rules('per_fax42', 'nofax', 'required'); 
		$this->form_validation->set_rules('per_dir42', 'direktur', 'required'); 
		$this->form_validation->set_rules('per_kp42', 'kontak person', 'required'); 
		$this->form_validation->set_rules('per_jkp42', 'jabatan kontak person', 'required'); 
		$this->form_validation->set_rules('per_notlp_kp42', 'no tlp kp', 'required'); 
		$this->form_validation->set_rules('per_kategori_id42', 'kategori', 'required'); 
		$this->form_validation->set_rules('per_seksi_id42', 'seksi', 'required'); 
		$this->form_validation->set_rules('per_kode42', 'kode kbli', 'required');
		
		if ($this->form_validation->run() == FALSE) {
			if(form_error('per_nama')){
				
				$data['inputerror'][] = 'per_nama42';
				$data['error_string'][] = 'Field perusahaan Harus Diisi';
				$data['status'] = FALSE;
				
				}
			
			if(form_error('per_kota_id')){
				
				$data['inputerror'][] = 'per_kota_id42';
				$data['error_string'][] = 'Field kota Harus Diisi';
				$data['status'] = FALSE;
				
				}
			
			if(form_error('per_alamat')){
				
				$data['inputerror'][] = 'per_alamat42';
				$data['error_string'][] = 'Field alamat Harus Diisi';
				$data['status'] = FALSE;
				
				}
			
			if(form_error('per_notlp')){
				
				$data['inputerror'][] = 'per_notlp42';
				$data['error_string'][] = 'Field notlp Harus Diisi';
				$data['status'] = FALSE;
				
				}
			
			if(form_error('per_fax')){
				
				$data['inputerror'][] = 'per_fax42';
				$data['error_string'][] = 'Field nofax Harus Diisi';
				$data['status'] = FALSE;
				
				}
			
			if(form_error('per_dir')){
				
				$data['inputerror'][] = 'per_dir42';
				$data['error_string'][] = 'Field direktur Harus Diisi';
				$data['status'] = FALSE;
				
				}
			
			if(form_error('per_kp')){
				
				$data['inputerror'][] = 'per_kp42';
				$data['error_string'][] = 'Field kontak person Harus Diisi';
				$data['status'] = FALSE;
				
				}
			
			if(form_error('per_jkp')){
				
				$data['inputerror'][] = 'per_jkp42';
				$data['error_string'][] = 'Field jabatan kontak person Harus Diisi';
				$data['status'] = FALSE;
				
				}
			
			if(form_error('per_notlp_kp')){
				
				$data['inputerror'][] = 'per_notlp_kp42';
				$data['error_string'][] = 'Field no tlp kp Harus Diisi';
				$data['status'] = FALSE;
				
				}
			
			if(form_error('per_kategori_id')){
				
				$data['inputerror'][] = 'per_kategori_id42';
				$data['error_string'][] = 'Field kategori Harus Diisi';
				$data['status'] = FALSE;
				
				}
			
			if(form_error('per_seksi_id')){
				
				$data['inputerror'][] = 'per_seksi_id42';
				$data['error_string'][] = 'Field seksi Harus Diisi';
				$data['status'] = FALSE;
				
				}
			
			if(form_error('per_kode')){
				
				$data['inputerror'][] = 'per_kode42';
				$data['error_string'][] = 'Field kode kbli Harus Diisi';
				$data['status'] = FALSE;
				
				}
			
			echo json_encode(array('dt'=>$data));
			exit();
		}
			
			
			switch ($data_post["act"]) {
				case 'Simpan':
				
					$arr_insr_['per_nama']=$data_post["per_nama42"];
					
					$arr_insr_['per_kota_id']=$data_post["per_kota_id42"];
					
					$arr_insr_['per_alamat']=$data_post["per_alamat42"];
					
					$arr_insr_['per_notlp']=$data_post["per_notlp42"];
					
					$arr_insr_['per_fax']=$data_post["per_fax42"];
					
					$arr_insr_['per_dir']=$data_post["per_dir42"];
					
					$arr_insr_['per_kp']=$data_post["per_kp42"];
					
					$arr_insr_['per_jkp']=$data_post["per_jkp42"];
					
					$arr_insr_['per_notlp_kp']=$data_post["per_notlp_kp42"];
					
					$arr_insr_['per_kategori_id']=$data_post["per_kategori_id42"];
					
					$arr_insr_['per_seksi_id']=$data_post["per_seksi_id42"];
					
					$arr_insr_['per_kode']=$data_post["per_kode42"];
					
			 $sql_q[0]= $this->db->insert_string('perusahaan', $arr_insr_); 
					 
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
					$arr_insr_['per_nama']=$data_post['per_nama42'];
				
				$arr_insr_['per_kota_id']=$data_post['per_kota_id42'];
				
				$arr_insr_['per_alamat']=$data_post['per_alamat42'];
				
				$arr_insr_['per_notlp']=$data_post['per_notlp42'];
				
				$arr_insr_['per_fax']=$data_post['per_fax42'];
				
				$arr_insr_['per_dir']=$data_post['per_dir42'];
				
				$arr_insr_['per_kp']=$data_post['per_kp42'];
				
				$arr_insr_['per_jkp']=$data_post['per_jkp42'];
				
				$arr_insr_['per_notlp_kp']=$data_post['per_notlp_kp42'];
				
				$arr_insr_['per_kategori_id']=$data_post['per_kategori_id42'];
				
				$arr_insr_['per_seksi_id']=$data_post['per_seksi_id42'];
				
				$arr_insr_['per_kode']=$data_post['per_kode 42'];
				
				
				$where[0] = 'per_id ='.$data_post['per_id42']; 
				$sql_q[0]=  $this->db->update_string('perusahaan', $arr_insr_,$where[0]); 
					 
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
				
					$this->db->where('per_id',$data_post['per_id42']);
					$this->db->delete('perusahaan');
					 
				echo json_encode(array('ket'=>"Hapus Data Berhasil",'dt'=>$data)) ;
				break;
			}
	} 
		
		function excell42(){
			header("Content-type: application/octet-stream");
			header("Content-Disposition: attachment; filename=exceldata.xls");
			header("Pragma: no-cache");
			header("Expires: 0");
			$tbl='';
			$tbl.='
				<h3><u>LIST PERUSAHAAN</u></h3>
				<table border="0"  cellpadding="0" cellspacing="0" >
				 <tr >';
				 $tbl.='<th  align="center" bgcolor="#359AFF" width="30" >NO</th>';
				 $tbl.='<th   valign="middle" bgcolor="#359AFF" width="170" >NAMA PERUSAHAAN</th>';
					 $tbl.='<th   valign="middle" bgcolor="#359AFF" width="150" >NAMA KOTA</th>';
					 $tbl.='<th   valign="middle" bgcolor="#359AFF" width="210" >ALAMAT</th>';
					 $tbl.='<th   valign="middle" bgcolor="#359AFF" width="100" >NOTLP</th>';
					 $tbl.='<th   valign="middle" bgcolor="#359AFF" width="100" >NO FAX</th>';
					 $tbl.='<th   valign="middle" bgcolor="#359AFF" width="150" >NAMA DIR</th>';
					 $tbl.='<th   valign="middle" bgcolor="#359AFF" width="150" >KATEGORI_NAMA</th>';
					 $tbl.='<th   valign="middle" bgcolor="#359AFF" width="150" >SEKSI_NAMA</th>';
					 $tbl.='<th   valign="middle" bgcolor="#359AFF" width="100" >PARENT_UTAMA</th>';
					  $tbl.='</tr>';
				$sql="select perusahaan.per_nama, m_kota.kota_nama, perusahaan.per_alamat, perusahaan.per_notlp, perusahaan.per_fax, perusahaan.per_dir, perusahaan.per_kp, perusahaan.per_jkp, perusahaan.per_notlp_kp, m_kategori.kategori_nama, m_seksi.seksi_nama, m_struktur.parent_utama , perusahaan.per_id,,per_kota_id,per_seksi_id,per_kategori_id
from perusahaan left join m_kota on (perusahaan.per_kota_id = m_kota.kota_id) left join m_kategori on (perusahaan.per_kategori_id = m_kategori.kategori_id) left join m_seksi on (perusahaan.per_seksi_id = m_seksi.seksi_id) left join m_struktur on (perusahaan.per_kode = m_struktur.struktur_id)
";
				$data= $this->m_global->grid_view($sql)->result_array();
				$no=1;
				foreach($data as $row){
					$bg=$no%2;
					if($bg==0){$bg=' bgcolor="#E1F0FF" ';}else{$bg=' bgcolor="#FFFFFF" ';}
					
					$tbl.= '
					<tr>
					<td '.$bg.'  align="center" width="30">'.$no.'</td>';
					
					$tbl.='<td '.$bg.'  width="170" >'.$row['per_nama'].'</td>';
					
					$tbl.='<td '.$bg.'  width="150" >'.$row['kota_nama'].'</td>';
					
					$tbl.='<td '.$bg.'  width="210" >'.$row['per_alamat'].'</td>';
					
					$tbl.='<td '.$bg.'  width="100" >'.$row['per_notlp'].'</td>';
					
					$tbl.='<td '.$bg.'  width="100" >'.$row['per_fax'].'</td>';
					
					$tbl.='<td '.$bg.'  width="150" >'.$row['per_dir'].'</td>';
					
					$tbl.='<td '.$bg.'  width="150" >'.$row['kategori_nama'].'</td>';
					
					$tbl.='<td '.$bg.'  width="150" >'.$row['seksi_nama'].'</td>';
					
					$tbl.='<td '.$bg.'  width="100" >'.$row['parent_utama'].'</td>';
					
					$tbl.='</tr>';
					$no++;
				}
				
				$tbl.='</table>';
				echo $tbl;
			}
		
		
		function export_pdf42() {
			
			$this->load->library('pdf');
			ob_clean();
			$pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
			$tbl='';
			$tbl.='
				<h3><u>LIST PERUSAHAAN</u></h3>
				<table border="0"  cellpadding="0" cellspacing="0" >
				 <tr >';
				 $tbl.='<th  align="center" bgcolor="#359AFF" width="30" >NO</th>';
				 $tbl.='<th   valign="middle" bgcolor="#359AFF" width="170" >NAMA PERUSAHAAN</th>';
					 $tbl.='<th   valign="middle" bgcolor="#359AFF" width="150" >NAMA KOTA</th>';
					 $tbl.='<th   valign="middle" bgcolor="#359AFF" width="210" >ALAMAT</th>';
					 $tbl.='<th   valign="middle" bgcolor="#359AFF" width="100" >NOTLP</th>';
					 $tbl.='<th   valign="middle" bgcolor="#359AFF" width="100" >NO FAX</th>';
					 $tbl.='<th   valign="middle" bgcolor="#359AFF" width="150" >NAMA DIR</th>';
					 $tbl.='<th   valign="middle" bgcolor="#359AFF" width="150" >KATEGORI_NAMA</th>';
					 $tbl.='<th   valign="middle" bgcolor="#359AFF" width="150" >SEKSI_NAMA</th>';
					 $tbl.='<th   valign="middle" bgcolor="#359AFF" width="100" >PARENT_UTAMA</th>';
					  $tbl.='</tr>';
				$sql="select perusahaan.per_nama, m_kota.kota_nama, perusahaan.per_alamat, perusahaan.per_notlp, perusahaan.per_fax, perusahaan.per_dir, perusahaan.per_kp, perusahaan.per_jkp, perusahaan.per_notlp_kp, m_kategori.kategori_nama, m_seksi.seksi_nama, m_struktur.parent_utama , perusahaan.per_id,,per_kota_id,per_seksi_id,per_kategori_id
from perusahaan left join m_kota on (perusahaan.per_kota_id = m_kota.kota_id) left join m_kategori on (perusahaan.per_kategori_id = m_kategori.kategori_id) left join m_seksi on (perusahaan.per_seksi_id = m_seksi.seksi_id) left join m_struktur on (perusahaan.per_kode = m_struktur.struktur_id)
";
				$data= $this->m_global->grid_view($sql)->result_array();
				$no=1;
				foreach($data as $row){
					$bg=$no%2;
					if($bg==0){$bg=' bgcolor="#E1F0FF" ';}else{$bg=' bgcolor="#FFFFFF" ';}
					
					$tbl.= '
					<tr>
					<td '.$bg.'  align="center" width="30">'.$no.'</td>';
					
					$tbl.='<td '.$bg.'  width="170" >'.$row['per_nama'].'</td>';
					
					$tbl.='<td '.$bg.'  width="150" >'.$row['kota_nama'].'</td>';
					
					$tbl.='<td '.$bg.'  width="210" >'.$row['per_alamat'].'</td>';
					
					$tbl.='<td '.$bg.'  width="100" >'.$row['per_notlp'].'</td>';
					
					$tbl.='<td '.$bg.'  width="100" >'.$row['per_fax'].'</td>';
					
					$tbl.='<td '.$bg.'  width="150" >'.$row['per_dir'].'</td>';
					
					$tbl.='<td '.$bg.'  width="150" >'.$row['kategori_nama'].'</td>';
					
					$tbl.='<td '.$bg.'  width="150" >'.$row['seksi_nama'].'</td>';
					
					$tbl.='<td '.$bg.'  width="100" >'.$row['parent_utama'].'</td>';
					
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