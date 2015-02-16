<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class VerifyForget extends CI_Controller {

 function __construct()
 {
   parent::__construct();
		
    $this->load->model('forget','',TRUE);
 }

 function index()
 {
   $this->load->library('form_validation');

   $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
   $this->form_validation->set_rules('hint', 'Hint', 'trim|required|xss_clean|callback_check_database');

   if($this->form_validation->run() == FALSE)
   {
     $this->load->view('forget_view');
   }
   else
   {
     redirect('home', 'refresh');
   }

 }

 function check_database($hint)
 {
   $username = $this->input->post('username');

   $result = $this->forget->forgetPassword($username, $hint);

   if($result)
   {
     $sess_array = array();
     foreach($result as $row)
     {
       $sess_array = array(
         'id' => $row->id,
         'username' => $row->emailaddress,
		 'firstname' => $row->firstname,
		 'lastname' => $row->lastname
       );
       $this->session->set_userdata('logged_in', $sess_array);
     }
     return TRUE;
   }
   else
   {
     $this->form_validation->set_message('check_database', 'Invalid username or hint');
     return false;
   }
 }
}
?>