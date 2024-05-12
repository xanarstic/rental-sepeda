<?php

class M_Penyewaan extends Model
{
	public function tambah($data)
	{
		$query = $this->insert('tbl_penyewaan', $data);
		$query = $this->execute();
		return $query;
	}

	public function lihat()
	{
		$query = $this->setQuery("SELECT 
		tbl_akun.alamat, 
		tbl_akun.no_telp, 
		tbl_penyewaan.id, 
		tbl_penyewaan.total_harga, 
		tbl_sepeda.gambar, 
		tbl_jenis.jenis,
		tbl_penyewaan.tgl_pinjam, 
		tbl_penyewaan.lama_pinjam, 
		tbl_penyewaan.tgl_kembali, 
		tbl_akun.nama AS nama_pelanggan 
	FROM 
		tbl_penyewaan 
	INNER JOIN 
		tbl_akun ON tbl_penyewaan.id_pelanggan = tbl_akun.id 
	INNER JOIN 
		tbl_sepeda ON tbl_penyewaan.id_sepeda = tbl_sepeda.id 
	LEFT JOIN 
		tbl_jenis ON tbl_sepeda.id_jenis = tbl_jenis.id;
	");

		$query = $this->execute();
		return $query;
	}

	public function lihatwhere($date)
	{
		$query = $this->setQuery("SELECT 
		tbl_akun.alamat, 
		tbl_akun.no_telp, 
		tbl_penyewaan.id, 
		tbl_penyewaan.total_harga, 
		tbl_sepeda.gambar, 
		tbl_jenis.jenis,
		tbl_penyewaan.tgl_pinjam, 
		tbl_penyewaan.lama_pinjam, 
		tbl_penyewaan.tgl_kembali, 
		tbl_akun.nama AS nama_pelanggan 
	FROM 
		tbl_penyewaan 
	INNER JOIN 
		tbl_akun ON tbl_penyewaan.id_pelanggan = tbl_akun.id 
	INNER JOIN 
		tbl_sepeda ON tbl_penyewaan.id_sepeda = tbl_sepeda.id 
	LEFT JOIN 
		tbl_jenis ON tbl_sepeda.id_jenis = tbl_jenis.id WHERE tbl_penyewaan.tgl_kembali = '$date'
	");

		$query = $this->execute();
		return $query;
	}

	public function pendapatan(){
		$query = $this->setQuery("SELECT 
		tbl_akun.alamat, 
		tbl_akun.no_telp, 
		tbl_penyewaan.id, 
		tbl_penyewaan.total_harga, 
		tbl_sepeda.gambar, 
		tbl_jenis.jenis,
		tbl_penyewaan.tgl_pinjam, 
		tbl_penyewaan.lama_pinjam, 
		tbl_penyewaan.tgl_kembali, 
		tbl_akun.nama AS nama_pelanggan 
	FROM 
		tbl_penyewaan 
	INNER JOIN 
		tbl_akun ON tbl_penyewaan.id_pelanggan = tbl_akun.id 
	INNER JOIN 
		tbl_sepeda ON tbl_penyewaan.id_sepeda = tbl_sepeda.id 
	LEFT JOIN 
		tbl_jenis ON tbl_sepeda.id_jenis = tbl_jenis.id;
	");
	$query = $this->execute();
	return $query;
	}

	public function lihat_id($id)
	{
		$query = $this->get_where('tbl_penyewaan', ['id' => $id]);
		$query = $this->execute();
		return $query;
	}

	public function ubah($data, $id)
	{
		$query = $this->update('tbl_penyewaan', $data, ['id' => $id]);
		$query = $this->execute();
		return $query;
	}

	public function cek($id)
	{
		$query = $this->get_where('tbl_penyewaan', ['id' => $id]);
		$query = $this->execute();
		return $query;
	}

	public function hapus($id)
	{
		$query = $this->delete('tbl_penyewaan', ['id' => $id]);
		$query = $this->execute();
		return $query;
	}

	public function detail($id)
	{
		$query = $this->setQuery("SELECT tbl_penyewaan.*, tbl_akun.nama AS nama_pelanggan, tbl_sepeda.nama AS nama_sepeda, tbl_perjalanan.asal, tbl_perjalanan.tujuan, FROM tbl_penyewaan INNER JOIN tbl_akun ON tbl_penyewaan.id_pelanggan = tbl_akun.id INNER JOIN tbl_sepeda ON tbl_penyewaan.id_sepeda = tbl_sepeda.id  WHERE tbl_penyewaan.id = $id");
		$query = $this->execute();
		return $query;
	}
}
