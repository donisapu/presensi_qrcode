<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	function __construct(){
		parent:: __construct();
		$this->load->model('Mcrud');
	}
	
	public function index()
	{
		$data['profil'] = $this->Mcrud->getprofilweb()->row();
		$data['fasilitas'] = $this->Mcrud->getfasilitas_digital()->result();
		$this->load->view('user/header', $data);
		$this->load->view('user/home', $data);
		$this->load->view('user/footer', $data);
	}

	public function tentang()
	{
		$data['profil'] = $this->Mcrud->getprofilweb()->row();
		$this->load->view('user/header', $data);
		$this->load->view('user/tentang', $data);
		$this->load->view('user/footer', $data);
	}

	public function kontak()
	{
		$data['profil'] = $this->Mcrud->getprofilweb()->row();
		$this->load->view('user/header', $data);
		$this->load->view('user/kontak', $data);
		$this->load->view('user/footer', $data);
	}

	public function daftar()
	{
		$data['profil'] = $this->Mcrud->getprofilweb()->row();
		$data['id_pesantren']=$this->Mcrud->kode_pesantren();
		$this->load->view('user/header', $data);
		$this->load->view('user/daftar', $data);
		$this->load->view('user/footer', $data);
	}

	public function tambahpesantren()
	{
		$id_pesantren= $_POST['id_pesantren'];
		$nama_pesantren= $_POST['nama_pesantren'];
		$pemilik= $_POST['pemilik'];
		$email= $_POST['email'];
		$username= $_POST['username'];
		$password= $_POST['password'];
		$status_pesantren= 'Tidak Aktif';
		$no_telp= $_POST['no_telp'];
		$tgl_daftar= date('Y-m-d');

		// if($_FILES['ktp']['name']==''){
		// 	$ktp=$_POST['old'];
		// }else{
				$config['allowed_types'] = 'jpg|png|jpeg|jfif';
				$config['max_size'] = '5000';
				$config['upload_path'] = './assets/image/ktp';
				$config['file_name'] = 'ktp'.time();
				$this->load->library('upload', $config);
				
				
					$this->upload->do_upload('ktp');
					$img = $this->upload->data();
					$ktp = $img['file_name'];
		//}		
		
		$data = array('id_pesantren'=>$id_pesantren, 'nama_pesantren'=>$nama_pesantren, 'pemilik'=>$pemilik, 'ktp'=>$ktp, 'email'=>$email, 'username'=>$username,'password'=>$password,'status_pesantren'=>$status_pesantren,'no_telp'=>$no_telp,'tgl_daftar'=>$tgl_daftar, 'username'=>$username, 'password'=>$password);
		$add = $this->Mcrud->tambah('pesantren',$data);
		if($add > 0){
			$this->session->set_flashdata('suces', '<div class="col-md-12" ><div class="alert alert-success alert-message" align="center">Pendaftaran Berhasil, Tunggu Konfirmasi dari admin!</div></div>');
			redirect('user/daftar');
		}else{
			$this->session->set_flashdata('error', 'ulangi beberapa saat lagi');
			
		}	
		
	}

	public function data_pesantren()
	{
		$data['profil'] = $this->Mcrud->getprofilweb()->row();
		$data['pesantren'] = $this->Mcrud->getpesantrenjoin()->result();
		$this->load->view('user/header', $data);
		$this->load->view('user/data_pesantren', $data);
		$this->load->view('user/footer', $data);
	}

	public function detail_pesantren($id)
	{
		$data['profil'] = $this->Mcrud->getprofilweb()->row();
		$data['pesantren_id'] = $this->Mcrud->getpesantrenjoin_id($id)->row();
		$data['fasilitas'] = $this->Mcrud->getfasdig_pesantren($id)->result();
		$data['santri_id'] = $this->Mcrud->getsantri_id($id)->row();
		$data['pengajar_id'] = $this->Mcrud->getpengajar_id($id)->row();
		$this->load->view('user/header', $data);
		$this->load->view('user/detail_pesantren', $data);
		$this->load->view('user/footer', $data);
	}
	
}
