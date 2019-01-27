<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends MX_Controller {

	public function __construct()
	{
		$this->load->model('api');
	}

	public function index()
	{
		
		render('welcome_message');

	}


	public function comdash()
	{
		$data['routes'] = $this->api->routes();
		
		$data['towns'] = $this->api->towns();
	
		render('comdash', $data);
	
	}

	


}
