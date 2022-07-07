<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	public function index(){
		if($this->session->statuts_user and $this->session->type_user==1){
			$this->load->view('dashboard/header');
			$this->load->view('profile/index');
			$this->load->view('dashboard/footer');
		}else{
			redirect(site_url());
		}
	}
}
