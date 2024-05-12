<?php 

if(!defined('BASEPATH')) echo "Tidak bisa langsung mengakses halaman ini!";

class C_Auth extends Controller{
	public function __construct(){
		$this->addFunction('url');
		if(isset($_SESSION['login'])) {
			header('Location: ' . base_url('dashboard'));
		}

		$this->addFunction('web');
		$this->addFunction('session');
		$this->req = $this->library('Request');
		$this->akun = $this->model('M_Akun');
	}
	
	public function index(){
		$this->view('login');
	}

	public function login(){
		if(!isset($_POST['login'])) {
			redirect();
		} else {
			$username = $this->req->post('username');
			$password = md5($this->req->post('password')); // Menggunakan MD5 untuk mengenkripsi password
	
			$akun = $this->akun->cek_login($username);
			
			if($akun->num_rows > 0){
				$akun = $akun->fetch_object();
				// Memeriksa apakah password yang dimasukkan cocok dengan password di database
				if($password === $akun->password){ // Password di database juga harus sudah di-hash menggunakan MD5
					setSession('login', [
						'auth' => true,
						'id' => $akun->id,
						'nama' => $akun->nama,
						'username' => $akun->username,
						'foto' => $akun->foto,
						'waktu' => date('d M Y H:i:s'),
						'level' => $akun->level
					]);
					redirect('dashboard');
				} else {
					setSession('error', 'Password salah!');
					redirect();
				}
			} else {
				setSession('error', 'Username tidak ditemukan!');
				redirect();
			}           
		}
	}
	

	public function logout(){
		unset($_SESSION['login']);
		redirect();
	}
}