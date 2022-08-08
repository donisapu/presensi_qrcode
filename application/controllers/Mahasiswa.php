<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends CI_Controller {
	function __construct(){
		parent:: __construct();
		$this->load->model('Mcrud');
		if($this->session->userdata('status')!='mhs'){
			redirect('loginmhs');
		}
		
	}
	
	public function index()
	{
		$id = $this->session->id_mahasiswa;
		$data['jadwal']=$this->Mcrud->getmhsjadwal($id);
		
		$this->load->view('mahasiswa/header');
		$this->load->view('mahasiswa/data_jadwal',$data);
		$this->load->view('mahasiswa/footer');
		
	}

	public function absen($id)
	{
		$data['nim'] = $this->session->nim;
		$data['nama'] = $this->session->nama;
		$data['qrcode'] = $this->session->qr;
		$data['jadwal']=$this->Mcrud->getjadwal_id($id)->row();
		
		$this->load->view('mahasiswa/header');
		$this->load->view('mahasiswa/absen',$data);
		$this->load->view('mahasiswa/footer');
		
	}

	//fasilitas pesantren

	public function data_fasilitas_pesantren($id)
	{
		$data['pesantren_id'] = $this->Mcrud->getpesantren_id($id)->row();
		$data['fasilitas'] = $this->Mcrud->getfasdig_pesantren($id);
		$data['fasilitas_dig'] = $this->Mcrud->getfasilitas_digital()->result();
		$this->load->view('pesantren/header');
		$this->load->view('pesantren/data_fasilitas_pesantren', $data);
		$this->load->view('pesantren/footer');
	}

	public function tambahfasilitaspesantren(){	
			
		$id_pesantren= $_POST['id_pesantren'];
		$id_fasilitas_digital= $_POST['id_fasilitas_digital'];
		$ketersediaan= $_POST['ketersediaan'];
		
				$config['allowed_types'] = 'jpg|png|jpeg|jfif';
				$config['max_size'] = '5000';
				$config['upload_path'] = './assets/image/foto';
				$config['file_name'] = 'foto'.time();
				$this->load->library('upload', $config);
				
				
					$this->upload->do_upload('foto');
					$img = $this->upload->data();
					$foto = $img['file_name'];
		
		$data = array('id_pesantren'=>$id_pesantren, 'id_fasilitas_digital'=>$id_fasilitas_digital, 'ketersediaan'=>$ketersediaan, 'foto'=>$foto);
		$add = $this->Mcrud->tambah('fasilitas_digital_pesantren',$data);
		if($add > 0){
			 $this->session->set_flashdata('suces', '<div class="col-md-12" ><div class="alert alert-success alert-message" align="center">Data Berhasil Disimpan !</div></div>');
			 redirect('pesantren/data_fasilitas_pesantren/'.$id_pesantren);
			 
		}else{
			
		}
	}
	
	public function editfasilitaspesantren($id){
		
		$id_pesantren= $_POST['id_pesantren'];
		$id_fasilitas_digital= $_POST['id_fasilitas_digital'];
		$ketersediaan= $_POST['ketersediaan'];
		
		if($_FILES['foto']['name']==''){
			$foto=$_POST['old'];
		}else{
				$config['allowed_types'] = 'jpg|png|jpeg|jfif';
				$config['max_size'] = '5000';
				$config['upload_path'] = './assets/image/foto';
				$config['file_name'] = 'foto'.time();
				$this->load->library('upload', $config);
				
				
					$this->upload->do_upload('foto');
					$img = $this->upload->data();
					$foto = $img['file_name'];
		}
		
		$data = 'id_pesantren="'.$id_pesantren.'", id_fasilitas_digital="'.$id_fasilitas_digital.'", ketersediaan="'.$ketersediaan.'", foto="'.$foto.'"';
		$edit = $this->Mcrud->update('fasilitas_digital_pesantren', $data, "id_fasilitas_pesantren='$id'");
			 $this->session->set_flashdata('suces', '<div class="col-md-12" ><div class="alert alert-success alert-message" align="center">Data Berhasil Diedit !</div></div>');
			 redirect('pesantren/data_fasilitas_pesantren/'.$id_pesantren);
	}

	public function hapusfasilitaspesantren($id){
		$data= "id_fasilitas_pesantren='$id'";
		$hapus = $this->Mcrud->hapus('fasilitas_digital_pesantren', $data);
			 
			 $this->session->set_flashdata('suces', '<div class="col-md-12" ><div class="alert alert-danger alert-message" align="center">Data Berhasil Dihapus !</div></div>');
			 redirect('pesantren/data_fasilitas_pesantren/'.$id_pesantren);
			 
	}

	public function form_edit_pesantren($id)
	{
		$row=$this->Mcrud->getpesantren_id($id)->row();
		if($row){
			$data = array(
			'title' => 'Update',
			'button' => 'Update',
            'action' => site_url('pesantren/update_pesantren_act'),
			'id_pesantren' => set_value('id_pesantren', $row->id_pesantren),
			'nama_pesantren' => set_value('nama_pesantren', $row->nama_pesantren),
			'ktp' => set_value('ktp', $row->ktp),
			'pemilik' => set_value('pemilik', $row->pemilik),
			'username' => set_value('username', $row->username),
			'password' => set_value('password', $row->password),
			'email' => set_value('email', $row->email),
			'no_telp' => set_value('no_telp', $row->no_telp),

			);

		$this->load->view('pesantren/header');
		$this->load->view('pesantren/form_pesantren',$data);
		$this->load->view('pesantren/footer');
		}
		
	}

	public function update_pesantren_act(){
		
		$id_pesantren= $_POST['id_pesantren'];
		$nama_pesantren= $_POST['nama_pesantren'];
		$pemilik= $_POST['pemilik'];
		$email= $_POST['email'];
		$username= $_POST['username'];
		$password= $_POST['password'];
		$no_telp= $_POST['no_telp'];
		
		if($_FILES['ktp']['name']==''){
			$ktp=$_POST['old'];
		}else{
				$config['allowed_types'] = 'jpg|png|jpeg|jfif';
				$config['max_size'] = '5000';
				$config['upload_path'] = './assets/image/ktp';
				$config['file_name'] = 'ktp'.time();
				$this->load->library('upload', $config);
				
				
					$this->upload->do_upload('ktp');
					$img = $this->upload->data();
					$ktp = $img['file_name'];
		}
		

		$data = 'nama_pesantren="'.$nama_pesantren.'", pemilik="'.$pemilik.'", ktp="'.$ktp.'", username="'.$username.'", password="'.$password.'", email="'.$email.'", no_telp="'.$no_telp.'"';
		$this->Mcrud->update('pesantren', $data, "id_pesantren='$id_pesantren'");
		
			$this->session->set_flashdata('suces', '<div class="col-md-12" ><div class="alert alert-success alert-message" align="center">Data Berhasil Diupdate !</div></div>');
			redirect ('pesantren/form_edit_pesantren/'.$id_pesantren);
		
	}
	public function hapuspesantren($id){
		$data="id_pesantren='$id'";
		$hapus = $this->Mcrud->delete('pesantern', $data);
		if($hapus > 0){
			 $this->session->set_flashdata('suces', '<div class="col-md-12" ><div class="alert alert-success alert-message" align="center">Data Berhasil Dihapus !</div></div>');
			 redirect('pesantren/pesantern');
			 
		}else{
			 $this->session->set_flashdata('error', 'ulangi beberapa saat lagi');
		}
	}

	public function detail_pesantren($id)
	{
		$row=$this->Mcrud->getpesantren_id($id)->row();
		if($row){
			$data = array(
			'action' => site_url('pesantren/update_pesantren_act'),
			'id_pesantren' => set_value('id_pesantren', $row->id_pesantren),
			'nama_pesantren' => set_value('nama_pesantren', $row->nama_pesantren),
			'ktp' => set_value('ktp', $row->ktp),
			'pemilik' => set_value('pemilik', $row->pemilik),
			'username' => set_value('username', $row->username),
			'password' => set_value('password', $row->password),
			'email' => set_value('email', $row->email),
			'no_telp' => set_value('no_telp', $row->no_telp),

			);

		$this->load->view('pesantren/header');
		$this->load->view('pesantren/detail_pesantren',$data);
		$this->load->view('pesantren/footer');
		}
		
	}

	public function profil_pesantren($id)
	{
		$row=$this->Mcrud->getprofil_pesantren_id($id)->row();
		if($row){
			$data = array(
			'title' => 'Profil',
			'button' => 'Update',
            'action' => site_url('pesantren/update_profil_pesantren_act'),
			'id_profil_pesantren' => set_value('id_profil_pesantren', $row->id_profil_pesantren),
			'id_pesantren' => set_value('id_pesantren', $row->id_pesantren),
			'nama_pesantren' => set_value('nama_pesantren', $row->nama_pesantren),
			'profil_pesantren' => set_value('profil_pesantren', $row->profil_pesantren),
			'logo' => set_value('logo', $row->logo),
			'gambar' => set_value('gambar', $row->gambar),
			'alamat' => set_value('alamat', $row->alamat),
			'maps' => set_value('maps', $row->maps),
			
			);

		$this->load->view('pesantren/header');
		$this->load->view('pesantren/form_profil_pesantren',$data);
		$this->load->view('pesantren/footer');
		}
		
	}

	public function update_profil_pesantren_act(){
		
		$id= $_POST['id_profil_pesantren'];
		$id_pesantren= $_POST['id_pesantren'];
		$profil_pesantren= $_POST['profil_pesantren'];
		$alamat= $_POST['alamat'];
		$maps= $_POST['maps'];
		
		$data = 'profil_pesantren="'.$profil_pesantren.'", alamat="'.$alamat.'", maps="'.$maps.'"';
		$this->Mcrud->update('profil_pesantren', $data, "id_profil_pesantren='$id'");
		
			$this->session->set_flashdata('suces', '<div class="col-md-12" ><div class="alert alert-success alert-message" align="center">Data Berhasil Diupdate !</div></div>');
			redirect ('pesantren/profil_pesantren/'.$id_pesantren);
		
	}

	public function update_gambar_pesantren($id){
		
		$id_pesantren= $_POST['id_pesantren'];
		if($_FILES['gambar']['name']==''){
			$gambar=$_POST['old'];
		}else{
				$config['allowed_types'] = 'jpg|png|jpeg|jfif';
				$config['max_size'] = '5000';
				$config['upload_path'] = './assets/image/gambar_pes';
				$config['file_name'] = 'gambar'.time();
				$this->load->library('upload', $config);
				
				
					$this->upload->do_upload('gambar');
					$img = $this->upload->data();
					$gambar = $img['file_name'];
		}
		$data = 'gambar="'.$gambar.'"';
		$this->Mcrud->update('profil_pesantren', $data, "id_profil_pesantren='$id'");
		
			$this->session->set_flashdata('suces', '<div class="col-md-12" ><div class="alert alert-success alert-message" align="center">Data Berhasil Diupdate !</div></div>');
			redirect ('pesantren/profil_pesantren/'.$id_pesantren);
		
	}

	public function update_logo_pesantren($id){
		
		$id_pesantren= $_POST['id_pesantren'];
		if($_FILES['logo']['name']==''){
			$logo=$_POST['old'];
		}else{
				$config['allowed_types'] = 'jpg|png|jpeg|jfif';
				$config['max_size'] = '5000';
				$config['upload_path'] = './assets/image/logo_pes';
				$config['file_name'] = 'logo'.time();
				$this->load->library('upload', $config);
				
				
					$this->upload->do_upload('logo');
					$img = $this->upload->data();
					$logo = $img['file_name'];
		}
		$data = 'logo="'.$logo.'"';
		$this->Mcrud->update('profil_pesantren', $data, "id_profil_pesantren='$id'");
		
			$this->session->set_flashdata('suces', '<div class="col-md-12" ><div class="alert alert-success alert-message" align="center">Data Berhasil Diupdate !</div></div>');
			redirect ('pesantren/profil_pesantren/'.$id_pesantren);
		
	}

	public function data_santri($id)
	{
		$row=$this->Mcrud->getsantri_id($id)->row();
		if($row){
			$data = array(
			'title' => 'Data Santri',
			'button' => 'Update',
            'action' => site_url('pesantren/update_data_santri_act'),
			'id_data_santri' => set_value('id_data_santri', $row->id_data_santri),
			'id_pesantren' => set_value('id_pesantren', $row->id_pesantren),
			'nama_pesantren' => set_value('nama_pesantren', $row->nama_pesantren),
			'jumlah_santriwan' => set_value('jumlah_santriwan', $row->jumlah_santriwan),
			'jumlah_santriwati' => set_value('jumlah_santriwati', $row->jumlah_santriwati),
			'jumlah_lulusan' => set_value('jumlah_lulusan', $row->jumlah_lulusan),
						
			);

		$this->load->view('pesantren/header');
		$this->load->view('pesantren/form_data_santri',$data);
		$this->load->view('pesantren/footer');
		}
		
	}

	public function update_data_santri_act(){
		
		$id= $_POST['id_data_santri'];
		$id_pesantren= $_POST['id_pesantren'];
		$jumlah_santriwan= $_POST['jumlah_santriwan'];
		$jumlah_santriwati= $_POST['jumlah_santriwati'];
		$jumlah_lulusan= $_POST['jumlah_lulusan'];
		
		$data = 'jumlah_santriwan="'.$jumlah_santriwan.'", jumlah_santriwati="'.$jumlah_santriwati.'", jumlah_lulusan="'.$jumlah_lulusan.'"';
		$this->Mcrud->update('data_santri', $data, "id_data_santri='$id'");
		
			$this->session->set_flashdata('suces', '<div class="col-md-12" ><div class="alert alert-success alert-message" align="center">Data Berhasil Diupdate !</div></div>');
			redirect ('pesantren/data_santri/'.$id_pesantren);
		
	}

	public function data_pengajar($id)
	{
		$row=$this->Mcrud->getpengajar_id($id)->row();
		if($row){
			$data = array(
			'title' => 'Data Pengajar',
			'button' => 'Update',
            'action' => site_url('pesantren/update_data_pengajar_act'),
			'id_pengajar' => set_value('id_pengajar', $row->id_pengajar),
			'id_pesantren' => set_value('id_pesantren', $row->id_pesantren),
			'nama_pesantren' => set_value('nama_pesantren', $row->nama_pesantren),
			'jumlah_pengajar' => set_value('jumlah_pengajar', $row->jumlah_pengajar),
					
			);

		$this->load->view('pesantren/header');
		$this->load->view('pesantren/form_data_pengajar',$data);
		$this->load->view('pesantren/footer');
		}
		
	}

	public function update_data_pengajar_act(){
		
		$id= $_POST['id_pengajar'];
		$id_pesantren= $_POST['id_pesantren'];
		$jumlah_pengajar= $_POST['jumlah_pengajar'];
		
		$data = 'jumlah_pengajar="'.$jumlah_pengajar.'"';
		$this->Mcrud->update('data_pengajar', $data, "id_pengajar='$id'");
		
			$this->session->set_flashdata('suces', '<div class="col-md-12" ><div class="alert alert-success alert-message" align="center">Data Berhasil Diupdate !</div></div>');
			redirect ('pesantren/data_pengajar/'.$id_pesantren);
		
	}

		
	
	// public function gantipassword()
	// {
		
	// 	$this->load->view('pesantren/header');
	// 	$this->load->view('pesantren/ganti_password');
	// 	$this->load->view('pesantren/footer');
	// }

	// function gantipassword_act(){
	// 	//data yang terekam pada method post atau yang kita ketikan pada inputan
	// 	$id_admin = $this->session->id_admin;
	// 	$username = $this->input->post('username');
	// 	$pass_baru = $this->input->post('pass_baru');
	// 	$ulang_pass = $this->input->post('ulang_pass');
	// 	//proses validasi ganti dan ulangi password password
	// 	$this->form_validation->set_rules('pass_baru','Password Baru','required|matches[ulang_pass]');
	// 	$this->form_validation->set_rules('ulang_pass','Ulangi Password Baru','required');
		
	// 	if($this->form_validation->run() != false){
	// 		$data = 'username="'.$username.'", password="'.$pass_baru.'"';
	// 		$this->Mcrud->update('admin', $data, "id_admin='$id_admin'");
	// 		$this->session->set_flashdata('pesan', '<div class="alert alert-success">Password telah diupdate!</div>');
	// 		redirect('pesantren/gantipassword');
	// 	}else{
	// 		$this->session->set_flashdata('pesan', '<div class="alert alert-danger">Gagal, terjadi kesalahan! pastikan ulangi password benar</div>');
	// 		redirect('pesantren/gantipassword');
	// 	}
	// }

	// public function laporan_pesantren()
	// {
	// 	$data['tgl1'] = $this->input->get('tgl1',true);
	// 	$data['tgl2'] = $this->input->get('tgl2',true);

	// 		if($data['tgl1']!="" && $data['tgl2']!=""){
	// 			$data['pesantren'] = $this->db->query('SELECT * FROM  pesantren where tgl_daftar >= "'.$data['tgl1'].'" and tgl_daftar <= "'.$data['tgl2'].'"')->result();
	// 		}elseif($data['tgl1']!=""){
	// 			$data['pesantren'] = $this->db->query('SELECT * FROM  pesantren where tgl_daftar >= "'.$data['tgl1'].'"')->result();
	// 		}elseif($data['tgl2']!=""){
	// 			$data['pesantren'] = $this->db->query('SELECT * FROM  pesantren where tgl_daftar <= "'.$data['tgl2'].'"')->result();
	// 		}else{
	// 			$data['pesantren'] = $this->db->query('SELECT * FROM  pesantren')->result();
	// 		}

		
	// 	$this->load->view('pesantren/header');	
	// 	$this->load->view('pesantren/laporan_pesantren', $data);
	// 	$this->load->view('pesantren/footer');
		
	// }

	// public function cetak_laporan_pesantren()
	// {
	// 	$data['tgl1'] = $this->input->get('tgl1',true);
	// 	$data['tgl2'] = $this->input->get('tgl2',true);

	// 		if($data['tgl1']!="" && $data['tgl2']!=""){
	// 			$data['pesantren'] = $this->db->query('SELECT * FROM  pesantren where tgl_daftar >= "'.$data['tgl1'].'" and tgl_daftar <= "'.$data['tgl2'].'"')->result();
	// 		}elseif($data['tgl1']!=""){
	// 			$data['pesantren'] = $this->db->query('SELECT * FROM  pesantren where tgl_daftar >= "'.$data['tgl1'].'"')->result();
	// 		}elseif($data['tgl2']!=""){
	// 			$data['pesantren'] = $this->db->query('SELECT * FROM  pesantren where tgl_daftar <= "'.$data['tgl2'].'"')->result();
	// 		}else{
	// 			$data['pesantren'] = $this->db->query('SELECT * FROM  pesantren')->result();
	// 		}

	// 	$this->load->view('pesantren/cetak_laporan_pesantren',$data);
	// }
}
