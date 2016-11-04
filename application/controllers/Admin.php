<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('AdminModel');
	}

	public function Index()
	{	
		if($this->session->userdata('UserRole') === 'Admin') {
			$userInfo = $this->AdminModel->Get_By_ID($this->session->userdata('UserId'));
			//$data['EntityNo'] = $userInfo['EntityNo'];
			$data['FullName'] = $userInfo['FirstName'].' '.$userInfo['LastName'];
			$data['LastLoginTime'] = $this->AdminModel->Get_Last_Login_By_ID($this->session->userdata('UserId'));
			$this->load->view('Admin/home_view',$data);
		}
		else{
			redirect('Home');
		}
	}

	public function Profile(){
		$data['title'] = "Profile";
		if($this->session->userdata('UserRole') === 'Admin') {
			$data['Employee'] = $this->AdminModel->Get_By_ID($this->session->userdata('UserId'));
			$this->load->view('Admin/profile_view',$data);
		}
		else{
			redirect('Home');
		}
	}

	public function UpdateProfile($EntityNo = 0){
		$data['title'] = "Profile";
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
			$data['Client'] = $this->AdminModel->Get_By_ID($this->session->userdata('UserId'));

			if(!$this->input->post('Update'))
			{
				$this->load->view('Admin/edit_profile_view',$data);
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
				$this->load->view('Admin/edit_profile_view',$data);
			}
		}else
		{
			redirect('Home');
		}
	}
}