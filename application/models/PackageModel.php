<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class PackageModel extends MY_Model {
	
	function __construct() {
		parent::__construct();
	}

	public function Get_Packages_List($limit = 0, $offset = 0)
	{
		$sql = "SELECT * FROM packages_info WHERE NOT IsDeleted=1 AND BookingLastDate >= NOW() ORDER BY EntityNo LIMIT $limit OFFSET $offset";
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

	public function Get_Packages_Title()
	{
		$sql = "SELECT ID,Title FROM packages_info WHERE NOT IsDeleted=1 AND BookingLastDate >= NOW() ORDER BY EntityNo";
		$result = $this->db->query($sql);
		
		$return = array();
		if($result->num_rows() > 0) {
			foreach($result->result_array() as $row) {
				$return[$row['ID']] = $row['Title'];
			}
		}
        return $return;
	}

	public function Get_By_ID($Id = 0)
	{
		$sql = "SELECT * FROM packages_info WHERE EntityNo=$Id";
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
		$sql = "SELECT * FROM packages_info WHERE ID='$Id'";
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

	public function Get_Images($Id = '')
	{
		$sql = "SELECT GROUP_CONCAT(packages_photos_info.FileName) AS 'Images' FROM packages_photos_info WHERE packages_photos_info.ID='$Id' GROUP BY packages_photos_info.ID";
		$result = $this->db->query($sql);

		if($result->num_rows() === 1)
		{
			return $result->row()->Images;
		}
		else 
		{
			return '';
		}
	}

	public function Add_New_Package_Info($PackageData = array())
	{
		extract($PackageData);
		$sql = "INSERT INTO packages_info  VALUES (null,'$ID','$Title',$Gallery,$Cost,'$Type',$Discount,'$Remarks','$BookingLastDate',DEFAULT)";
		$insert = $this->db->query($sql);
        if($insert){
            return true;
        }
        return false;
	}

	public function Add_Package_Photos($PackageId = '',$images = array())
	{
		$sql = "INSERT INTO packages_photos_info  VALUES ";
		$query_parts = array();
		foreach ($images as $value) {
			$query_parts[] = "(null,'$PackageId','$value')";
		}
		$sql .= implode(',', $query_parts);
		$insert = $this->db->query($sql);
        if($insert){
            return true;
        }
        return false;
	}

    function Update_Package_Info($PackageData = array()) {
	    extract($PackageData);
		$sql = "UPDATE Packages_info SET Title='$Title',Gallery='$Gallery',Type='$Type',Cost=$Cost,Discount=$Discount,Remarks='$Remarks' WHERE EntityNo=$EntityNo AND ID='$ID'";
		
		$insert = $this->db->query($sql);
        if($insert){
            return true;
        }else{
            return false;    
        }
	}

	function Delete_Package_info($PackageData = array()){
		extract($PackageData);
	    $sql = "UPDATE Packages_info SET IsDeleted=$IsDeleted WHERE EntityNo=$EntityNo AND ID='$ID'";
		
		$insert = $this->db->query($sql);
        if($insert){
            return true;
        }else{
            return false;    
        }
	}
}