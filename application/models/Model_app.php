<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_app extends CI_Model {

	public function profil($username)
	{
		$query = $this->db->query("SELECT * FROM admin WHERE uname='$username';");
		return $query->row_array();
	}

	public function add_mobil($data)
	{
		$query = $this->db->simple_query("INSERT INTO barang VALUES ('','{$data['nama']}','{$data['merk']}',{$data['harga']},{$data['jumlah']},now());");
		if ($query) {
			$this->session->set_flashdata('notif','
						<div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        	Data Berhasil Di Tambahkan.
                        </div>
					');
			redirect('app');
		} else {
			$this->session->set_flashdata('notif','
						<div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            Error! Silahkan Coba Lagi.
                        </div>
					');
			redirect('app');
		}
	}

	public function data_mobil()
	{
		$query = $this->db->query("SELECT * FROM barang;");
		return $query->result_array();
	}

	public function data_penyewa()
	{
		$query = $this->db->query("SELECT *,barang.nama AS nama_mobil,barang_laku.nama AS nama_penyewa, barang_laku.id AS id_penyewa FROM barang_laku JOIN barang WHERE barang.id=barang_laku.mobil;");
		return $query->result_array();
	}

	public function hapus_mobil($a)
	{
		$query = $this->db->simple_query("DELETE FROM barang WHERE id=$a;");
		if ($query) {
			$this->session->set_flashdata('notif','
						<div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        	Data Berhasil Di Hapus.
                        </div>
					');
			redirect('app');
		} else {
			$this->session->set_flashdata('notif','
						<div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        	Data Gagal Di Hapus!
                        </div>
					');
			redirect('app');
		}
	}

	public function edit_mobil($data)
	{
		$query = $this->db->simple_query("UPDATE barang SET nama='{$data['nama']}', merk='{$data['merk']}', harga={$data['harga']}, jumlah={$data['jumlah']}, waktu=now() WHERE id={$data['id']};");
		if ($query) {
			$this->session->set_flashdata('notif','
						<div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        	Data Berhasil Di Perbarui.
                        </div>
					');
			redirect('app');
		} else {
			$this->session->set_flashdata('notif','
						<div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            Error! Silahkan Coba Lagi.
                        </div>
					');
			redirect('app');
		}
	}

	public function add_penyewa($data)
	{
		$waktu = $data['tanggal']." ".$data['jam'];
		$query = $this->db->simple_query("INSERT INTO barang_laku VALUES ('','{$data['nik']}','{$data['nama']}','{$data['hp']}',{$data['mobil']},{$data['hari']},'$waktu',now(),'Memesan');");
		if ($query) {
			$this->session->set_flashdata('notif','
						<div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        	Data Berhasil Di Tambahkan.
                        </div>
					');
			redirect('app/penyewaan');
		} else {
			$this->session->set_flashdata('notif','
						<div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            Error! Silahkan Coba Lagi.
                        </div>
					');
			redirect('app/penyewaan');
		}
	}

	public function edit_penyewa($data)
	{
		$query = $this->db->simple_query("UPDATE barang_laku SET status='{$data['status']}' WHERE id={$data['id']};");
		if ($query) {
			$this->session->set_flashdata('notif','
						<div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        	Data Berhasil Di Ubah.
                        </div>
					');
			redirect('app/penyewaan');
		} else {
			$this->session->set_flashdata('notif','
						<div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            Error! Silahkan Coba Lagi.
                        </div>
					');
			redirect('app/penyewaan');
		}
	}

	public function hapus_penyewa($a)
	{
		$query = $this->db->simple_query("DELETE FROM barang_laku WHERE id=$a;");
		if ($query) {
			$this->session->set_flashdata('notif','
						<div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        	Data Berhasil Di Hapus.
                        </div>
					');
			redirect('app/penyewaan');
		} else {
			$this->session->set_flashdata('notif','
						<div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        	Data Gagal Di Hapus!
                        </div>
					');
			redirect('app/penyewaan');
		}
	}

	public function mobil_disewa($a)
	{
		$query = $this->db->query("SELECT count(mobil) AS banyak FROM barang_laku WHERE mobil=$a AND status!='Selesai';");
		return $query->row_array();
	}

	public function laporan($a)
	{
		$waktu = explode('-', $a);
		if (count($waktu)>2) {
			$query = $this->db->query("SELECT *,barang.nama AS namaMobil FROM barang_laku AS a JOIN barang WHERE a.mobil=barang.id AND date(waktu_pinjam)=curdate() AND status='Selesai';");
		} else {
			$query = $this->db->query("SELECT *,barang.nama AS namaMobil FROM barang_laku AS a JOIN barang WHERE a.mobil=barang.id AND year(waktu_pinjam)='{$waktu[0]}' AND month(waktu_pinjam)='{$waktu[1]}' AND status='Selesai';");
		}
		return $query->result_array();
	}

	public function total($a)
	{
		$waktu = explode('-', $a);
		if (count($waktu)>2) {
			$query = $this->db->query("SELECT sum(harga*lama_pinjam) AS hargaTotal, now() AS hariIni FROM barang_laku AS a JOIN barang WHERE a.mobil=barang.id AND date(waktu_pinjam)=curdate() AND status='Selesai';");
		} else {
			$query = $this->db->query("SELECT sum(harga*lama_pinjam) AS hargaTotal, now() AS hariIni FROM barang_laku AS a JOIN barang WHERE a.mobil=barang.id AND year(waktu_pinjam)='{$waktu[0]}' AND month(waktu_pinjam)='{$waktu[1]}' AND status='Selesai';");
		}
		return $query->row_array();
	}

	public function ganti_foto($a,$b)
	{
		$query = $this->db->simple_query("UPDATE admin SET foto='$b' WHERE uname='$a';");
		if ($query) {
			$this->session->set_flashdata('notif','
						<div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        	Foto berhasil diganti.
                        </div>
					');
			redirect('app/pengaturan');
		} else {
			$this->session->set_flashdata('notif','
						<div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        	Foto gagal diganti!
                        </div>
					');
			redirect('app/pengaturan');
		}
	}
	
}