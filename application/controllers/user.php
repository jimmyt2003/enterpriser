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
		$this->load->view('sidebar', $data);
		$this->load->view('user/controlpanel', $data);
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

	public function insert_business()
	{
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
		$this->form_validation->set_rules('businessname', 'Business Name', 'required');
		$this->form_validation->set_rules('businessdesc', 'Business Description', 'required');
		$this->form_validation->set_rules('businesstel', 'Business Telephone', 'required');
		$this->form_validation->set_rules('businessurl', 'Business url', 'required|prep_url');
		if($this->form_validation->run() == TRUE)
		{
			$this->user_model->insert_business();
			//redirect('/user/home/', 'refresh');
			echo "inserted";
			$this->load->view("header");
			$this->load->view('sidebar');
			$this->load->view("user/addbusiness");
			$this->load->view("footer");
		}else{
			$this->load->view("header");
			$this->load->view('sidebar');
			$this->load->view("user/addbusiness");
			$this->load->view("footer");		
		}
	}

	public function edit_business($business_id)
	{
		$data['business_info']=$this->user_model->edit_business($business_id);
		$this->load->view('header');
		$this->load->view('sidebar', $data);
		$this->load->view('user/edit_business', $data);
		$this->load->view('footer');
	}
	


	
}

/* End of file */
