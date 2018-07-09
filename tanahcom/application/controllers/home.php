<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	
function __construct(){
parent::__construct();

$this->load->database();

$this->load->helper(array('url'));

$this->load->model('home_model');

 


}

	public function index()
	{
			$data['provinsi']=$this->home_model->getpropinsi();
			$this->load->view('index',$data);
	}
	function ambil_data(){
		
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
	}
}
