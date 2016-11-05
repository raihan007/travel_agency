<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Packages extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('PackageModel');
		//$this->load->model('categorymodel');
	}

	public function test(){
		$path = 'Public/Photos/Packages/demo';
		if (!is_dir('Public/Photos/Packages/demo')) {
		    mkdir('Public/Photos/Packages/demo', 0777, TRUE);
		}
		if (is_dir($path)) {
		    rmdir($path);
		}
	}

	public function AllPackages($offset = 0)
	{
		$data['title'] = "All Package Details";
		if($this->session->userdata('UserID')) {

			$Total = $this->PackageModel->Get_Number_Of_Rows('EntityNo','users_info');

			$this->load->library('pagination');
			$config = [
				'base_url' => base_url('Client/AllClients'),
				'per_page' => 1,
				'total_rows' => $Total,
			];


			$this->pagination->initialize($config);
				
			$data['ClientList'] = $this->PackageModel->Get_Clients_List($config['per_page'],$offset);
			$data['Total'] = $Total;

			$this->load->view('Client/clients_view',$data);
		}else{
			redirect('Home');
		}
	}

	public function Add()
	{
		$data['title'] = "Add Package Details";
		if($this->session->userdata('UserRole') === 'Admin') {
			$data['BloodGroupList'] = array(
				' ' => 'Select Your Blood Group',
				'A+' => 'A+',
				'A-' => 'A-',
				'B+' => 'B+',
				'B-' => 'B-',
				'AB+' => 'AB+',
				'AB-' => 'AB-',
				'O+' => 'O+',
				'O-' => 'O-',
			);

			$data['ClientTypeList'] = array(
				'Regular'  => 'Regular',
				'Premium'  => 'Premium',
				'Royal'  => 'Royal',
			);

			$data['NextEntityNo'] = $this->PackageModel->Get_Next_Entity_No('Packages_info');

			if(!$this->input->post('AddPackage'))
			{
				$data['message'] = '';
				$this->load->view('Package/add_view', $data);
			}
			else
			{
				if($this->form_validation->run('PackageInfoForm'))
				{
					$UserId = $this->uniquekey->GUID();
					$uploadData['file_name'] = "user.jpg";
					if (!empty($_FILES['Photo']['name'])) {
						$this->load->library('upload');
						$config = array(
							'upload_path' => "Public/Photos/Clients",
							'allowed_types' => "jpg|png|jpeg",
							'overwrite' => TRUE,
							'max_size' => "2048000",
							'max_height' => "1000",
							'max_width' => "1600",
							'file_name' => $UserId.'.jpg'
						);
						$this->upload->initialize($config);
						$this->upload->do_upload('Photo');
						$uploadData = $this->upload->data();
					}
					
					$clientData = array(
						'UserId' => $UserId,
						'FirstName' => $this->input->post('FirstName'),
				        'LastName' => $this->input->post('LastName'),
				      	'Gender' => $this->input->post('Gender'),
				      	'Email' => $this->input->post('Email'),
				       	'Photo' => $uploadData['file_name'],
				       	'PermanentAddress' => $this->input->post('PermanentAddress'),
				     	'PresentAddress' => $this->input->post('PresentAddress'),
				      	'PhoneNo' => $this->input->post('PhoneNo'),
				       	'Birthdate' => $this->input->post('Birthdate'),
				      	'BloodGroup' => $this->input->post('BloodGroup'),
				      	'NationalIdNo' => $this->input->post('NationalIdNo'),
				     	'Username' => $this->input->post('Username'),
				      	'Password' => $this->encrypt->encode($this->input->post('Password'))
					);

					$status = $this->ClientModel->Add_New_Client_info($clientData);

					//Storing insertion status message.
			        if($status){
					    	$this->session->set_flashdata('success', 'Data added successfully created.');
					}else{
					    	$this->session->set_flashdata('error', 'Some problems occured, please try again.');
					}

					redirect(base_url('Packages/AllPackages'));
				}
				else
				{
					$data['message'] = validation_errors();
					$this->load->view('Package/add_view', $data);
				}
			}
		}else{
			redirect('Home');
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

