<?php if(! defined('BASEPATH')) exit('Akses langsung tidak diperbolehkan'); 
class Member_helper {
	// SET SUPER GLOBAL
	var $CI = NULL;
	public function __construct() {
		$this->CI =& get_instance();
	}
	// Fungsi login
	public function login($username, $pwd, $fromweb = false) {
		$query = $this->CI->db->query("SELECT * FROM member as a 
        left join member_status as b on a.member_status = b.status_code 
        where member_password = '$pwd' and (member_username = '$username' or member_email = '$username');");
        $result = $query->result();
        if(count($result) > 0){
            $id = $result[0]->member_id;
            $allow_access = $result[0]->member_id;
            $code = $result[0]->member_status;
            $desc = $result[0]->status_desc;
            $msg = $result[0]->status_alert_msg;
            $detail = ["id" => $result[0]->member_id,
			"username" => $result[0]->member_username,
            "email" => $result[0]->member_email,
			"phone"=> $result[0]->member_cellphone,
			"address"=>$result[0]->member_address,
            "fullname" => $result[0]->member_fullname];
			
			
	
            if (mysqli_more_results($this->CI->db->conn_id)) {
                mysqli_next_result($this->CI->db->conn_id);
            }
            if ($allow_access) {
                $status = array('member_logon_sta' => "1");
                $this->CI->db->where('member_id', $id);
                $this->CI->db->update('member', $status);

                if ($fromweb) {
                    $this->CI->session->set_userdata('login', $detail);
					
                }
            }
        }else{
            $code = "00";
            $desc = "Login Gagal";
            $msg = "Username atau password salah.";
            $detail = null;
        }
        return ["kode" => $code,
        "deskripsi" => $desc,
        "message" => $msg,
        "detail" => $detail];
    }
    // Get User/'s
    public function get_member($id){
        if ($id == '') {
            $member = $this->CI->db->get('member')->result();
        } else {
            $this->CI->db->where('member_id', $id);
            $member = $this->CI->db->get('member')->result();
        }
        return $member;
    }
    // Register
    public function register($member){
        $username = $member["member_username"];
        $email = $member["member_email"];
        $this->CI->db->where('member_username', $username);
        $cek_username = $this->CI->db->get('member')->result();
        if (mysqli_more_results($this->CI->db->conn_id)) {
            mysqli_next_result($this->CI->db->conn_id);
        }
        $this->CI->db->where('member_email', $email);
        $cek_email = $this->CI->db->get('member')->result();
        if (mysqli_more_results($this->CI->db->conn_id)) {
            mysqli_next_result($this->CI->db->conn_id);
        }
        if (count($cek_username) > 0 || count($cek_email) > 0) {
            $kode = "0";
            $msg = "Username atau email sudah terdaftar.";
            $detail = null;
        }else {
            $res_query = $this->CI->db->set($member)->insert("member");
            $kode = "1";
            $msg = "Silahkan lakukan verifikasi email.";
            $this->CI->db->where('member_email', $email);
            $detail = $this->CI->db->get('member')->result();
            if (mysqli_more_results($this->CI->db->conn_id)) {
                mysqli_next_result($this->CI->db->conn_id);
            }
            $member_auth = ["member_id" => $detail[0]->member_id, "member_auth_code" => $this->random_password()];
            $res_query = $this->CI->db->set($member_auth)->insert("member_auth");
        }
        $response = [
            "kode" => $kode,
            "msg" => $msg,
            "detail" => $detail[0]
        ];
        return $response;
    }
	// Proteksi halaman
	public function cek_login() {
		if($this->CI->session->userdata('login') == '') {
			$this->CI->session->set_flashdata('sukses','Anda belum login pastikan email dan password anda benar');
			redirect(base_url('login'));
		}
	}
	// Fungsi logout
	public function logout() {
		$this->CI->session->unset_userdata('login');
		$this->CI->session->set_flashdata('sukses','Anda berhasil logout');
		redirect(base_url('login'));
    }
    
    private function random_password() 
    {
        $alphabet = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $password = array(); 
        $alpha_length = strlen($alphabet) - 1; 
        for ($i = 0; $i < 8; $i++) 
        {
            $n = rand(0, $alpha_length);
            $password[] = $alphabet[$n];
        }
        return implode($password); 
    }
}
