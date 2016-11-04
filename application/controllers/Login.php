<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller{

	function __construct() {
		parent::__construct();
		$this->load->model('LoginModel');
		$this->load->library('UniqueKey');
	}

	public function Index(){

		if($this->session->userdata('UserId')) {
			redirect('Home');
		}else{
			if(!$this->input->post('signin'))
			{
				$data['message'] = '';
				$this->load->view('Login/Login_View', $data);
			}
			else
			{
				if($this->form_validation->run('login'))
				{
					$Username = $this->input->post('Username');
					$Password = $this->input->post('Password');
					$user = $this->LoginModel->checkUserAccess($Username,$Password);
					if($user){
						redirect(base_url('Home'));
					}else{
						$data['message'] = "Invalid Username or Password !";
						$this->load->view('Login/Login_View', $data);
					}
				}
				else
				{
					$data['message'] = validation_errors();
					$this->load->view('Login/Login_View', $data);
				}
			}
		}
	}

	public function test(){
		$encrypted_string = $this->encrypt->encode("Raihan");
		$plaintext_string = $this->encrypt->decode("5XiNeFEK3BFOpWdhkosK5vC4hQINB0oFk2qDEtBg200xNF0VC2TbiisJLd3W2ElkyG99lxllqLZ4ukEEzZPX2w==");
		
	}


	public function SignUp(){

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

		$data['NextEntityNo'] = $this->LoginModel->Get_Next_Entity_No('users_info');

		if(!$this->input->post('SignUp'))
		{
			$data['message'] = '';
			$this->load->view('Login/SignUp_View', $data);
		}
		else
		{
			if($this->form_validation->run('ClientInfoForm'))
			{
				$UserId = $this->uniquekey->GUID();
				$uploadData['file_name'] = "";
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

				$status = $this->LoginModel->Add_New_Client($clientData);

				//Storing insertion status message.
		        if($status){
				    	$this->session->set_flashdata('success', 'Your account uccessfully created. Now you can login your account.');
				}else{
				    	$this->session->set_flashdata('error', 'Some problems occured, please try again.');
				}

				return redirect(base_url('Login'));
			}
			else
			{
				$data['message'] = validation_errors();
				$this->load->view('Login/SignUp_View', $data);
			}
		}
	}

	public function Logout()
	{
		$this->session->sess_destroy();
		redirect('Login');
	}
}