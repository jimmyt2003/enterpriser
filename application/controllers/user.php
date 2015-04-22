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
		$data['profile']=$this->user_model->myprofile();
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
		$data['cats']=$this->user_model->cats();
		$this->load->view("header");
		$this->load->view('sidebar');
		$this->load->view("user/addbusiness", $data);
		$this->load->view("footer");	
	}

	public function delete_business($business_id)
	{
		$this->user_model->delete_business($business_id);
		redirect('/user/', 'refresh');
	}

	public function insert_business()
	{
		$data['cats']=$this->user_model->cats();
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
		$this->form_validation->set_rules('businessname', 'Business Name', 'required|callback_businessname_check|callback_alpha_dash_space|max_length[30]|min_length[3]');
		$this->form_validation->set_rules('businessdesc', 'Business Description', 'required|max_length[1000]|min_length[10]');
		$this->form_validation->set_rules('businesstel', 'Business Telephone', 'required|max_length[16]|min_length[5]');
		$this->form_validation->set_rules('businessurl', 'Business url', 'prep_url|max_length[100]|min_length[3]');
		if($this->form_validation->run() == TRUE)
		{
			$this->user_model->insert_business();
			redirect('/user/', 'refresh');
			//echo "inserted";
			$this->load->view("header");
			$this->load->view('sidebar');
			$this->load->view("user/addbusiness", $data);
			$this->load->view("footer");
		}else{
			$this->load->view("header");
			$this->load->view('sidebar');
			$this->load->view("user/addbusiness", $data);
			$this->load->view("footer");		
		}
	}

	public function update_business($business_id)
	{
		$data['cats']=$this->user_model->cats();
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
		//$this->form_validation->set_rules('businessname', 'Business Name', 'required');
		$this->form_validation->set_rules('businessdesc', 'Business Description', 'required|max_length[1000]|min_length[10]');
		$this->form_validation->set_rules('businesstel', 'Business Telephone', 'required|max_length[16]|min_length[5]');
		$this->form_validation->set_rules('businessurl', 'Business url', 'prep_url|max_length[100]|min_length[3]');
		if($this->form_validation->run() == TRUE)
		{
			$this->user_model->update_business($business_id);
			redirect('/user/edit_business/'.$business_id, 'refresh');
			//echo "inserted";
			$this->load->view("header");
			$this->load->view('sidebar');
			$this->load->view("user/addbusiness", $data);
			$this->load->view("footer");
		}else{
			$this->load->view("header");
			$this->load->view('sidebar');
			$this->load->view("user/addbusiness", $data);
			$this->load->view("footer");		
		}
	}

	public function edit_business($business_id)
	{
		$data['cats']=$this->user_model->cats();
		$data['business_info']=$this->user_model->edit_business($business_id);
		$this->load->view('header');
		$this->load->view('sidebar', $data);
		$this->load->view('user/edit_business', $data);
		$this->load->view('footer');
	}
	
	public function update_companylogo($business_id)
	{
		$data['business_info']=$this->user_model->edit_business($business_id);
		$this->load->view("header");
		$this->load->view('sidebar');
		$this->load->view("user/companylogo", $data);
		$this->load->view("footer");	
	}

	public function upload_companylogo($business_id)
	{
		$this->user_model->upload_companylogo($business_id);
		redirect('/user/edit_business/'.$business_id, 'refresh');
	}

	public function update_coverphoto($business_id)
	{
		$data['business_info']=$this->user_model->edit_business($business_id);
		$this->load->view("header");
		$this->load->view('sidebar');
		$this->load->view("user/coverphoto", $data);
		$this->load->view("footer");	
	}

	public function upload_coverphoto($business_id)
	{
		$this->user_model->upload_coverphoto($business_id);
		redirect('/user/edit_business/'.$business_id, 'refresh');
	}

	public function businessname_check($business_name)
	{
		if ($this->user_model->unique_business($business_name))
		{
			$this->form_validation->set_message('businessname_check', 'This %s has already been taken.');
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}

	function alpha_dash_space($business_name)
	{
	    if(!preg_match("/^([a-z ])+$/i", $business_name)){
	    	$this->form_validation->set_message('alpha_dash_space', 'This %s has special characters.');
	    	return FALSE;
	    }else{
	    	return TRUE;
	    }
	} 


	
}

/* End of file */
