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

	public function histori()
	{
		$data['tgl1'] = $this->input->get('tgl1', true);
		$data['tgl2'] = $this->input->get('tgl2', true);

		if ($data['tgl1'] != "" && $data['tgl2'] != "") {
			$data['absen'] = $this->db->query('SELECT * FROM  absen a, mahasiswa b where a.id_mahasiswa=b.id_mahasiswa and a.jam_masuk >= "' . $data['tgl1'] . '" and a.jam_masuk <= "' . $data['tgl2'] . '"')->result();
		} elseif ($data['tgl1'] != "") {
			$data['absen'] = $this->db->query('SELECT * FROM  absen a, mahasiswa b where a.id_mahasiswa=b.id_mahasiswa and a.jam_masuk >= "' . $data['tgl1'] . '"')->result();
		} elseif ($data['tgl2'] != "") {
			$data['absen'] = $this->db->query('SELECT * FROM  absen a, mahasiswa b where a.id_mahasiswa=b.id_mahasiswa and a.jam_masuk <= "' . $data['tgl2'] . '"')->result();
		} else {
			$data['absen'] = $this->db->query('SELECT * FROM  absen a, mahasiswa b where a.id_mahasiswa=b.id_mahasiswa')->result();
		}
		
		$this->load->view('mahasiswa/header');
		$this->load->view('mahasiswa/histori', $data);
		$this->load->view('mahasiswa/footer');
	}

	public function cetak_histori()
	{
		$data['tgl1'] = $this->input->get('tgl1', true);
		$data['tgl2'] = $this->input->get('tgl2', true);

		if ($data['tgl1'] != "" && $data['tgl2'] != "") {
			$data['absen'] = $this->db->query('SELECT * FROM  absen a, mahasiswa b where a.id_mahasiswa=b.id_mahasiswa and a.jam_masuk >= "' . $data['tgl1'] . '" and a.jam_masuk <= "' . $data['tgl2'] . '"')->result();
		} elseif ($data['tgl1'] != "") {
			$data['absen'] = $this->db->query('SELECT * FROM  absen a, mahasiswa b where a.id_mahasiswa=b.id_mahasiswa and a.jam_masuk >= "' . $data['tgl1'] . '"')->result();
		} elseif ($data['tgl2'] != "") {
			$data['absen'] = $this->db->query('SELECT * FROM  absen a, mahasiswa b where a.id_mahasiswa=b.id_mahasiswa and a.jam_masuk <= "' . $data['tgl2'] . '"')->result();
		} else {
			$data['absen'] = $this->db->query('SELECT * FROM  absen a, mahasiswa b where a.id_mahasiswa=b.id_mahasiswa')->result();
		}

		$this->load->view('mahasiswa/cetak_histori', $data);
	}
}
