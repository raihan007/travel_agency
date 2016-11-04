<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$config = array (
	'login' => array(
						array(
								'field' => 'Username',
								'label' => 'Username',
								'rules' => 'required',
						),
						array(
								'field' => 'Password',
								'label' => 'Password',
								'rules' => 'required',
						)
				   ),
	'ClientInfoForm' => array(
						array(
								'field' => 'EntityNo',
								'label' => 'Entity No',
								'rules' => 'trim|required',
						),
						array(
								'field' => 'FirstName',
								'label' => 'First Name',
								'rules' => 'trim|required',
						),
						array(
								'field' => 'LastName',
								'label' => 'Last Name',
								'rules' => 'trim|required|alpha',
						),
						array(
								'field' => 'Email',
								'label' => 'Email',
								'rules' => 'trim|required|valid_email|check_unique[users_info.Email.EntityNo]',
						),
						array(
								'field' => 'PermanentAddress',
								'label' => 'Permanent Address',
								'rules' => 'trim|required',
						),
						array(
								'field' => 'PresentAddress',
								'label' => 'Present Address',
								'rules' => 'trim|required',
						),
						array(
								'field' => 'PhoneNo',
								'label' => 'Phone No',
								'rules' => 'trim|required',
						),
						array(
								'field' => 'Birthdate',
								'label' => 'Date of Birth',
								'rules' => 'trim|required|is_valid_date',
						),
						array(
								'field' => 'BloodGroup',
								'label' => 'Blood group',
								'rules' => 'trim|required',
						),
						array(
								'field' => 'NationalIdNo',
								'label' => 'National Id No',
								'rules' => 'trim|required',
						),
						array(
								'field' => 'Username',
								'label' => 'Username',
								'rules' => 'trim|required|check_unique[users_access.Username.EntityNo]',
						),
						array(
								'field' => 'Password',
								'label' => 'Password',
								'rules' => 'trim|required|min_length[8]|max_length[10]|password_check[1,1,1,1]',
						),
						array(
								'field' => 'ConfirmPassword',
								'label' => 'Confirm Password',
								'rules'   => 'trim|required|matches[Password]'
						),
				   ),
	'EditClientInfoForm' => array(
						array(
								'field' => 'EntityNo',
								'label' => 'Entity No',
								'rules' => 'trim|required',
						),
						array(
								'field' => 'FirstName',
								'label' => 'First Name',
								'rules' => 'trim|required',
						),
						array(
								'field' => 'LastName',
								'label' => 'Last Name',
								'rules' => 'trim|required|alpha',
						),
						array(
								'field' => 'Email',
								'label' => 'Email',
								'rules' => 'trim|required|valid_email|check_unique[users_info.Email.EntityNo]',
						),
						array(
								'field' => 'PermanentAddress',
								'label' => 'Permanent Address',
								'rules' => 'trim|required',
						),
						array(
								'field' => 'PresentAddress',
								'label' => 'Present Address',
								'rules' => 'trim|required',
						),
						array(
								'field' => 'PhoneNo',
								'label' => 'Phone No',
								'rules' => 'trim|required',
						),
						array(
								'field' => 'Birthdate',
								'label' => 'Date of Birth',
								'rules' => 'trim|required|is_valid_date',
						),
						array(
								'field' => 'BloodGroup',
								'label' => 'Blood group',
								'rules' => 'trim|required',
						),
						array(
								'field' => 'NationalIdNo',
								'label' => 'National Id No',
								'rules' => 'trim|required',
						),
						array(
								'field' => 'Type',
								'label' => 'Client type',
								'rules' => 'trim|required',
						),
				   ),
	'ChangePasswordForm' => array(
						array(
								'field' => 'OldPassword',
								'label' => 'Old password',
								'rules' => 'trim|required|min_length[8]|max_length[10]|password_check[1,1,1,1]',
						),
						array(
								'field' => 'NewPassword',
								'label' => 'New password',
								'rules' => 'trim|required|min_length[8]|max_length[10]|password_check[1,1,1,1]',
						),
						array(
								'field' => 'ConfirmPassword',
								'label' => 'Confirm Password',
								'rules' => 'trim|required|matches[NewPassword]'
						),
					),
	'ChangeUsernameForm' => array(
						array(
								'field' => 'OldUsername',
								'label' => 'Old username',
								'rules' => 'trim|required|min_length[8]|max_length[10]',
						),
						array(
								'field' => 'NewUsername',
								'label' => 'New username',
								'rules' => 'trim|required|min_length[8]|max_length[10]',
						),
						array(
								'field' => 'ConfirmUsername',
								'label' => 'Confirm username',
								'rules' => 'trim|required|matches[NewUsername]'
						),
					),
	'editpro' => array(
						array(
								'field' => 'name',
								'label' => 'Name',
								'rules' => 'required',
						),
						array(
								'field' => 'price',
								'label' => 'Price',
								'rules' => 'required',
						),
						array(
								'field' => 'quantity',
								'label' => 'Quantity',
								'rules' => 'required',
						)
				   ),
);
