<?php 

class Verify extends CI_Controller
{
public function __construct()
{
    parent::__construct();

    $this->load->helper(['form', 'url', 'security']);
    $this->load->library(['form_validation', 'encryption','session']);
    $this->load->model('User_Model');

}

public function index()
{
    $this->form_validation->set_rules('member_email','Email','required|trim|xss_clean');
    $this->form_validation->set_rules('member_password','Password','required|trim|xss_clean|callback_check_password');

    if ($this->form_validation->run() === FALSE) {
        $this->load->view('as_member/as_member_register');

    } else {
        redirect(base_url('as_member/as_profile_form'));

    }
}

/*login process*/

public function check_password($password)
{
    $email = $this->input->input_stream('member_email', TRUE);
    $password = md5($password);

    $result = $this->User_Model->login($email,$password);
    if($result != null){
        foreach ($result as $row) {
            $sess_data = [
                'member_email' => $row->member_email,
                'member_id' => $row->member_id
            ];
            $this->session->set_userdata('logged_in', $sess_data);
        }
        return TRUE;
    } else {
        $this->form_validation->set_message('check_database', 'invalid username and password');
        return FALSE;
    }
}


public function logout($page = 'login')
{
    $this->session->unset_userdata('logged_in');
    session_destroy();
    redirect(base_url('login'),'refresh');
}
}
?>