<?php
class Bus_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->gallery_path = realpath(APPPATH . '../uploads');
		$autoload['helper'] = array('url', 'form', 'file');
		$this->load->library('session');
	}

	public function business($business_name)
	{
		$user_id = $this->session->userdata('user_id');
		$sql = "SELECT * FROM businesses WHERE business_name = :business_name";
		$stmt = $this->db->conn_id->prepare($sql);
		$stmt->bindParam(':business_name', $business_name);
		$stmt->execute();

		$data = array();

		foreach($stmt as $row)
		{
			$data[] = array('business_id' => $row['business_id'],'user_id' => $row['user_id'],'business_name' => $row['business_name'],'description' => $row['description'],'website' => $row['website'],'logo' => $row['logo'],'company_email' => $row['company_email'],'address' => $row['address'],'tel' => $row['tel']);
		}

		return $data;
	}

}