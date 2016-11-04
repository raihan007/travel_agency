<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Citymodel extends CI_Model {

	public function insert($name)
	{
		$path =  getcwd() . '\contents\cities.txt';
		$fp = fopen($path, 'a');
		fwrite($fp, $name);
		fwrite($fp, PHP_EOL);
		fclose($fp);
	}
	public function get()
	{
		$path =  getcwd() . '\contents\cities.txt';
		$fp = fopen($path, 'r');
		$cities = array();
		while(!feof($fp))
		{
			$name = trim(fgets($fp));
			array_push($cities, $name);
		}
		fclose($fp);
		return $cities;
	}
}