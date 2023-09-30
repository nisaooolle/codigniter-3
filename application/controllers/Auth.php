<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	public function index()
	{
		$this->load->view('auth/login');
	}
	function __construct()
  {
    parent::__construct();
    $this->load->model('m_model');
  }
  
  public function aksi_login() {

  $email = $this->input->post('email', true);
  $password = $this->input->post('password', true);
  // vaiable data berfungsi untuk mengambil yg diinputkan
  $data = ['email' => $email,];
  $query = $this->m_model->getwhere('admin', $data);
  // result berfngsi menjalankan query nya
  $result = $query->row_array();


  if (!empty($result)  && md5($password) === $result['password']) {
    $data = [
      'logged_in' => TRUE,
      // yg didalam array ngambil dari database
      'email'     => $result['email'],
      'username'  => $result['username'],
      'role'      => $result['role'],
      'id'        => $result['id'],
    ];
    // session dibawah berfngsi untk penampungan sementara
    $this->session->set_userdata($data);
    // validasi dbwh mengecek apakah role itu "admin"
    if ($this->session->userdata('role') == 'admin') {
      redirect(base_url()."admin");
    }if ($this->session->userdata('role') == 'keuangan') {
      redirect(base_url()."keuangan");
    } else {
      redirect(base_url()."auth");
    }
  } else {
    redirect(base_url()."auth");
  }
}

function logout() {
  // sess_detroy berfungsi menghapus semua yg ada di session
  $this->session->sess_destroy();
  redirect(base_url('auth'));
}

}