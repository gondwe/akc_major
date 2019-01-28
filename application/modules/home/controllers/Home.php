<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MX_Controller {

	public function index() { $this->dash('profile'); }

	public function trip() { $this->dash('home'); }

	public function hire() { $this->dash('profile'); }

	public function dash($tab)
	{
		
		$data['tab'] = $tab;
		
		serve('dashboard', $data);

	}


	public function priceplans()
	{
		
		serve("pricePlans"); 
	
	}

	public function driver()
	{
	
		serve("drivers"); 
	
	}

	

	public function membership()
	{

		serve('membership');

	}


}
