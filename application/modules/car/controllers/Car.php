<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Car extends MX_Controller {
	public function index(){redirec("/");}

	function hire(){serve("car/hire"); }
	function add(){
		if(!empty($_POST)){
			$p = $this->input->post();
			$p["uid"] = $this->session->user_id;
			// pf($p);
			if($this->db->insert("cars", $p)) redirect("car/detail/".$this->db->insert_id());
		}
		serve("car/addcar"); 
	}

	public function detail($id){
		$data = [];
		serve("detail",$data);
	}
	

	public function hiresuccess($id){
		$_POST["uid"] = $this->session->user_id;
		if($this->db->insert('hire', $_POST)){ redirect('car/detail/'.$id); }
	}
	

	public function hirecancel($id){
		
		$data["carid"] = $id;
		$data["status"] = 1;
		$data["uid"] = $this->session->user_id;

		if($this->db->delete('hire', $data)){ redirect('car/detail/'.$id); }
	}
	

	public function uploads($id){
		$data = [];
		serve("uploads",$data);
	}
	
	

	public function delpics($id,$id2){
		$this->db->delete("uploads",["id"=>$id]);
		redirect("car/uploads/".$id2);
	}
	

	public function image($id){
		$data = [];

		if(!empty($_FILES)){
				$config['upload_path']          = './assets/images/';
                $config['allowed_types']        = 'jpg|png|jpeg|jfif';
                $config['max_size']             = 100;
                $config['max_width']            = 1024;
                $config['max_height']           = 768;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('upload'))
                {
                        $error = array('error' => $this->upload->display_errors());
						$data["error"] =$this->upload->display_errors() ;
					}
					else
					{
						$data = array('upload_data' => $this->upload->data());
						pf($data);
						$p = ["carid" => $id, "upload"=>$this->upload->data()['file_name']];
						
						if($this->db->insert("uploads",$p )){ redirect("car/detail/".$id); }
						
                }
		}

		serve("detail",$data);
	}

	
		
}