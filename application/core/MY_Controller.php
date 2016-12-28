<?php defined('BASEPATH') OR exit('No direct script access allowed');
 
class MY_Controller extends CI_Controller
{
	protected $data = array();

	function __construct()
	{
		parent::__construct();
		$this->data['page_title'] = "Dream Traveler";
	}

	protected function Config_Pagination($BaseUrl='',$Total=''){
		$config = array();
		$config = [
			'base_url' => base_url($BaseUrl),
			'per_page' => 5,
			'total_rows' => $Total,
			'use_page_numbers' => TRUE,
			'full_tag_open' => '<div id="pagination" class="text-center"><ul class="pagination pagination-sm no-margin">',
			'full_tag_close' => '</ul></div>',
			'first_link' => 'First',
			'last_link' => 'Last',
	        'first_tag_open' => '<li>',
	        'first_tag_close' => '</li>',
	        'prev_link' => '&laquo',
	        'prev_tag_open' => '<li class="prev">',
	        'prev_tag_close' => '</li>',
	        'next_link' => '&raquo',
	        'next_tag_open' => '<li>',
	        'next_tag_close' => '</li>',
	        'last_tag_open' => '<li>',
	        'last_tag_close' => '</li>',
	        'cur_tag_open' => '<li class="active"><a href="#">',
	        'cur_tag_close' => '</a></li>',
	        'num_tag_open' => '<li>',
	        'num_tag_close' => '</li>',
			'next_link' => 'Next',
			'prev_link' => 'Previous',
			'uri_segment' => 3,
		];
		return $config;
	}

	protected function render($the_view = NULL, $template = 'master')
	{
	  	if($template == 'json' || $this->input->is_ajax_request())
	  	{
	    	header('Content-Type: application/json');
	    	echo json_encode($this->data);
	  	}
	  	elseif(is_null($template))
  		{
  			$this->parser->parse($the_view, $this->data);
    		//$this->load->view($the_view,$this->data);
  		}
	  	else
	  	{
	    	$this->data['the_view_content'] = (is_null($the_view)) ? '' : $this->parser->parse($the_view, $this->data, TRUE);
	    	$this->parser->parse('templates/'.$template.'_view', $this->data);
	  	}
	}
}