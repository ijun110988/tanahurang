<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Trans_model extends CI_Model {
   
	public function getListingType(){
		$listingtype=$this->db->get('ads_listing_type');
		return $listingtype->result_array();
	}
	
	public function category()
	{
		$region=$this->db->get('ads_category');
		return $region->result_array();
	}
	
	public function district()
	{
		$vilage=$this->db->get('villages');
		return $vilage->result_array();
	}
	
	

}