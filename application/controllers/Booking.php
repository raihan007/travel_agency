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

	private function Config_Pagination($BaseUrl='',$Total=''){
		$config = array();
		$config = [
			'base_url' => base_url($BaseUrl),
			'per_page' => 5,
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

	public function AllBooking($offset = 0)
	{
		$data['title'] = "All Booking Details";

		if($this->session->userdata('UserRole') === 'Admin') {

			$Total = $this->PackageModel->Get_Number_Of_Rows('EntityNo','booking_info_view');

			$this->load->library('pagination');
			$config = $this->Config_Pagination('Booking/AllBooking',$Total);
			$this->pagination->initialize($config);
				
			$data['BookingList'] = $this->BookingModel->GET(array(),$config['per_page'],$offset);
			$data['Total'] = $Total;
			$data['PerPage'] = $config['per_page'];
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
				       	'Date' => $this->input->post('BookingDate')
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

	public function Reservation($id = 0)
	{	
		$data['title'] = 'Reserved a Package';
		$data['NextEntityNo'] = $this->PackageModel->Get_Next_Entity_No('packages_booking_info');
		if($this->session->userdata('UserRole') === 'Client') {
			$data['Booking'] = $this->BookingModel->Get_By_ID($id);
			$data['Package'] = $this->PackageModel->Get_Details($data['Booking']['PackageId']);
			$data['Client'] = $this->ClientModel->Get_Details($data['Booking']['ClientId']);
			$data['TotalCost'] = (1 * $data['Package']['Cost'])-($data['Package']['Discount']/100);
			if(!$this->input->post('Reserved'))
			{
				$data['message'] = '';
				$this->load->view('Booking/reservation_view', $data);
			}
			else
			{
				if($this->form_validation->run('ClientBookingInfoForm'))
				{
					$Data = array(
						'PackageId' => $this->input->post('PackageId'),
						'Quantity' => $this->input->post('Quantity'),
						'ClientId' => $this->input->post('ClientId'),
					    'TotalCost' => $this->input->post('TotalCost'),
					    'Date' => $this->input->post('BookingDate')
					);
					$Status = $this->BookingModel->Add_New_Booking_info($Data);
			        if($Status){
					    	$this->session->set_flashdata('success', 'Data added successfully.');
					}else{
					    	$this->session->set_flashdata('error', 'Some problems occured, please try again.');
					}
					redirect(base_url('Client/Index'));
				}
				else
				{
					$data['message'] = validation_errors();
					$this->load->view('Booking/reservation_view', $data);
				}
			}
		}else{
			redirect('Home');
		}
	}

	public function edit($id = 0)
	{	
		$data['title'] = 'Update Booking Details';
		if($this->session->userdata('UserRole') === 'Admin') {
			$data['PackagesList'] = $this->PackageModel->Get_Packages_Title();
			$data['PackagesList'] = array(' ' => '-- Select Package --') + $data['PackagesList'];
			$data['ClientsList'] = $this->ClientModel->Get_Clients_Name();
			$data['ClientsList'] = array(' ' => '-- Select Client --') + $data['ClientsList'];
			$data['Booking'] = $this->BookingModel->Get_By_ID($id);
			$data['Package'] = $this->PackageModel->Get_Details($data['Booking']['PackageId']);
			$BookingId = $data['Booking']['EntityNo'];
			if(!$this->input->post('Update'))
			{
				$data['message'] = '';
				$this->load->view('Booking/edit_view', $data);
			}
			else
			{
				if($this->form_validation->run('BookingInfoForm'))
				{
					$Data = array(
						'EntityNo' => $BookingId,
						'PackageId' => $this->input->post('PackageId'),
						'Quantity' => $this->input->post('Quantity'),
						'ClientId' => $this->input->post('ClientId'),
					    'TotalCost' => $this->input->post('TotalCost'),
					    'Date' => $this->input->post('BookingDate')
					);
					$Status = $this->BookingModel->Update_Booking_info($Data);

					if($Status){
						$this->session->set_flashdata('success', 'Data Updated successfully.');
					}else{
						$this->session->set_flashdata('error', 'Some problems occured, please try again.');
					}
					redirect(base_url('Booking/AllBooking'));
				}
				else
				{
					$data['message'] = validation_errors();
					$this->load->view('Booking/edit_view', $data);
				}
			}
		}else{
			redirect('Home');
		}
	}

	public function Details($EntityNo)
	{
		$data['title'] = "Package Details";
		if($this->session->userdata('UserRole') === 'Admin') {
			$data['Booking'] = $this->BookingModel->Get_By_ID($EntityNo);
			$data['Client'] = $this->ClientModel->Get_Details($data['Booking']['ClientId']);
			$data['Package'] = $this->PackageModel->Get_Details($data['Booking']['PackageId']);
			$this->load->view('Booking/details_view',$data);
		}else{
			redirect('Home');
		}
	}

	public function Remove($EntityNo)
	{
		$data['title'] = "Remove Package Details";
		if($this->session->userdata('UserRole') === 'Admin') {
			$data['Package'] = $this->PackageModel->Get_By_ID($EntityNo);
			$PackageId = $data['Package']['ID'];
			if($data['Package']['Gallery'] === '1'){
				$data['Package']['Images'] = explode(",",$this->PackageModel->Get_Images($PackageId));
			}
			if($this->input->post('Delete'))
			{
				$PackageData = array(
					'EntityNo' => $data['Package']['EntityNo'],
					'IsDeleted' => 1,
					'ID' => $PackageId, 
				);
				$Status = $this->PackageModel->Delete_Package_info($PackageData);
				if($Status){
					$this->session->set_flashdata('success', 'Data successfully deleted.');
				}else{
					$this->session->set_flashdata('error', 'Some problems occured, please try again.');
				}
				redirect(base_url('Packages/AllPackages'));
			}
			$this->load->view('Package/remove_view',$data);
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
