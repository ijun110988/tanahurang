    <?php

    defined('BASEPATH') OR exit('No direct script access allowed');

    class Chain_model extends CI_Model {

        public function get_provinsi()
        {
            $this->db->order_by('name','asc');
            return $this->db->get('provinces')->result();
        }

        public function get_kota()
        {
            // kita joinkan tabel kota dengan provinsi
            $this->db->order_by('name', 'asc');
            $this->db->join('provinces', 'regencies.province_id = provinces.id');
            return $this->db->get('regencies')->result();
        }

        public function get_kecamatan()
        {
            // kita joinkan tabel kecamatan dengan kota
            $this->db->order_by('name', 'asc');
            $this->db->join('regencies', 'districts.regency_id = regencies.id');
            return $this->db->get('districts')->result();
        }


        // untuk edit ambil dari id level paling bawah
        public function get_selected_by_id_kecamatan($id_kecamatan)
        {
            $this->db->where('id', $id_kecamatan);
            $this->db->join('regencies', 'districts.regencies_id = regencies.id');
            $this->db->join('provinces', 'regencies.province_id = provinces.id');
            return $this->db->get('districts')->row();
        }

    }
