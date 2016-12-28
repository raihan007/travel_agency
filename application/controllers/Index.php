<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index extends MY_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('PackageModel');
	}

	public function Index()
	{
		if($this->session->userdata('UserId')) {
			redirect('Home');
		}
		else{
			$this->render('Public/Index_View','public');
		}
		
	}

	public function Manu()
	{
		$this->load->view('Manu_view');
	}

	public function Packages()
	{
		$this->data['Allpackages'] = $this->PackageModel->GetAll();
		$this->render('Public/TourPackages_View','public');
	}

	public function Contact()
	{
		$this->render('Public/Contact_View','public');
	}

	public function About()
	{
		$this->render('Public/About_View','public');
	}
}