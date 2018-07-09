<?php if(! defined('BASEPATH')) exit('Akses langsung tidak diperbolehkan'); 
class Simple_login {
	// SET SUPER GLOBAL
	var $CI = NULL;
	public function __construct() {
		$this->CI =& get_instance();
	}
	// Fungsi login
	public function login($email, $pwd) {
		$query = $this->CI->db->get_where('member',array('member_email'=>$email,'member_password' => $pwd,'member_status'=>'2'));
		if($query->num_rows() == 1) {
			$row 	= $this->CI->db->query('SELECT member_id,member_fullname FROM member where member_email = "'.$email.'"');
			$admin 	= $row->row();
			$id 	= $admin->id_user;
			$name  = $admin->member_fullname;
			$phone = $admin->member_cellphone;
			$address = $admin->memner_address;
			$this->CI->session->set_userdata('member_email', $email);
			$this->CI->session->set_userdata('member_fullname', $name);
			$this->CI->session->set_userdata('id_login', uniqid(rand()));
			$this->CI->session->set_userdata('id', $id);
			redirect(base_url('admin'));
		}else{
			$this->CI->session->set_flashdata('sukses','Oops... Username/password salah');
			redirect(base_url('login'));
		}
		return false;
	}
	// Proteksi halaman
	public function cek_login() {
		if($this->CI->session->userdata('member_email') == '') {
			$this->CI->session->set_flashdata('sukses','Anda belum login');
			redirect(base_url('login'));
		}
	}
	// Fungsi logout
	public function logout() {
		$this->CI->session->unset_userdata('username');
		$this->CI->session->unset_userdata('id_login');
		$this->CI->session->unset_userdata('id');
		$this->CI->session->set_flashdata('sukses','Anda berhasil logout');
		redirect(base_url('login'));
	}
}