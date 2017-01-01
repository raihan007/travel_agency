<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Client extends MY_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('ClientModel');
		$this->load->model('PackageModel');
		$this->load->model('BookingModel');
		$this->load->model('AdminModel');
		$this->load->library('UniqueKey');
	}

	public function test()
	{
		echo date("Y-m-d H:i:s");
	}

	public function index($offset = 0)
	{
		$this->data['PageHeader'] = 'Client Panel';
		if($this->session->userdata('UserRole') === 'Client') {
			$ClientInfo = $this->ClientModel->Get_By_ID($this->session->userdata('UserId'));

			$this->load->library('pagination');
			$Total = $this->PackageModel->Get_Total_Rows(array(), 'packages_info');
			$config = $this->Config_Pagination('Client/index/',$Total);
			$this->data['PackageList'] = $this->PackageModel->GET(array(),$config['per_page'],$offset);
			$this->pagination->initialize($config);
			$this->data['ClientId'] = $ClientInfo['UserId'];
			$this->data['FullName'] = $ClientInfo['FirstName'].' '.$ClientInfo['LastName'];
			$this->data['LastLoginTime'] = $this->ClientModel->Get_Last_Login_By_ID($this->session->userdata('UserId'));
			$this->session->set_userdata('LastLoginTime', $this->data['LastLoginTime']);
			$this->session->set_userdata('FullName', $this->data['FullName']);
			$this->data['PerPage'] = $config['per_page'];
			$this->render('Client/home_view','client');
		}
		else{
			redirect('Home');
		}
	}

	public function AllReservation($id = '')
	{
		$this->data['title'] = 'Client All Reservation';
		if($this->session->userdata('UserId') === $id) {
			$ClientInfo = $this->ClientModel->Get_By_ID($this->session->userdata('UserId'));

			$this->data['ClientBookingList'] = $this->BookingModel->Get_Client_Booking_List($ClientInfo['UserId']);
			$this->data['ClientId'] = $ClientInfo['UserId'];
			$this->data['FullName'] = $ClientInfo['FirstName'].' '.$ClientInfo['LastName'];

			$this->load->view('Client/client_reservation_view',$this->data);
		}
		else{
			redirect('Home');
		}
	}

	public function OwnReservation($id = '')
	{
		$this->data['PageHeader'] = 'Client All Reservation';
		if($this->session->userdata('UserId')) {
			$ClientInfo = $this->ClientModel->Get_By_ID($this->session->userdata('UserId'));

			$this->data['ClientBookingList'] = $this->BookingModel->Get_Client_Booking_List($ClientInfo['UserId']);
			$this->data['ClientId'] = $ClientInfo['UserId'];
			$this->data['FullName'] = $ClientInfo['FirstName'].' '.$ClientInfo['LastName'];
			$this->render('Client/client_reservation_view','client');
			//$this->load->view('Client/client_reservation_view',$this->data);
		}
		else{
			redirect('Home');
		}
	}

	public function Profile(){
		$this->data['PageHeader'] = "Profile";
		if($this->session->userdata('UserRole') === 'Client') {
			$this->data['Employee'] = $this->AdminModel->Get_By_ID($this->session->userdata('UserId'));
			$this->render('Client/profile_view','client');
			//$this->load->view('Client/profile_view',$this->data);
		}
		else{
			redirect('Home');
		}
	}

	public function UpdateProfile($EntityNo = 0){
		$this->data['PageHeader'] = "Update Profile Info.";
		if($this->session->userdata('UserRole') === 'Client') {
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
			$this->data['Client'] = $this->AdminModel->Get_By_ID($this->session->userdata('UserId'));

			if(!$this->input->post('Update'))
			{
				$this->render('Client/edit_profile_view','client');
				//$this->load->view('Admin/edit_profile_view',$this->data);
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

					redirect(base_url('Profile'));
				}

				$this->data['message'] = validation_errors();
				$this->render('Client/edit_profile_view','client');
				//$this->load->view('Admin/edit_profile_view',$this->data);
			}
		}else
		{
			redirect('Home');
		}
	}

	public function AllClients($offset = 0)
	{
		$this->data['PageHeader'] = 'All Clients Info.';
		$this->data['message'] = '';
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
					$this->data['message'] = validation_errors();
				}
			}
			$Total = $this->ClientModel->Get_Total_Rows($Search,'users_info');
			$config = $this->Config_Pagination('Client/AllClients/',$Total);
			$this->pagination->initialize($config);
			$this->data['ClientList'] = $this->ClientModel->GET($Search,$config['per_page'],$offset);
			$this->data['Total'] = $Total;
			$this->data['PerPage'] = $config['per_page'];
			$this->render('Client/clients_view','master');
		}else{
			redirect('Home');
		}
	}

	//Start Json Data Return Methods
	public function ClientsInfo_json()
	{
		$Total = $this->ClientModel->Get_Total_Rows(array(),'users_info');
		if(isset($_REQUEST['search']) && isset($_REQUEST['type'])){
        	$search = $_REQUEST['search'];
        	$type = $_REQUEST['type'];
    	}else{
        	$search = '';
        	$type = '';
    	}
		$sort =$_REQUEST['sort'];
		$order = $_REQUEST['order'];
		$offset = $_REQUEST['offset'];
		$limit = $_REQUEST['limit'];
		
		$Alldata['rows'] = $this->ClientModel->GetAllClient($type,$search,$sort,$order,$limit,$offset);
		$Alldata['total'] = $Total;
		echo json_encode($Alldata);
	}
	//End Json Data Return Methods

	public function Add()
	{
		$this->data['PageHeader'] = "Add Client Details";
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
				' ' => 'Select Client Type',
				'Regular'  => 'Regular',
				'Premium'  => 'Premium',
				'Royal'  => 'Royal',
			);

			$this->data['NextEntityNo'] = $this->ClientModel->Get_Next_Entity_No('users_info');

			if(!$this->input->post('AddClient'))
			{
				$this->data['message'] = '';
				$this->render('Client/add_view','master');
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
				      	'Type' => $this->input->post('Type'),
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
					$this->render('Client/add_view','master');
					//$this->load->view('Client/add_view', $this->data);
				}
			}
		}else{
			redirect('Home');
		}
	}

	public function Details($EntityNo)
	{
		if($this->session->userdata('UserRole') === 'Admin') {
			$this->data['PageHeader'] = "Client Details";
		
			$this->data['Client'] = $this->ClientModel->Get_Where($EntityNo);
			
			if(empty($this->data['Client'])){
				$this->session->set_flashdata('error', 'There are no informations for this client!, please try again.');
				redirect(base_url('Client/AllClients'));
			}
			$this->render('Client/details_view','master');
		}else{
			redirect('Home');
		}
	}

	public function Edit($EntityNo)
	{
		if($this->session->userdata('UserRole') === 'Admin') {
			$this->data['PageHeader'] = 'Update Client Details';
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
				' '   => 'Select Client Type',
				'Regular'  => 'Regular',
				'Premium'  => 'Premium',
				'Royal'  => 'Royal',
			);
			$this->data['Client'] = $this->ClientModel->Get_Where($EntityNo);
			if(empty($this->data['Client'])){
				$this->session->set_flashdata('error', 'There are no informations for this client!, please try again.');
				redirect(base_url('Client/AllClients'));
			}
			if(!$this->input->post('Update'))
			{
				$this->render('Client/edit_view','master');
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
				$this->render('Client/edit_view','master');
			}
		}else
		{
			redirect('Home');
		}
	}

	public function Remove($EntityNo)
	{
		if($this->session->userdata('UserRole') === 'Admin') {
			$this->data['PageHeader'] = "Client Details";
		
			$this->data['Client'] = $this->ClientModel->Get_Where($EntityNo);
			if(empty($this->data['Client'])){
				$this->session->set_flashdata('error', 'There are no informations for this client!, please try again.');
				redirect(base_url('Client/AllClients'));
			}
			if($this->input->post('Remove'))
			{
				$DeleteData = array(
					'EntityNo' => $this->data['Client']['EntityNo'],
					'IsDeleted' => 1,
					'UserId' => $this->data['Client']['UserId'], 
				);
				$Status = $this->ClientModel->Delete_Client_info($DeleteData);
				if($Status){
					$this->session->set_flashdata('success', 'Data successfully deleted.');
				}else{
					$this->session->set_flashdata('error', 'Some problems occured, please try again.');
				}
				redirect(base_url('Client/AllClients'));
			}else{
				$this->render('Client/remove_view','master');
			}
		}else{
			redirect('Home');
		}
	}

}