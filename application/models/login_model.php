<?php
class Login_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->gallery_path = realpath(APPPATH . '../uploads');
		$autoload['helper'] = array('url', 'form', 'file');
		$this->load->library('session');
	}

	public function profile()
	{
		$id = $this->session->userdata('user_id');
		$sql = "SELECT * FROM users WHERE user_id = :user_id";
		$stmt = $this->db->conn_id->prepare($sql);
		$stmt->bindParam(':user_id', $id);
		$stmt->execute();

		$data = array();

			foreach($stmt as $row)
			{
				$data[] = array('name' => $row['name'],'filename' => $row['filename']);
			}

			return $data;
	}


	public function insert_user()
	{
		$randstring = mt_rand();
		$firstname=strip_tags($this->input->post('firstname'));
		$surname=strip_tags($this->input->post('surname'));
		$email=strip_tags($this->input->post('email'));
		$password=$this->input->post('password');
		$password2 = hash("sha256", $password);
		

		$stmt = $this->db->conn_id->prepare("INSERT INTO users(firstname, surname, email, password, rand) VALUES (:firstname,:surname,:email,:password,:rand)");
		$stmt->execute(array(':firstname' => $firstname,':surname' => $surname,':email' => $email,':password' => $password2,':rand' => $randstring));

			$this->load->library('email');
			$config['wordwrap'] = TRUE;
			$config['mailtype'] = 'html';

			$this->email->initialize($config);

			$this->email->from('noreply@dev.enterpriser.com', 'Enterpriser');
			$this->email->to($email); 

			$this->email->subject('Enterpriser Email Verification');
			$message="<h2>test</h2>
			<p><a href='http://www.dev.enterpriser.co.uk/login/approve/".$randstring."'>Approve</a></p>";
			$this->email->message($message);	

			$this->email->send();

	}

	public function insert_user_info()
	{
		$gender=strip_tags($this->input->post('gender'));
		$twitter=strip_tags($this->input->post('twitter'));
		$instagram=$this->input->post('instagram');
		$snapchat = $this->input->post('snapchat');
		

		$stmt = $this->db->conn_id->prepare("INSERT INTO users(name, email, password, rand) VALUES (:name,:email,:password,:rand)");
		$stmt->execute(array(':name' => $name,':email' => $email,':password' => $password2,':rand' => $randstring));

	}

	public function unique_email($email)
	{
		$sql = "SELECT * FROM users WHERE email = :email";
		$stmt = $this->db->conn_id->prepare($sql);
		$stmt->bindParam(':email', $email);
		$stmt->execute();
		
		if($stmt->rowCount()>"0")
		{
			return True;
		}else{
			return False;
		}

	}

	public function approve_email($rand)
	{
		$sql = "SELECT * FROM users WHERE rand = :randomval";
		$stmt = $this->db->conn_id->prepare($sql);
		$stmt->bindParam(':randomval', $rand);
		$stmt->execute();
		
		if($stmt->rowCount()>"0")
		{
			$sql = "UPDATE users SET validated=1 WHERE rand = :randomval";
			$stmt = $this->db->conn_id->prepare($sql);
			$stmt->bindParam(':randomval', $rand);
			$stmt->execute();
			
			return True;
		}else{
			return False;
		}
	}

	public function check_user()
	{
		$email=strip_tags($this->input->post('email'));
		$password=$this->input->post('password');
		$password2 = hash("sha256", $password);

		$sql = "SELECT * FROM users WHERE email = :email AND password = :password";
		$stmt = $this->db->conn_id->prepare($sql);
		$stmt->bindParam(':email', $email);
		$stmt->bindParam(':password', $password2);
		$stmt->execute();
		
		if($stmt->rowCount()=="1"){

			$sql = "SELECT * FROM users WHERE email = :email";
			$stmt = $this->db->conn_id->prepare($sql);
			$stmt->bindParam(':email', $email);
			$stmt->execute();


			$data = array();
			foreach($stmt as $row)
			{
			$data[] = array('user_id' => $row['user_id'],'firstname' => $row['firstname'],'email' => $row['email']);
			}
			
							foreach($data as $userinfo)
							{
								$user_id=$userinfo['user_id'];
								$name=$userinfo['firstname'];
							

								$newdata = array(
									'user_id'  => $user_id,
				                   'email'     => $email,
				                   'name' => $name,
				                   'logged_in' => TRUE
				               );
							}	
					$this->session->set_userdata($newdata);	


			return True;
		}else{
			return False;
		}
	}

	public function email_validated($email)
	{
		$valid = "1";
		$sql = "SELECT * FROM users WHERE email = :email AND verified = :valid";
		$stmt = $this->db->conn_id->prepare($sql);
		$stmt->bindParam(':email', $email);
		$stmt->bindParam(':valid', $valid);
		$stmt->execute();
		if($stmt->rowCount()==1)
		{
			return False;
		}else{
			return True;
		}

	}

	public function holidayno()
	{

		$id = $this->session->userdata('user_id');
		$sql = "SELECT * FROM holidays WHERE user_id = :id";
		$stmt = $this->db->conn_id->prepare($sql);
		$stmt->bindParam(':id', $id);
		$stmt->execute();
		$hols=$stmt->rowCount();
		return $hols;
	}

	public function firstlogin()
	{

		$id = $this->session->userdata('user_id');
		$sql = "SELECT * FROM users WHERE user_id = :id";
		$stmt = $this->db->conn_id->prepare($sql);
		$stmt->bindParam(':id', $id);
		$stmt->execute();
		foreach($stmt as $row)
		{
			$firsttime = $row['firsttime'];
		}
		if($firsttime==1)
		{
			return True;
		}else{
			return False;
		}
	}

	public function firstloginprofile()
	{

		$id = $this->session->userdata('user_id');
		$sql = "SELECT * FROM users WHERE user_id = :id";
		$stmt = $this->db->conn_id->prepare($sql);
		$stmt->bindParam(':id', $id);
		$stmt->execute();
		foreach($stmt as $row)
		{
			$firsttime = $row['firsttimeprofile'];
		}
		if($firsttime==1)
		{
			return True;
		}else{
			return False;
		}
	}

	public function get_destinations()
	{
	$sql = "SELECT * FROM destinations ORDER BY destination_name ASC";
	$stmt = $this->db->conn_id->prepare($sql);
	//$stmt->bindParam(':userid', $myuserid, PDO::PARAM_STR);
	$stmt->execute();

	$data = array();

		foreach($stmt as $row)
		{
			$data[] = array('destination_id' => $row['destination_id'],'destination_name' => $row['destination_name']);
		}

		return $data;
	}

	public function insert_holiday()
	{
		$user_id = $this->session->userdata('user_id');
		$destination=strip_tags($this->input->post('destination'));
		$arrivaldate=strip_tags($this->input->post('arrivaldate'));
		$returndate=$this->input->post('returndate');
		$description=strip_tags($this->input->post('description'));
		//echo $arrivaldate;

		$stmt = $this->db->conn_id->prepare("INSERT INTO holidays(destination_id, user_id, arrival, departure, description) VALUES (:destination_id,:user_id,:arrival,:departure,:description)");
		$stmt->execute(array(':destination_id' => $destination,':user_id' => $user_id,':arrival' => $arrivaldate,':departure' => $returndate,':description' => $description));

	}

	public function do_upload()
	{
		$user_id = $this->session->userdata('user_id');
		$rand = 0;
		$rand2 = 0;
		$date = 0;
		$thumbname = $date.$rand2.$user_id;
		//$filename = $image_data['file_name'];
		$config = array(
			'allowed_types' => 'jpg|jpeg|gif|png',
			'upload_path' => $this->gallery_path,
			'file_name' => $rand.$date.$rand2.$user_id
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
				'width' => 300,
				'height' => 300,
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
	
	$sql = "UPDATE users SET filename = :filename, firsttime = 0 WHERE user_id = :user_id";
	$stmt = $this->db->conn_id->prepare($sql);
	//$stmt->bindParam(':filename' => $thumbname.$image_data['file_ext']);
	//$stmt->bindParam(':user_id' => $user_id);
	$stmt->bindParam(':filename', $filename);
	$stmt->bindParam(':user_id', $user_id);
	$stmt->execute();


	}

	public function myholidays()
	{
		$user_id = $this->session->userdata('user_id');
		$sql = "SELECT * FROM holidays INNER JOIN destinations ON destinations.destination_id = holidays.destination_id WHERE user_id = :id ORDER BY holiday_id DESC";
		//$sql = "SELECT * FROM holidays WHERE user_id = :id ORDER BY holiday_id DESC";
		$stmt = $this->db->conn_id->prepare($sql);
		$stmt->bindParam(':id', $user_id);
		$stmt->execute();

		$data = array();

		foreach($stmt as $row)
		{
		$data[] = array('arrival' => $row['arrival'],'departure' => $row['departure'],'destination_name' => $row['destination_name'],'holiday_id' => $row['holiday_id']);
		}

		return $data;

	}


}