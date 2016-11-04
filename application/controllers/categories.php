<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Categories extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('categorymodel');
	}
	public function index()
	{	
		$data['cats'] = $this->categorymodel->getAll();
		$this->load->view('view_cats', $data);
	}

	public function add()
	{	
		if(!$this->input->post('buttonSubmit'))
		{
			$data['message'] = '';
			$this->load->view('view_addcat', $data);
		}
		else
		{
			//$this->load->library('form_validation');
			if($this->form_validation->run('addcat'))
			{
				$name = $this->input->post('name');
				$this->categorymodel->insert($name);
				redirect('http://localhost/ap3/categories');
			}
			else
			{
				$data['message'] = validation_errors();
				$this->load->view('view_addcat', $data);
			}
		}
	}

	public function edit($cid = 0)
	{	
		if(!$this->input->post('buttonSubmit'))
		{
			$data['message'] = '';
			$cat = $this->categorymodel->get($cid);

			$data['cat'] = $cat;
			$this->load->view('view_editcat', $data);
		}
		else
		{
			if($this->form_validation->run('editcat'))
			{
				$name = $this->input->post('name');
				$id = $this->input->post('cat_id');
				$this->categorymodel->update($name, $id);
				redirect('http://localhost/ap3/categories');
			}
			else
			{
				$data['message'] = validation_errors();
				$this->load->view('view_viewcat', $data);
			}
		}
	}

	public function delete($cid = 0)
	{	

		if(!$this->input->post('buttonSubmit'))
		{
			$data['message'] = '';
			$cat = $this->categorymodel->get($cid);

			$data['cat'] = $cat;
			$this->load->view('view_delcat', $data);
		}
		else
		{
			$this->categorymodel->delete($cid);
			redirect('http://localhost/ap3/categories');
			
		}
	}
}

