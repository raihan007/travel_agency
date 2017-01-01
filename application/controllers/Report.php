<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Report extends MY_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('BookingModel');
		$this->load->model('PackageModel');
	}

	public function test()
	{
		echo date("Y-m-d H:i:s");
		$Total = $this->BookingModel->Get_SUM(array(),2,2);
		print_r($Total['SUM(TotalCost)']);
	}

	public function Sales($offset = 0)
	{
		$this->data['PageHeader'] = 'Packages Sales Report';
		$this->data['message'] = '';
		$Search = array();
		if($this->session->userdata('UserRole') === 'Admin') {
			$this->load->library('pagination');
			$Total = $this->BookingModel->Get_Number_Of_Rows('*','booking_info_view');
			$config = $this->Config_Pagination('Report/Sales/',$Total);
			$this->pagination->initialize($config);
			$PageTotal = $this->BookingModel->Get_SUM($Search,$config['per_page'],$offset);
			$this->data['PageTotal'] = $PageTotal['SUM(TotalCost)'];
			$GrandTotal = $this->BookingModel->Get_SUM($Search,0,1);
			$this->data['GrandTotal'] = $GrandTotal['SUM(TotalCost)'];
			$this->data['BookingList'] = $this->BookingModel->GET($Search,$config['per_page'],$offset);
			$this->data['Total'] = $Total;
			$this->data['PerPage'] = $config['per_page'];

			$this->render('Reports/sales_report_view','master');
			//$this->load->view('Reports/sales_report_view',$this->data);
		}else{
			redirect('Home');
		}
	}

	public function Booking($offset = 0)
	{
		$this->data['PageHeader'] = 'Packages Booking Report';
		$this->data['message'] = '';
		$Search = array();
		if($this->session->userdata('UserRole') === 'Admin') {
			$this->load->library('pagination');
			$Total = $this->PackageModel->GET_Row_Num_Booking_Report();
			$config = $this->Config_Pagination('Report/Booking/',$Total);
			$this->pagination->initialize($config);

			$this->data['PackageList'] = $this->PackageModel->GET_Booking_Report($Search,$config['per_page'],$offset);
			$this->data['Total'] = $Total;
			$this->data['PerPage'] = $config['per_page'];
			$this->render('Reports/booking_report_view','master');
		}else{
			redirect('Home');
		}
	}

	public function Clients($offset = 0)
	{
		$this->data['PageHeader'] = 'Client Packages Booking Report';
		$this->data['message'] = '';
		$Search = array();
		if($this->session->userdata('UserRole') === 'Admin') {
			$this->load->library('pagination');

			$Total = $this->PackageModel->GET_Row_Num_Clients_Report();
			$config = $this->Config_Pagination('Report/Clients/',$Total);
			$this->pagination->initialize($config);

			$this->data['ClientsPackageList'] = $this->PackageModel->GET_Client_Report($Search,$config['per_page'],$offset);
			
			$this->data['Total'] = $Total;
			$this->data['PerPage'] = $config['per_page'];
			$this->render('Reports/Clients_report_view','master');
		}else{
			redirect('Home');
		}
	}

	public function Add()
	{
		$this->data['title'] = "Add Client Details";
		if($this->session->userdata('UserRole') === 'Admin') {
			$this->data['BloodGroupList'] = array(
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

			$this->data['ClientTypeList'] = array(
				'Regular'  => 'Regular',
				'Premium'  => 'Premium',
				'Royal'  => 'Royal',
			);

			$this->data['NextEntityNo'] = $this->ClientModel->Get_Next_Entity_No('users_info');

			if(!$this->input->post('AddClient'))
			{
				$this->data['message'] = '';
				$this->load->view('Client/add_view', $this->data);
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
					$this->data['message'] = validation_errors();
					$this->load->view('Client/add_view', $this->data);
				}
			}
		}else{
			redirect('Home');
		}
	}

	public function Details($EntityNo)
	{
		$this->data['title'] = "Client Details";
		
		$this->data['Client'] = $this->ClientModel->Get_Where($EntityNo);

		$this->load->view('Client/details_view',$this->data);
	}

	public function Edit($EntityNo)
	{
		if($this->session->userdata('UserRole') === 'Admin') {
			$this->data['title'] = 'Update Client Details';
			$this->data['message'] = '';
			$this->data['BloodGroupList'] = array(
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
			$this->data['ClientTypeList'] = array(
				' '   => 'Select Type',
				'Regular'  => 'Regular',
				'Premium'  => 'Premium',
				'Royal'  => 'Royal',
			);
			$this->data['Client'] = $this->ClientModel->Get_Where($EntityNo);

			if(!$this->input->post('Update'))
			{
				$this->load->view('Client/edit_view',$this->data);
			}
			else
			{
				if($this->form_validation->run('EditClientInfoForm'))
				{
					$UserId = $this->data['Client']['UserId'];
					$uploadData['file_name'] = $this->data['Client']['Photo'];
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

				$this->data['message'] = validation_errors();
				$this->load->view('Client/edit_view',$this->data);
			}
		}else
		{
			redirect('Home');
		}
	}

}