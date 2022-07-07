<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Service extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index(){
		if($this->session->statuts_user and $this->session->type_user==1){
			$data['services'] = $this->service->get_all_service();
			$this->load->view('dashboard/header');
			$this->load->view('service/index', $data);
			$this->load->view('dashboard/footer');
		}else{
			redirect(site_url());
		} 
	}
	

	public function add(){
		$this->form_validation->set_rules('title','title' ,'required|max_length[40]');
		$this->form_validation->set_rules('desc', 'desc', 'required|max_length[100]');
		$this->form_validation->set_rules('icon', 'icon', 'required|max_length[100]');
		$this->form_validation->set_rules('created_at','created_at' ,'required');

		if($this->form_validation->run()){
		
				$params = array(
					'title' => $this->input->post('title'),
					'desc' => $this->input->post('desc'),
					'icon' => $this->input->post('icon'),
					'created_at' => $this->input->post('created_at'),
				);
			$data = $this->service->add_service($params);
			redirect('service/index');
			
		}else{
			$data['service'] = $this->service->get_all_service();
			$this->load->view('dashboard/header');
			$this->load->view('service/add', $data);
			$this->load->view('dashboard/footer');
		}
	}

	public function edit($serviceID){
		$data['service'] = $this->service->get_service($serviceID);

		if(isset($data['service'] ['serviceID'])){
			if(isset($_POST) && count($_POST)>0){
				$params = array(
					'title' => $this->input->post('title'),
					'desc' => $this->input->post('desc'),
					'icon' => $this->input->post('icon'),
					'created_at' => $this->input->post('created_at'),
				);

				$this->service->update_service($serviceID, $params);
				redirect('service/index');
			}else{
				$this->load->view('dashboard/header');
				$this->load->view('service/edit', $data);
				$this->load->view('dashboard/footer');
			}
		}else
			show_error('The service you are trying to edit does not exist.');

	}

	public function remove($serviceID){

		$service = $this->service->get_service($serviceID);

        if(isset($service['serviceID'])){
			
			$this->service->delete_service($serviceID);
            redirect('service/index');
        }else
            show_error('The service you are trying to delete does not exist.');
	}
}				
