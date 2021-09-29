<?php 

    class Mahasiswa_model extends CI_model {
        public function getAllMahasiswa()
        {
            return $query = $this->db->get('mahasiswa')->result_array();
        }

        public function tambahDataMahasiswa()
        {
            $data = [
                "nama" => $this->input->post('nama', true),
                "nrp" => $this->input->post('nrp', true),
                "email" => $this->input->post('email', true),
                "jurusan" => $this->input->post('jurusan', true)
            ];

            // Membuat query untuk menginsert ke dalam tabel mahasiswa untuk memasukkan data mahasiswa
            $this->db->insert('mahasiswa', $data);
        }

        // Membuat function untuk menghapus data mahasiswa yang data id nya diambil dari setiap id pada tabel mahasiswa
        public function hapusDataMahasiswa($id)
        {
            // Membuat query untuk menghapus data mahasiswa bawaan codeigniter
            // $this->db->where('id', $id);
            $this->db->delete('mahasiswa', ['id' => $id]);
        }

        // Membuat function untuk mengambil data mahasiswa berdasarkan id untuk melihat detail setiap mahasiswa yang terdaftar
        public function getMahasiswaById($id)
        {   
            // Menghasilkan data object of array
            return $this->db->get_where('mahasiswa', ['id' => $id])->row_array();
        }

        public function ubahDataMahasiswa()
        {
            $data = [
                "nama" => $this->input->post('nama', true),
                "nrp" => $this->input->post('nrp', true),
                "email" => $this->input->post('email', true),
                "jurusan" => $this->input->post('jurusan', true)
            ];

            // Membuat query untuk mengubah ke dalam tabel mahasiswa untuk memasukkan data mahasiswa
            $this->db->where('id', $this->input->post('id'));
            $this->db->update('mahasiswa', $data);
        }

        // Membuat function untuk mencari data mahasiswa bedasarkan keyword yang diketik maupun
        public function cariDataMahasiswa()
        {
            $keyword = $this->input->post('keyword', true);
            $this->db->like('nama', $keyword);
            $this->db->or_like('jurusan', $keyword);
            $this->db->or_like('nrp', $keyword);
            $this->db->or_like('email', $keyword);
            return $this->db->get('mahasiswa')->result_array();
        }
    }

?>