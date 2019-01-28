<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends MX_Controller {

	public function __construct()
	{
		$this->load->model('Api');
	}

	public function index()
	{

		if(isset($_SESSION['user_id']))  redirect('Home');

		render('welcome_message');

	}

	public function checkbooking($param)
	{
	
		$data['id']= $param;

		if(isset($_SESSION['user_id']))  redirect('Services/bookcar/'.$param);

		render('signup', $data); 
	
	}


	public function comdash()
	{
		$data['routes'] = $this->Api->routes();
		
		$data['towns'] = $this->Api->towns();
	
		render('comdash', $data);
	
	}

	public function register()
	{
	
		$data = [];
		// $data['message'] = 'welcome';
		render('register',$data);
	
	}


	public function signup($param)
	{
	
		$p = (Object) $_POST;

		if($p->password !== $p->verify){

			$data['id']= $param;

			$data['message'] = "Passwords do not Match";

			render('signup', $data); 

		}else{
			$insert = [

				"password" => password_hash($p->verify, PASSWORD_DEFAULT),
				"username" => $p->username,
				"email" => $p->email,
				"first_name" => $p->first_name,
				"last_name" => $p->last_name,
				"phone" => $p->phone,
				"active" => 1,
			];

			

			if($this->db->insert('users',$insert)){
				
				$this->session->set_flashdata('message', "Registration Successful, Please Login");


				redirect('auth/login');

			}


		}

	}
	

	public function sign_up()
	{
	
		$p = (Object) $_POST;

		if($p->password !== $p->verify){

			// $data['id']= $param;

			$data['message'] = "Passwords do not Match";

			render('register', $data); 

		}else{


			$insert = [

				"password" => password_hash($p->verify, PASSWORD_DEFAULT),
				"username" => $p->username,
				"email" => $p->email,
				"first_name" => $p->first_name,
				"last_name" => $p->last_name,
				"phone" => $p->phone,
				"active" => 1,
				"father" => 1,
			];

			

			if($this->db->insert('users',$insert)){
				
				$this->session->set_flashdata('message', "Registration Successful, Please Login");


				redirect('auth/login');

			}



		}
	
	}

	


}
