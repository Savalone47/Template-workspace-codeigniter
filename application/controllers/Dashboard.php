<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard  extends CI_Controller {

	public function index(){
		if($this->session->statuts_user and $this->session->type_user==1){
			$data['service_count'] =  $this->service->get_all_service_count();
			$data['partenaire_count'] =  $this->partenaire->get_all_partenaire_count();
			$data['user_count'] =  $this->Management->get_all_management_count();
			//$data['contact_count'] =  $this->contact->get_all_contact_count();

			$this->load->view('dashboard/header');
			$this->load->view('dashboard/main', $data);
			$this->load->view('dashboard/footer');
		}else{
			redirect(site_url());
		}
	}
}
