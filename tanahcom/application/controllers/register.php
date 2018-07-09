<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {
	  public function index()
    {
       //$this->load->view('as_member/as_member_list');
	  $this->load->view('v_register');
    } 
	// Index login
	function register_add() {
		{
        $data = array(
            'button' => 'Create',
            'action' => site_url('register/register_action'),
	    'member_id' => set_value('member_id'),
	    'member_username' => set_value('member_username'),
	    'member_email' => set_value('member_email'),
	    'member_fullname' => set_value('member_fullname'),
	    'member_password' => set_value('member_password'),
		'member_cellphone' => set_value ('member_cellphone'),
		'member_status' =>set_value ('member_status'),
		'member_address' => set_value('member_address'),
		'member_village' => set_value ('member_village'),
		'member_district' => set_value ('member_district'),
		'member_regency' => set_value('member_regency'),
	    'member_province'=> set_value ('member_province'),
		'member_photo' => set_value ('member_photo'),
		'member_logon_sta' => set_value ('member_logon_sta'),
	);
		  $this->load->view('v_register', $data);
    }
    
     function register_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
			
			 'member_id' => $this->input->post('member_id'),
	    'member_username' => $this->input->post('member_username'),
	    'member_email' => $this->input->post('member_email'),
	    'member_fullname' => $this->input->post('member_fullname'),
	    'member_password' => $this->input->post('member_password'),
		'member_cellphone' =>  '',
		'member_status' => '',
		'member_address' =>  '',
		'member_village' =>  '',
		'member_district' =>  '',
		'member_regency' =>  '',
	    'member_province'=>  '',
		'member_photo' =>  '',
		'member_logon_sta' => '',
		
		/* 'member_fullname' => $this->input->post('member_fullname',TRUE),
		'member_email' => $this->input->post('member_email',TRUE),
		'member_username' => $this->input->post('member_username',TRUE),
		'member_password' => md5($this->input->post('member_password',TRUE)),
		'member_photo' => '',
		'member_province' => '',
		'member_city' => '',
		'member_chellphone' => '',
		'memner_address' => '',
		'member_status' =>'',
		'member_level' => '',
		'member_blokir' =>'', */
		
		
	    );
			$sql ="select * from as_member Where member_email='".$this->input->post('member_email')."'";
			$query =$this->db->query($sql);
			
			if($query->num_rows()==0){
			
			$this->As_member_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
				$to      = $this->input->post('member_email');
				$subject = 'Account Verification ';
				$message = 'Your Username'.$this->input->post('member_username').'Your Password '.$this->input->post('member_password'). 'terima kasih telah daftar di tanah.com';
				$headers = 'From: ijun.wahyudin@gmail.com' . "\r\n" .
					'Reply-To: ijun.wahyudin@gmail.com' . "\r\n" .
					'X-Mailer: PHP/' . phpversion();

				mail($to, $subject, $message, $headers);  
			redirect(site_url('as_member'));				
            }
			 $this->session->set_flashdata('message', 'GAGAGLLLLLL');
			redirect(site_url('register/register_add'));
			
				
			
            
        }
    }
}
}