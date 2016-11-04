<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SettingsModel extends MY_Model {
	
	function __construct() {
		parent::__construct();
	}

	public function Get_Clients_List($limit = 0, $offset = 0)
	{
		$sql = "SELECT * FROM users_info ORDER BY EntityNo LIMIT $limit OFFSET $offset";
		$result = $this->db->query($sql);
		
		if($result->num_rows() > 0)
		{
			return $result->result_array();
		}
		else 
		{
			return NULL;
		}
	}

	public function getEmpById($EntityNo)
	{
		$this->load->database();
		$this->db->where('EntityNo',$EntityNo);
		$query = $this->db->get('users_info');
		
		if($query->num_rows() > 0)
		{
			return $query->row();
		}
		else 
		{
			return NULL;
		}
	}

	public function Change_Password($UserId = '',$Password = ''){
		$sql = "UPDATE users_access SET Password='$Password' WHERE UserId='$UserId'";
		$insert = $this->db->query($sql);
        if($insert){
            return true;
        }
        return false;
	}

	public function Change_Username($UserId = '',$Username = ''){
		$sql = "UPDATE users_access SET Username='$Username' WHERE UserId='$UserId'";
		$insert = $this->db->query($sql);
        if($insert){
        	$this->session->set_userdata('UserName',$Username);
            return true;
        }
        return false;
	}

    function Update_Client_Info($clientData = array()) {
	    extract($clientData);
		$sql = "UPDATE users_info SET FirstName='$FirstName',LastName='$LastName',Gender='$Gender',Email='$Email',Photo='$Photo',PermanentAddress='$PermanentAddress',PresentAddress='$PresentAddress',PhoneNo='$PhoneNo',Birthdate='$Birthdate',BloodGroup='$BloodGroup',NationalIdNo='$NationalIdNo',Type='$Type' WHERE EntityNo=$EntityNo AND UserId='$UserId'";
		
		$insert = $this->db->query($sql);
        if($insert){
            return true;
        }else{
            return false;    
        }
	}

	function _deleteRowWhere($table, $EntityNo) {
	    return $this->db
	    		->where('EntityNo',$EntityNo)
				->delete($table);
	}

	public function Get_Where($EntityNo = 0){

		$sql = "SELECT * FROM users_info WHERE EntityNo=$EntityNo";
		$result = $this->db->query($sql);
		
		if($result->num_rows() > 0)
		{
			return $result->row_array();
		}
		else 
		{
			return NULL;
		}
	}

}