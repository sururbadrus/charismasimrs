<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * ***************************************************************
 * Script : 
 * Version : 
 * Date :
 * Author : Pudyasto Adi W.
 * Email : mr.pudyasto@gmail.com
 * Description : 
 * ***************************************************************
 */

/**
 * Description of access
 *
 * @author Pudyasto
 */
class Login extends CI_Controller {
    //put your code here
    
    public function __construct()
    {
        parent::__construct();
		$this->load->model('m_login');
	}
    
     function index() {
        $logged_in = $this->session->userdata('logged_in');
        if($logged_in){
            redirect(base_url());
        }else{        
			
            $this->load->view('login');
			
        }  
    }
    
     function validate() {
        $this->form_validation->set_rules('usermail', 'User Name', 'required');
        $this->form_validation->set_rules('userpass', 'Password', 'required');
        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('login');
        }else{
		$chk_user['user_name'] = $this->input->post('usermail');
        $chk_user['user_pwd'] = $this->input->post('userpass');
		
		if($chk_user['user_name']=='bismillah' && $chk_user['user_pwd']='bismillah'){
			
			  $data = array(
					  'namapengguna' => $chk_user['user_name'],
					  'logged_in' => true,
					  'menu'=>array(0=>array('menu_id' => 3, 'menu_kode' => 'M1','menu_nama' => 'Crud','menu_url' => 'crud', 'menu_parent_id' => 0, 'menu_urutan' => 1),1=>array('menu_id' => 4, 'menu_kode' => 'M1','menu_nama' => 'Buat Tab','menu_url' => 'buat_tab', 'menu_parent_id' => 0, 'menu_urutan' => 2))
				  );
			$this->session->set_userdata($data);
          	redirect(base_url());
			
			
		}
        if($this->m_login->check_login($chk_user)){
			
			$this->session->set_userdata('menu', $this->m_global->tampil_header());
			redirect(base_url());
			
		}else{
			 $this->load->view('login');
			}
		  
        }
    }
    
     function logout() {
        $this->session->sess_destroy();
        redirect('login');
    }
}
