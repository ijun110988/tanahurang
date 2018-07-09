<?php
class Dashboard extends Check_Logged
{
public function __construct()
{
    parent::__construct();

    $this->load->helper(['form', 'url']);
    $this->load->library(['form_validation', 'encryption']);

}

public function index()
{
    if ($this->logged === TRUE) {
        redirect('dashboard/dash');
    } else {
        $this->load->view('admin/login');
    }
}

public function login($page = 'login')
{
        if ($this->logged === TRUE) {
            redirect('dashboard/dash');
        } else {
            $this->load->view('admin/'.$page);
        }
        $this->load->view('admin/'.$page);

}

public function dash($page = 'dashboard')
{
    if ($this->logged === TRUE) {
        $this->load->view('admin/'.$page);
    } else {
        redirect('login');
    }
}

public function logout($page = 'login')
{
   $this->session->unset_userdata('logged_in');
    session_destroy();
    redirect(base_url('login'),'refresh');
}

public function portfolio($page = 'portfolio')
{
    if ($this->logged === TRUE) {
        $this->load->view('admin/'.$page);
    } else {
        redirect('login');
    }
}

public function team($page = 'team')
{
    if ($this->logged === TRUE) {
        $this->load->view('admin/'.$page);
    } else {
        redirect('login');
    }
}

}
?>