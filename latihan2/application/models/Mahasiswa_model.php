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
            $this->db->where('id', $id);
            $this->db->delete('mahasiswa');
        }
    }

?>