<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {
	
	public function __construct() {
		parent::__construct();
	}

	public function get_user($adminID){
		return $this->db->get_where('user', array('user_id'=> $adminID ))->row_array();
	}

	public function get_all_user_count(){
		$this->db->from('user');return $this->db->count_all_results();	
	}

	public function get_all_management($params = array()){
		$this->db->order_by('user_id', 'desc');

		if(isset($params) && !empty(($params))){
			$this->db->limit($params['limit'], $params['offset']);
		}
		return $this->db->get('user')->result_array();
	}

	
	public function add_user($params){
		$this->db->insert('user', $params);return $this->db->insert_id();
	}
   
	public function update_user($adminID, $params){
		$this->db->where('user_id', $adminID);return $this->db->update('user', $params);
	}

	public function delete_user($adminID){
		return $this->db->delete('user', array('user_id' => $adminID));
	}
}
