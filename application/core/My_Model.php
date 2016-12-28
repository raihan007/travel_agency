<?php

class MY_Model extends CI_Model {
 
	// will hold the table name of the current instance
	protected $tableName = "";
 
	// this constructor will help us initialize our child classes
	public function __construct($tableName = '')
	{
		$this->tableName = $tableName;
		parent::__construct();
	}

	public function Insert($data = array()){
        if(!array_key_exists("LastChanged",$data)){
            $data['LastChanged'] = date("Y-m-d H:i:s");
        }
        if(!array_key_exists("LastChangedBy",$data)){
            $data['LastChangedBy'] = '5925025E-8C57-48C7-BB68-187A52F26926';
        }
       
        $insert = $this->db->insert($this->tableName,$data);
        if($insert){
            return $this->db->insert_id();
        }else{
            return false;    
        }
    }

    public function GetWhere($details=false,$where = array()){
    	if($details === true) {
            $this->tableName = $this->tableName.'_view';
        }
		$query = $this->db
					->select()
					->from($this->tableName)
					->where($where)
					->get();
		
		if($query->num_rows() > 0)
		{
			return $query->row();
		}
		else 
		{
			return NULL;
		}
	}

	function Update($where = array(), $data = array()) {
	    return $this->db
	    		->where($where)
				->update($this->tableName, $data);
	}

	function Delete($where = array()){
	    return $this->db
	    		->where($where)
				->delete($this->tableName);
	}

    function IsUnique($Where = array(), $WhereNot = array()) {

        $this->db->where($Where);

        if(! empty($WhereNot)) {
        	foreach ($WhereNot as $key => $value) {
        		$this->db->where_not_in($key,$value);
        	}
        }
        return $this->db->get($this->tableName)->num_rows();
        //print_r($this->db->queries); 
        //exit;
    }

    public function GetTotalCount($table)
	{
		$query = $this->db
					->from($table)
					->get();
		
		return $query->num_rows();
	}
 
	public function get_total_count_where($where) {}
 
	public function PermissionStatus($UserId = ''){
		$query = $this->db
					->select('PermissionNo')
					->from('dt_user_permission')
					->where('UserId',$UserId)
					->get();

		$PermissionNo = (int) $query->row('PermissionNo');

		return ($PermissionNo === 0 ? false : true);
	}
 
	public function Get_Next_Entity_No($tableName)
	{
		$Where = array(
			'TABLE_SCHEMA' => 'travel_agency',
			'TABLE_NAME' => $tableName
		);

		$result = $this->db
					->select('AUTO_INCREMENT')
					->from('INFORMATION_SCHEMA.TABLES')
					->where($Where)
					->get();
					
		if($result->row()->AUTO_INCREMENT > 0)
		{
			return $result->row()->AUTO_INCREMENT;
		}
		else 
		{
			return 0;
		}

		/*$sql = "SELECT `AUTO_INCREMENT`
				FROM  INFORMATION_SCHEMA.TABLES
				WHERE TABLE_SCHEMA = 'travel_agency'
				AND   TABLE_NAME   = '$tableName'";

		$result = $this->db->query($sql);

		if($result->row()->AUTO_INCREMENT > 0)
		{
			return $result->row()->AUTO_INCREMENT;
		}
		else 
		{
			return 0;
		}*/
	}

	public function Get_Number_Of_Rows($column = '', $table = '')
	{
		$sql = "SELECT COUNT($column) AS 'Total' FROM $table";
		$result = $this->db->query($sql);

		return $result->row()->Total;
	}

	public function Get_Total_Rows($Where=array(),$table = '')
	{
		$this->db->select("COUNT(*) as 'Total'")
				->where_not_in('IsDeleted', 1);
		if (!empty($Where)) {
			$this->db->like($Where);
		}
		$result = $this->db->get($table);
		if($result->num_rows() > 0)
		{
			return $result->row()->Total;
		}
		else 
		{
			return 0;
		}
	}

	public function Get_Last_Login_By_ID($UserId = '')
	{
		$sql = "SELECT LoginTime FROM access_history WHERE UserId='$UserId' ORDER BY LoginTime DESC LIMIT 1";
		$result = $this->db->query($sql);

		if($result->num_rows() === 1)
		{
			return $result->row()->LoginTime;
		}
		else 
		{
			return array();
		}
	}
 
}