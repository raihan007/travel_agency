<?php defined('BASEPATH') OR exit('No direct script access allowed');
 
class MY_Controller extends CI_Controller
{
	protected $data = array();

	function __construct()
	{
		parent::__construct();
		$this->data['page_title'] = "Dream Traveler";
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