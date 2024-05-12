<?php 

class C_Lp_pendapatan extends Controller {
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
		$this->pendapatan = $this->model('M_penyewaan');
	}

	public function index(){
		$data = [
			'aktif' => 'Laporan Pendapatan',
			'judul' => 'Data Laporan Pendapatan',
			'data_pendapatan' => $this->pendapatan->pendapatan(),
			'no' => 1
		];
		$this->view('lp_pendapatan', $data);
	}
}