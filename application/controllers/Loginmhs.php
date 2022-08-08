<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Loginmhs extends CI_Controller {
	function __construct(){
		parent:: __construct();
		$this->load->model('Mcrud');
	}

	public function index()
	{
		if($this->session->userdata('status')=='mhs'){
			redirect('mahasiswa');
		}else{
		$this->load->view('mahasiswa/login');
		}
	}

	function do_login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$data = $this->db->query('SELECT * FROM mahasiswa where nim= "'.$username.'" AND tgl_lahir = "'.$password.'"');
		$p = $this->db->query('SELECT * FROM mahasiswa where nim= "'.$username.'" AND tgl_lahir = "'.$password.'"')->row();
		$cek = $data->num_rows();
			  if($cek > 0){
			 	$this->session->set_userdata(array(
					'status'=>"mhs",
			 		'id_mahasiswa' => $p->id_mahasiswa,
			 		'nim' => $p->nim,
			 		'nama' => $p->nama,
			 		'qr' => $p->qr,
			 	));
			 	redirect('mahasiswa');
			 }else{
			 	$this->session->set_flashdata('gagal', '<div class="col-md-12" ><div class="alert alert-danger alert-message" align="center">Username/Password Tidak Terdaftar !</div></div>');
			 	redirect('loginmhs');
			 }
	}
	function logout(){
		$this->session->sess_destroy();
		redirect('loginmhs', 'refresh');
	}
}
