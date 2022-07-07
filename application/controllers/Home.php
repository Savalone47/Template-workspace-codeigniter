<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct(){
		parent::__construct();
	}

	public function index(){

		$data['services'] =$this->service->get_all_service();
		$data['parts'] =$this->partenaire->get_all_partenaire();

		$this->load->view('home/header');
		$this->load->view('home/index', $data);
		$this->load->view('home/footer');
	}
	
}
