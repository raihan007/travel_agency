<?php

class MY_Model extends CI_Model {
 
	// will hold the table name of the current instance
	var $tableName = "";
 
	// this constructor will help us initialize our child classes
	public function __construct($tableName = '')
	{
		$this->tableName = $tableName;
		parent::__construct();
	}
 
	public function Get_Next_Entity_No($tableName)
	{
		$sql = "SELECT `AUTO_INCREMENT`
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
		}
	}

	public function Get_Number_Of_Rows($column = '', $table = '')
	{
		$sql = "SELECT COUNT($column) AS 'Total' FROM $table";
		$result = $this->db->query($sql);

		return $result->row()->Total;
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