<?php

class LoginModel extends MY_Model {
	
	function __construct() {
		parent::__construct('users_access');
	}

	public function checkUserAccess($Username,$Password)
	{
		$result = $this->db->select()
	    				->where('Email', $Username)
						->or_where('Username', $Username)
        				->limit(1)
	    				->get($this->tableName);
	    if($result->num_rows() > 0)
		{
			$dencryptPass = $this->encrypt->decode($result->row()->Password);
			if($dencryptPass === $Password)
			{
				$UserId = $result->row()->UserId;
				$insert = $this->db->insert('access_history',array('EntityNo' => null,'UserId' => $UserId,'LoginTime' => 'default'));

				$LoginData = array(
				    'UserId'   => $UserId,
				  	'UserName' => $result->row()->Username,
				  	'Email' => $result->row()->Email,
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
		$users_access = array('EntityNo' => null, 'UserId' => $UserId, 'Email' => $Email, 'Username' => $Username, 'Password' => $Password, 'Role' => $Role);

		$users_info = array('EntityNo' => null, 'UserId' => $UserId, 'FirstName' => $FirstName, 'LastName' => $LastName, 'Gender' => $Gender, 'Photo' => $Photo, 'PermanentAddress' => $PermanentAddress,'PresentAddress' => $PresentAddress,'PhoneNo' => $PhoneNo,'Birthdate' => $Birthdate,'BloodGroup' => $BloodGroup,'NationalIdNo' => $NationalIdNo,'Type' => $Type,'IsDeleted' => 'default');
		
		$insert = $this->db->insert('users_access',$users_access);
		$insert1 = $this->db->insert('users_info',$users_info);
        if($insert && $insert1){
            return true;
        }else{
            return false;    
        }
	}

}