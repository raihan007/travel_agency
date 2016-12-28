<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Image extends CI_Controller{

	function __construct() {
		parent::__construct();
	}

	public function Index(){
		if(!$this->input->post('Upload'))
		{
			$data['message'] = '';
		}
		else
		{
			if (!empty($_FILES['Photo']['name'])) {
				$this->load->library('upload');
				$config = array(
					'upload_path' => "Public/Photos",
					'allowed_types' => "jpg|png|jpeg",
					'overwrite' => TRUE,
					'max_size' => "2048000",
					'max_height' => "1000",
					'max_width' => "1600",
					'file_name' => $_FILES['Photo']['name']
					);
					$this->upload->initialize($config);
					$this->upload->do_upload('Photo');
					$data['message'] = $this->upload->data();
			}
			else
			{
				$data['message'] = 'No File Selected!';
			}
		}
		$this->load->view('file_upload_View', $data);
	}
}