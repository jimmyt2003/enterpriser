<?php
class Businessdirectory_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->gallery_path = realpath(APPPATH . '../uploads');
		$autoload['helper'] = array('url', 'form', 'file');
		$this->load->library('session');
	}

	public function categories()
	{
		$sql = "SELECT * FROM categories ORDER BY cat_name ASC";
		$stmt = $this->db->conn_id->prepare($sql);
		$stmt->execute();
		$data = array();

		foreach($stmt as $row)
		{
			$data[] = array('cat_id' => $row['cat_id'],'cat_name' => $row['cat_name']);
		}

		return $data;
	}

	public function categoryname($cat_id)
	{
		$sql = "SELECT * FROM categories WHERE cat_id = :cat_id ORDER BY cat_name ASC";
		$stmt = $this->db->conn_id->prepare($sql);
		$stmt->bindParam(':cat_id', $cat_id);
		$stmt->execute();
		$data = array();

		foreach($stmt as $row)
		{
			$data[] = array('cat_name' => $row['cat_name']);
		}

		return $data;
	}

	public function cat($cat_id)
	{
		$sql = "SELECT * FROM businesses WHERE cat_id = :cat_id ORDER BY business_name ASC";
		$stmt = $this->db->conn_id->prepare($sql);
		$stmt->bindParam(':cat_id', $cat_id);
		$stmt->execute();
		$data = array();

		foreach($stmt as $row)
		{
			$data[] = array('cat_id' => $row['cat_id'],'business_id' => $row['business_id'],'user_id' => $row['user_id'],'business_name' => $row['business_name'],'description' => $row['description'],'website' => $row['website'],'logo' => $row['logo'],'company_email' => $row['company_email'],'address' => $row['address'],'tel' => $row['tel'],'linkcolor' => $row['linkcolor'],'headercolor' => $row['headercolor'],'bgcolor' => $row['bgcolor'],'coverphoto' => $row['coverphoto']);
		}

		return $data;
	}

	public function business($business_id)
	{
		$sql = "SELECT * FROM businesses WHERE business_id = :business_id ORDER BY business_name ASC";
		$stmt = $this->db->conn_id->prepare($sql);
		$stmt->bindParam(':business_id', $business_id);
		$stmt->execute();
		$data = array();

		foreach($stmt as $row)
		{
			$data[] = array('business_id' => $row['business_id'],'user_id' => $row['user_id'],'business_name' => $row['business_name'],'description' => $row['description'],'website' => $row['website'],'logo' => $row['logo'],'company_email' => $row['company_email'],'address' => $row['address'],'tel' => $row['tel'],'linkcolor' => $row['linkcolor'],'headercolor' => $row['headercolor'],'bgcolor' => $row['bgcolor'],'coverphoto' => $row['coverphoto']);
		}

		return $data;
	}

}