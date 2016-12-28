<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends MY_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('AdminModel');
	}

	public function Index()
	{
		$this->data['PageHeader'] = 'Dashboard';	
		if($this->session->userdata('UserRole') === 'Admin') {
			$this->SetSessionData();
			$this->render('Admin/home_view','master');
			//$this->load->view('Admin/home_view',$data);
		}
		else{
			redirect('Home');
		}
	}

	private function SetSessionData(){
		$userInfo = $this->AdminModel->Get_By_ID($this->session->userdata('UserId'));
		$this->session->set_userdata('EntityNo', $userInfo['EntityNo']);
		$FullName = $userInfo['FirstName'].' '.$userInfo['LastName'];
		$LastLoginTime = $this->AdminModel->Get_Last_Login_By_ID($this->session->userdata('UserId'));
		$this->session->set_userdata('LastLoginTime', $LastLoginTime);
		$this->session->set_userdata('FullName', $FullName);
	}

	public function Profile(){
		$this->data['PageHeader'] = "Profile";
		if($this->session->userdata('UserRole') === 'Admin') {
			$this->data['Employee'] = $this->AdminModel->Get_By_ID($this->session->userdata('UserId'));
			$this->render('Admin/profile_view','master');
			//$this->load->view('Admin/profile_view',$data);
		}
		else{
			redirect('Home');
		}
	}

	public function UpdateProfile($EntityNo = 0){
		$this->data['PageHeader'] = "Update Profile Info.";
		if($this->session->userdata('UserRole') === 'Admin') {
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
				$this->render('Admin/edit_profile_view','master');
				//$this->load->view('Admin/edit_profile_view',$data);
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

					redirect(base_url('Profile'));
				}

				$this->data['message'] = validation_errors();
				$this->render('Admin/edit_profile_view','master');
				//$this->load->view('Admin/edit_profile_view',$data);
			}
		}else
		{
			redirect('Home');
		}
	}
}