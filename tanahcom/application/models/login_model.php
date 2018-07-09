<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Jorge Torres
 * Description: Login model class
 */
class Login_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    
    public function validate(){
        // grab user input
        $username = $this->security->xss_clean($this->input->post('member_username'));
        $password = $this->security->xss_clean($this->input->post('member_password'));
        
        // Prep the query
        $this->db->where('member_username', $username);
        $this->db->where('member_password', $password);
		$where = array(
			'member_username' => $username,
			'member_password' => md5($password)
		);
        
        // Run the query
        $query = $this->db->get('users');
        // Let's check if there are any results
        if($query->num_rows == 1)
        {
            // If there is a user, then create session data
            $row = $query->row();
            $data = array(
                    'member_id' => $row->userid,
                    'member_fullname' => $row->fname,
                    //'lname' => $row->lname,
                    'member_username' => $row->username,
                    'validated' => true
                    );
            $this->session->set_userdata($data);
            return true;
        }
        // If the previous process did not validate
        // then return false.
        return false;
    }
}
?>