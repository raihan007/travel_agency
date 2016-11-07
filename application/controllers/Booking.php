<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Booking extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('PackageModel');
		$this->load->model('ClientModel');
		$this->load->model('BookingModel');
		$this->load->library('UniqueKey');
	}

	public function AllBooking($offset = 0)
	{
		$data['title'] = "All Booking Details";

		if($this->session->userdata('UserRole') === 'Admin') {

			$Total = $this->PackageModel->Get_Number_Of_Rows('EntityNo','booking_info_view');

			$this->load->library('pagination');
			$config = [
				'base_url' => base_url('Booking/AllBooking'),
				'per_page' => 5,
				'total_rows' => $Total,
			];


			$this->pagination->initialize($config);
				
			$data['BookingList'] = $this->BookingModel->Get_Booking_List($config['per_page'],$offset);
			$data['Total'] = $Total;

			$this->load->view('Booking/booking_view',$data);
		}else{
			redirect('Home');
		}
	}

	public function Add()
	{
		$data['title'] = "Package Booking Details";
		if($this->session->userdata('UserRole') === 'Admin') {
			
			$data['NextEntityNo'] = $this->PackageModel->Get_Next_Entity_No('packages_booking_info');
			$data['PackagesList'] = $this->PackageModel->Get_Packages_Title();
			$data['PackagesList'] = array(' ' => '-- Select Package --') + $data['PackagesList'];
			$data['ClientsList'] = $this->ClientModel->Get_Clients_Name();
			$data['ClientsList'] = array(' ' => '-- Select Client --') + $data['ClientsList'];

			if(!$this->input->post('AddBooking'))
			{
				$data['message'] = '';
				$this->load->view('Booking/add_view', $data);
			}
			else
			{
				if($this->form_validation->run('BookingInfoForm'))
				{
					$BookingData = array(
						'Quantity' => $this->input->post('Quantity'),
						'TotalCost' => $this->input->post('TotalCost'),
						'PackageId' => $this->input->post('PackageId'),
				       	'ClientId' => $this->input->post('ClientId'),
					);
					$Status = $this->BookingModel->Add_New_Booking_info($BookingData);
			        if($Status){
					    	$this->session->set_flashdata('success', 'Data added successfully.');
					}else{
					    	$this->session->set_flashdata('error', 'Some problems occured, please try again.');
					}

					redirect(base_url('Booking/AllBooking'));
				}
				else
				{
					$data['message'] = validation_errors();
					$this->load->view('Booking/add_view', $data);
				}
			}
		}else{
			redirect('Home');
		}
	}



	public function test(){
		
		$encrypted_string = $this->encrypt->encode("Raihan");
		$plaintext_string = $this->encrypt->decode("AJCiIoa1MIC6K0kkTNN9NxShQBYyzzAjFMCcsnSolB2Zk05pnCE9+41sOvVA8Q6bmC2Svgo6Gy87jzyYu6tt/Q==");
		echo $encrypted_string,$plaintext_string;
	}
}
