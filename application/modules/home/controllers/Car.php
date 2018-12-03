<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Car extends MX_Controller {
	public function index(){redirec("/");}

	function hire(){serve("car/hire"); }
	function add(){
	if(!empty($_POST)){
		$p = $this->input->post();
		pf($p);
	}
		// serve("car/addcar"); 
	}
}
