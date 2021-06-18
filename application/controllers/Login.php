<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_Login'); 
	}
	public function index(){
			$this->load->view('v_login');
	}
	public function verify_login(){
		if($this->session->userdata('logged_in') == FALSE){

			$this->form_validation->set_rules('email', 'email', 'trim|required',
			array('required' => 'Alamat email belum terisi'))
			;$this->form_validation->set_rules('password', 'password', 'trim|required',
			array('required' => 'Password belum terisi'));

			if ($this->form_validation->run() == TRUE) {
				if($this->M_Login->cek_user() == TRUE){
					redirect('Home/index');
				} else {
					$this->session->set_flashdata('gagal', 'Login gagal! Pastikan data yang anda masukkan benar');
					redirect('Login/index');
				}
			} else {
				$this->session->set_flashdata('gagal', validation_errors());
					redirect('Login/index');
			}

		} else {
			redirect('Home/index');
		}
	}
	public function logout(){
		$this->session->sess_destroy();
		redirect('Home/index');
	}

	public function register_view(){
		$this->load->view('v_register');
	}

	public function register(){
		
		$this->form_validation->set_rules('nama_user', 'nama_user', 'trim|required',
        array('required' => 'nama belum terisi'));
		$this->form_validation->set_rules('email_user', 'email_user', 'trim|required',
        array('required' => 'email belum terisi'));
        $this->form_validation->set_rules('password', 'password', 'trim|required',
		array('required' => 'Password belum terisi'));
		
		if ($this->form_validation->run() == TRUE ) {
	    	$masuk=$this->M_Login->tambah_user();
				if($masuk==true){
		    		$this->session->set_flashdata('pesan', 'Daftar Akun berhasil');
    				} else{
		    		$this->session->set_flashdata('gagal', 'Daftar Akun gagal');
				}
		    redirect(base_url('Login/index'), 'refresh');
		} else{
		    $this->session->set_flashdata('pesan', validation_errors());
		    redirect(base_url('Login/index'), 'refresh');
	    }

	}

}
