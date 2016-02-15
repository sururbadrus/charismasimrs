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
	}
    
     function index() {
        $logged_in = $this->session->userdata('logged_in');
        if($logged_in){
            redirect("crud");
        }else{        
			
            $this->load->view('login');
			
        }  
    }
    
     function validate() {
        $this->form_validation->set_rules('usermail', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('userpass', 'Password', 'required');
        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('login');
        }else{
		$usermail = $this->input->post('usermail');
        $userpass = $this->input->post('userpass');
			$data = array(
                'namapengguna' => $usermail,
                'logged_in' => true
            );
        $this->session->set_userdata($data);
          redirect(base_url('crud'));
            
        }
    }
    
     function logout() {
        $this->session->sess_destroy();
        redirect('login');
    }
}
