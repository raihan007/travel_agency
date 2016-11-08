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
	'PackageInfoForm' => array(
						array(
								'field' => 'Title',
								'label' => 'Title',
								'rules' => 'trim|required|alpha_numeric_spaces|max_length[100]',
						),
						array(
								'field' => 'Cost',
								'label' => 'Cost',
								'rules' => 'trim|required|Is_Float',
						),
						array(
								'field' => 'Type',
								'label' => 'Type',
								'rules' => 'trim|required'
						),
						array(
								'field' => 'Discount',
								'label' => 'Discount',
								'rules' => 'trim|required|Is_Float'
						),
						array(
								'field' => 'BookingLastDate',
								'label' => 'Last date of booking',
								'rules' => 'trim|required|is_valid_date',
						),
						array(
								'field' => 'Remarks',
								'label' => 'Details',
								'rules' => 'trim|required|alpha_numeric_spaces|max_length[1500]'
						),
					),
	'BookingInfoForm' => array(
						array(
								'field' => 'EntityNo',
								'label' => 'Entity No',
								'rules' => 'trim|required|integer',
						),
						array(
								'field' => 'Cost',
								'label' => 'Cost',
								'rules' => 'trim|required|Is_Float',
						),
						array(
								'field' => 'Quantity',
								'label' => 'Quantity',
								'rules' => 'trim|required|integer',
						),
						array(
								'field' => 'TotalCost',
								'label' => 'Total Cost',
								'rules' => 'trim|required|Is_Float'
						),
						array(
								'field' => 'Discount',
								'label' => 'Discount',
								'rules' => 'trim|required|Is_Float'
						),
						array(
								'field' => 'BookingDate',
								'label' => 'Date of booking',
								'rules' => 'trim|required|is_valid_date',
						),
						array(
								'field' => 'PackageId',
								'label' => 'Package',
								'rules' => 'trim|required'
						),
						array(
								'field' => 'ClientId',
								'label' => 'Client',
								'rules' => 'trim|required'
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
	'SearchForm' => array(
						array(
								'field' => 'SearchType',
								'label' => 'Search Type',
								'rules' => 'trim|required',
						),
						array(
								'field' => 'SearchKey',
								'label' => 'Search',
								'rules' => 'trim|required',
						)
				   ),
);
