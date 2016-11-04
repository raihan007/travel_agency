<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Products extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('productmodel');
		$this->load->model('categorymodel');
	}
	public function index()
	{	
		$data['products'] = $this->productmodel->getAll();
		$this->load->view('view_products', $data);
	}

	public function add()
	{	
		$data['cats'] = $this->categorymodel->getAll();
		if(!$this->input->post('buttonSubmit'))
		{
			$data['message'] = '';
			$this->load->view('view_addproduct', $data);
		}
		else
		{
			//$this->load->library('form_validation');
			if($this->form_validation->run('addpro'))
			{
				$name = $this->input->post('name');
				$price = $this->input->post('price');
				$quantity = $this->input->post('quantity');
				$catId = $this->input->post('cat');
				
				$this->productmodel->insert($name,$price,$quantity,$catId);
				redirect('http://localhost/atp3/products');
			}
			else
			{
				$data['message'] = validation_errors();
				$this->load->view('view_addproduct', $data);
			}
		}
	}

	public function edit($pid = 0)
	{	
		$data['cats'] = $this->categorymodel->getAll();
		$product = $this->productmodel->get($pid);
		$data['product'] = $product;
		if(!$this->input->post('buttonSubmit'))
		{
			$data['message'] = '';
			
			$this->load->view('view_editpro', $data);
		}
		else
		{
			if($this->form_validation->run('editpro'))
			{
				$id = $this->input->post('p_id');
				$name = $this->input->post('name');
				$price = $this->input->post('price');
				$quantity = $this->input->post('quantity');
				$catId = $this->input->post('cat');
				
				$this->productmodel->update($name,$price,$quantity,$catId,$id);
				redirect('http://localhost/atp3/products');
			}
			else
			{
				$data['message'] = validation_errors();
				$this->load->view('view_editpro', $data);
			}
		}
	}

	public function delete($pid = 0)
	{	

		if(!$this->input->post('buttonSubmit'))
		{
			$data['message'] = '';
			$product = $this->productmodel->get($pid);

			$data['product'] = $product;
			$this->load->view('view_delpro', $data);
		}
		else
		{
			$this->productmodel->delete($pid);
			redirect('http://localhost/atp3/products');
			
		}
	}

}

