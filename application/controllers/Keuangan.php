<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Keuangan extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_model');
        $this->load->helper('my_helper');
        if ($this->session->userdata('logged_in') != true && $this->session->userdata('role') != 'keuangan') {
            redirect(base_url() . 'auth');
          } 
    }
    public function index()
    {
        $this->load->view('keuangan/index');

    }
    public function pembayaran()
    {
        $data['pembayaran'] = $this->m_model->getDataPembayaran();
        $this->load->view('keuangan/pembayaran', $data);
    }
    public function tambah_pembayaran()
  {
    $data['siswa'] = $this->m_model->get_data('siswa')->result();
    $this->load->view('keuangan/tambah_pembayaran', $data);
  }
  public function aksi_tambah_pembayaran()
  {
    $data = [
      'id_siswa' => $this->input->post('nama'),
      'jenis_pembayaran' => $this->input->post('jenis_pembayaran'),
      'total_pembayaran' => $this->input->post('total_pembayaran'),
    ];
    $this->m_model->tambah_data('pembayaran', $data);
    redirect(base_url('keuangan/pembayaran'));
  }
  public function update_pembayaran($id)
  {
    $data['pembayaran'] = $this->m_model->get_by_id('pembayaran', 'id', $id)->result();
    $data['siswa'] = $this->m_model->get_data('siswa')->result();
    $this->load->view('keuangan/update_pembayaran', $data);
  }

  public function aksi_update_pembayaran()
  {
    $data = array(
        'id_siswa' => $this->input->post('nama_siswa'),
        'jenis_pembayaran' => $this->input->post('jenis_pembayaran'),
        'total_pembayaran' => $this->input->post('total_pembayaran'),
    );
    $eksekusi = $this->m_model->ubah_data('pembayaran', $data, array('id' => $this->input->post('id')));
    if ($eksekusi) {
      $this->session->set_flashdata('sukses', 'berhasil');
      redirect(base_url('keuangan/pembayaran'));
    } else {
      $this->session->set_flashdata('error', 'gagal...');
      redirect(base_url('keuangan/update_pembayaran/' . $this->input->post('id')));
    }
  }
   public function hapus_pembayaran($id)
  {
    $this->m_model->delete('pembayaran', 'id', $id);
    redirect(base_url('keuangan/pembayaran'));
  }
}
