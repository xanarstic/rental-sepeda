<?php 

class C_Lp_penyewaan extends Controller {
	public function __construct(){
		$this->addFunction('url');
		if(!isset($_SESSION['login'])) {
			$_SESSION['error'] = 'Anda harus masuk dulu!';
			header('Location: ' . base_url());
		}
		
		$this->addFunction('web');
		$this->addFunction('session');
		$this->req = $this->library('Request');
		$this->jenis = $this->model('M_jenis');
		$this->penyewaan = $this->model('M_penyewaan');
	}

	public function index(){
		$data = [
			'aktif' => 'Laporan Penyewaan',
			'judul' => 'Data Laporan Penyewaan',
			'data_penyewaan' => $this->penyewaan->pendapatan(),
			'no' => 1
		];
		$this->view('lp_penyewaan', $data);
	}
}