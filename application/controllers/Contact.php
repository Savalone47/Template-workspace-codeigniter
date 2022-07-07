<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Contact extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('form_validation', 'email');
	}

	
	public function index(){
		if($this->session->statuts_user and $this->session->type_user==1){
			$data['contacts'] =$this->contact->get_all_contact();
			$this->load->view('dashboard/header');
			$this->load->view('contact/index', $data);
			$this->load->view('dashboard/footer');
		}else{
			redirect(site_url());
		}
		
	}

	public function add(){
		$this->form_validation->set_rules('subjet','subjet' ,'required|max_length[40]');
		$this->form_validation->set_rules('email', 'email', 'required|max_length[100]');
		$this->form_validation->set_rules('name', 'name', 'required|max_length[100]');
		$this->form_validation->set_rules('message', 'message', 'required|max_length[100]');
		$this->form_validation->set_rules('created_at','created_at' ,'required');

		if($this->form_validation->run()){
		
				$params = array(
					'subjet' => $this->input->post('subjet'),
					'email' => $this->input->post('email'),
					'name' => $this->input->post('name'),
					'message' => $this->input->post('message'),
					'created_at' => $this->input->post('created_at'),
				);
			$data = $this->service->add_service($params);
			redirect('contact/index');
			
		}else{
			$data['contact'] = $this->contact->get_all_contact();
			$this->load->view('dashboard/header');
			$this->load->view('contact/add', $data);
			$this->load->view('dashboard/footer');
		}
	}

	public function remove($contactID){

		$contact = $this->service->get_service($contactID);
        if(isset($contact['contactID'])){
			
			$this->contact->delete_contact($contactID);
            redirect('contact/index');
        }else
            show_error('The contact you are trying to delete does not exist.');
	}
		
}
