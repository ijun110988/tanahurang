<?php 

class Admin extends CI_Controller{

	function index(){
		//$this->data['as_member'] = $this->data_login->getUserinfo(); 
		$this->member_helper->cek_login();
		$this->load->view('as_member/v_dashbord');
		
	}
}
	
?>