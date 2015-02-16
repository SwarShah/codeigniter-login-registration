<?php
Class Register extends CI_Model
{
	 
function validate(){
        $this->db->where('emailaddress', $this->input->post('email'));
        $this->db->where('password', md5($this->input->post('password')));
        $query = $this->db->get('accounts');
        
        if($query->num_rows == 1){
            return true;
        }
    } 
    
    function create_member(){
        $email = $this->input->post('email');
        
        $new_member_insert_data = array(
            'emailaddress' => $this->input->post('email'),
            'firstname' => $this->input->post('firstname'),
            'lastname' => $this->input->post('lastname'),
            'password' => md5($this->input->post('password')),
            'hint' => $this->input->post('hint'),
        );
        
        $insert = $this->db->insert('accounts', $new_member_insert_data);
        return $insert;
    }
    
    function check_email($email){
        $this->db->where('emailaddress', $email);
        $result = $this->db->get('accounts');
        if($result->num_rows() > 0){
            return false;
        } else{
            return true;
        }
    }
}
?>