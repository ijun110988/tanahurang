<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class As_member extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('As_member_model');
        $this->load->library('form_validation');        
		$this->load->library('datatables');
		$this->load->library('session');
	    }

    public function index()
    {
       //$this->load->view('as_member/as_member_list');
	  $this->load->view('login');
    } 
	
    public function json() {
        header('Content-Type: application/json');
        echo $this->As_member_model->json();
    }

    public function read($id) 
    {
        $row = $this->As_member_model->get_by_id($id);
        if ($row) {
            $data = array(
		'member_id' => $row->member_id,
		'member_fullname' => $row->member_fullname,
		'member_email' => $row->member_email,
		'member_username' => $row->member_username,
		'member_password' => $row->member_password,
		'member_photo' => $row->member_photo,
		'member_province' => $row->member_province,
		'member_city' => $row->member_city,
		'member_chellphone' => $row->member_chellphone,
		'memner_address' => $row->memner_address,
		'member_status' => $row->member_status,
		'member_level' => $row->member_level,
		'member_blokir' => $row->member_blokir,
	    );
            $this->load->view('as_member/as_member_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('as_member'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('as_member/create_action'),
	    'member_id' => set_value('member_id'),
	    'member_fullname' => set_value('member_fullname'),
	    'member_email' => set_value('member_email'),
	    'member_username' => set_value('member_username'),
	    'member_password' => set_value('member_password'),
	    'member_photo' => set_value('member_photo'),
	    'member_province' => set_value('member_province'),
	    'member_city' => set_value('member_city'),
	    'member_chellphone' => set_value('member_chellphone'),
	    'memner_address' => set_value('memner_address'),
	    'member_status' => set_value('member_status'),
	    'member_level' => set_value('member_level'),
	    'member_blokir' => set_value('member_blokir'),
	);
		  $this->load->view('as_member/as_member_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'member_fullname' => $this->input->post('member_fullname',TRUE),
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
		'member_blokir' =>'',
		
		
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
			redirect(site_url('as_member/create'));
			
				
			
            
        }
    }
	
	
	 
	public function select_action()
	
	{
		 $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->select($this->input->post('member_email', TRUE));
        } else {
            $data = array(
		
		'member_email' => $this->input->post('member_email',TRUE),
		'member_password' => md5($this->input->post('member_password',TRUE)),
		
				
	    );
			$sql ="select * from as_member Where member_email='".$this->input->post('member_email')."' and member_password='".$this->input->post('member_password')."' ";
			$query =$this->db->query($sql);
			
			if($query->num_rows()==0){
			redirect(site_url('welcome'));				
            }
			 $this->session->set_flashdata('message', 'GAGAGLLLLLL');
			redirect(site_url('as_member/create'));
			
				
			
	}
	}
	
	
    
    public function update($id) 
    {
        $row = $this->As_member_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('as_member/update_action'),
		'member_id' => set_value('member_id', $row->member_id),
		'member_fullname' => set_value('member_fullname', $row->member_fullname),
		'member_email' => set_value('member_email', $row->member_email),
		'member_username' => set_value('member_username', $row->member_username),
		'member_password' => set_value('member_password', $row->member_password),
		'member_photo' => set_value('member_photo', $row->member_photo),
		'member_province' => set_value('member_province', $row->member_province),
		'member_city' => set_value('member_city', $row->member_city),
		'member_chellphone' => set_value('member_chellphone', $row->member_chellphone),
		'memner_address' => set_value('memner_address', $row->memner_address),
		'member_status' => set_value('member_status', $row->member_status),
		'member_level' => set_value('member_level', $row->member_level),
		'member_blokir' => set_value('member_blokir', $row->member_blokir),
	    );
            //$this->load->view('as_member/as_member_form', $data);
			$this->load->view('as_member/v_admin', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('as_member'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('member_id', TRUE));
        } else {
            $data = array(
		'member_fullname' => $this->input->post('member_fullname',TRUE),
		'member_email' => $this->input->post('member_email',TRUE),
		'member_username' => $this->input->post('member_username',TRUE),
		'member_password' => $this->input->post('member_password',TRUE),
		'member_photo' => $this->input->post('member_photo',TRUE),
		'member_province' => $this->input->post('member_province',TRUE),
		'member_city' => $this->input->post('member_city',TRUE),
		'member_chellphone' => $this->input->post('member_chellphone',TRUE),
		'memner_address' => $this->input->post('memner_address',TRUE),
		'member_status' => $this->input->post('member_status',TRUE),
		'member_level' => $this->input->post('member_level',TRUE),
		'member_blokir' => $this->input->post('member_blokir',TRUE),
	    );

            $this->As_member_model->update($this->input->post('member_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('as_member'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->As_member_model->get_by_id($id);

        if ($row) {
            $this->As_member_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('as_member'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('as_member'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('member_fullname', 'member fullname', 'trim|required');
	$this->form_validation->set_rules('member_email', 'member email', 'trim|required');
	$this->form_validation->set_rules('member_username', 'member username', 'trim|required');
	$this->form_validation->set_rules('member_password', 'member password', 'trim|required');
	$this->form_validation->set_rules('member_photo', 'member photo', 'trim|required');
	$this->form_validation->set_rules('member_province', 'member province', 'trim|required');
	$this->form_validation->set_rules('member_city', 'member city', 'trim|required');
	$this->form_validation->set_rules('member_chellphone', 'member chellphone', 'trim|required');
	$this->form_validation->set_rules('memner_address', 'memner address', 'trim|required');
	$this->form_validation->set_rules('member_status', 'member status', 'trim|required');
	$this->form_validation->set_rules('member_level', 'member level', 'trim|required');
	$this->form_validation->set_rules('member_blokir', 'member blokir', 'trim|required');

	$this->form_validation->set_rules('member_id', 'member_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "as_member.xls";
        $judul = "as_member";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
	xlsWriteLabel($tablehead, $kolomhead++, "Member Fullname");
	xlsWriteLabel($tablehead, $kolomhead++, "Member Email");
	xlsWriteLabel($tablehead, $kolomhead++, "Member Username");
	xlsWriteLabel($tablehead, $kolomhead++, "Member Password");
	xlsWriteLabel($tablehead, $kolomhead++, "Member Photo");
	xlsWriteLabel($tablehead, $kolomhead++, "Member Province");
	xlsWriteLabel($tablehead, $kolomhead++, "Member City");
	xlsWriteLabel($tablehead, $kolomhead++, "Member Chellphone");
	xlsWriteLabel($tablehead, $kolomhead++, "Memner Address");
	xlsWriteLabel($tablehead, $kolomhead++, "Member Status");
	xlsWriteLabel($tablehead, $kolomhead++, "Member Level");
	xlsWriteLabel($tablehead, $kolomhead++, "Member Blokir");

	foreach ($this->As_member_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->member_fullname);
	    xlsWriteLabel($tablebody, $kolombody++, $data->member_email);
	    xlsWriteLabel($tablebody, $kolombody++, $data->member_username);
	    xlsWriteLabel($tablebody, $kolombody++, $data->member_password);
	    xlsWriteLabel($tablebody, $kolombody++, $data->member_photo);
	    xlsWriteLabel($tablebody, $kolombody++, $data->member_province);
	    xlsWriteLabel($tablebody, $kolombody++, $data->member_city);
	    xlsWriteLabel($tablebody, $kolombody++, $data->member_chellphone);
	    xlsWriteLabel($tablebody, $kolombody++, $data->memner_address);
	    xlsWriteLabel($tablebody, $kolombody++, $data->member_status);
	    xlsWriteLabel($tablebody, $kolombody++, $data->member_level);
	    xlsWriteLabel($tablebody, $kolombody++, $data->member_blokir);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=as_member.doc");

        $data = array(
            'as_member_data' => $this->As_member_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('as_member/as_member_doc',$data);
    }

}

/* End of file As_member.php */
/* Location: ./application/controllers/As_member.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-03-04 07:44:34 */
/* http://harviacode.com */