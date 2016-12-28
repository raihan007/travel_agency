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

	public function GetAllClient($type='',$search='',$sort='',$order='',$limit='',$offset=''){
		$query = $this->db
					->from($this->TableName)
					->order_by($sort, $order)
					->limit($limit, $offset);
		if($type && $search) {
            $this->db->where($type,$search);
        }

		$query = $this->db->get();
		
		if($query->num_rows() > 0)
		{
			return $query->result_array();
		}
		else 
		{
			return array();
		}
	}

	public function GET($SearchKey = array(),$perpage = 0, $page = 0)
	{
		$page = $page-1;
		if ($page<0) { 
			$page = 0;
		}
		$from = $page*$perpage;

		$this->db->select('ui.*,ua.Email');
		$this->db->from('users_info ui');
		$this->db->join('users_access ua', 'ua.UserId = ui.UserId');
		$this->db->where_not_in('ui.IsDeleted', 1);
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
		$clientData = array(
			'UserId' => $UserId,
			'FirstName' => $FirstName,
	        'LastName' => $LastName,
	      	'Gender' => $Gender,
	       	'Photo' => $Photo,
	       	'PermanentAddress' => $PermanentAddress,
	     	'PresentAddress' => $PresentAddress,
	      	'PhoneNo' => $PhoneNo,
	       	'Birthdate' => $Birthdate,
	      	'BloodGroup' => $BloodGroup,
	      	'NationalIdNo' => $NationalIdNo,
	      	'Type' => $Type
		);

		$AccessData = array(
			'UserId' => $UserId,
			'Username' => $Username,
			'Email' => $Email,
			'Password' => $Password
		);

		$insert = $this->db->insert('users_access',$AccessData);

		$insert1 = $this->db->insert('users_info',$clientData);

        if($insert && $insert1){
            return true;
        }
        return false;
	}

    function Update_Client_Info($clientData = array()) {
	    extract($clientData);

	    $clientData = array(
			'FirstName' => $FirstName,
	        'LastName' => $LastName,
	      	'Gender' => $Gender,
	       	'Photo' => $Photo,
	       	'PermanentAddress' => $PermanentAddress,
	     	'PresentAddress' => $PresentAddress,
	      	'PhoneNo' => $PhoneNo,
	       	'Birthdate' => $Birthdate,
	      	'BloodGroup' => $BloodGroup,
	      	'NationalIdNo' => $NationalIdNo,
	      	'Type' => $Type
		);

		$AccessData = array(
			'UserId' => $UserId,
			'EntityNo' => $EntityNo,
			'Email' => $Email,
		);

		$Where = array(
			'UserId' => $UserId,
			'EntityNo' => $EntityNo
		);
		
		$insert = $this->db
	    		->where($Where)
				->update('users_info', $clientData);

		$insert1 = $this->db
	    		->where($Where)
				->update('users_access', $AccessData);

        if($insert || $insert1 ){
            return true;
        }else{
            return false;    
        }
	}

	function Delete_Client_info($Data = array()){
		extract($Data);
		$UpdateData = array(
			'IsDeleted' => $IsDeleted
		);

		$where = array(
			'UserId' => $UserId,
			'EntityNo' => $EntityNo
		);
	    $sql = $this->db
	    		->where($where)
				->update('users_info', $UpdateData);
		/*echo $this->db->last_query();exit();*/
		$insert = $this->db->query($sql);

        if($insert){
            return true;
        }else{
            return false;    
        }
	}

	public function Get_Where($EntityNo = 0)
	{
		$where = array(
			'ui.EntityNo' => $EntityNo,
			'IsDeleted' => '0'
		);

		$result = $this->db
					->select('ui.*,ua.Username,ua.Email,ua.Password')
					->from('users_info ui')
					->join('users_access ua', 'ua.UserId = ui.UserId')
					->where($where)
					->get();
					
		if($result->num_rows() === 1)
		{
			return $result->row_array();
		}
		else 
		{
			return array();
		}
	}

}