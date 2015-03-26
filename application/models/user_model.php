<?php
class User_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->gallery_path = realpath(APPPATH . '../uploads');
		$autoload['helper'] = array('url', 'form', 'file');
		$this->load->library('session');
	}

	public function mybusinesses()
	{
		$user_id = $this->session->userdata('user_id');
		$sql = "SELECT * FROM businesses WHERE user_id = :user_id ORDER BY business_id DESC";
		$stmt = $this->db->conn_id->prepare($sql);
		$stmt->bindParam(':user_id', $user_id);
		$stmt->execute();

		$data = array();

		foreach($stmt as $row)
		{
		$data[] = array('business_name' => $row['business_name']);
		}

		return $data;

	}

	public function do_upload()
	{
		$user_id = $this->session->userdata('user_id');
		$rand = 0;
		$rand2 = 0;
		$date = 0;
		$thumbname = $user_id;
		//$filename = $image_data['file_name'];
		$config = array(
			'allowed_types' => 'jpg|jpeg|gif|png',
			'upload_path' => $this->gallery_path,
			'file_name' => $user_id
			);
		$this->load->library('upload', $config);
		$this->upload->do_upload();
		$image_data = $this->upload->data();

		//$width=$image_data['image_width'];
		//$height=$image_data['image_height'];
		$thumbnailsrc=$thumbname.$image_data['file_ext'];
		$config = array(
				'image_library' => 'imagemagick',
				'library_path' => '/usr/bin/',
				'source_image' => $image_data['full_path'],
				'new_image' => $this->gallery_path . '/thumbs/'.$thumbname.$image_data['file_ext'],
				'maintain_ratio' => true,
				'width' => 200,
				'height' => 200,
				'create_thumb' => true,
				'master_dim' => 'height',
				'thumb_marker' => ''
			);


		$this->load->library('image_lib', $config);
		$this->image_lib->resize();
		$this->image_lib->clear();

				$full_path = $this->gallery_path . '/thumbs/'.$thumbnailsrc;

				// check EXIF and autorotate if needed
				$this->load->library('image_autorotate', array('filepath' => $full_path));

				//end of rotate
		//form


				//insert db
		$temp_image_path=$this->config->base_url()."uploads/".$rand.$date.$rand2.$user_id.$image_data['file_ext'];
		$filename = $thumbname.$image_data['file_ext'];


	//$stmt = $this->db->conn_id->prepare("INSERT INTO images(user_id, title, description, category, tags, views, downloads, width, height, filename, rand, approved) VALUES (:user_id,:title,:description,:category,:tags,:views,:downloads,:width,:height,:filename,:rand,:approved)");
	//$stmt->execute(array(':user_id' => $user_id,':title' => $title,':description' => $description,':category' => $this->input->post('category_id'),':tags' => $tags,':views' => '0',':downloads' => '0',':width' => $width,':height' => $height,':filename' => $thumbname.$image_data['file_ext'],':rand' => $rand,':approved' => '0'));
	
	$sql = "UPDATE users SET filename = :filename WHERE user_id = :user_id";
	$stmt = $this->db->conn_id->prepare($sql);
	//$stmt->bindParam(':filename' => $thumbname.$image_data['file_ext']);
	//$stmt->bindParam(':user_id' => $user_id);
	$stmt->bindParam(':filename', $filename);
	$stmt->bindParam(':user_id', $user_id);
	$stmt->execute();


	}


}