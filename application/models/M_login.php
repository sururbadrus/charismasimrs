<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_login extends CI_Model {

	function __construct() {
        parent::__construct();
		
    }
	function total_row($q) {
		$query = $this->db->query($q);
        return $query->num_rows(); 
    }
	function check_login($field =array()) {
		$sql="SELECT user_id, user_name, user_pwd, user_group_id, user_pegawai FROM sps_ms_user WHERE user_aktif=1 AND user_name='".$field['user_name']."' AND user_pwd=MD5('".$field['user_pwd']."')";
		$sql1="SELECT profil_id, profil_kode,profil_pusk, profil_tipe, profil_jenis, profil_pustu_id,profil_alamat, profil_tlp, profil_fax, profil_email,profil_kontak, profil_kec, profil_kode_wil, profil_kab, profil_pem, profil_nip, profil_max, profil_logo,profil_kec_id FROM sps_ms_profil";
		
		$hsl=0;		
		if($this->total_row($sql)>0){
			$hsl=1;
			$this->set_session($sql);
			$this->set_session($sql1);
			$this->session->set_userdata('logged_in', true);
			$this->session->set_userdata('namapengguna',$field['user_name']);
		}
		 return $hsl;
    }
	
	function set_session($q='',$un=''){
		$session_login=$this->db->query($q)->row_array();
		
		foreach($session_login as $in=>$val){
			$this->session->set_userdata($in, $val);
			
		}
		
		}

	
		
}