<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Packages extends CI_Controller {

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
		$data['title'] = "All Package Details";

		if($this->session->userdata('UserId')) {

			$Total = $this->PackageModel->Get_Number_Of_Rows('EntityNo','Packages_info');

			$this->load->library('pagination');
			$config = [
				'base_url' => base_url('Packages/AllPackages'),
				'per_page' => 5,
				'total_rows' => $Total,
			];


			$this->pagination->initialize($config);
				
			$data['PackageList'] = $this->PackageModel->Get_Packages_List($config['per_page'],$offset);
			$data['Total'] = $Total;

			$this->load->view('Package/packages_view',$data);
		}else{
			redirect('Home');
		}
	}

	public function Gallery($id = 0)
	{
		$data['title'] = "Package Gallery";
		$data['message'] = '';
		if($this->session->userdata('UserId')) {
			$PackageInfo = $this->PackageModel->Get_By_ID($id);
			$data['PackageTitle'] = $PackageInfo['Title'];
			$data['ID'] = $PackageInfo['ID'];
			$data['ImageList'] = explode(",",$this->PackageModel->Get_Images($PackageInfo['ID']));
			$this->load->view('Package/gallery_view',$data);
		}else{
			redirect('Home');
		}
	}

	public function Add()
	{
		$data['title'] = "Add Package Details";
		if($this->session->userdata('UserRole') === 'Admin') {
			
			$data['NextEntityNo'] = $this->PackageModel->Get_Next_Entity_No('Packages_info');

			if(!$this->input->post('AddPackage'))
			{
				$data['message'] = '';
				$this->load->view('Package/add_view', $data);
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
				       	'Remarks' => $this->input->post('Remarks')
					);
					$DataStatus = $this->PackageModel->Add_New_Package_info($PackageData);

					//Storing insertion status message.
			        if($ImageStatus || $DataStatus){
					    	$this->session->set_flashdata('success', 'Data added successfully created.');
					}else{
					    	$this->session->set_flashdata('error', 'Some problems occured, please try again.');
					}

					redirect(base_url('Packages/AllPackages'));
				}
				else
				{
					$data['message'] = validation_errors();
					$this->load->view('Package/add_view', $data);
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
		$data['title'] = 'Update Package Details';
		if($this->session->userdata('UserRole') === 'Admin') {
			$data['Package'] = $this->PackageModel->Get_By_ID($id);
			$PackageId = $data['Package']['ID'];
			if($data['Package']['Gallery'] === '1'){
				$data['Package']['Images'] = explode(",",$this->PackageModel->Get_Images($PackageId));
			}
			if(!$this->input->post('Update'))
			{
				$data['message'] = '';
				$this->load->view('Package/edit_view', $data);
			}
			else
			{
				if($this->form_validation->run('PackageInfoForm'))
				{
					$PackageId = $PackageId;
					$Gallery = $data['Package']['Gallery'];
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
					       	'Remarks' => $this->input->post('Remarks')
						);
						$DataStatus = $this->PackageModel->Update_Package_info($PackageData);

						//Storing insertion status message.
				        if($ImageStatus || $DataStatus){
						    	$this->session->set_flashdata('success', 'Data Updated successfully created.');
						}else{
						    	$this->session->set_flashdata('error', 'Some problems occured, please try again.');
						}

						redirect(base_url('Packages/AllPackages'));
					}
					else
					{
						$data['message'] = validation_errors();
						$this->load->view('Package/edit_view', $data);
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
			$data['Package'] = $this->PackageModel->Get_By_ID($EntityNo);
			$PackageId = $data['Package']['ID'];
			if($data['Package']['Gallery'] === '1'){
				$data['Package']['Images'] = explode(",",$this->PackageModel->Get_Images($PackageId));
			}
			$this->load->view('Package/details_view',$data);
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

	public function PackageDetails(){
		$packageId = $this->input->post('packageId');
		$data['Package'] = $this->PackageModel->Get_Details($packageId);
		echo json_encode($data);
	}
}

