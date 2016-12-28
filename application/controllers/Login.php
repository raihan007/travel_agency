<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends MY_Controller{

	function __construct() {
		parent::__construct();
		$this->load->model('LoginModel');
		$this->load->library('UniqueKey');
		$this->data['page_title'] = "Dream Travel";
	}

	public function Index(){
		if($this->session->userdata('UserId')) {
			redirect('Home');
		}else{
			if(!$this->input->post('signin'))
			{
				$this->data['message'] = '';
				$this->render('Login/Login_View','public');
				//$this->load->view('Login/Login_View', $data);
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
						$this->data['message'] = "Invalid Username or Password !";
						$this->render('Login/Login_View','public');
					}
				}
				else
				{
					$this->data['message'] = validation_errors();
					$this->render('Login/Login_View','public');
				}
			}
		}
	}

	public function test(){
		$encrypted_string = $this->encrypt->encode("Raihan");
		$plaintext_string = $this->encrypt->decode("5XiNeFEK3BFOpWdhkosK5vC4hQINB0oFk2qDEtBg200xNF0VC2TbiisJLd3W2ElkyG99lxllqLZ4ukEEzZPX2w==");
		
	}


	public function SignUp(){

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

		$this->data['NextEntityNo'] = $this->LoginModel->Get_Next_Entity_No('users_info');

		if(!$this->input->post('SignUp'))
		{
			$this->data['message'] = '';
			$this->render('Login/SignUp_View','public');
		}
		else
		{
			if($this->form_validation->run('SignUpForm'))
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
			      	'Password' => $this->encrypt->encode($this->input->post('Password')),
			      	'Role' => 'default',
			      	'Type' => 'default'
				);

				$status = $this->LoginModel->Add_New_Client($clientData);

				//Storing insertion status message.
		        if($status){
				    	$this->session->set_flashdata('success', 'Your account successfully created. Now you can login your account.');
				}else{
				    	$this->session->set_flashdata('error', 'Some problems occured, please try again.');
				}

				return redirect(base_url('Login'));
			}
			else
			{
				$this->data['message'] = validation_errors();
				$this->render('Login/SignUp_View','public');
			}
		}
	}

	public function Logout()
	{
		$this->session->sess_destroy();
		redirect('Login');
	}
}