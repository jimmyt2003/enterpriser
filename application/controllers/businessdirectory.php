<?php

class Businessdirectory extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("businessdirectory_model");
		$this->load->helper("url");
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->gallery_path = realpath(APPPATH . '../uploads');
		$autoload['helper'] = array('url', 'form', 'file');
	}

	public function index()
	{
		$data['categories']=$this->businessdirectory_model->categories();
		$this->load->view('header');
		$this->load->view('sidebar', $data);
		$this->load->view('categories', $data);
		$this->load->view('footer');
	}

	public function cat($cat_id)
	{
		$data['categories']=$this->businessdirectory_model->categoryname($cat_id);
		$data['businesses']=$this->businessdirectory_model->cat($cat_id);
		$this->load->view('header');
		$this->load->view('sidebar', $data);
		$this->load->view('categorylistings', $data);
		$this->load->view('footer');
	}

	public function business($business_id)
	{
		$data['business']=$this->businessdirectory_model->business($business_id);
		$this->load->view('header');
		$this->load->view('sidebar', $data);
		$this->load->view('businessprofile', $data);
		$this->load->view('footer');
	}
	
}

/* End of file */
