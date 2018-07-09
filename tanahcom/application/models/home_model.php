<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home_model extends CI_Model {
    function getpropinsi() {
        $provinces= $this->db->get('provinces');
		return $provinces->result_array();

	}

			function kabupaten($provId){
				
			$kabupaten="<option value='0'>--pilih--</pilih>";

			$this->db->order_by('name','ASC');
			$kab= $this->db->get_where('regencies',array('province_id'=>$provId));

			foreach ($kab->result_array() as $data ){
			$kabupaten.= "<option value='$data[id]'>$data[name]</option>";
			}

			return $kabupaten;

			}


			function kecamatan($kabId){

			}

			function kelurahan($kecId){

			}

}