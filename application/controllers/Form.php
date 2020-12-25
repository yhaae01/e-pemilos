<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('M_calon','mc');
	}

	public function index()
	{
		$x['data']=$this->mc->show_calon();
		$this->load->view('formpemilihan',$x);
	}
	
	public function pilih($id){
		$result=$this->mc->pilihcalon($id);
		session_destroy();
		redirect(base_url("?pesan=terimakasih"));
	}
}
