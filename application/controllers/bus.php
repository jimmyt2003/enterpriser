<?php

class Bus extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("bus_model");
		$this->load->helper("url");
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->gallery_path = realpath(APPPATH . '../uploads');
		$autoload['helper'] = array('url', 'form', 'file');
	}

	public function index()
	{
		$data['profile']=$this->bus_model->myprofile();
		$data['businesses']=$this->bus_model->mybusinesses();
		$this->load->view('header');
		$this->load->view('sidebar', $data);
		$this->load->view('user/controlpanel', $data);
		$this->load->view('footer');
	}

	public function business($business_name)
	{
		$business_name = str_replace('_', ' ', $business_name);
		$data['business_info']=$this->bus_model->business($business_name);
		$this->load->view("templates/header");
		$this->load->view("templates/1", $data);
		$this->load->view("footer");	
	}

	
}

/* End of file */
