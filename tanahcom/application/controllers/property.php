<?php
if(!defined("BASEPATH")) exit("No direct script access allowed");
class Property extends CI_Controller
{
  public function index()
  {
    $this->load->model("users_property"); 
    $data["member_id"]=$this->users_property->get_property();

    $this->load->view("users_view",$data);
  }
}