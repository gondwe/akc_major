<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MX_Controller {

	public function index()
	{
		
		serve('dashboard');

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
