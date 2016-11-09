<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Report extends CI_Controller {

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
		$data['title'] = 'Packages Sales Report';
		$data['message'] = '';
		$Search = array();
		if($this->session->userdata('UserRole') === 'Admin') {
			$this->load->library('pagination');
			$Total = $this->BookingModel->Get_Total_Rows($Search,'booking_info_view');
			$config = $this->Config_Pagination('Report/Sales/',$Total);
			$this->pagination->initialize($config);
			$PageTotal = $this->BookingModel->Get_SUM($Search,$config['per_page'],$offset);
			$data['PageTotal'] = $PageTotal['SUM(TotalCost)'];
			$GrandTotal = $this->BookingModel->Get_SUM($Search,0,1);
			$data['GrandTotal'] = $GrandTotal['SUM(TotalCost)'];
			$data['BookingList'] = $this->BookingModel->GET($Search,$config['per_page'],$offset);
			$data['Total'] = $Total;
			$data['PerPage'] = $config['per_page'];
			$this->load->view('Reports/sales_report_view',$data);
		}else{
			redirect('Home');
		}
	}

	public function Booking($offset = 0)
	{
		$data['title'] = 'Packages Booking Report';
		$data['message'] = '';
		$Search = array();
		if($this->session->userdata('UserRole') === 'Admin') {
			$this->load->library('pagination');
			$Total = $this->PackageModel->GET_Row_Num_Booking_Report();
			$config = $this->Config_Pagination('Report/Booking/',$Total);
			$this->pagination->initialize($config);

			$data['PackageList'] = $this->PackageModel->GET_Booking_Report($Search,$config['per_page'],$offset);
			$data['Total'] = $Total;
			$data['PerPage'] = $config['per_page'];
			$this->load->view('Reports/booking_report_view',$data);
		}else{
			redirect('Home');
		}
	}

	private function Config_Pagination($BaseUrl='',$Total=''){
		$config = array();
		$config = [
			'base_url' => base_url($BaseUrl),
			'per_page' => 3,
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
		$data['title'] = "Client Details";
		
		$data['Client'] = $this->ClientModel->Get_Where($EntityNo);

		$this->load->view('Client/details_view',$data);
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
				' '   => 'Select Type',
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

}