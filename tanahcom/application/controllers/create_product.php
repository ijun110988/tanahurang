<?php
class Create_product extends CI_Controller{

 function __construct(){
  parent::__construct();
 
	$this->load->database();
	$this->load->helper(array('url'));
	$this->load->library('datatables');
	$this->load->model('trans_model');


 }

 function index(){
	   //$data['menu'] =
	 $data['header_admin']='content/header_admin';
	 $data['type']=$this->trans_model->getListingType();
	 $data['category']=$this->trans_model->category();
	  $data['district']=$this->trans_model->district();
	$this->load->view('frm/submit_product',$data);
 }
 /* function ambil_data(){
		
		$modul=$this->input->post('modul');
		$id=$this->input->post('id');
		
		if($modul=="kabupaten"){
		echo $this->model_select->kabupaten($id);
		}
		else if($modul=="kecamatan"){
		echo $this->model_select->kecamatan($id);

		}
		else if($modul=="kelurahan"){
		echo $this->model_select->kelurahan($id);
		}
	} */
	
}
?>