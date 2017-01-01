<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Settings extends MY_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('SettingsModel');
		$this->load->model('AdminModel');
	}

	public function ChangePassword()
	{	
		$this->data['PageHeader'] = 'Change Password';
		$this->data['message'] = '';
		if($this->session->userdata('UserId')) {
			if($this->input->post('ChangePassword'))
			{
				if($this->form_validation->run('ChangePasswordForm'))
				{
					$UserInfo = $this->AdminModel->Get_By_ID($this->session->userdata('UserId'));
					$OldPassword = $this->input->post('OldPassword');
					$NewPassword = $this->input->post('NewPassword');
					$ConfirmPassword = $this->input->post('ConfirmPassword');
					$ConfirmPassword = $this->encrypt->encode($ConfirmPassword);
					$Password = $this->encrypt->decode($UserInfo['Password']);
					if($OldPassword === $Password){
						$status = $this->SettingsModel->Change_Password($UserInfo['UserId'],$ConfirmPassword);

				        if($status){
						    	$this->session->set_flashdata('success', 'Password successfully changed.');
						}else{
						    	$this->session->set_flashdata('error', 'Some problems occured, please try again.');
						}
						redirect('Home');
					}else{
						$this->data['message'] = "Please insert current password";
					}
				}else{
					/*print_r(validation_errors());
					exit;*/
					$this->data['message'] = validation_errors();
				}
			}

			if($this->session->userdata('UserRole') === 'Admin') {
				$this->render('Common/change_password_view','master');
			}
			elseif($this->session->userdata('UserRole') === 'Client') {
				$this->render('Common/change_password_view','client');
			}
		}
		else{
			redirect('Home');
		}
	}

	public function ChangeUsername()
	{	
		$this->data['PageHeader'] = 'Change Username';
		$this->data['message'] = '';
		$this->data['Username'] = $this->session->userdata('UserName');
		if($this->session->userdata('UserId')) {
			if($this->input->post('ChangeUsername'))
			{
				if($this->form_validation->run('ChangeUsernameForm'))
				{
					$UserId = $this->session->userdata('UserId');
					$OldUsername = $this->input->post('OldUsername');
					$NewUsername = $this->input->post('NewUsername');
					$ConfirmUsername = $this->input->post('ConfirmUsername');
					if($OldUsername === $this->session->userdata('UserName')){
						$status = $this->SettingsModel->Change_Username($UserId,$ConfirmUsername);

				        if($status){
						    	$this->session->set_flashdata('success', 'Username successfully changed.');
						}else{
						    	$this->session->set_flashdata('error', 'Some problems occured, please try again.');
						}
						redirect('Home');
					}else{
						$this->data['message'] = "Please insert your current username";
					}
				}else{
					$this->data['message'] = validation_errors();
				}
			}
			if($this->session->userdata('UserRole') === 'Admin') {
				$this->render('Common/change_username_view','master');
			}
			elseif($this->session->userdata('UserRole') === 'Client') {
				$this->render('Common/change_username_view','client');
			}
		}
		else{
			redirect('Home');
		}
	}
}