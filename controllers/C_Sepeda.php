<?php 

class C_sepeda extends Controller{
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
		$this->sepeda = $this->model('M_sepeda');
	}

	public function index(){
		$data = [
			'aktif' => 'sepeda',
			'judul' => 'Data sepeda',
			'data_jenis' => $this->jenis->lihat(),
			'data_sepeda' => $this->sepeda->lihat(),
			'no' => 1
		];
		$this->view('sepeda/index', $data);
	}

	public function tambah(){
		if(!isset($_POST['tambah'])) redirect('sepeda');

		// proses upload
		$upload_dir = BASEPATH . DS . 'uploads' . DS;
		$asal = $_FILES['gambar']['tmp_name'];
		$ekstensi = pathinfo($_FILES['gambar']['name'], PATHINFO_EXTENSION);
		$error = $_FILES['gambar']['error'];

		$img_name = $this->req->post('harga');
		$img_name = $this->req->post('harga');
		$img_name = strtolower($img_name);
		$img_name = str_replace(' ', '-', $img_name);
		$img_name = $img_name . '-' . time();

		if($error == 0){
			if(file_exists($upload_dir . $img_name . '.' . $ekstensi)) unlink($upload_dir . $img_name . '.' . $ekstensi);
			
			if(move_uploaded_file($asal, $upload_dir . $img_name . '.' . $ekstensi)){
				$data = [
					'id_jenis' => $this->req->post('id_jenis'),
					'harga' => $this->req->post('harga'),
					'gambar' => $img_name . '.' . $ekstensi,
					'status' => $this->req->post('status'),
				];

				if($this->sepeda->tambah($data)){
					setSession('success', 'Data berhasil ditambahkan!');
					redirect('sepeda');
				} else {
					setSession('error', 'Data gagal ditambahkan!');
					redirect('sepeda');
				}
			} else die('gagal upload gambar');
		} else die('gambar error');
	}

	public function detail($id){
		if(!isset($id) || $this->sepeda->cek($id)->num_rows == 0) redirect('sepeda');

		$data = [
			'aktif' => 'sepeda',
			'judul' => 'Detail sepeda',
			'sepeda' => $this->sepeda->detail($id)->fetch_object(),
		];

		$this->view('sepeda/detail', $data);
	}

	public function ubah($id){
		if(!isset($id) || $this->sepeda->cek($id)->num_rows == 0) redirect('sepeda');

		$data = [
			'aktif' => 'sepeda',
			'judul' => 'Ubah sepeda',
			'sepeda' => $this->sepeda->lihat_id($id)->fetch_object(),
			'data_jenis' => $this->jenis->lihat(),
		];
		$this->view('sepeda', $data);
	}

	public function proses_ubah($id){
		if(!isset($id) || $this->sepeda->cek($id)->num_rows == 0 || !isset($_POST['ubah'])) redirect('sepeda');
	
		$upload_dir = BASEPATH . DS . 'uploads' . DS;
		$asal = $_FILES['gambar']['tmp_name'];
		$ekstensi = pathinfo($_FILES['gambar']['name'], PATHINFO_EXTENSION);
		$error = $_FILES['gambar']['error'];
	
		// Mendapatkan data sepeda yang akan diubah
		$sepeda_sebelumnya = $this->sepeda->detail($id)->fetch_object();
	
		// Mengambil nama gambar sebelumnya
		$gambar_sebelumnya = $sepeda_sebelumnya->gambar;
	
		// Menyiapkan nama gambar baru
		$img_name = $sepeda_sebelumnya->gambar;
	
		// Jika ada file gambar yang diunggah
		if($error === UPLOAD_ERR_OK){
			// Menyiapkan nama file baru
			$img_name = $this->req->post('id_jenis');
			$img_name = strtolower($img_name);
			$img_name = str_replace(' ', '-', $img_name);
			$img_name = $img_name . '-' . time() . '.' . $ekstensi;
	
			// Memindahkan file gambar yang diunggah
			if(move_uploaded_file($asal, $upload_dir . $img_name)){
				// Menghapus gambar lama jika berhasil diunggah
				unlink($upload_dir . $gambar_sebelumnya) or die('gagal hapus gambar lama');
			} else {
				die('gagal upload gambar');
			}
		}
	
		// Mengumpulkan data untuk diubah
		$data = [
			'id_jenis' => $this->req->post('id_jenis'),
			'harga' => $this->req->post('harga'),
			'gambar' => $img_name,
			'status' => $this->req->post('status'),
		];
	
		// Melakukan proses perubahan data
		if($this->sepeda->ubah($data, $id)){
			setSession('success', 'Data berhasil diubah!');
			redirect('sepeda');
		} else {
			setSession('error', 'Data gagal diubah!');
			redirect('sepeda');
		}
	}
	

	public function hapus($id = null){
		if(!isset($id) || $this->sepeda->cek($id)->num_rows == 0) redirect('sepeda');

		$gambar	= $this->sepeda->detail($id)->fetch_object()->gambar;
		unlink(BASEPATH . DS . 'uploads' . DS . $gambar) or die('gagal hapus gambar!');
		if($this->sepeda->hapus($id)){
			setSession('success', 'Data berhasil dihapus!');
			redirect('sepeda');
		} else {
			setSession('error', 'Data gagal dihapus!');
			redirect('sepeda');
		}
	}
}