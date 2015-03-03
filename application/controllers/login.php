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

	}

	public function index()
	{
		$this->load->view('template');
		//$this->load->view("leaderboard", $data);
		//$this->load->view('footer');
	}


	public function register()
	{
		$this->load->view('header');
		$this->load->view("register");
		$this->load->view('footer');
	}

	public function edit_profile()
	{
		$data['destinations']=$this->user_model->get_destinations();
		$this->load->view('user/header', $data);
		$this->load->view("user/edit_profile");
		$this->load->view('footer');
	}

	public function first_edit_profile()
	{
		$data['destinations']=$this->user_model->get_destinations();
		$this->load->view('user/header', $data);
		$this->load->view("user/first_edit_profile");
		$this->load->view('footer');
	}

	public function add_user_info()
	{	
		
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
		$this->form_validation->set_rules('gender', 'Gender', 'required');

		if($this->form_validation->run() == TRUE)
		{
		
			$this->user_model->insert_user_info();
			//echo "right";
			redirect('/user/home/', 'refresh');
		}else{
			//echo "wrong";
			$data['destinations']=$this->user_model->get_destinations();
			$this->load->view('user/header', $data);
			$this->load->view("user/first_edit_profile");
			$this->load->view('footer');
		}


	}

	public function home()
	{
		if($this->session->userdata('user_id') == FALSE){ redirect('user/login', 'location');}

		$data['destinations']=$this->user_model->get_destinations();
		$this->load->view('user/header', $data);
		if($this->user_model->firstlogin())
		{
			$this->load->view('user/profilepic');
		}else{
			$data['holidays']=$this->user_model->myholidays();
			$data['profile']=$this->user_model->profile();
			//$data['holidays']=$this->user_model->myholidays();
			$this->load->view("user/home", $data);
		}
		$this->load->view('footer');
	}

	public function thankyou()
	{
		$this->load->view('header');
		$this->load->view("thankyou");
		$this->load->view('footer');
	}

	public function login()
	{
		$this->load->view('header');
		$this->load->view("login");
		$this->load->view('footer');
	}

	public function add_user()
	{	
		
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
		$this->form_validation->set_rules('name', 'First Name', 'required|xss_clean|max_length[30]');
		$this->form_validation->set_rules('email', 'Email Address', 'required|xss_clean|callback_email_check|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required|max_length[20]|matches[passwordconfirm]');
		$this->form_validation->set_rules('passwordconfirm', 'Confirm Password', 'required');

		if($this->form_validation->run() == TRUE)
		{
		
			$this->user_model->insert_user();
			//echo "right";
			redirect('/user/thankyou/', 'refresh');
		}else{
			//echo "wrong";
			$this->load->view("header");
			$this->load->view("register");
			$this->load->view("footer");
		}


	}

	public function check_user()
	{
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
		//$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_email_validated');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if($this->form_validation->run() == TRUE)
		{
			

			if($this->user_model->check_user())
			{
				//$data['profile']=$this->user_model->profile();
				$data['destinations']=$this->user_model->get_destinations();
				$this->load->view("user/header", $data);

					if($this->user_model->firstloginprofile())
					{
						redirect('user/first_edit_profile', 'location');
			 		}

			 		if($this->user_model->firstlogin())
					{
						$this->load->view('user/profilepic');
					}else{
						$data['holidays']=$this->user_model->myholidays();
						$data['profile']=$this->user_model->profile();
						//$data['holidays']=$this->user_model->myholidays();
						$this->load->view("user/home", $data);
					}
			 	$this->load->view("footer");
			}else
			{
				$data['wrongpassword']="wrong";
				$this->load->view("header");
				$this->load->view("login", $data);
				$this->load->view("footer");
			}

		}else{
			$this->load->view("header");
			$this->load->view("login");
			$this->load->view("footer");
		}


	}

	public function approve($rand)
	{
		if($this->user_model->approve_email($rand))
		{
				$data['rightvalidation']="right";
				$this->load->view("header");
				$this->load->view("login", $data);
				$this->load->view("footer");
		}else
		{
				$data['wrongvalidation']="wrong";
				$this->load->view("header");
				$this->load->view("login", $data);
				$this->load->view("footer");
		}
	}

	public function email_validated($email)
	{
		if ($this->user_model->email_validated($email))
		{
			$this->form_validation->set_message('email_validated', 'This %s has not been validated. Please check your e-mails.');
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}

	public function email_check($email)
	{
		if ($this->user_model->unique_email($email))
		{
			$this->form_validation->set_message('email_check', 'This %s has already been taken.');
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}

	public function logout()
	{
		$this->load->helper('url');
		$this->session->sess_destroy();
		redirect('', 'location');
	}

	public function holidays()
	{
		if($this->session->userdata('user_id') == FALSE){ redirect('user/login', 'location');}

		$data['destinations']=$this->user_model->get_destinations();
		$this->load->view("user/header", $data);

		if($this->user_model->holidayno()==0)
			{
				$data['destinations']=$this->user_model->get_destinations();
				$this->load->view("user/add_holiday", $data);
			}
		$this->load->view("footer");
	}

	public function add_holiday()
	{	
		if($this->session->userdata('user_id') == FALSE){ redirect('user/login', 'location');}

		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
		$this->form_validation->set_rules('destination', 'Destination', 'required|xss_clean');
		$this->form_validation->set_rules('arrivaldate', 'Arrival Date', 'required|callback_date_check');
		$this->form_validation->set_rules('returndate', 'Return Date', 'required|callback_date_check');
		$this->form_validation->set_rules('description', 'Description', 'required|xss_clean');

		if($this->form_validation->run() == TRUE)
		{
		
			$this->user_model->insert_holiday();
			//echo "right";
			redirect('/holidays/latest/', 'refresh');
		}else{
			//echo "wrong";
			$data['destinations']=$this->user_model->get_destinations();
			$this->load->view("user/header", $data);
			$this->load->view("user/add_holiday", $data);
			$this->load->view("footer");
		}

	}

	public function add_profilepic()
	{
		if($this->session->userdata('user_id') == FALSE){ redirect('user/login', 'location');}
		//$this->form_validation->set_rules('tags', 'Tags', 'trim|required|min_length[3]|max_length[50]|xss_clean');
		$this->user_model->do_upload();
		redirect('/user/home/', 'refresh');
/*
		if($this->form_validation->run() == TRUE){
			$this->user_model->do_upload();
		
		 	redirect('/user/home/', 'refresh');

		}else{
			$this->load->view("user/header");
			$this->load->view("user/profilepic");
			$this->load->view("footer");	
		}
		*/
	}

	public function update_profilepic()
	{
		if($this->session->userdata('user_id') == FALSE){ redirect('user/login', 'location');}

			$this->load->view("user/header");
			$this->load->view("user/profilepic");
			$this->load->view("footer");	
	}


	public function myholidays()
	{
		if($this->session->userdata('user_id') == FALSE){ redirect('user/login', 'location');}
		$data['holidays']=$this->user_model->myholidays();
		$data['destinations']=$this->user_model->get_destinations(); $data['destinations']=$this->user_model->get_destinations(); $this->load->view('user/header', $data);
		$this->load->view("holidays", $data);
		$this->load->view('footer');
	}


	
}

/* End of file */