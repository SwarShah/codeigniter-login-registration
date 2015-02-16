<?php
Class Forget extends CI_Model
{

 	function forgetPassword($username, $hint)
	{
		$this -> db -> select('id, emailaddress, hint, firstname, lastname');
		$this -> db -> from('accounts');
		$this -> db -> where('emailaddress', $username);
		$this -> db -> where('hint', $hint);
		$this -> db -> limit(1);
		$query = $this -> db -> get();
		if($query -> num_rows() == 1)
		{
		 return $query->result();
		}
		else
		{
		 return false;
		}
	}
}
?>