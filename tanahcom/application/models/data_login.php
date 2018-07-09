<?php
class Data_login extends CI_Model{
	 public $table = 'as_member';
    public $id = 'member_id';
	public $email='member_email';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }
	
		
	 function cek_login($table,$where){
	  return $this->db->get_where($table,$where);
	 }
	 
	 function getUserinfo()
    {
		/* $this->db->select("member_fullname,member_email"); 
		$this->db->from('as_member');
		$query = $this->db->get();
		return $query->result(); */
		
        $this->db->where(array($this->session->set_userdata('member_email')));
		$this->db->select('member_fullname');
		$q = $this->db->get('as_member');
	 
		/* after we've made the queries from the database, we will store them inside a variable called $data, and return the variable to the controller */
		 if($q->num_rows() > 0)
		{
		  foreach ($q->result() as $row)
		  {
			$data[] = $row;
		  }
		  return $data;
		} 
	  } 
    
	
	function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
	 // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }
	
}
?>