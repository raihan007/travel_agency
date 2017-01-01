<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class BookingModel extends MY_Model {
	
	function __construct() {
		parent::__construct();
	}

	public function Get_Booking_List($limit = 0, $offset = 0)
	{
		$sql = "SELECT * FROM booking_info_view ORDER BY EntityNo LIMIT $limit OFFSET $offset";
		$result = $this->db->query($sql);
		
		if($result->num_rows() > 0)
		{
			return $result->result_array();
		}
		else 
		{
			return 0;
		}
	}

	public function Get_Client_Booking_List($id = '')
	{
		$sql = "SELECT * FROM booking_info_view WHERE ClientId='$id' ORDER BY EntityNo";
		$result = $this->db->query($sql);
		
		if($result->num_rows() > 0)
		{
			return $result->result_array();
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

		$this->db->select();
		$this->db->from('booking_info_view');
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

	public function GET_SUM($where = array(),$perPage = 0, $page = 0)
	{
		$page = $page-1;
		if ($page<0) { 
			$page = 0;
		}
		$from = $page*$perPage;

		$sql = "SELECT SUM(TotalCost) FROM (SELECT booking_info_view.TotalCost FROM booking_info_view ORDER BY booking_info_view.EntityNo ASC LIMIT $perPage OFFSET $from) AS GrandTotal";
		if($perPage === 0 && $page === 0){
			$sql = "SELECT SUM(TotalCost) FROM booking_info_view ORDER BY EntityNo ASC";
		}
		$result = $this->db->query($sql);
		
		if($result->num_rows() > 0)
		{
			return $result->row_array();
		}
		else 
		{
			return 0;
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
		$where = array(
			'EntityNo' => $Id
		);

		$result = $this->db
					->select()
					->from('packages_booking_info')
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

	public function Add_New_Booking_Info($BookingData = array())
	{
		extract($BookingData);
		$sql = "INSERT INTO packages_booking_info VALUES (null,'$PackageId',$Quantity,$TotalCost,'$ClientId','$Date')";
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

    function Update_Booking_Info($Data = array()) {
	    extract($Data);
		$sql = "UPDATE Packages_booking_info SET PackageId='$PackageId',Quantity=$Quantity,TotalCost=$TotalCost,ClientId='$ClientId',Date='$Date' WHERE EntityNo=$EntityNo";
		
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