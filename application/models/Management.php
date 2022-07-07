<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Management extends CI_Model {
	
	public function __construct() {
		parent::__construct();
	}

	public function auth_management($email, $password){
		$this->db->where(['email' => $email, 'password' => $password]);return $this->db->get('management')->result();
	}

	public function get_management($adminID){
		return $this->db->get_where('management', array('adminID'=> $adminID ))->row_array();
	}

	public function get_all_management_count(){
		$this->db->from('management');return $this->db->count_all_results();	
	}

	public function get_all_management($params = array()){
		$this->db->order_by('adminID', 'desc');

		if(isset($params) && !empty(($params))){
			$this->db->limit($params['limit'], $params['offset']);
		}
		return $this->db->get('management')->result_array();
	}

	
	public function add_management($params){
		$this->db->insert('management', $params);return $this->db->insert_id();
	}
   
	public function update_management($adminID, $params){
		$this->db->where('adminID', $adminID);return $this->db->update('management', $params);
	}

	public function delete_management($adminID){
		return $this->db->delete('management', array('adminID' => $adminID));
	}
}
