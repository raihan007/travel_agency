<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Productmodel extends CI_Model {

	public function insert($name,$price,$quantity,$catId)
	{
		$sql = "INSERT INTO products VALUES (null, '$name',$price,$quantity,$catId)";
		$this->load->database();
		$this->db->query($sql);
	}
	public function getAll()
	{
		$sql = "SELECT products.p_id,products.p_name,products.price,products.quantity,categories.cat_name FROM products join categories where products.cat_id=categories.cat_id";
		$this->load->database();
		$result = $this->db->query($sql);
		return $result->result_array();
	}

	public function get($id)
	{
		$sql = "SELECT products.p_id,products.p_name,products.price,products.quantity,categories.cat_name FROM products join categories where p_id=$id AND products.cat_id=categories.cat_id";
		$this->load->database();
		$result = $this->db->query($sql);
		return $result->row_array();
	}

	public function update($name,$price,$quantity,$catId,$id)
	{
		$sql = "UPDATE products SET p_name='$name', price=$price, quantity=$quantity, cat_id=$catId WHERE p_id=$id";
		$this->load->database();
		$this->db->query($sql);
	}
	public function delete($id)
	{
		$sql = "DELETE FROM products WHERE p_id=$id";
		$this->load->database();
		$this->db->query($sql);
	}
}