<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	

	public function index()
	{
		if($this->session->userdata('status')=='admin'){
			redirect('admin');
		}else{
		$this->load->view('admin/login');
		}
	}

	function do_login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$data = $this->db->query('SELECT * FROM admin where username= "'.$username.'" AND password = "'.$password.'"');
		$p = $this->db->query('SELECT * FROM admin where username= "'.$username.'" AND password = "'.$password.'"')->row();
		$cek = $data->num_rows();
			  if($cek > 0){
			 	$this->session->set_userdata(array(
					'status'=>"admin",
			 		'id_admin' => $p->id_admin,
			 		'username' => $p->username,
			 	));
			 	redirect('admin');
			 }else{
			 	$this->session->set_flashdata('gagal', '<div class="col-md-12" ><div class="alert alert-danger alert-message" align="center">Username/Password salah !</div></div>');
			 	redirect('login');
			 }
	}
	function logout(){
		$this->session->sess_destroy();
		redirect('login', 'refresh');
	}
}
