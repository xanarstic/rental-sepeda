<?php 

class C_Penyewaan extends Controller {
	public function __construct(){
		$this->addFunction('url');
		if(!isset($_SESSION['login'])) {
			$_SESSION['error'] = 'Anda harus masuk dulu!';
			header('Location: ' . base_url());
		}
		
		$this->addFunction('web');
		$this->addFunction('session');
		$this->req = $this->library('Request');
		$this->penyewaan = $this->model('M_penyewaan');
		$this->sepeda = $this->model('M_sepeda');
	}

	public function index(){
		$data = [
			'aktif' => 'penyewaan',
			'judul' => 'Data penyewaan',
			'data_penyewaan' => $this->penyewaan->lihat(),
			'data_sepeda' => $this->sepeda->lihat(),
			'no' => 1
		];
		$this->view('penyewaan/index', $data);
	}

	public function tambah(){
		if(!isset($_POST['tambah'])) redirect('penyewaan');
		$data = [
			'id_pelanggan' => $this->req->post('id_pelanggan'),
			'id_sepeda' => $this->req->post('id_sepeda'),
			'harga' => $this->req->post('harga'),
			'tgl_pinjam' => $this->req->post('tgl_pinjam'),
			'lama_pinjam' => $this->req->post('lama_pinjam'),
			'tgl_kembali' => $this->req->post('tgl_kembali'),
		];

		if($this->penyewaan->tambah($data)){
			setSession('success', 'Data berhasil ditambahkan!');
			redirect('penyewaan');
		} else {
			setSession('error', 'Data gagal ditambahkan!');
			redirect('penyewaan');
		}
	}

	public function sewa($id){
		print_r($_POST);
		$data = [
			'id_pelanggan' => $_SESSION['login']['id'],
			'id_sepeda' => $id,
			'total_harga' => $this->req->post('total_harga'),
			'tgl_pinjam' => date("Y-m-d H:i:s"),
			'lama_pinjam' => $this->req->post('durasi'),
		];

		if($this->penyewaan->tambah($data)){
			setSession('success', 'Data berhasil ditambahkan!');
			redirect('sepeda');
		} else {
			setSession('error', 'Data gagal ditambahkan!');
			redirect('sepeda');
		}
	}

	public function selesai($id){
		
		$data = [
			'tgl_kembali' => date("Y-m-d H:i:s"),
		];
		if($this->penyewaan->ubah($data, $id)){
			setSession('success', 'Data berhasil diubah!');
			redirect('penyewaan');
		} else {
			setSession('error', 'Data gagal diubah!');
			redirect('penyewaan');
		}
	}

	public function ubah($id){
		if(!isset($id) || $this->penyewaan->cek($id)->num_rows == 0) redirect('penyewaan');
		$penyewaan = $this->penyewaan->lihat_id($id)->fetch_object();
		$id_pelanggan = $penyewaan->id_pelanggan;
		$id_sepeda = $penyewaan->id_sepeda;

		$data = [
			'aktif' => 'penyewaan',
			'judul' => 'Ubah penyewaan',
			'pelanggan' => $this->pelanggan->lihat_id($id_pelanggan)->fetch_object(),
			'sepeda' => $this->sepeda->lihat_id($id_sepeda)->fetch_object(),
			'penyewaan' => $penyewaan
		];
		$this->view('penyewaan/ubah', $data);
	}

	public function proses_ubah($id){
		if(!isset($id) || $this->penyewaan->cek($id)->num_rows == 0 || !isset($_POST['ubah'])) redirect('penyewaan');

		$data = [
			'harga' => $this->req->post('harga'),
			'tgl_kembali' => $this->req->post('tgl_kembali'),
		];
		if($this->penyewaan->ubah($data, $id)){
			setSession('success', 'Data berhasil diubah!');
			redirect('penyewaan');
		} else {
			setSession('error', 'Data gagal diubah!');
			redirect('penyewaan');
		}
	}

	public function hapus($id = null){
		if(!isset($id) || $this->penyewaan->cek($id)->num_rows == 0) redirect('penyewaan');

		if($this->penyewaan->hapus($id)){
			setSession('success', 'Data berhasil dihapus!');
			redirect('penyewaan');
		} else {
			setSession('error', 'Data gagal dihapus!');
			redirect('penyewaan');
		}
	}

	public function detail($id){
		if(!isset($id) || $this->penyewaan->cek($id)->num_rows == 0) redirect('penyewaan');

		$data = [
			'aktif' => 'penyewaan',
			'judul' => 'Detail penyewaan',
			'penyewaan' => $this->penyewaan->detail($id)->fetch_object(),
		];

		$this->view('penyewaan/detail', $data);
	}
}