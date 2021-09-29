<?php 

    class Peoples extends CI_Controller {

        public function index()
        {
            $data['judul'] = 'List Of Peoples';

            $this->load->model('Peoples_model', 'peoples');

            // Load Library
            $this->load->library('pagination');

            // Mengambil data keyword
            // Jika tombol pencarian ditekan
            if( $this->input->post('submit') ) {
                // Coba tampilkan yang dituliskan didalam keyowrdnya
                $data['keyword'] = $this->input->post('keyword');
                $this->session->set_userdata('keyword', $data['keyword']);
            } else {
                $data['keyword'] = $this->session->userdata('keyword');
            }

            // Config
            // Menghitung ada berapa baris yang dikembalikan pada query terakhir yang user lakukan
            $this->db->like('name', $data['keyword']);
            $this->db->or_like('email', $data['keyword']);
            $this->db->from('peoples');
            $config['total_rows'] = $this->db->count_all_results();
            $data['total_rows'] = $config['total_rows'];
            $config['per_page'] = 5;

            // Initialize
            $this->pagination->initialize($config);

            $data['start'] = $this->uri->segment(3);
            $data['peoples'] = $this->peoples->getPeoples($config['per_page'], $data['start'], $data['keyword']);
            
            $this->load->view('templates/header', $data);
            $this->load->view('peoples/index', $data);
            $this->load->view('templates/footer');
        }
    }

?>