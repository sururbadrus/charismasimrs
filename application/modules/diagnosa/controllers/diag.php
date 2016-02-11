   <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
		
        class Diag extends CI_Controller {

        public function __construct() {
                parent::__construct();
               
		
		$this->load->helper("array" ); 
		$this->load->helper("security" ); 
        $this->load->model('m_global');
		$this->load->model('m_diagnosa');
		
            
        }


    function index(){
		
		$data_header=array();
		$data_header=array("edit_txt"=>false,"tree"=>false,"valid"=>true,"jq"=>true,"dt"=>false,"ac"=>false,"dd"=>false,"dp"=>false);
		
		$data_header["tampil_menu"]=$this->session->userdata('menu'); 
		$data_header["profil"] =$this->session->userdata('profil'); 
		$data["status41"]=array(1=>'Aktif',0=>'Tidak Aktif');
		$data_footer['jsku']='js_diagnosa.js';
		
		
		$this->load->view('design/header',$data_header);
        $this->load->view('v_diagnosa',$data);
        $this->load->view('design/footer',$data_footer);
		
    }  
	
		
		function lap_bs41(){
			return $this->m_diagnosa->mgrid();
		}

		function crud() {
			return $this->m_diagnosa->proses_simpan();
		}
		
		
		
		
		
		function excell41(){
			header("Content-type: application/octet-stream");
			header("Content-Disposition: attachment; filename=exceldata.xls");
			header("Pragma: no-cache");
			header("Expires: 0");
			
				$tbl='';
			$tbl.='
				<h3><u>LIST DIAGNOSA</u></h3>
				<table border="0"  cellpadding="0" cellspacing="0" >
				 <tr >';
				 $tbl.='<th  align="center" bgcolor="#359AFF" width="30" >NO</th>';
				 $tbl.='<th   valign="middle" bgcolor="#359AFF" width="70" >KODE</th>';
					 $tbl.='<th   valign="middle" bgcolor="#359AFF" width="400" >DIAGNOSA</th>';
					 $tbl.='<th   valign="middle" bgcolor="#359AFF" width="100" >STATUS</th>';
					  $tbl.='</tr>';
				$sql="select diag_kode,diag_nama, case when diag_aktif=1 then 'aktif' else 'non aktif' end status, diag_aktif, diag_id from  b_ms_diagnosa
";
				$data= $this->m_global->grid_view($sql)->result_array();
				$no=1;
				foreach($data as $row){
					$bg=$no%2;
					if($bg==0){$bg=' bgcolor="#E1F0FF" ';}else{$bg=' bgcolor="#FFFFFF" ';}
					
					$tbl.= '
					<tr>
					<td '.$bg.'  align="center" width="30">'.$no.'</td>';
					
					$tbl.='<td '.$bg.'  width="70" >'.$row['diag_kode'].'</td>';
					
					$tbl.='<td '.$bg.'  width="400" >'.$row['diag_nama'].'</td>';
					
					$tbl.='<td '.$bg.'  width="100" >'.$row['status'].'</td>';
					
					$tbl.='</tr>';
					$no++;
				}
				
				$tbl.='</table>';
				echo $tbl;
			}
		
		
		function export_pdf41() {
			
			$this->load->library('pdf');
			ob_clean();
			$pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
			$tbl='';
			$tbl.='
				<h3><u>LIST DIAGNOSA</u></h3>
				<table border="0"  cellpadding="0" cellspacing="0" >
				 <tr >';
				 $tbl.='<th  align="center" bgcolor="#359AFF" width="30" >NO</th>';
				 $tbl.='<th   valign="middle" bgcolor="#359AFF" width="70" >KODE</th>';
					 $tbl.='<th   valign="middle" bgcolor="#359AFF" width="400" >DIAGNOSA</th>';
					 $tbl.='<th   valign="middle" bgcolor="#359AFF" width="100" >STATUS</th>';
					  $tbl.='</tr>';
				$sql="select diag_kode,diag_nama, case when diag_aktif=1 then 'aktif' else 'non aktif' end status, diag_aktif, diag_id from  b_ms_diagnosa
";
				$data= $this->m_global->grid_view($sql)->result_array();
				$no=1;
				foreach($data as $row){
					$bg=$no%2;
					if($bg==0){$bg=' bgcolor="#E1F0FF" ';}else{$bg=' bgcolor="#FFFFFF" ';}
					
					$tbl.= '
					<tr>
					<td '.$bg.'  align="center" width="30">'.$no.'</td>';
					
					$tbl.='<td '.$bg.'  width="70" >'.$row['diag_kode'].'</td>';
					
					$tbl.='<td '.$bg.'  width="400" >'.$row['diag_nama'].'</td>';
					
					$tbl.='<td '.$bg.'  width="100" >'.$row['status'].'</td>';
					
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