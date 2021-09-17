<?php 

    class Mahasiswa extends CI_Controller {
        public function __construct()
        {
            parent::__construct();
            $this->load->model('Mahasiswa_model');
            $this->load->library('form_validation');
        }

        public function index()
        {
            $data['judul'] = 'Daftar Mahasiswa';
            $data['mahasiswa'] = $this->Mahasiswa_model->getAllMahasiswa();
            $this->load->view('templates/header', $data);
            $this->load->view('mahasiswa/index', $data);
            $this->load->view('templates/footer');
        }

        public function tambah()
        {
            $data['judul'] = 'Form Tambah Data Mahasiswa';

            // Membuat aturan script bawaan codeigniter untuk form tambah data mahasiswa
            $this->form_validation->set_rules('nama', 'Nama', 'required');
            $this->form_validation->set_rules('nrp', 'NRP', 'required|numeric');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');

            // Jika datanya gagal
            if( $this->form_validation->run() == FALSE ) {
                // Maka tampilkan template untuk menambahkan data mahasiswa
                $this->load->view('templates/header', $data);
                $this->load->view('mahasiswa/tambah');
                $this->load->view('templates/footer');
            } else {
                // Jika berhasil maka akan menjalankan fungsi di dalam model dan dimasukkan ke dalam database
                $this->Mahasiswa_model->tambahDataMahasiswa();

                // Membuat sebuah session terlebih dahulu
                $this->session->set_flashdata('flash', 'Ditambahkan');

                // Kemudian halamannya pindah ke controller mahasiswa method index
                redirect('mahasiswa');
            }
        }

        // Membuat fungsi hapus yang datanya nanti diambil dari id masing-masing mahasiswa
        public function hapus($id)
        {
            $this->Mahasiswa_model->hapusDataMahasiswa($id);
            
            // Jika datanya berhasil dihapus maka tampilkan flash Dihapus
            $this->session->set_flashdata('flash', 'Dihapus');
            redirect('mahasiswa');
        }
    }

?>