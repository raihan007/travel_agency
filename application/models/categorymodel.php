<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Categorymodel extends CI_Model {

	public function insert($name)
	{
		$sql = "INSERT INTO categories VALUES (null, '$name')";
		$this->load->database();
		$this->db->query($sql);
	}
	public function getAll()
	{
		$sql = "SELECT * FROM categories";
		$this->load->database();
		$result = $this->db->query($sql);
		return $result->result_array();
	}
	public function get($id)
	{
		$sql = "SELECT * FROM categories WHERE cat_id=$id";
		$this->load->database();
		$result = $this->db->query($sql);
		return $result->row_array();
	}

	public function update($name, $id)
	{
		$sql = "UPDATE categories SET cat_name='$name' WHERE cat_id=$id";
		$this->load->database();
		$this->db->query($sql);
	}
	public function delete($id)
	{
		$sql = "DELETE FROM categories WHERE cat_id=$id";
		$this->load->database();
		$this->db->query($sql);
	}
}