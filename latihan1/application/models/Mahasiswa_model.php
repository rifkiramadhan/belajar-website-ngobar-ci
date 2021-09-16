<?php 

    class Mahasiswa_model extends CI_model {
        public function getAllMahasiswa()
        {
            return $query = $this->db->get('mahasiswa')->result_array();
        }
    }

?>