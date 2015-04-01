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

			$this->email->from('noreply@dev.enterpriser.co.uk', 'Enterpriser');
			$this->email->to($email); 

			$this->email->subject('Enterpriser Email Verification');
			$message="<h2>Thank you for joining Enterpriser</h2>
			<p>To complete your registration please click the link below to verify your account and login.</p>
			<p><strong><a href='http://dev.enterpriser.co.uk/index.php/login/approve/".$randstring."'>Approve</a></strong></p>
			<p>Alternatively copy and paste the following link into your address bar: http://dev.enterpriser.co.uk/index.php/login/approve/".$randstring."</p>
			<br>
			<p>Thanks,<br>Enterpriser.co.uk</p>";
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
			$sql = "UPDATE users SET verified=1 WHERE rand = :randomval";
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

		$sql = "UPDATE users SET filename = :filename, firsttime = 0 WHERE user_id = :user_id";
		$stmt = $this->db->conn_id->prepare($sql);
		//$stmt->bindParam(':filename' => $thumbname.$image_data['file_ext']);
		//$stmt->bindParam(':user_id' => $user_id);
		$stmt->bindParam(':filename', $filename);
		$stmt->bindParam(':user_id', $user_id);
		$stmt->execute();


	}

	public function mydiscounts()
	{
		$user_id = $this->session->userdata('user_id');
		//$sql = "SELECT * FROM discounts INNER JOIN destinations ON destinations.destination_id = holidays.destination_id WHERE user_id = :id ORDER BY holiday_id DESC";
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