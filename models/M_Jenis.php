<?php 

class M_Jenis extends Model{
	public function tambah($data){
		$query = $this->insert('tbl_jenis', ['jenis' => $data]);
		$query = $this->execute();
		return $query;
	}

	public function lihat(){
		$query = $this->get('tbl_jenis');
		$query = $this->execute();
		return $query;
	}

	public function lihat_id($id){
		$query = $this->get_where('tbl_jenis', ['id' => $id]);
		$query = $this->execute();
		return $query;
	}

	public function ubah($jenis, $id){
		$query = $this->update('tbl_jenis', ['jenis' => $jenis], ['id' => $id]);
		$query = $this->execute();
		return $query;
	}

	public function cek($id){
		$query = $this->get_where('tbl_jenis', ['id' => $id]);
		$query = $this->execute();
		return $query;
	}

	public function hapus($id){
		$query = $this->delete('tbl_jenis', ['id' => $id]);
		$query = $this->execute();
		return $query;
	}
}