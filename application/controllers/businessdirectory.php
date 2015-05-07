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

	public function search_redirect(){
		$this->load->helper(array('form', 'url'));

		$this->load->library('form_validation');
		$this->form_validation->set_rules('search', 'Search Term', 'trim|required|min_length[1]|max_length[50]|xss_clean');
		if ($this->form_validation->run() == FALSE)
		{
			
		}
		else
		{
			//$this->load->helper('url');
			$searchterm = $this->input->post('search');
			$searchterm=strip_tags($searchterm);
			if($searchterm!=""||$searchterm!=" ")
			{
			$this->businessdirectory_model->add_search_term($searchterm);
			}
			redirect('search/'.$searchterm, 'location');
		}					
	}
	
	public function search($searchterm, $offset = 0)
	{
		$searchterm = urldecode($searchterm);
		$searchterm=strip_tags($searchterm);

		$this->load->library('pagination');
		$config['base_url'] = $this->config->base_url().'search/'.$searchterm;
		$config['total_rows'] = $this->businessdirectory_model->search_count($searchterm);
		$config['per_page'] = 24; 
		$config['next_link'] = 'Next &gt;';
		$config['prev_link'] = '&lt; Back';
		$config['uri_segment'] =2;
		$this->pagination->initialize($config); 
		$data['businesses']=$this->businessdirectory_model->search_businesses($searchterm, 24, $offset);
		$data['query']=$searchterm;

		$this->load->view("sidebar", $data);
		$this->load->view("display_businesses", $data);
		$this->load->view("footer");
	}
	
}

/* End of file */
