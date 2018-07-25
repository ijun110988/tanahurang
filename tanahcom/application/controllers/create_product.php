<?php
class Create_product extends CI_Controller{

 function __construct(){
  parent::__construct();
 
	$this->load->database();
		$this->member_helper->cek_login();
	$this->load->helper(array('url'));
	$this->load->library('datatables');
	$this->load->model('trans_model');
	$this->load->model('insert_create_product_model');
	$this->load->model('insert_pic');
 }

 function index(){
	   //$data['menu'] =
	 $data['header_admin']='content/header_admin';
	 $data['type']=$this->trans_model->getListingType();
	 $data['category']=$this->trans_model->category();
	 $data['district']=$this->trans_model->district();
	 $this->load->view('frm/submit_product',$data);
 }
 
function insert(){
		 $config = array(
		'upload_path' => APPPATH. "../gambar/", //APPPATH. '../assets/uploads/';
		'allowed_types' => "gif|jpg|png|jpeg|pdf",
		'overwrite' => TRUE,
		'max_size' => "2048"//, // Can be set to particular file size , here it is 2 MB(2048 Kb)
		//'max_height' => "768",
		//'max_width' => "1024"
	 );
	 $this->load->library('upload', $config);
		//$this->upload->do_upload();
		$this->upload->do_upload('img01');
		$this->upload->do_upload('img02');
		$this->upload->do_upload('img03');
		$this->upload->do_upload('img04');
		$this->upload->data();
		
		$data2 = array(
			'ads_id' => '',
			'ads_image_name' => '',
			'sort_order' => ''
		);
		$this->insert_pic->pic_insert($data2);
		
		$data = array(
			'ads_id' => '001',//$this->input->post(''),
			'member_id' => $this->input->post('Member_id'),
			'ads_title' => $this->input->post('ads_Title'),
			'ads_category' => $this->input->post('ads_category'),
			'ads_listing_type' => $this->input->post('ads_type'),
			'ads_price' => $this->input->post('ads_price'),
			'ads_surface_area' => $this->input->post('ads_area'),
			'ads_building_area' => '',//$this->input->post(''),
			'ads_flor_count' => '',//$this->input->post(''),
			'ads_badroom_count' => '',//$this->input->post(''),
			'ads_bathroom_count' => '',//$this->input->post(''),
			'ads_cert' => $this->input->post('ads_certficate'),
			'ads_facilities' => $this->input->post('ads_lot_size'),
			'ads_address' => $this->input->post('ads_address'),
			'ads_village' => '',//$this->input->post(''),
			'ads_description' => $this->input->post('ads_description'),
			'ads_status' => '1'//$this->input->post('')
		);		
		$this->insert_create_product_model->create_product_insert($data);
		
 }
 
 
/* function do_upload(){
	 $config = array(
		'upload_path' => "./gambar/",
		'allowed_types' => "gif|jpg|png|jpeg|pdf",
		'overwrite' => TRUE,
		'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
		'max_height' => "768",
		'max_width' => "1024"
	 );
	 $this->load->library('upload', $config);
 }*/
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