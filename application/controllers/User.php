<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function index(){
		if($this->session->statuts_user and $this->session->type_user==1){
			$data['users'] = $this->Management->get_all_management();
			$this->load->view('dashboard/header');
			$this->load->view('user/index', $data);
			$this->load->view('dashboard/footer');
		}else{
			redirect(site_url());
		}
		
	}
	public function add(){
		$this->form_validation->set_rules('username','username' ,'required|max_length[40]');
		$this->form_validation->set_rules('email', 'email', 'required|max_length[100]');
		$this->form_validation->set_rules('password','password' ,'required|max_length[40]');
		$this->form_validation->set_rules('created_at','created_at' ,'required');

		if($this->form_validation->run()){
		
				$params = array(
					'type_user' => 1,
					'status'=>TRUE,
					'username' => $this->input->post('username'),
					'email' => $this->input->post('email'),
					'password' => $this->input->post('password'),
					'created_at' => $this->input->post('created_at'),
				);
			$data = $this->Management->add_management($params);
			redirect('user/index');
			
		}else{
			$data['user'] = $this->Management->get_all_management();
			$this->load->view('dashboard/header');
			$this->load->view('user/add', $data);
			$this->load->view('dashboard/footer');
		}
	}

	public function edit($adminID){
		$data['management'] = $this->Management->get_management($adminID);

		if(isset($data['management'] ['adminID'])){
			if(isset($_POST) && count($_POST)>0){
				$params = array(
					'type_user' => 1,
					'status'=>TRUE,
					'username' => $this->input->post('username'),
					'email' => $this->input->post('email'),
					'password' => $this->input->post('password'),
					'created_at' => $this->input->post('created_at'),
				);

				$this->Management->update_management($adminID, $params);
				redirect('user/index');
			}else{
				$this->load->view('dashboard/header');
				$this->load->view('user/edit', $data);
				$this->load->view('dashboard/footer');
			}
		}else
			show_error('The service you are trying to edit does not exist.');

	}

	public function remove($adminID){

		$admin = $this->Management->get_management($adminID);

        if(isset($admin['adminID'])){
			
			$this->Management->delete_management($adminIDID);
            redirect('user/index');
        }else
            show_error('The user you are trying to delete does not exist.');
	}
}
