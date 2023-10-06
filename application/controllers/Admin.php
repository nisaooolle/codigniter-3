<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
class Admin extends CI_Controller
{

  // untuk meload model & helper kalian
  function __construct()
  {
    parent::__construct();
    $this->load->model('m_model');
    $this->load->helper('my_helper');
    $this->load->library('upload');
    // fungsi validasi dibawah untuk ngecek ketika masuk ke halaman admin , data sdh true atau blm
    // kalo blm true maka akan kembali ke page auth
    if ($this->session->userdata('logged_in') != true || $this->session->userdata('role') != 'admin') {
      redirect(base_url() . 'auth');
    }
  }

  // untuk menampilkan folder admin/index
  public function index()
  {
    $this->load->view('admin/dasboard');
  }
  public function dasboard_keuangan()
  {
    $this->load->view('admin/dasboard_keuangan');
  }
  public function table_akun()
  {
    $data['user'] = $this->m_model->get_data('admin')->result();
    $this->load->view('admin/table_akun', $data);
  }

  public function upload_img($value)
  {
    $kode = round(microtime(true)  * 1000);
    $config['upload_path'] = './images/siswa/';
    $config['allowed_types'] = 'jpg|png|jpeg';
    $config['max_size'] = '30000';
    $config['file_name'] = $kode;
    $this->upload->initialize($config);
    if (!$this->upload->do_upload($value)) {
      return array(false, '');
    } else {
      $fn = $this->upload->data();
      $nama = $fn['file_name'];
      return array(true, $nama);
    }
  }

  public function siswa()
  {
    $data['result'] = $this->m_model->getData();
    $this->load->view('admin/siswa', $data);
  }

  public function tambah_siswa()
  {
    $data['kelas'] = $this->m_model->get_data('kelas')->result();
    $this->load->view('admin/tambah_siswa', $data);
  }
  public function aksi_tambah_siswa()
  {
    $foto = $this->upload_img('foto');
    if ($foto[0] == false) {
      $data = [
        'foto' => 'User.png',
        'nama_siswa' => $this->input->post('nama'),
        'nisn' => $this->input->post('nisn'),
        'gender' => $this->input->post('gender'),
        'id_kelas' => $this->input->post('kelas'),
      ];
      $this->m_model->tambah_data('siswa', $data);
      redirect(base_url('admin/siswa'));
    } else {
      $data = [
        'foto' => $foto[1],
        'nama_siswa' => $this->input->post('nama'),
        'nisn' => $this->input->post('nisn'),
        'gender' => $this->input->post('gender'),
        'id_kelas' => $this->input->post('kelas'),
      ];
      $this->m_model->tambah_data('siswa', $data);
      redirect(base_url('admin/siswa'));
    }
  }

  public function update($id)
  {
    $data['siswa'] = $this->m_model->get_by_id('siswa', 'id_siswa', $id)->result();
    $data['kelas'] = $this->m_model->get_data('kelas')->result();
    $this->load->view('admin/update', $data);
  }

  // public function aksi_update()
  // {
  //   $data = array(
  //     'nama_siswa' => $this->input->post('nama'),
  //     'nisn' => $this->input->post('nisn'),
  //     'gender' => $this->input->post('gender'),
  //     'id_kelas' => $this->input->post('kelas'),
  //   );
  //   $eksekusi = $this->m_model->ubah_data('siswa', $data, array('id_siswa' => $this->input->post('id_siswa')));
  //   if ($eksekusi) {
  //     $this->session->set_flashdata('sukses', 'berhasil');
  //     redirect(base_url('admin/siswa'));
  //   } else {
  //     $this->session->set_flashdata('error', 'gagal...');
  //     redirect(base_url('admin/siswa/update/' . $this->input->post('id_siswa')));
  //   }
  // }


  public function aksi_ubah_siswa()
  {
    $foto = $_FILES['foto']['name'];
    $foto_temp = $_FILES['foto']['tmp_name'];

    // Jika ada foto yang diunggah
    if ($foto) {
      $kode = round(microtime(true) * 1000);
      $file_name = $kode . '_' . $foto;
      $upload_path = './images/siswa/' . $file_name;

      if (move_uploaded_file($foto_temp, $upload_path)) {
        // Hapus foto lama jika ada
        $old_file = $this->m_model->get_siswa_foto_by_id($this->input->post('id_siswa'));
        if ($old_file && file_exists('./images/siswa/' . $old_file)) {
          unlink('./images/siswa/' . $old_file);
        }

        $data = [
          'foto' => $file_name,
          'nama_siswa' => $this->input->post('nama'),
          'nisn' => $this->input->post('nisn'),
          'gender' => $this->input->post('gender'),
          'id_kelas' => $this->input->post('kelas'),
        ];
      } else {
        // Gagal mengunggah foto baru
        redirect(base_url('admin/ubah_siswa/' . $this->input->post('id_siswa')));
      }
    } else {
      // Jika tidak ada foto yang diunggah
      $data = [
        'nama_siswa' => $this->input->post('nama'),
        'nisn' => $this->input->post('nisn'),
        'gender' => $this->input->post('gender'),
        'id_kelas' => $this->input->post('kelas'),
      ];
    }

    // Eksekusi dengan model ubah_data
    $eksekusi = $this->m_model->ubah_data('siswa', $data, array('id_siswa' => $this->input->post('id_siswa')));

    if ($eksekusi) {
      redirect(base_url('admin/siswa'));
    } else {
      redirect(base_url('admin/ubah_siswa/' . $this->input->post('id_siswa')));
    }
  }
  // public function hapus_siswa($id)
  // {
  //   $this->m_model->delete('siswa', 'id_siswa', $id);
  //   redirect(base_url('admin/siswa'));
  // }

  public function hapus_siswa($id)
  {
    // model det siswa by id
    $siswa = $this->m_model->get_by_id('siswa', 'id_siswa', $id)->row();
    // if siswa ada
    if ($siswa) {
      // if foto siswa bukan 'user.png'
      if ($siswa->foto !== 'User.png') {
        $file_path = './images/siswa/' . $siswa->foto;

        if (file_exists($file_path)) {
          if (unlink($file_path)) {
            // hapus file berhasil menggunakan model delete      
            $this->m_model->delete('siswa', 'id_siswa', $id);
            redirect(base_url('admin/siswa'));
          } else{
            // gagal menghapus file
            echo "Gagal menghapus file";
          }
        }else{
          // file tidak di temukan
          echo "file tidak di temukan";
        }
      } else{
        // tanpa hapus file 'user.png'
        $this->m_model->delete('siswa', 'id_siswa', $id);
        redirect(base_url('admin/siswa'));
      }
    } else{
      // siswa tidak di temukan
      echo "siswa tidak ditemukan";
    }
  }
  public function akun()
  {
    $data['user'] = $this->m_model->get_by_id('admin', 'id', $this->session->userdata('id'))->result();
    $this->load->view('admin/akun', $data);
  }

  public function aksi_akun()
  {
    $foto = $this->upload_images('foto');
    $email = $this->input->post('email');
    $username = $this->input->post('username');
    $password_baru = $this->input->post('password_baru');
    $konfirmasi_password = $this->input->post('konfirmasi_password');

    $foto = $this->upload_images('foto');
    if ($foto[0] == false) {
      $data = [
        'foto' => 'Userrr.png',
        'email' => $email,
        'username' => $username,

      ];
    } else {
      $data = [
        'foto' => $foto[1],
        'email' => $email,
        'username' => $username,
      ];
    }

    // jika ada pasword baru
    if (!empty($password_baru)) {
      // pastikan pasword sama
      if ($password_baru === $konfirmasi_password) {
        $data['password'] = md5($password_baru);
      } else {
        $this->session->set_flashdata('message', 'password baru dan konfirmasi password harus sama...');
        redirect(base_url('admin/akun'));
      }
    }
    // lakukan pembaruan data
    $this->session->set_userdata($data);
    $update_result = $this->m_model->ubah_data('admin', $data, array('id' => $this->session->userdata('id')));
    if ($update_result) {
      redirect(base_url('admin/akun'));
    } else {
      redirect(base_url('admin/akun'));
    }
  }

  public function upload_images($value)
  {
    $kode = round(microtime(true)  * 1000);
    $config['upload_path'] = './images/admin/';
    $config['allowed_types'] = 'jpg|png|jpeg';
    $config['max_size'] = '30000';
    $config['file_name'] = $kode;
    $this->upload->initialize($config);
    if (!$this->upload->do_upload($value)) {
      return array(false, '');
    } else {
      $fn = $this->upload->data();
      $nama = $fn['file_name'];
      return array(true, $nama);
    }
  }

  // export siswa
  public function export()
  {
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    $style_col = [
      'font' => ['bold' => true],
      'alignment' => [
        'horizontal' => \PhpOffice\PhpSpreadsheet\style\Alignment::HORIZONTAL_CENTER,
        'vertical' => \PhpOffice\PhpSpreadsheet\style\Alignment::VERTICAL_CENTER
      ],
      'borders' => [
        'top' => ['borderstyle' => \PhpOffice\PhpSpreadsheet\style\Border::BORDER_THIN],
        'right' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\style\Border::BORDER_THIN],
        'bottom' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\style\Border::BORDER_THIN],
        'left' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\style\Border::BORDER_THIN]
      ]
    ];

    $style_row = [
      'alignment' => [
        'vertical' => \PhpOffice\PhpSpreadsheet\style\Alignment::VERTICAL_CENTER
      ],
      'borders' => [
        'top' => ['borderstyle' => \PhpOffice\PhpSpreadsheet\style\Border::BORDER_THIN],
        'right' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\style\Border::BORDER_THIN],
        'bottom' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\style\Border::BORDER_THIN],
        'left' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\style\Border::BORDER_THIN]
      ]
    ];

    $sheet->setCellValue('A1', "DATA SISWA");
    $sheet->mergeCells('A1:E1');
    $sheet->getStyle('A1')->getFont()->setBold(true);

    $sheet->setCellValue('A3', "ID");
    $sheet->setCellValue('B3', "NAMA SISWA");
    $sheet->setCellValue('C3', "NISN");
    $sheet->setCellValue('D3', "GENDER");
    $sheet->setCellValue('E3', "KELAS");
    $sheet->setCellValue('F3', "FOTO");

    $sheet->getStyle('A3')->applyFromArray($style_col);
    $sheet->getStyle('B3')->applyFromArray($style_col);
    $sheet->getStyle('C3')->applyFromArray($style_col);
    $sheet->getStyle('D3')->applyFromArray($style_col);
    $sheet->getStyle('E3')->applyFromArray($style_col);

    $data_siswa = $this->m_model->getData();

    $no = 1;
    $numrow = 4;
    foreach ($data_siswa as $data) {
      $sheet->setCellValue('A' . $numrow, $data->id_siswa);
      $sheet->setCellValue('B' . $numrow, $data->nama_siswa);
      $sheet->setCellValue('C' . $numrow, $data->nisn);
      $sheet->setCellValue('D' . $numrow, $data->gender);
      $sheet->setCellValue('E' . $numrow, $data->tingkat_kelas.' '.$data->jurusan_kelas);
      $sheet->setCellValue('F' . $numrow, $data->foto);

      $sheet->getStyle('A' . $numrow)->applyFromArray($style_row);
      $sheet->getStyle('B' . $numrow)->applyFromArray($style_row);
      $sheet->getStyle('C' . $numrow)->applyFromArray($style_row);
      $sheet->getStyle('D' . $numrow)->applyFromArray($style_row);
      $sheet->getStyle('E' . $numrow)->applyFromArray($style_row);
      $sheet->getStyle('F' . $numrow)->applyFromArray($style_row);

      $no++;
      $numrow++;
    }

    $sheet->getColumnDimension('A')->setWidth(5);
    $sheet->getColumnDimension('B')->setWidth(25);
    $sheet->getColumnDimension('C')->setWidth(25);
    $sheet->getColumnDimension('D')->setWidth(20);
    $sheet->getColumnDimension('E')->setWidth(30);

    $sheet->getDefaultRowDimension()->setRowHeight(-1);

    $sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);

    $sheet->setTitle("LAPORAN DATA SISWA");
    header('Content-Type: aplication/vnd.openxmlformants-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment; filename="SISWA.xlsx"');
    header('Cache-Control: max-age=0');

    $writer = new Xlsx($spreadsheet);
    $writer->save('php://output');
  }

  // import
  public function import() {
    if(isset($_FILES["file"]["name"])) {
      $path = $_FILES["file"]["tmp_name"];
      $object = PhpOffice\PhpSpreadsheet\IOFactory::load($path);
      foreach($object->getWorksheetIterator() as $worksheet)
      {
        $highestRow = $worksheet->getHighestRow();
        $highestColumn = $worksheet->getHighestColumn();
        for($row=2; $row<=$highestRow; $row++)
        {
          $foto = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
          $nama_siswa = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
          $nisn = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
          $gender = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
          $tingkat_kelas = $worksheet->getCellByColumnAndRow(6, $row)->getValue();

          $get_id_by_kelas = $this->m_model->get_by_kelas($tingkat_kelas);
          echo $get_id_by_kelas;
          $data = array(
            'foto' => $foto,
            'nama_siswa' => $nama_siswa,
            'nisn' => $nisn,
            'gender' => $gender,
            'id_kelas' => $get_id_by_kelas,
          );
          $this->m_model->tambah_data('siswa', $data);
        }
      }
      redirect(base_url('admin/siswa'));
    }else {
      echo 'Invalid File';
    }
  }
  public function export_guru()
  {
    $data['data_guru']= $this->m_model->getDataGuru();
    $data['nama'] = 'guru';
    // segment untuk mengecek /mengambil url
    if ($this->uri->segment(3)== "pdf") {
      $this->load->library('pdf');
      $this->pdf->load_view('admin/export_data_guru', $data);
      $this->pdf->render();
      $this->pdf->stream("data_guru.pdf", array("Attachment" => false));
    }else{
      $this->load->view('admin/download_data_guru',$data);
    }
  }
}
