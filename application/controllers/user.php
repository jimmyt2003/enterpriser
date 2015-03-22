<?php

class User extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("user_model");
		$this->load->helper("url");
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->gallery_path = realpath(APPPATH . '../uploads');
		$autoload['helper'] = array('url', 'form', 'file');
		if($this->session->userdata('user_id') == FALSE){ redirect('login/login', 'location');}
	}

	public function index()
	{
		$data['businesses']=$this->user_model->mybusinesses();
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view("user/controlpanel", $data);
		$this->load->view('footer');
	}

	public function update_profilepic()
	{
			$this->load->view("header");
			$this->load->view('sidebar');
			$this->load->view("user/profilepic");
			$this->load->view("footer");	
	}

	public function upload_profilepic()
	{
		$this->user_model->do_upload();
		redirect('/user/', 'refresh');
	}

	public function add_business()
	{
			$this->load->view("header");
			$this->load->view('sidebar');
			$this->load->view("user/addbusiness");
			$this->load->view("footer");	
	}
	


	
}

/* End of file */
