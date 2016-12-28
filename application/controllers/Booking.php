<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Booking extends MY_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('PackageModel');
		$this->load->model('ClientModel');
		$this->load->model('BookingModel');
		$this->load->library('UniqueKey');
	}

	public function AllBooking($offset = 0)
	{
		$this->data['PageHeader'] = "All Booking Details";

		if($this->session->userdata('UserRole') === 'Admin') {

			$Total = $this->PackageModel->Get_Number_Of_Rows('EntityNo','booking_info_view');

			$this->load->library('pagination');
			$config = $this->Config_Pagination('Booking/AllBooking',$Total);
			$this->pagination->initialize($config);
				
			$this->data['BookingList'] = $this->BookingModel->GET(array(),$config['per_page'],$offset);
			$this->data['Total'] = $Total;
			$this->data['PerPage'] = $config['per_page'];
			$this->render('Booking/booking_view','master');
		}else{
			redirect('Home');
		}
	}

	public function Add()
	{
		$this->data['PageHeader'] = "Package Booking Details";
		if($this->session->userdata('UserRole') === 'Admin') {
			
			$this->data['NextEntityNo'] = $this->PackageModel->Get_Next_Entity_No('packages_booking_info');
			$this->data['PackagesList'] = $this->PackageModel->Get_Packages_Title();
			$this->data['PackagesList'] = array(' ' => '-- Select Package --') + $this->data['PackagesList'];
			$this->data['ClientsList'] = $this->ClientModel->Get_Clients_Name();
			$this->data['ClientsList'] = array(' ' => '-- Select Client --') + $this->data['ClientsList'];

			if(!$this->input->post('AddBooking'))
			{
				$this->data['message'] = '';
				$this->render('Booking/add_view','master');
				//$this->load->view('Booking/add_view', $this->data);
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
					$this->data['message'] = validation_errors();
					$this->render('Booking/add_view','master');
					//$this->load->view('Booking/add_view', $this->data);
				}
			}
		}else{
			redirect('Home');
		}
	}

	public function Reservation($id = 0)
	{	
		$this->data['title'] = 'Reserved a Package';
		$this->data['NextEntityNo'] = $this->PackageModel->Get_Next_Entity_No('packages_booking_info');
		if($this->session->userdata('UserRole') === 'Client') {
			$this->data['Booking'] = $this->BookingModel->Get_By_ID($id);
			$this->data['Package'] = $this->PackageModel->Get_Details($this->data['Booking']['PackageId']);
			$this->data['Client'] = $this->ClientModel->Get_Details($this->data['Booking']['ClientId']);
			$this->data['TotalCost'] = (1 * $this->data['Package']['Cost'])-($this->data['Package']['Discount']/100);
			if(!$this->input->post('Reserved'))
			{
				$this->data['message'] = '';
				$this->load->view('Booking/reservation_view', $this->data);
			}
			else
			{
				if($this->form_validation->run('ClientBookingInfoForm'))
				{
					$this->data = array(
						'PackageId' => $this->input->post('PackageId'),
						'Quantity' => $this->input->post('Quantity'),
						'ClientId' => $this->input->post('ClientId'),
					    'TotalCost' => $this->input->post('TotalCost'),
					    'Date' => $this->input->post('BookingDate')
					);
					$Status = $this->BookingModel->Add_New_Booking_info($this->data);
			        if($Status){
					    	$this->session->set_flashdata('success', 'Data added successfully.');
					}else{
					    	$this->session->set_flashdata('error', 'Some problems occured, please try again.');
					}
					redirect(base_url('Client/Index'));
				}
				else
				{
					$this->data['message'] = validation_errors();
					$this->load->view('Booking/reservation_view', $this->data);
				}
			}
		}else{
			redirect('Home');
		}
	}

	public function edit($id = 0)
	{	
		$this->data['title'] = 'Update Booking Details';
		if($this->session->userdata('UserRole') === 'Admin') {
			$this->data['PackagesList'] = $this->PackageModel->Get_Packages_Title();
			$this->data['PackagesList'] = array(' ' => '-- Select Package --') + $this->data['PackagesList'];
			$this->data['ClientsList'] = $this->ClientModel->Get_Clients_Name();
			$this->data['ClientsList'] = array(' ' => '-- Select Client --') + $this->data['ClientsList'];
			$this->data['Booking'] = $this->BookingModel->Get_By_ID($id);
			$this->data['Package'] = $this->PackageModel->Get_Details($this->data['Booking']['PackageId']);
			$BookingId = $this->data['Booking']['EntityNo'];
			if(!$this->input->post('Update'))
			{
				$this->data['message'] = '';
				$this->load->view('Booking/edit_view', $this->data);
			}
			else
			{
				if($this->form_validation->run('BookingInfoForm'))
				{
					$this->data = array(
						'EntityNo' => $BookingId,
						'PackageId' => $this->input->post('PackageId'),
						'Quantity' => $this->input->post('Quantity'),
						'ClientId' => $this->input->post('ClientId'),
					    'TotalCost' => $this->input->post('TotalCost'),
					    'Date' => $this->input->post('BookingDate')
					);
					$Status = $this->BookingModel->Update_Booking_info($this->data);

					if($Status){
						$this->session->set_flashdata('success', 'Data Updated successfully.');
					}else{
						$this->session->set_flashdata('error', 'Some problems occured, please try again.');
					}
					redirect(base_url('Booking/AllBooking'));
				}
				else
				{
					$this->data['message'] = validation_errors();
					$this->load->view('Booking/edit_view', $this->data);
				}
			}
		}else{
			redirect('Home');
		}
	}

	public function Details($EntityNo)
	{
		$this->data['title'] = "Package Details";
		if($this->session->userdata('UserRole') === 'Admin') {
			$this->data['Booking'] = $this->BookingModel->Get_By_ID($EntityNo);
			$this->data['Client'] = $this->ClientModel->Get_Details($this->data['Booking']['ClientId']);
			$this->data['Package'] = $this->PackageModel->Get_Details($this->data['Booking']['PackageId']);
			$this->load->view('Booking/details_view',$this->data);
		}else{
			redirect('Home');
		}
	}

	public function Remove($EntityNo)
	{
		$this->data['title'] = "Remove Package Details";
		if($this->session->userdata('UserRole') === 'Admin') {
			$this->data['Package'] = $this->PackageModel->Get_By_ID($EntityNo);
			$PackageId = $this->data['Package']['ID'];
			if($this->data['Package']['Gallery'] === '1'){
				$this->data['Package']['Images'] = explode(",",$this->PackageModel->Get_Images($PackageId));
			}
			if($this->input->post('Delete'))
			{
				$PackageData = array(
					'EntityNo' => $this->data['Package']['EntityNo'],
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
			$this->load->view('Package/remove_view',$this->data);
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
