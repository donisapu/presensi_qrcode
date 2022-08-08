<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Mcrud');
		if ($this->session->userdata('status') != 'admin') {
			redirect('login');
		}
	}

	public function index()
	{
		$this->load->view('admin/header');
		$this->load->view('admin/dashboard');
		$this->load->view('admin/footer');
	}

	public function administrator()
	{
		$data['admin'] = $this->Mcrud->getadmin();
		$this->load->view('admin/header');
		$this->load->view('admin/data_administrator', $data);
		$this->load->view('admin/footer');
	}

	public function tambahadmin()
	{

		$username = $_POST['username'];
		$password = $_POST['password'];

		$data = array('username' => $username, 'password' => $password);
		$add = $this->Mcrud->tambah('admin', $data);
		if ($add > 0) {
			$this->session->set_flashdata('suces', '<div class="col-md-12" ><div class="alert alert-success alert-message" align="center">Data Berhasil Disimpan !</div></div>');
			redirect('admin/administrator');
		} else {
		}
	}

	public function editadmin($id)
	{

		$username = $_POST['username'];
		$password = $_POST['password'];

		$data = 'username="' . $username . '", password="' . $password . '"';
		$edit = $this->Mcrud->update('admin', $data, "id_admin='$id'");
		$this->session->set_flashdata('suces', '<div class="col-md-12" ><div class="alert alert-success alert-message" align="center">Data Berhasil Diedit !</div></div>');
		redirect('admin/administrator');
	}

	public function hapusadmin($id)
	{
		$data = "id_admin='$id'";
		$hapus = $this->Mcrud->hapus('admin', $data);

		$this->session->set_flashdata('suces', '<div class="col-md-12" ><div class="alert alert-danger alert-message" align="center">Data Berhasil Dihapus !</div></div>');
		redirect('admin/administrator');
	}

	public function data_kelas()
	{
		$data['kelas'] = $this->Mcrud->getkelas();
		$this->load->view('admin/header');
		$this->load->view('admin/data_kelas', $data);
		$this->load->view('admin/footer');
	}

	public function tambahkelas()
	{

		$nama_kelas = $_POST['nama_kelas'];

		$data = array('nama_kelas' => $nama_kelas);
		$add = $this->Mcrud->tambah('kelas', $data);
		if ($add > 0) {
			$this->session->set_flashdata('suces', '<div class="col-md-12" ><div class="alert alert-success alert-message" align="center">Data Berhasil Disimpan !</div></div>');
			redirect('admin/data_kelas');
		} else {
		}
	}

	public function editkelas($id)
	{

		$nama_kelas = $_POST['nama_kelas'];

		$data = 'nama_kelas="' . $nama_kelas . '"';
		$edit = $this->Mcrud->update('kelas', $data, "id_kelas='$id'");
		$this->session->set_flashdata('suces', '<div class="col-md-12" ><div class="alert alert-success alert-message" align="center">Data Berhasil Diedit !</div></div>');
		redirect('admin/data_kelas');
	}

	public function hapuskelas($id)
	{
		$data = "id_kelas='$id'";
		$hapus = $this->Mcrud->hapus('kelas', $data);

		$this->session->set_flashdata('suces', '<div class="col-md-12" ><div class="alert alert-danger alert-message" align="center">Data Berhasil Dihapus !</div></div>');
		redirect('admin/data_kelas');
	}

	//data mapel

	public function data_mapel()
	{
		$data['mapel'] = $this->Mcrud->getmapel();
		$this->load->view('admin/header');
		$this->load->view('admin/data_mapel', $data);
		$this->load->view('admin/footer');
	}

	public function tambahmapel()
	{

		$nama_mapel = $_POST['nama_mapel'];

		$data = array('nama_mapel' => $nama_mapel);
		$add = $this->Mcrud->tambah('mapel', $data);
		if ($add > 0) {
			$this->session->set_flashdata('suces', '<div class="col-md-12" ><div class="alert alert-success alert-message" align="center">Data Berhasil Disimpan !</div></div>');
			redirect('admin/data_mapel');
		} else {
		}
	}

	public function editmapel($id)
	{

		$nama_mapel = $_POST['nama_mapel'];

		$data = 'nama_mapel="' . $nama_mapel . '"';
		$edit = $this->Mcrud->update('mapel', $data, "id_mapel='$id'");
		$this->session->set_flashdata('suces', '<div class="col-md-12" ><div class="alert alert-success alert-message" align="center">Data Berhasil Diedit !</div></div>');
		redirect('admin/data_mapel');
	}

	public function hapusmapel($id)
	{
		$data = "id_mapel='$id'";
		$hapus = $this->Mcrud->hapus('mapel', $data);

		$this->session->set_flashdata('suces', '<div class="col-md-12" ><div class="alert alert-danger alert-message" align="center">Data Berhasil Dihapus !</div></div>');
		redirect('admin/data_mapel');
	}

	//data mahasiswa

	public function data_mahasiswa()
	{
		$data['mahasiswa'] = $this->Mcrud->getmahasiswa();
		$this->load->view('admin/header');
		$this->load->view('admin/data_mahasiswa', $data);
		$this->load->view('admin/footer');
	}

	public function tambahmahasiswa()
	{

		$nim = $_POST['nim'];
		$nama = $_POST['nama'];
		$tgl_lahir = $_POST['tgl_lahir'];
		$jenis_kelamin = $_POST['jenis_kelamin'];
		$alamat = $_POST['alamat'];
		$no_telp = $_POST['no_telp'];

		$this->load->library('ciqrcode'); //pemanggilan library QR CODE

		$config['cacheable']    = true; //boolean, the default is true
		$config['cachedir']     = './assets/'; //string, the default is application/cache/
		$config['errorlog']     = './assets/'; //string, the default is application/logs/
		$config['imagedir']     = './assets/qrcodeimg/'; //direktori penyimpanan qr code
		$config['quality']      = true; //boolean, the default is true
		$config['size']         = '1024'; //interger, the default is 1024
		$config['black']        = array(224, 255, 255); // array, default is array(255,255,255)
		$config['white']        = array(70, 130, 180); // array, default is array(0,0,0)
		$this->ciqrcode->initialize($config);

		$qr = $nim . '.png';

		$params['data'] = $nim; //data yang akan di jadikan QR CODE
		$params['level'] = 'H'; //H=High
		$params['size'] = 10;
		$params['savename'] = FCPATH . $config['imagedir'] . $qr; //simpan image QR CODE ke folder
		$this->ciqrcode->generate($params); // fungsi untuk generate QR CODE

		$data = array('nim' => $nim, 'nama' => $nama, 'tgl_lahir' => $tgl_lahir, 'jenis_kelamin' => $jenis_kelamin, 'alamat' => $alamat, 'no_telp' => $no_telp, 'qr' => $qr);
		$add = $this->Mcrud->tambah('mahasiswa', $data);
		if ($add > 0) {
			$this->session->set_flashdata('suces', '<div class="col-md-12" ><div class="alert alert-success alert-message" align="center">Data Berhasil Disimpan !</div></div>');
			redirect('admin/data_mahasiswa');
		} else {
		}
	}

	public function editmahasiswa($id)
	{

		$nim = $_POST['nim'];
		$nama = $_POST['nama'];
		$tgl_lahir = $_POST['tgl_lahir'];
		$jenis_kelamin = $_POST['jenis_kelamin'];
		$alamat = $_POST['alamat'];
		$no_telp = $_POST['no_telp'];

		$this->load->library('ciqrcode'); //pemanggilan library QR CODE

		$config['cacheable']    = true; //boolean, the default is true
		$config['cachedir']     = './assets/'; //string, the default is application/cache/
		$config['errorlog']     = './assets/'; //string, the default is application/logs/
		$config['imagedir']     = './assets/qrcodeimg/'; //direktori penyimpanan qr code
		$config['quality']      = true; //boolean, the default is true
		$config['size']         = '1024'; //interger, the default is 1024
		$config['black']        = array(224, 255, 255); // array, default is array(255,255,255)
		$config['white']        = array(70, 130, 180); // array, default is array(0,0,0)
		$this->ciqrcode->initialize($config);

		$qr = $nim . '.png';

		$params['data'] = $nim; //data yang akan di jadikan QR CODE
		$params['level'] = 'H'; //H=High
		$params['size'] = 10;
		$params['savename'] = FCPATH . $config['imagedir'] . $qr; //simpan image QR CODE ke folder
		$this->ciqrcode->generate($params); // fungsi untuk generate QR CODE

		$data = 'nim="' . $nim . '",nama="' . $nama . '",tgl_lahir="' . $tgl_lahir . '",jenis_kelamin="' . $jenis_kelamin . '",alamat="' . $alamat . '",no_telp="' . $no_telp . '",qr="' . $qr . '"';
		$edit = $this->Mcrud->update('mahasiswa', $data, "id_mahasiswa='$id'");
		$this->session->set_flashdata('suces', '<div class="col-md-12" ><div class="alert alert-success alert-message" align="center">Data Berhasil Diedit !</div></div>');
		redirect('admin/data_mahasiswa');
	}

	public function hapusmahasiswa($id)
	{
		$data = "id_mahasiswa='$id'";
		$hapus = $this->Mcrud->hapus('mahasiswa', $data);

		$this->session->set_flashdata('suces', '<div class="col-md-12" ><div class="alert alert-danger alert-message" align="center">Data Berhasil Dihapus !</div></div>');
		redirect('admin/data_mahasiswa');
	}


	//atur mapel

	public function atur_mapel()
	{
		$data['atur'] = $this->Mcrud->getdetailkelas();
		$data['mapel'] = $this->Mcrud->getmapel()->result();
		$data['kelas'] = $this->Mcrud->getkelas()->result();
		$this->load->view('admin/header');
		$this->load->view('admin/atur_mapel', $data);
		$this->load->view('admin/footer');
	}

	public function tambahaturmapel()
	{

		$id_kelas = $_POST['id_kelas'];
		$id_mapel = $_POST['id_mapel'];

		$data = array('id_kelas' => $id_kelas, 'id_mapel' => $id_mapel);
		$add = $this->Mcrud->tambah('detail_kelas', $data);
		if ($add > 0) {
			$this->session->set_flashdata('suces', '<div class="col-md-12" ><div class="alert alert-success alert-message" align="center">Data Berhasil Disimpan !</div></div>');
			redirect('admin/atur_mapel');
		} else {
		}
	}

	public function editaturmapel($id)
	{

		$id_kelas = $_POST['id_kelas'];
		$id_mapel = $_POST['id_mapel'];

		$data = 'id_kelas="' . $id_kelas . '", id_mapel="' . $id_mapel . '"';
		$edit = $this->Mcrud->update('detail_kelas', $data, "id_detail_kelas='$id'");
		$this->session->set_flashdata('suces', '<div class="col-md-12" ><div class="alert alert-success alert-message" align="center">Data Berhasil Diedit !</div></div>');
		redirect('admin/atur_mapel');
	}

	public function hapusaturmapel($id)
	{
		$data = "id_detail_kelas='$id'";
		$hapus = $this->Mcrud->hapus('detail_kelas', $data);

		$this->session->set_flashdata('suces', '<div class="col-md-12" ><div class="alert alert-danger alert-message" align="center">Data Berhasil Dihapus !</div></div>');
		redirect('admin/atur_mapel');
	}


	//atur jadwal

	public function atur_jadwal()
	{
		$data['atur'] = $this->Mcrud->getjadwal();
		$data['mapel'] = $this->Mcrud->getdetailkelas()->result();
		$this->load->view('admin/header');
		$this->load->view('admin/atur_jadwal', $data);
		$this->load->view('admin/footer');
	}

	public function tambahaturjadwal()
	{

		$id_detail_kelas = $_POST['id_detail_kelas'];
		$hari = $_POST['hari'];
		$jam_masuk = $_POST['jam_masuk'];

		$data = array('id_detail_kelas' => $id_detail_kelas, 'hari' => $hari, 'jam_masuk' => $jam_masuk);
		$add = $this->Mcrud->tambah('jadwal', $data);
		if ($add > 0) {
			$this->session->set_flashdata('suces', '<div class="col-md-12" ><div class="alert alert-success alert-message" align="center">Data Berhasil Disimpan !</div></div>');
			redirect('admin/atur_jadwal');
		} else {
		}
	}

	public function editaturjadwal($id)
	{

		$id_detail_kelas = $_POST['id_detail_kelas'];
		$hari = $_POST['hari'];
		$jam_masuk = $_POST['jam_masuk'];

		$data = 'id_detail_kelas="' . $id_detail_kelas . '", hari="' . $hari . '", jam_masuk="' . $jam_masuk . '"';
		$edit = $this->Mcrud->update('jadwal', $data, "id_jadwal='$id'");
		$this->session->set_flashdata('suces', '<div class="col-md-12" ><div class="alert alert-success alert-message" align="center">Data Berhasil Diedit !</div></div>');
		redirect('admin/atur_jadwal');
	}

	public function hapusaturjadwal($id)
	{
		$data = "id_jadwal='$id'";
		$hapus = $this->Mcrud->hapus('jadwal', $data);

		$this->session->set_flashdata('suces', '<div class="col-md-12" ><div class="alert alert-danger alert-message" align="center">Data Berhasil Dihapus !</div></div>');
		redirect('admin/atur_jadwal');
	}

	//data mahasiswa
	public function detail_jadwal($id)
	{
		$data['atur'] = $this->Mcrud->getjadwalmhs_id($id);
		$data['id_jadwal'] = $id;

		$cek = $this->Mcrud->getjadwal_id($id)->row();
		$data['kelas'] = $cek->nama_kelas;
		$data['mapel'] = $cek->nama_mapel;

		$data['mahasiswa'] = $this->Mcrud->getmahasiswa()->result();

		$this->load->view('admin/header');
		$this->load->view('admin/detail_jadwal', $data);
		$this->load->view('admin/footer');
	}

	public function tambahdetailjadwal()
	{

		$id_jadwal = $_POST['id_jadwal'];
		$id_mahasiswa = $_POST['id_mahasiswa'];

		$data = array('id_jadwal' => $id_jadwal, 'id_mahasiswa' => $id_mahasiswa);
		$add = $this->Mcrud->tambah('detail_jadwal', $data);
		if ($add > 0) {
			$this->session->set_flashdata('suces', '<div class="col-md-12" ><div class="alert alert-success alert-message" align="center">Data Berhasil Disimpan !</div></div>');
			redirect('admin/detail_jadwal/' . $id_jadwal);
		} else {
		}
	}

	public function hapusdetailjadwal($id, $id_jadwal)
	{
		$data = "id_detail_jadwal='$id'";
		$hapus = $this->Mcrud->hapus('detail_jadwal', $data);

		$this->session->set_flashdata('suces', '<div class="col-md-12" ><div class="alert alert-danger alert-message" align="center">Data Berhasil Dihapus !</div></div>');
		redirect('admin/detail_jadwal/' . $id_jadwal);
	}



	public function gantipassword()
	{

		$this->load->view('admin/header');
		$this->load->view('admin/ganti_password');
		$this->load->view('admin/footer');
	}

	function gantipassword_act()
	{
		//data yang terekam pada method post atau yang kita ketikan pada inputan
		$id_admin = $this->session->id_admin;
		$username = $this->input->post('username');
		$pass_baru = $this->input->post('pass_baru');
		$ulang_pass = $this->input->post('ulang_pass');
		//proses validasi ganti dan ulangi password password
		$this->form_validation->set_rules('pass_baru', 'Password Baru', 'required|matches[ulang_pass]');
		$this->form_validation->set_rules('ulang_pass', 'Ulangi Password Baru', 'required');

		if ($this->form_validation->run() != false) {
			$data = 'username="' . $username . '", password="' . $pass_baru . '"';
			$this->Mcrud->update('admin', $data, "id_admin='$id_admin'");
			$this->session->set_flashdata('pesan', '<div class="alert alert-success">Password telah diupdate!</div>');
			redirect('admin/gantipassword');
		} else {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger">Gagal, terjadi kesalahan! pastikan ulangi password benar</div>');
			redirect('admin/gantipassword');
		}
	}

	public function laporan_absen()
	{
		$data['id_kelas'] = $this->input->get('id_kelas', true);

		if ($data['id_kelas'] != "") {
			$data['tgl1'] = $this->input->get('tgl1', true);
			$data['tgl2'] = $this->input->get('tgl2', true);

			if ($data['tgl1'] != "" && $data['tgl2'] != "") {
				$data['absen'] = $this->db->query('SELECT * FROM absen a, detail_jadwal b, jadwal c, detail_kelas d, kelas e, mapel f, 
				mahasiswa g where a.id_detail_jadwal=b.id_detail_jadwal and b.id_jadwal=c.id_jadwal and c.id_detail_kelas=d.id_detail_kelas and d.id_kelas=e.id_kelas and d.id_mapel=f.id_mapel 
				and b.id_mahasiswa=g.id_mahasiswa and e.id_kelas="' . $data['id_kelas'] . '" and tanggal >= "' . $data['tgl1'] . '" and tanggal <= "' . $data['tgl2'] . '"')->result();
			} elseif ($data['tgl1'] != "") {
				$data['absen'] = $this->db->query('SELECT * FROM absen a, detail_jadwal b, jadwal c, detail_kelas d, kelas e, mapel f, 
				mahasiswa g where a.id_detail_jadwal=b.id_detail_jadwal and b.id_jadwal=c.id_jadwal and c.id_detail_kelas=d.id_detail_kelas and d.id_kelas=e.id_kelas and d.id_mapel=f.id_mapel 
				and b.id_mahasiswa=g.id_mahasiswa and e.id_kelas="' . $data['id_kelas'] . '" and tanggal >= "' . $data['tgl1'] . '"')->result();
			} elseif ($data['tgl2'] != "") {
				$data['absen'] = $this->db->query('SELECT * FROM absen a, detail_jadwal b, jadwal c, detail_kelas d, kelas e, mapel f, 
				mahasiswa g where a.id_detail_jadwal=b.id_detail_jadwal and b.id_jadwal=c.id_jadwal and c.id_detail_kelas=d.id_detail_kelas and d.id_kelas=e.id_kelas and d.id_mapel=f.id_mapel 
				and b.id_mahasiswa=g.id_mahasiswa and e.id_kelas="' . $data['id_kelas'] . '" and tanggal <= "' . $data['tgl2'] . '"')->result();
			} else {
				$data['absen'] = $this->db->query('SELECT * FROM absen a, detail_jadwal b, jadwal c, detail_kelas d, kelas e, mapel f, 
				mahasiswa g where a.id_detail_jadwal=b.id_detail_jadwal and b.id_jadwal=c.id_jadwal and c.id_detail_kelas=d.id_detail_kelas and d.id_kelas=e.id_kelas and d.id_mapel=f.id_mapel 
				and b.id_mahasiswa=g.id_mahasiswa and e.id_kelas="' . $data['id_kelas'] . '"')->result();
			}
		} else {
			if ($data['tgl1'] != "" && $data['tgl2'] != "") {
				$data['absen'] = $this->db->query('SELECT * FROM absen a, detail_jadwal b, jadwal c, detail_kelas d, kelas e, mapel f, 
				mahasiswa g where a.id_detail_jadwal=b.id_detail_jadwal and b.id_jadwal=c.id_jadwal and c.id_detail_kelas=d.id_detail_kelas and d.id_kelas=e.id_kelas and d.id_mapel=f.id_mapel 
				and b.id_mahasiswa=g.id_mahasiswa and tanggal >= "' . $data['tgl1'] . '" and tanggal <= "' . $data['tgl2'] . '"')->result();
			} elseif ($data['tgl1'] != "") {
				$data['absen'] = $this->db->query('SELECT * FROM absen a, detail_jadwal b, jadwal c, detail_kelas d, kelas e, mapel f, 
				mahasiswa g where a.id_detail_jadwal=b.id_detail_jadwal and b.id_jadwal=c.id_jadwal and c.id_detail_kelas=d.id_detail_kelas and d.id_kelas=e.id_kelas and d.id_mapel=f.id_mapel 
				and b.id_mahasiswa=g.id_mahasiswa and tanggal >= "' . $data['tgl1'] . '"')->result();
			} elseif ($data['tgl2'] != "") {
				$data['absen'] = $this->db->query('SELECT * FROM absen a, detail_jadwal b, jadwal c, detail_kelas d, kelas e, mapel f, 
				mahasiswa g where a.id_detail_jadwal=b.id_detail_jadwal and b.id_jadwal=c.id_jadwal and c.id_detail_kelas=d.id_detail_kelas and d.id_kelas=e.id_kelas and d.id_mapel=f.id_mapel 
				and b.id_mahasiswa=g.id_mahasiswa and tanggal <= "' . $data['tgl2'] . '"')->result();
			} else {
				$data['absen'] = $this->db->query('SELECT * FROM absen a, detail_jadwal b, jadwal c, detail_kelas d, kelas e, mapel f, 
				mahasiswa g where a.id_detail_jadwal=b.id_detail_jadwal and b.id_jadwal=c.id_jadwal and c.id_detail_kelas=d.id_detail_kelas and d.id_kelas=e.id_kelas and d.id_mapel=f.id_mapel 
				and b.id_mahasiswa=g.id_mahasiswa')->result();
			}
		}


		$this->load->view('admin/header');
		$this->load->view('admin/laporan_absen', $data);
		$this->load->view('admin/footer');
	}

	public function cetak_laporan_absen()
	{
		$data['tgl1'] = $this->input->get('tgl1', true);
		$data['tgl2'] = $this->input->get('tgl2', true);

		if ($data['tgl1'] != "" && $data['tgl2'] != "") {
			$data['absen'] = $this->db->query('SELECT * FROM  absen where absen >= "' . $data['tgl1'] . '" and absen <= "' . $data['tgl2'] . '"')->result();
		} elseif ($data['tgl1'] != "") {
			$data['absen'] = $this->db->query('SELECT * FROM  absen where absen >= "' . $data['tgl1'] . '"')->result();
		} elseif ($data['tgl2'] != "") {
			$data['absen'] = $this->db->query('SELECT * FROM  absen where absen <= "' . $data['tgl2'] . '"')->result();
		} else {
			$data['absen'] = $this->db->query('SELECT * FROM  absen')->result();
		}

		$this->load->view('admin/cetak_laporan_absen', $data);
	}
}
