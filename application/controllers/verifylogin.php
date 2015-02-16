<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class VerifyLogin extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->model('user','',TRUE);
 }

 function index()
 {
   $this->load->library('form_validation','captcha');

   $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
   $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');
   $this->form_validation->set_rules('captcha', 'Captcha', 'trim|required|xss_clean|callback_check_captcha');

   if($this->form_validation->run() == FALSE)
   {
     $this->load->view('login_view');
   }
   else
   {
     redirect('home', 'refresh');
   }
 }

 function check_database($password)
 {
   $username = $this->input->post('username');
	$captcha = $this->input->post('captcha');
   $result = $this->user->login($username, $password);
   $expiration = time()-7200; // Two hour limit
	$this->db->query("DELETE FROM captcha WHERE captcha_time < ".$expiration);	
	$sql = "SELECT COUNT(*) AS count FROM captcha WHERE word = ? AND ip_address = ? AND captcha_time > ?";
	$binds = array($_POST['captcha'], $this->input->ip_address(), $expiration);
	$query = $this->db->query($sql, $binds);
	$row = $query->row();
	/*if ($row->count == 0)
	{
		echo "You must submit the word that appears in the image";
	} */
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
     $this->form_validation->set_message('check_database', 'Invalid username or password');
     return false;
   }
 }
 
function check_captcha($captcha){
        $this->db->where('word', $captcha);
        $result = $this->db->get('captcha');
        if($result->num_rows() > 0){
			//echo "Email address already exists";
			
			return true;
        } else{
			$this->form_validation->set_message('check_captcha', 'Please enter word same as the image');
            return false;
        }
    }
}
?>