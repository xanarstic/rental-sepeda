<?php 

class C_Jenis extends Controller {
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
	}

	public function index(){
		$data = [
			'aktif' => 'jenis',
			'judul' => 'Data jenis',
			'data_jenis' => $this->jenis->lihat(),
			'no' => 1
		];
		$this->view('jenis/index', $data);
	}

	public function tambah(){
		if(!isset($_POST['tambah'])) redirect('jenis');

		$jenis = $this->req->post('jenis');
		if($this->jenis->tambah($jenis)){
			setSession('success', 'Data berhasil ditambahkan!');
			redirect('jenis');
		} else {
			setSession('error', 'Data gagal ditambahkan!');
			redirect('jenis');
		}
	}

	public function ubah($id){
		if(!isset($id) || $this->jenis->cek($id)->num_rows == 0) redirect('jenis');

		$data = [
			'aktif' => 'jenis',
			'judul' => 'Ubah jenis',
			'jenis' => $this->jenis->lihat_id($id)->fetch_object(),
		];
		$this->view('jenis/ubah', $data);
	}

	public function proses_ubah($id){
		if(!isset($id) || $this->jenis->cek($id)->num_rows == 0 || !isset($_POST['ubah'])) redirect('jenis');

		$jenis = $this->req->post('jenis');
		if($this->jenis->ubah($jenis, $id)){
			setSession('success', 'Data berhasil diubah!');
			redirect('jenis');
		} else {
			setSession('error', 'Data gagal diubah!');
			redirect('jenis');
		}
	}

	public function hapus($id = null){
		if(!isset($id) || $this->jenis->cek($id)->num_rows == 0) redirect('jenis');

		if($this->jenis->hapus($id)){
			setSession('success', 'Data berhasil dihapus!');
			redirect('jenis');
		} else {
			setSession('error', 'Data gagal dihapus!');
			redirect('jenis');
		}
	}
}