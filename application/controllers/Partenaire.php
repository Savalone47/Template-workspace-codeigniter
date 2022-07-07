<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Partenaire extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index(){
		if($this->session->statuts_user and $this->session->type_user==1){
			$data['partenaires'] = $this->partenaire->get_all_partenaire();
			$this->load->view('dashboard/header');
			$this->load->view('partenaire/index', $data);
			$this->load->view('dashboard/footer');
		}else{
			redirect(site_url());
		}
       
	}
	public function detail($patID){
		$data['partenaires'] = $this->partenaire->get_partenaires($patID);
		$this->load->view('home/header');
		$this->load->view('partenaire/details', $data);
		$this->load->view('home/footer');
	}

	public function add(){

		$this->form_validation->set_rules('title','title' ,'required|max_length[40]');
		$this->form_validation->set_rules('name','name' ,'required|max_length[40]');
		$this->form_validation->set_rules('categorie','categorie' ,'required|max_length[40]');
		$this->form_validation->set_rules('url','url' ,'required|max_length[40]');
		$this->form_validation->set_rules('desc', 'desc', 'required|max_length[100]');
		$this->form_validation->set_rules('created_at','created_at' ,'required');

		if($this->form_validation->run()){

			$config['upload_path']= './uploads/';
            $config['allowed_types']= 'jpg|png|jpeg';
            $new_file=uniqid();
            $config['file_name'] = $new_file.".jpg";
			$this->load->library('upload', $config);

            if (!$this->upload->do_upload('image')) {
                $error = array('error' => $this->upload->display_errors());
                $this->session->set_flashdata(['error'=>$error['error']]);
                redirect($_SERVER['HTTP_REFERER']);
				exit();
            }

			$params = array(
				'title' => $this->input->post('title'),
				'name'=> $this->input->post('name'),
				'categorie'=> $this->input->post('categorie'),
				'url' => $this->input->post('url'),
				'desc' => $this->input->post('desc'),
				'created_at' => $this->input->post('created_at'),
				'image'=>'./uploads/'. $config['file_name']
			);
			$data = $this->partenaire->add_partenaire($params);
			redirect('partenaire/index');
		}else{
			$data['partenaire'] = $this->partenaire->get_all_partenaire();

			$this->load->view('dashboard/header');
			$this->load->view('partenaire/add', $data);
			$this->load->view('dashboard/footer');
		}
	}

	public function edit($patID){
		$data['partenaire'] = $this->partenaire->get_partenaire($patID);

		if(isset($data['partenaire'] ['patid'])){

			$this->form_validation->set_rules('title','title' ,'required|max_length[40]');
			$this->form_validation->set_rules('name','name' ,'required|max_length[40]');
			$this->form_validation->set_rules('categorie','categorie' ,'required|max_length[40]');
			$this->form_validation->set_rules('url','url' ,'required|max_length[40]');
			$this->form_validation->set_rules('desc', 'desc', 'required|max_length[100]');
			$this->form_validation->set_rules('created_at','created_at' ,'required');

			if($this->form_validation->run()) {

				$config['upload_path']= './uploads/';
				$config['allowed_types']= 'jpg|png|jpeg';
				$new_file=uniqid();
				$config['file_name'] = $new_file.".jpg";
				$this->load->library('upload', $config);

				if (!$this->upload->do_upload('image')) {
					$error = array('error' => $this->upload->display_errors());
					$this->session->set_flashdata(['error'=>$error['error']]);
					redirect($_SERVER['HTTP_REFERER']);
					exit();
				}

				$params = array(
					'title' => $this->input->post('title'),
					'name'=> $this->input->post('name'),
					'categorie'=> $this->input->post('categorie'),
					'url' => $this->input->post('url'),
					'desc' => $this->input->post('desc'),
					'created_at' => $this->input->post('created_at'),
					'image' =>'./uploads/' .$config['file_name']
				);
				$this->partenaire->update_partenaire($patID, $params);
				redirect('partenaire/index');	

			}else{
				$this->load->view('dashboard/header');
				$this->load->view('partenaire/edit', $data);
				$this->load->view('dashboard/footer');
			}		
		}else
			show_error('The partenaire you are trying to delete does not exist.');
			
		
}

	public function remove($patID){

		$pat = $this->partenaire->get_partenaire($patID);
        if(isset($pat['patid'])){
			
			$this->partenaire->delete_partenaire($patID);
            redirect('partenaire/index');
        }else
            show_error('The partenaire you are trying to delete does not exist.');
	}
}
