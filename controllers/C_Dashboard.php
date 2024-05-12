<?php 

class C_Dashboard extends Controller {
	public function __construct(){
		$this->addFunction('url');
		if(!isset($_SESSION['login'])) {
			$_SESSION['error'] = 'Anda harus masuk dulu!';
			header('Location: ' . base_url());
		}

		$this->addFunction('web');
		$this->sepeda = $this->model('M_sepeda');
		$this->penyewaan = $this->model('M_penyewaan');
		$this->akun = $this->model('M_Akun');
	}
	public function index(){
		$currentDate = date('Y-m-d');
		$data = [
			'aktif' => 'dashboard',
			'judul' => 'Dashboard',
			'sepeda' => $this->sepeda->lihat(),
			'penyewaan' => $this->penyewaan->lihat(),
			'totalbulanini' => $this->penyewaan->lihatwhere(date('Y-m-d')),
			'totalbulanini2' => $this->penyewaan->lihatwhere(date('Y-m-d')),
			'akun' => $this->akun->lihat(),
		];
		$this->view('dashboard', $data);
	}
}