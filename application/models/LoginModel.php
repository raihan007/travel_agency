<?php

class LoginModel extends MY_Model {
	
	function __construct() {
		parent::__construct();
	}

	public function checkUserAccess($Username,$Password)
	{
		$sql = "SELECT * FROM users_access WHERE username='$Username'";
		$result = $this->db->query($sql);

		if($result->num_rows() > 0)
		{
			$dencryptPass = $this->encrypt->decode($result->row()->Password);
			if($dencryptPass === $Password)
			{
				$UserId = $result->row()->UserId;
				$sql = "INSERT INTO access_history VALUES (null,'$UserId',default)";
				$this->db->query($sql);

				$LoginData = array(
				    'UserId'   => $UserId,
				  	'UserName' => $result->row()->Username,
				  	'UserRole' => $result->row()->Role
				);

				$this->session->set_userdata($LoginData);
				return true;
			}
		}
		return false;
	}

	public function Add_New_Client($clientData = array()){
		extract($clientData);
		$sql = "INSERT INTO users_access VALUES (null,'$UserId','$Username','$Password',default)";
		$sql1 = "INSERT INTO users_info VALUES (null,'$UserId','$FirstName','$LastName','$Gender','$Email','$Photo','$PermanentAddress','$PresentAddress','$PhoneNo','$Birthdate','$BloodGroup','$NationalIdNo',default)";
		
		$insert = $this->db->query($sql);
		$insert1 = $this->db->query($sql1);
        if($insert && $insert1){
            return true;
        }else{
            return false;    
        }
	}

}