<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index(){
	
		$this->form_validation->set_rules('email', 'email', 'required|max_length[100]');
		$this->form_validation->set_rules('password', 'password', 'required|max_length[16]');

		if ($this->form_validation->run()){

			$email = $this->input->post('email');
			$password = $this->input->post('password');
			$admin = $this->Management->auth_management($email, $password);

			if(count($admin)>0){
				$this->session->set_userdata([
					'id_user' => $admin[0]->adminID,
					'name_user' =>$admin[0]->username,
					'type_user'=>$admin[0]->type_user,
					'statuts_user'=>TRUE
				]);
				if($this->session->statuts_user and $admin[0]->type_user == 1){
					redirect('dashboard');
				}elseif( $this->session->statuts_user and $admin[0]->type_user == 2){
					redirect('user_admin');
				}
			}else{
				$this->session->set_flashdata('error', TRUE);
				redirect($_SERVER['HTTP_REFERER']);
			}
		}else{
			$this->load->view('login');
		}
	}
}
