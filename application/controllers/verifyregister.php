<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class VerifyRegister extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->model('register','',TRUE);
 }

 function index()
 {
   $this->load->library('form_validation');

   $this->form_validation->set_rules('email', 'Email', 'trim|required|min_length[8]|valid_email|callback_check_email');
   $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');
   $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|xss_clean|matches[password]');
   $this->form_validation->set_rules('firstname', 'Username', 'trim|required|xss_clean');
   $this->form_validation->set_rules('lastname', 'Lastname', 'trim|required|xss_clean');
   $this->form_validation->set_rules('hint', 'Hint', 'trim|required|xss_clean');
   if($this->form_validation->run() == FALSE)
   {
     $this->load->view('register_view');
   }
   else
   {
            $this->load->model('register');
            if ($query = $this->register->create_member()) {
                $data['account_created'] = "Your account is created.<br />You may now login.";                
                $this->load->view('login_view', $data);
            } else {
                $this->load->view('register_view');
            }
   }
 }

     function check_email($email){
        $this->db->where('emailaddress', $email);
        $result = $this->db->get('accounts');
        if($result->num_rows() > 0){
			$this->form_validation->set_message('check_email', 'Email address already exists');
			return false;
        } else{
            return true;
        }
    }

}
?>