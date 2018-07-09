<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Profile extends CI_Model {
   
	function update_account($data);
	{
		$this->load->database();
		$this->db->update('member')
	}
	
	

}