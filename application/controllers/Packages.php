<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Packages extends MY_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('PackageModel');
		$this->load->library('UniqueKey');
	}

	public function test(){
		/*$path = 'Public/Photos/Packages/demo';
		if (!is_dir('Public/Photos/Packages/demo')) {
		    mkdir('Public/Photos/Packages/demo', 0777, TRUE);
		}
		if (is_dir($path)) {
		    rmdir($path);
		}*/
		$now = new DateTime();
		echo time();
	}

	public function AllPackages($offset = 0)
	{
		$this->data['PageHeader'] = "All Package Details";

		if($this->session->userdata('UserRole') === 'Admin') {

			$Total = $this->PackageModel->Get_Total_Rows(array(),'packages_info');

			$this->load->library('pagination');

			$config = $this->Config_Pagination('Packages/AllPackages',$Total);
			$this->pagination->initialize($config);
				
			$this->data['PackageList'] = $this->PackageModel->GET(array(),$config['per_page'],$offset);
			$this->data['Total'] = $Total;
			$this->data['PerPage'] = $config['per_page'];

			$this->render('Package/packages_view','master');
			//$this->load->view('Package/packages_view',$this->data);
		}else{
			redirect('Home');
		}
	}

	public function Gallery($id = 0)
	{
		$this->data['PageHeader'] = "Package Gallery";
		$this->data['message'] = '';
		if($this->session->userdata('UserId')) {
			$PackageInfo = $this->PackageModel->Get_By_ID($id);
			$this->data['PackageTitle'] = $PackageInfo['Title'];
			$this->data['ID'] = $PackageInfo['ID'];
			$this->data['EntityNo'] = $id;
			$this->data['ImageList'] = explode(",",$this->PackageModel->Get_Images($PackageInfo['ID']));

			if($this->session->userdata('UserRole') === 'Admin') {
				$this->render('Package/gallery_view','master');
			}
			elseif($this->session->userdata('UserRole') === 'Client') {
				$this->render('Package/gallery_view','client');
			}
			
			//$this->load->view('Package/gallery_view',$this->data);
		}else{
			redirect('Home');
		}
	}

	public function Add()
	{
		$this->data['PageHeader'] = "Add Package Details";
		if($this->session->userdata('UserRole') === 'Admin') {
			
			$this->data['NextEntityNo'] = $this->PackageModel->Get_Next_Entity_No('Packages_info');

			if(!$this->input->post('AddPackage'))
			{
				$this->data['message'] = '';
				$this->render('Package/add_view','master');
				//$this->load->view('Package/add_view', $this->data);
			}
			else
			{
				if($this->form_validation->run('PackageInfoForm'))
				{
					$PackageId = $this->uniquekey->GUID();
					$Gallery = 0;
					if (!empty($_FILES['Photos']['name'][0])) {
						$this->load->library('upload');
						$cpt = count($_FILES['Photos']['name']);
						$files = $_FILES;
						$time = time();
						for($i=0; $i<$cpt; $i++)
                		{
                			$_FILES['Photos']['name']= $files['Photos']['name'][$i];
                			$_FILES['Photos']['type']= $files['Photos']['type'][$i];
                			$_FILES['Photos']['tmp_name']= $files['Photos']['tmp_name'][$i];
                 			$_FILES['Photos']['error']= $files['Photos']['error'][$i];
                 			$_FILES['Photos']['size']= $files['Photos']['size'][$i];
                 			$fileName = $PackageId.'_'.$time.'.jpg';
                 			++$time;
                 			$this->upload->initialize($this->set_upload_options($fileName));
                			$this->upload->do_upload('Photos');
                 			$images[] = $fileName;
						}
					}

					if(!empty($images)){
						$Gallery = 1;
						$ImageStatus = $this->PackageModel->Add_Package_Photos($PackageId,$images);
					}
					
					$PackageData = array(
						'ID' => $PackageId,
						'Title' => $this->input->post('Title'),
						'Gallery' => $Gallery,
				        'Cost' => $this->input->post('Cost'),
				      	'Type' => $this->input->post('Type'),
				      	'Discount' => $this->input->post('Discount'),
				       	'Remarks' => $this->input->post('Remarks'),
				       	'BookingLastDate' => $this->input->post('BookingLastDate')
					);
					$this->dataStatus = $this->PackageModel->Add_New_Package_info($PackageData);

					//Storing insertion status message.
			        if($ImageStatus || $this->dataStatus){
					    	$this->session->set_flashdata('success', 'Data added successfully.');
					}else{
					    	$this->session->set_flashdata('error', 'Some problems occured, please try again.');
					}

					redirect(base_url('Packages/AllPackages'));
				}
				else
				{
					$this->data['message'] = validation_errors();
					$this->render('Package/add_view','master');
					//$this->load->view('Package/add_view', $this->data);
				}
			}
		}else{
			redirect('Home');
		}
	}

	private function set_upload_options($fileName){
		$config = array();
		$config = array(
			'upload_path' => "Public/Photos/Packages",
			'allowed_types' => "jpg|png|jpeg",
			'overwrite' => TRUE,
			'max_size' => "2048000",
			'max_height' => "1200",
			'max_width' => "1600",
			'file_name' => $fileName
		);
		return $config;
	}

	public function edit($id = 0)
	{	
		$this->data['PageHeader'] = 'Update Package Details';
		if($this->session->userdata('UserRole') === 'Admin') {
			$this->data['Package'] = $this->PackageModel->Get_By_ID($id);
			
			if(empty($this->data['Package'])){
				$this->session->set_flashdata('error', 'There are no informations for this package!, please try again.');
				redirect(base_url('Packages/AllPackages'));
			}

			$PackageId = $this->data['Package']['ID'];
			if($this->data['Package']['Gallery'] === '1'){
				$this->data['Package']['Images'] = explode(",",$this->PackageModel->Get_Images($PackageId));
			}
			if(!$this->input->post('Update'))
			{
				$this->data['message'] = '';
				$this->render('Package/edit_view','master');
			}
			else
			{
				if($this->form_validation->run('PackageInfoForm'))
				{
					$PackageId = $PackageId;
					$Gallery = $this->data['Package']['Gallery'];
						if (!empty($_FILES['Photos']['name'][0])) {
							$this->load->library('upload');
							$cpt = count($_FILES['Photos']['name']);
							$files = $_FILES;
							$time = time();
							for($i=0; $i<$cpt; $i++)
	                		{
	                			$_FILES['Photos']['name']= $files['Photos']['name'][$i];
	                			$_FILES['Photos']['type']= $files['Photos']['type'][$i];
	                			$_FILES['Photos']['tmp_name']= $files['Photos']['tmp_name'][$i];
	                 			$_FILES['Photos']['error']= $files['Photos']['error'][$i];
	                 			$_FILES['Photos']['size']= $files['Photos']['size'][$i];
	                 			$fileName = $PackageId.'_'.$time.'.jpg';
	                 			++$time;
	                 			$this->upload->initialize($this->set_upload_options($fileName));
	                			$this->upload->do_upload('Photos');
	                 			$images[] = $fileName;
							}
						}

						if(!empty($images)){
							$Gallery = 1;
							$ImageStatus = $this->PackageModel->Add_Package_Photos($PackageId,$images);
						}
						
						$PackageData = array(
							'EntityNo' => $this->input->post('EntityNo'),
							'ID' => $PackageId,
							'Title' => $this->input->post('Title'),
							'Gallery' => $Gallery,
					        'Cost' => $this->input->post('Cost'),
					      	'Type' => $this->input->post('Type'),
					      	'Discount' => $this->input->post('Discount'),
					       	'Remarks' => $this->input->post('Remarks'),
					       	'BookingLastDate' => $this->input->post('BookingLastDate')
						);
						$this->dataStatus = $this->PackageModel->Update_Package_info($PackageData);

						//Storing insertion status message.
				        if($ImageStatus || $this->dataStatus){
						    	$this->session->set_flashdata('success', 'Data Updated successfully.');
						}else{
						    	$this->session->set_flashdata('error', 'Some problems occured, please try again.');
						}

						redirect(base_url('Packages/AllPackages'));
					}
					else
					{
						$this->data['message'] = validation_errors();
						$this->render('Package/edit_view','master');
					}
			}
		}else{
			redirect('Home');
		}
	}

	public function Details($EntityNo)
	{
		$this->data['PageHeader'] = "Package Details";
		$this->data['Package'] = $this->PackageModel->Get_By_ID($EntityNo);
		if(empty($this->data['Package'])){
			$this->session->set_flashdata('error', 'There are no informations for this package!, please try again.');
			redirect(base_url('Packages/AllPackages'));
		}
		$PackageId = $this->data['Package']['ID'];
		$this->data['EntityNo'] = $this->data['Package']['EntityNo'];
		if($this->data['Package']['Gallery'] === '1'){
			$this->data['Package']['Images'] = explode(",",$this->PackageModel->Get_Images($PackageId));
		}
		if($this->session->userdata('UserRole') === 'Admin') {
			$this->render('Package/details_view','master');
		}
		elseif($this->session->userdata('UserRole') === 'Client') {
			$this->render('Client/package_details_view','client');
		}
		else{
			$this->render('Common/details_view','public');
		}
	}

	public function Remove($EntityNo)
	{
		$this->data['PageHeader'] = "Remove Package Details";
		if($this->session->userdata('UserRole') === 'Admin') {
			$this->data['Package'] = $this->PackageModel->Get_By_ID($EntityNo);
			if(empty($this->data['Package'])){
				$this->session->set_flashdata('error', 'There are no informations for this package!, please try again.');
				redirect(base_url('Packages/AllPackages'));
			}
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
			$this->render('Package/remove_view','master');
		}else{
			redirect('Home');
		}
	}

	public function PackageDetails(){
		$packageId = $this->input->post('packageId');
		$this->data['Package'] = $this->PackageModel->Get_Details($packageId);
		echo json_encode($this->data);
	}
}

