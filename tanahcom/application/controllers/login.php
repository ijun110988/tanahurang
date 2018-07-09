<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	
	// Index login
	public function index() {
		// Fungsi Login
		$valid = $this->form_validation;
		$username = $this->input->post('member_email');
		$pwd = md5($this->input->post('member_password'));
		$valid->set_rules('member_email','Email','required');
		$valid->set_rules('member_password','Password','required');
			if($valid->run()) {
			//$this->simple_login->login($username,$pwd, base_url('admin'), base_url('login'));
			$this->member_helper->login($username,$pwd,true);
			if($result['kode']='02'){
				redirect(base_url('admin'));
			}
			else 
			{
				$this->CI->session->set_flashdata('sukses','Oops... Username/password salah');
				redirect(base_url('login'));
			}
			
		}
		//$this->load->view('as_member/v_login');
		$this->load->view('v_login');
	}
	
	// Logout di sini
	public function logout() {
		$this->member_helper->logout();	
		$this->CI->db->update("");
	}	
}