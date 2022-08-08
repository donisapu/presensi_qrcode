<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mcrud extends CI_Model
{

	//GET
	//halaman admin
	public function getmahasiswa()
	{
		$mahasiswa = $this->db->query('SELECT * FROM mahasiswa order by id_mahasiswa desc');
		return $mahasiswa;
	}

	public function getkelas()
	{
		$kelas = $this->db->query('SELECT * FROM kelas order by id_kelas desc');
		return $kelas;
	}

	public function getmapel()
	{
		$mapel = $this->db->query('SELECT * FROM mapel order by id_mapel desc');
		return $mapel;
	}

	public function getjadwal()
	{
		$jadwal = $this->db->query('SELECT * FROM jadwal a, detail_kelas b, kelas c, mapel d where a.id_detail_kelas=b.id_detail_kelas and b.id_kelas=c.id_kelas and b.id_mapel=d.id_mapel order by a.id_jadwal desc');
		return $jadwal;
	}

	public function getdetailkelas()
	{
		$kelas = $this->db->query('SELECT * FROM detail_kelas a, kelas b, mapel c where a.id_kelas=b.id_kelas and a.id_mapel=c.id_mapel');
		return $kelas;
	}

	public function getjadwal_id($id)
	{
		$jadwal = $this->db->query("SELECT * FROM jadwal a, detail_kelas b, kelas c, mapel d where a.id_detail_kelas=b.id_detail_kelas and b.id_kelas=c.id_kelas and b.id_mapel=d.id_mapel and a.id_jadwal='$id'");
		return $jadwal;
	}

	public function getmhsjadwal($id)
	{
		$jadwal = $this->db->query("SELECT * FROM detail_jadwal a, jadwal b, detail_kelas c, kelas d, mapel e, mahasiswa f where a.id_jadwal=b.id_jadwal and b.id_detail_kelas=c.id_detail_kelas and c.id_kelas=d.id_kelas and c.id_mapel=e.id_mapel and a.id_mahasiswa=f.id_mahasiswa and f.id_mahasiswa='$id'");
		return $jadwal;
	}

	public function getjadwalmhs_id($id)
	{
		$jadwal = $this->db->query("SELECT * FROM detail_jadwal a, mahasiswa f where a.id_mahasiswa=f.id_mahasiswa and a.id_jadwal='$id'");
		return $jadwal;
	}



	public function getadmin()
	{
		$admin = $this->db->query('SELECT * FROM admin order by id_admin desc');
		return $admin;
	}

	public function getfasilitas_digital()
	{
		$fasilitas_digital = $this->db->query('SELECT * FROM fasilitas_digital order by id_fasilitas_digital desc');
		return $fasilitas_digital;
	}

	//halaman pesantren
	public function getfasdig_pesantren($id)
	{
		$fasilitas_digital = $this->db->query("SELECT * FROM fasilitas_digital_pesantren a, pesantren b, fasilitas_digital c where a.id_pesantren=b.id_pesantren and a.id_fasilitas_digital=c.id_fasilitas_digital and a.id_pesantren='$id'");
		return $fasilitas_digital;
	}

	public function getsantri_id($id)
	{
		$santri = $this->db->query("SELECT * FROM data_santri a, pesantren b where a.id_pesantren=b.id_pesantren and a.id_pesantren='$id'");
		return $santri;
	}

	public function getpengajar_id($id)
	{
		$pengajar = $this->db->query("SELECT * FROM data_pengajar a, pesantren b where a.id_pesantren=b.id_pesantren and a.id_pesantren='$id'");
		return $pengajar;
	}

	public function getprofil_pesantren_id($id)
	{
		$profil_pesantren = $this->db->query("SELECT * FROM profil_pesantren a, pesantren b where a.id_pesantren=b.id_pesantren and a.id_pesantren='$id'");
		return $profil_pesantren;
	}

	//OPERATION
	public function tambah($tabel, $data)
	{
		$add = $this->db->insert($tabel, $data);

		return $add;
	}

	public function hapus($tabel, $id)
	{
		$this->db->query("DELETE FROM $tabel where $id");
		return $this->db->affected_rows();
	}

	public function update($tabel, $data, $id)
	{
		$this->db->query("UPDATE $tabel set $data where $id");
		return $this->db->affected_rows();
	}

	function uploadGambar($nama_file = '', $folder = '')
	{
		$this->pathgambar = realpath(APPPATH . "../$folder");
		$config = array(
			'allowed_types' => 'jpg|png|gif|jpeg',
			'upload_path' => $this->pathgambar
		);
		$this->load->library('upload', $config);
		$this->upload->do_upload($nama_file);
		$file_data = $this->upload->data();
		$nama_file = $file_data['file_name'];
		return $nama_file;
	}

	function deleteFile($namagambar = '', $folder = '')
	{
		$this->pathgambar = realpath(APPPATH . "../$folder");
		unlink($this->pathgambar . "/" . $namagambar);
	}

	function kode_fasilitas_digital()
	{
		$this->db->select('right(id_fasilitas_digital,3) as kode', false);
		$this->db->order_by('id_fasilitas_digital', 'desc');
		$this->db->limit(1);
		$query = $this->db->get('fasilitas_digital');
		if ($query->num_rows() <> 0) {
			$data = $query->row();
			$kode = intval($data->kode) + 1;
		} else {
			$kode = 1;
		}

		$kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT);
		$kodejadi = 'FD' . $kodemax;

		return $kodejadi;
	}

	function kode_pesantren()
	{
		$this->db->select('right(id_pesantren,3) as kode', false);
		$this->db->order_by('id_pesantren', 'desc');
		$this->db->limit(1);
		$query = $this->db->get('pesantren');
		if ($query->num_rows() <> 0) {
			$data = $query->row();
			$kode = intval($data->kode) + 1;
		} else {
			$kode = 1;
		}

		$kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT);
		$kodejadi = 'TREN' . $kodemax;

		return $kodejadi;
	}
}
