<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Client extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('ClientModel');
		$this->load->library('UniqueKey');
	}

	public function test()
	{
		echo date("Y-m-d H:i:s");
	}

	public function index()
	{	
		$data['title'] = 'Client Panel';
		if($this->session->userdata('UserRole') === 'Client') {
			$ClientInfo = $this->ClientModel->Get_By_ID($this->session->userdata('UserId'));

			$data['FullName'] = $ClientInfo['FirstName'].' '.$ClientInfo['LastName'];
			$data['LastLoginTime'] = $this->ClientModel->Get_Last_Login_By_ID($this->session->userdata('UserId'));
			$this->load->view('Client/home_view',$data);
		}
		else{
			redirect('Home');
		}
	}

	public function AllClients($offset = 0)
	{
		$data['message'] = '';
		$Search = array();
		if($this->session->userdata('UserRole') === 'Admin') {
			$this->load->library('pagination');
			if($this->input->post('Search'))
			{
				if($this->form_validation->run('SearchForm'))
				{
					$column = $this->input->post('Type');
					$value = $this->input->post('SearchKey');

					$Search = array(
						$column => $value
					);
				}else{
					$data['message'] = validation_errors();
				}
			}
			$Total = $this->ClientModel->Get_Total_Rows($Search,'users_info');
			$config = $this->Config_Pagination('Client/AllClients/',$Total);
			$config['first_link'] = 'First';
			$config['last_link'] = 'Last';
			$this->pagination->initialize($config);
			$data['ClientList'] = $this->ClientModel->GET($Search,$config['per_page'],$offset);
			$data['Total'] = $Total;
			$data['PerPage'] = $config['per_page'];
			$this->load->view('Client/clients_view',$data);
		}else{
			redirect('Home');
		}
	}

	private function Config_Pagination($BaseUrl='',$Total=''){
		$config = array();
		$config = [
			'base_url' => base_url($BaseUrl),
			'per_page' => 5,
			'total_rows' => $Total,
			'use_page_numbers' => TRUE,
			'full_tag_open' => '<div id="pagination">',
			'full_tag_close' => '</div>',
			'cur_tag_open' => '<b>',
			'cur_tag_close' => '</b>',
			'next_link' => 'Next',
			'prev_link' => 'Previous',
			'uri_segment' => 3,
		];
		return $config;
	}

	public function Add()
	{
		$data['title'] = "Add Client Details";
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
				' ' => 'Select Client Type',
				'Regular'  => 'Regular',
				'Premium'  => 'Premium',
				'Royal'  => 'Royal',
			);

			$data['NextEntityNo'] = $this->ClientModel->Get_Next_Entity_No('users_info');

			if(!$this->input->post('AddClient'))
			{
				$data['message'] = '';
				$this->load->view('Client/add_view', $data);
			}
			else
			{
				if($this->form_validation->run('ClientInfoForm'))
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

					redirect(base_url('Client/AllClients'));
				}
				else
				{
					$data['message'] = validation_errors();
					$this->load->view('Client/add_view', $data);
				}
			}
		}else{
			redirect('Home');
		}
	}

	public function Details($EntityNo)
	{
		if($this->session->userdata('UserRole') === 'Admin') {
			$data['title'] = "Client Details";
		
			$data['Client'] = $this->ClientModel->Get_Where($EntityNo);

			$this->load->view('Client/details_view',$data);
		}else{
			redirect('Home');
		}
	}

	public function Edit($EntityNo)
	{
		if($this->session->userdata('UserRole') === 'Admin') {
			$data['title'] = 'Update Client Details';
			$data['message'] = '';
			$data['BloodGroupList'] = array(
				' '   => 'Select Your Blood Group',
				'A+'  => 'A+',
				'A-'  => 'A-',
				'B+'  => 'B+',
				'B-'  => 'B-',
				'AB+' => 'AB+',
				'AB-' => 'AB-',
				'O+'  => 'O+',
				'O-'  => 'O-',
			);
			$data['ClientTypeList'] = array(
				' '   => 'Select Client Type',
				'Regular'  => 'Regular',
				'Premium'  => 'Premium',
				'Royal'  => 'Royal',
			);
			$data['Client'] = $this->ClientModel->Get_Where($EntityNo);

			if(!$this->input->post('Update'))
			{
				$this->load->view('Client/edit_view',$data);
			}
			else
			{
				if($this->form_validation->run('EditClientInfoForm'))
				{
					$UserId = $data['Client']['UserId'];
					$uploadData['file_name'] = $data['Client']['Photo'];
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
						'EntityNo' => $this->input->post('EntityNo'),
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
				      	'Type' => $this->input->post('Type')
					);

					$status = $this->ClientModel->Update_Client_Info($clientData);

					//Storing insertion status message.
			        if($status){
					    	$this->session->set_flashdata('success', 'Data updated Successfully.');
					}else{
					    	$this->session->set_flashdata('error', 'Some problems occured, please try again.');
					}

					redirect(base_url('Client/AllClients'));
				}

				$data['message'] = validation_errors();
				$this->load->view('Client/edit_view',$data);
			}
		}else
		{
			redirect('Home');
		}
	}

	public function Remove($EntityNo)
	{
		if($this->session->userdata('UserRole') === 'Admin') {
			$data['title'] = "Client Details";
		
			$data['Client'] = $this->ClientModel->Get_Where($EntityNo);

			if($this->input->post('Remove'))
			{
				$Data = array(
					'EntityNo' => $data['Client']['EntityNo'],
					'IsDeleted' => 1,
					'UserId' => $data['Client']['UserId'], 
				);
				$Status = $this->ClientModel->Delete_Client_info($Data);
				if($Status){
					$this->session->set_flashdata('success', 'Data successfully deleted.');
				}else{
					$this->session->set_flashdata('error', 'Some problems occured, please try again.');
				}
				redirect(base_url('Client/AllClients'));
			}else{
				$this->load->view('Client/remove_view',$data);
			}
		}else{
			redirect('Home');
		}
	}

}