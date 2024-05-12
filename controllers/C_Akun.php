<?php 

class C_Akun extends Controller {
	public function __construct(){
		$this->addFunction('url');
		if(!isset($_SESSION['login'])) {
			$_SESSION['error'] = 'Anda harus masuk dulu!';
			header('Location: ' . base_url());
		}
		
		$this->addFunction('web');
		$this->addFunction('session');
		$this->req = $this->library('Request');
		$this->akun = $this->model('M_Akun');
	}

	public function index(){
		$data = [
			'aktif' => 'akun',
			'judul' => 'Data Akun',
			'data_akun' => $this->akun->lihat(),
			'no' => 1
		];
		$this->view('akun/index', $data);
	}

	public function tambah() {
		if (!isset($_POST['tambah'])) redirect('akun');
	
		if ($_POST['password'] !== $_POST['password2']) {
			setSession('error', 'Password tidak sama!');
			redirect('akun');
		} else {
			// Check if file is uploaded successfully
			if ($_FILES['foto']['error'] !== UPLOAD_ERR_OK) {
				setSession('error', 'Gagal upload gambar!');
				redirect('akun');
			}
	
			// proses upload
			$upload_dir = BASEPATH . DS . 'uploads' . DS;
			$asal = $_FILES['foto']['tmp_name'];
			$ekstensi = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);
	
			$img_name = $this->req->post('nama');
			$img_name = strtolower($img_name);
			$img_name = str_replace(' ', '-', $img_name);
			$img_name = $img_name . '-' . time();
	
			// Move the uploaded file to the upload directory
			if (move_uploaded_file($asal, $upload_dir . $img_name . '.' . $ekstensi)) {
				$data = [
					'nama' => $this->req->post('nama'),
					'alamat' => $this->req->post('alamat'),
					'no_telp' => $this->req->post('no_telp'),
					'username' => $this->req->post('username'),
					'password' => md5($this->req->post('password')), // Using MD5 hashing
					'foto' => $img_name . '.' . $ekstensi,
					'level' => $this->req->post('level'),
				];
	
				// Attempt to add the user
				if ($this->akun->tambah($data)) {
					setSession('success', 'Data berhasil ditambahkan!');
					redirect('akun');
				} else {
					setSession('error', 'Data gagal ditambahkan!');
					redirect('akun');
				}
			} else {
				// Handle upload failure
				setSession('error', 'Gagal upload gambar!');
				redirect('akun');
			}
		}
	}
	
	

	public function hapus($id = null){
		if(!isset($id) || $this->akun->cek($id)->num_rows == 0) redirect('akun');

		$gambar	= $this->akun->detail($id)->fetch_object()->foto;

		unlink(BASEPATH . DS . 'uploads' . DS . $gambar) or die('gagal hapus gambar!');
		if($this->akun->hapus($id)){
			setSession('success', 'Data berhasil dihapus!');
			redirect('akun');
		} else {
			setSession('error', 'Data gagal dihapus!');
			redirect('akun');
		}
	}

	public function ubah($id){
		if(!isset($id) || $this->akun->cek($id)->num_rows == 0) redirect('akun');

		$data = [
			'aktif' => 'akun',
			'judul' => 'Ubah akun',
			'akun' => $this->akun->lihat_id($id)->fetch_object(),
		];
		$this->view('akun/index', $data);
	}
	

	public function proses_ubah($id) {
		
		// if (!isset($id) || $this->akun->cek($id)->num_rows == 0 || !isset($_POST['ubah'])) {
		// 	redirect('akun');
		// }
	
		// Validate if passwords match
		if ($_POST['password'] !== $_POST['password2']) {
			setSession('error', 'Password tidak sama!');
			redirect('akun');
		}
	
		// Get the existing data
		$existingData = $this->akun->getById($id);
		$existingData = $existingData->fetch_assoc();
		print_r($existingData);
		$existingImage = $existingData['foto']; // Get the existing image name
	
		// Process upload
		$upload_dir = BASEPATH . DS . 'uploads' . DS;
		$asal = $_FILES['foto']['tmp_name'];
		$ekstensi = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);
		$error = $_FILES['foto']['error'];
	
		$img_name = $this->req->post('nama');
		$img_name = strtolower($img_name);
		$img_name = str_replace(' ', '-', $img_name);
		$img_name = $img_name . '-' . time();
	
		// Check if the file is being uploaded
		if ($error === UPLOAD_ERR_OK) {
			// Delete existing image if it exists
			if (!empty($existingImage) && file_exists($upload_dir . $existingImage)) {
				unlink($upload_dir . $existingImage);
			}
	
			// Move uploaded file to the upload directory
			if (move_uploaded_file($asal, $upload_dir . $img_name . '.' . $ekstensi)) {
				$data = [
					'nama' => $this->req->post('nama'),
					'alamat' => $this->req->post('alamat'),
					'no_telp' => $this->req->post('no_telp'),
					'foto' => $img_name . '.' . $ekstensi,
					'username' => $this->req->post('username'),
					'password' => md5($this->req->post('password')), // Using MD5 hashing
					'level' => $this->req->post('level'),
				];
			} else {
				die('Gagal upload gambar');
			}
		} elseif ($error === UPLOAD_ERR_NO_FILE && !empty($existingImage)) {
			// If no file is uploaded and there is an existing image, retain the existing image
			$data = [
				'nama' => $this->req->post('nama'),
				'alamat' => $this->req->post('alamat'),
				'no_telp' => $this->req->post('no_telp'),
				'foto' => $existingImage,
				'username' => $this->req->post('username'),
				'password' => md5($this->req->post('password')), // Using MD5 hashing
				'level' => $this->req->post('level'),
			];
		} else {
			die('Error saat mengupload gambar');
		}
	
		// Attempt to update the data
		if ($this->akun->ubah($data, $id)) {
			setSession('success', 'Data berhasil diubah!');
			redirect('akun');
		} else {
			setSession('error', 'Data gagal diubah!');
			redirect('akun');
		}
	}
	

	public function detail($id){
		if(!isset($id) || $this->akun->cek($id)->num_rows == 0) redirect('akun');

		$data = [
			'aktif' => 'akun',
			'judul' => 'Detail Akun',
			'akun' => $this->akun->detail($id)->fetch_object(),
		];

		$this->view('akun/detail', $data);
	}
}