<?php 
    function aksi_login(){
	$username = $this->input->post('member_username');
	$password = $this->input->post('member_password');
	$where = array(
		'member_username' => $username,
		'member_password' => md5($password)
		);
	$cek = $this->login_model->cek_login("admin",$where)->num_rows();
	if($cek > 0){

		$data_session = array(
			'member_username' => $username,
			'member_status' => "login"
			);

		$this->session->set_userdata($data_session);

		redirect(base_url("admin"));
	}else{
		echo "Username dan password salah !";
	}
}
        }        
    }
?>