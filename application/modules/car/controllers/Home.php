<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MX_Controller {

	public function index()
	{
		// $list = $this->db->where('brother', $this->session->user_id)->get('santalist')->row('points');
		// $data["refcount"] = $list === "" ? 0 : ($list === 0 ? $list + 1 : $list);
		$data = [];
		serve('dashboard', $data);
	}

	function priceplans(){serve("pricePlans"); }
	function driver(){serve("drivers"); }
}
