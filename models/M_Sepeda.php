<?php 

class M_sepeda extends Model {
	public function lihat(){
		$query = $this->setQuery('SELECT tbl_sepeda.harga, tbl_sepeda.gambar, tbl_sepeda.id_jenis, tbl_jenis.jenis, tbl_jenis.id, tbl_sepeda.status, tbl_sepeda.id 
			FROM tbl_sepeda 
			LEFT JOIN tbl_jenis ON tbl_sepeda.id_jenis = tbl_jenis.id');
		$query = $this->execute();
		return $query;
	}
	
	public function tambah($data){
		$query = $this->insert('tbl_sepeda', $data);
		$query = $this->execute();
		return $query;
	}

	public function lihat_id($id){
		$query = $this->setQuery("SELECT *, tbl_sepeda.id AS id_sepeda, tbl_sepeda.id_jenis AS id_jenis FROM tbl_sepeda INNER JOIN tbl_jenis ON tbl_jenis.id = tbl_sepeda.id_jenis where tbl_sepeda.id = $id");
		$query = $this->execute();
		return $query;
	}

	public function ubah($data, $id){
		$query = $this->update('tbl_sepeda', $data, ['id' => $id]);
		$query = $this->execute();
		return $query;
	}

	public function cek($id){
		$query = $this->get_where('tbl_sepeda', ['id' => $id]);
		$query = $this->execute();
		return $query;
	}

	public function detail($id){
		$query = $this->setQuery("SELECT *, tbl_sepeda.id AS id_sepeda, tbl_sepeda.id_jenis AS id_jenis FROM tbl_sepeda INNER JOIN tbl_jenis ON tbl_jenis.id = tbl_sepeda.id_jenis where tbl_sepeda.id = $id");
		$query = $this->execute();
		return $query;
	}

	public function hapus($id){
		$query = $this->delete('tbl_sepeda', ['id' => $id]);
		$query = $this->execute();
		return $query;
	}
}