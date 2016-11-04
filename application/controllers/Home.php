<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$this->check_flashSession();
		if($this->session->userdata('UserRole') === 'Client') {
			redirect('Client');
		}elseif($this->session->userdata('UserRole') === 'Admin') {
			redirect('Admin');
		}
		else{
			redirect('Login');
		}
	}

	private function check_flashSession(){
		if( $notif = $this->session->flashdata('success')){
			$this->session->set_flashdata('success', $notif);
		}elseif($notif = $this->session->flashdata('error')){
			$this->session->set_flashdata('error', $notif);
		}
	}
}