<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
	class Ms_user_model extends CI_Model { 
		function __construct() {
			parent::__construct();
		}  
		function mgrid07(){
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
						 
						case "user_name":
							$wh .= " and LOWER(user_name) like '%".strtolower($data["data"])."%'";
							break; 
						case "user_pegawai":
							$wh .= " and LOWER(user_pegawai) like '%".strtolower($data["data"])."%'";
							break; 
						case "group_nama":
							$wh .= " and LOWER(group_nama) like '%".strtolower($data["data"])."%'";
							break; 
						case "st_user":
							$wh .= " and LOWER(st_user) like '%".strtolower($data["data"])."%'";
							break; 
						default:
							$wh .= " and " .LOWER($data["field"])." like '".strtolower($data["data"])."%'";
						break;
					}
				}
			} 
		
			$sql="select user_id,user_name,user_pwd,user_group_id, user_pegawai,if(user_aktif=1,'aktif','tidak aktif') st_user,user_aktif,group_id, group_nama from v_user  where group_aktif=1 $wh"; 
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
				$responce->rows[$i]['id']=array($line['user_id'],$line['user_group_id'],$line['user_pwd'],$line['user_aktif']);
				$responce->rows[$i]['cell']=array($line['user_name'],$line['user_pegawai'],$line['group_nama'],$line['st_user']); 
				$i++;
				$no++;
			}
			echo json_encode($responce);
			} 
			
	function proses_simpan07() {
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;
		$data_post=$this->security->xss_clean($_POST);
		 
		$this->form_validation->set_rules('user_name07', 'user name', 'required'); 
		$this->form_validation->set_rules('user_pwd07', 'password', 'required'); 
		$this->form_validation->set_rules('user_pegawai07', 'pegawai', 'required'); 
		$this->form_validation->set_rules('user_group_id07', 'nama group', 'required'); 
		$this->form_validation->set_rules('user_aktif07', 'status', 'required');
		
		if ($this->form_validation->run() == FALSE) {
			if(form_error('user_name07')){
				$data['inputerror'][] = 'user_name07';
				$data['error_string'][] = 'Field user name Harus Diisi';
				$data['status'] = FALSE;
			}
			
			if(form_error('user_pwd07')){
				$data['inputerror'][] = 'user_pwd07';
				$data['error_string'][] = 'Field password Harus Diisi';
				$data['status'] = FALSE;
			}
			
			if(form_error('user_pegawai')){
				$data['inputerror'][] = 'user_pegawai07';
				$data['error_string'][] = 'Field pegawai Harus Diisi';
				$data['status'] = FALSE;
			}
			
			if(form_error('user_group_id07')){
				$data['inputerror'][] = 'user_group_id07';
				$data['error_string'][] = 'Field nama group Harus Diisi';
				$data['status'] = FALSE;
			}
			
			if(form_error('user_aktif07')){
				$data['inputerror'][] = 'user_aktif07';
				$data['error_string'][] = 'Field status Harus Diisi';
				$data['status'] = FALSE;
			}
			
			echo json_encode(array('dt'=>$data));
			exit();
		}
			switch ($data_post["act"]) {
				case 'Simpan':
				$arr_insr_['m_user']['user_name']=$data_post["user_name07"];
					$arr_insr_['m_user']['user_pwd']=$data_post["user_pwd07"];
					$arr_insr_['m_user']['user_group_id']=$data_post["user_group_id07"];
					$arr_insr_['m_user']['user_pegawai']=$data_post["user_pegawai07"];
					$arr_insr_['m_user']['user_aktif']=$data_post["user_aktif07"];
					
			 $sql_q[0]= $this->db->insert_string('m_user', $arr_insr_['m_user']); 
					 
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
				$arr_insr_['m_user']['user_name']=$data_post['user_name07'];
				$arr_insr_['m_user']['user_pwd']=$data_post['user_pwd07'];
				$arr_insr_['m_user']['user_group_id']=$data_post['user_group_id07'];
				$arr_insr_['m_user']['user_pegawai']=$data_post['user_pegawai07'];
				$arr_insr_['m_user']['user_aktif']=$data_post['user_aktif07'];
				
				$where[0] = 'user_id ='.$data_post['user_id07']; 
				$sql_q[0]=  $this->db->update_string('m_user', $arr_insr_['m_user'],$where[0]); 
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
				
					$this->db->where('user_id',$data_post['user_id07']);
					$this->db->delete('m_user');
					
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
		function user_group_id07()
			{
				return $this->m_global->getcombo("select group_id id, group_nama nama from m_group where group_aktif=1","p");
				} 
		
		function excell07(){
			header("Content-type: application/octet-stream");
			header("Content-Disposition: attachment; filename=exceldata.xls");
			header("Pragma: no-cache");
			header("Expires: 0");
			$tbl='';
			$tbl.='
				<h3><u>MASTER USER</u></h3>
				<table border="0"  cellpadding="0" cellspacing="0" >
				 <tr >';
				 $tbl.='<th  align="center" bgcolor="#359AFF" width="30" >NO</th>';
				 $tbl.='<th   valign="middle" bgcolor="#359AFF" width="200" >USER NAME</th>';
					 $tbl.='<th   valign="middle" bgcolor="#359AFF" width="250" >NAMA PEGAWAI</th>';
					 $tbl.='<th   valign="middle" bgcolor="#359AFF" width="180" >NAMA GROUP</th>';
					 $tbl.='<th   valign="middle" bgcolor="#359AFF" width="100" >AKTIF</th>';
					  $tbl.='</tr>';
				$sql="select user_id,user_name,user_pwd,user_group_id, user_pegawai,if(user_aktif=1,'aktif','tidak aktif') st_user,user_aktif,group_id, group_nama from v_user where group_aktif=1";
				$data= $this->m_global->grid_view($sql)->result_array();
				$no=1;
				foreach($data as $row){
					$bg=$no%2;
					if($bg==0){$bg=' bgcolor="#E1F0FF" ';}else{$bg=' bgcolor="#FFFFFF" ';}
					
					$tbl.= '
					<tr>
					<td '.$bg.'  align="center" width="30">'.$no.'</td>';
					
					$tbl.='<td '.$bg.'  width="200" >'.$row['user_name'].'</td>';
					
					$tbl.='<td '.$bg.'  width="250" >'.$row['user_pegawai'].'</td>';
					
					$tbl.='<td '.$bg.'  width="180" >'.$row['group_nama'].'</td>';
					
					$tbl.='<td '.$bg.'  width="100" >'.$row['st_user'].'</td>';
					
					$tbl.='</tr>';
					$no++;
				}
				
				$tbl.='</table>';
				echo $tbl;
			}
		
		
		function export_pdf07() {
			
			$this->load->library('pdf');
			ob_clean();
			$pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
			$tbl='';
			$tbl.='
				<h3><u>MASTER USER</u></h3>
				<table border="0"  cellpadding="0" cellspacing="0" >
				 <tr >';
				 $tbl.='<th  align="center" bgcolor="#359AFF" width="30" >NO</th>';
				 $tbl.='<th   valign="middle" bgcolor="#359AFF" width="200" >USER NAME</th>';
					 $tbl.='<th   valign="middle" bgcolor="#359AFF" width="250" >NAMA PEGAWAI</th>';
					 $tbl.='<th   valign="middle" bgcolor="#359AFF" width="180" >NAMA GROUP</th>';
					 $tbl.='<th   valign="middle" bgcolor="#359AFF" width="100" >AKTIF</th>';
					  $tbl.='</tr>';
				$sql="select user_id,user_name,user_pwd,user_group_id, user_pegawai,if(user_aktif=1,'aktif','tidak aktif') st_user,user_aktif,group_id, group_nama from v_user where group_aktif=1";
				$data= $this->m_global->grid_view($sql)->result_array();
				$no=1;
				foreach($data as $row){
					$bg=$no%2;
					if($bg==0){$bg=' bgcolor="#E1F0FF" ';}else{$bg=' bgcolor="#FFFFFF" ';}
					
					$tbl.= '
					<tr>
					<td '.$bg.'  align="center" width="30">'.$no.'</td>';
					
					$tbl.='<td '.$bg.'  width="200" >'.$row['user_name'].'</td>';
					
					$tbl.='<td '.$bg.'  width="250" >'.$row['user_pegawai'].'</td>';
					
					$tbl.='<td '.$bg.'  width="180" >'.$row['group_nama'].'</td>';
					
					$tbl.='<td '.$bg.'  width="100" >'.$row['st_user'].'</td>';
					
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