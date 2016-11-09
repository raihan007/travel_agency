<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ClientModel extends MY_Model {
	private $TableName = 'users_info';
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

	public function GET($SearchKey = array(),$perpage = 0, $page = 0)
	{
		$page = $page-1;
		if ($page<0) { 
			$page = 0;
		}
		$from = $page*$perpage;

		$this->db->select();
		$this->db->from($this->TableName);
		$this->db->where_not_in('IsDeleted', 1);
		if (!empty($SearchKey)) {
			$this->db->like($SearchKey);
		}
		$this->db->order_by('EntityNo', 'ASC');
		$this->db->limit($perpage, $from);
		$result = $this->db->get();
		//echo $this->db->last_query();
		if($result->num_rows() > 0)
		{
			return $result->result_array();
		}
		else 
		{
			return array();
		}
	}

	public function Get_Clients_Name()
	{
		$sql = "SELECT UserId,CONCAT(FirstName,' ',LastName) AS 'FullName' FROM users_info ORDER BY EntityNo";
		$result = $this->db->query($sql);
		
		$return = array();
		if($result->num_rows() > 0) {
			foreach($result->result_array() as $row) {
				$return[$row['UserId']] = $row['FullName'];
			}
		}
        return $return;
	}

	public function Get_By_ID($UserId = '')
	{
		$sql = "SELECT users_info.*,users_access.Username,users_access.Password FROM users_info JOIN users_access ON users_info.UserId = users_access.UserId WHERE users_info.UserId='$UserId'";
		$result = $this->db->query($sql);

		if($result->num_rows() === 1)
		{
			return $result->row_array();
		}
		else 
		{
			return array();
		}
	}

	public function Get_Details($Id = '')
	{
		$sql = "SELECT * FROM users_info WHERE UserID='$Id'";
		$result = $this->db->query($sql);

		if($result->num_rows() === 1)
		{
			return $result->row_array();
		}
		else 
		{
			return array();
		}
	}

	public function Add_New_Client_Info($clientData = array()){
		extract($clientData);
		$sql = "INSERT INTO users_access VALUES (null,'$UserId','$Username','$Password',default)";
		$sql1 = "INSERT INTO users_info VALUES (null,'$UserId','$FirstName','$LastName','$Gender','$Email','$Photo','$PermanentAddress','$PresentAddress','$PhoneNo','$Birthdate','$BloodGroup','$NationalIdNo',default,default)";
		
		$insert = $this->db->query($sql);
		$insert1 = $this->db->query($sql1);
        if($insert && $insert1){
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

	function Delete_Client_info($Data = array()){
		extract($Data);
	    $sql = "UPDATE users_info SET IsDeleted=$IsDeleted WHERE EntityNo=$EntityNo AND UserId='$UserId'";
		
		$insert = $this->db->query($sql);
        if($insert){
            return true;
        }else{
            return false;    
        }
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