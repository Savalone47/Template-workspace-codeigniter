<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact_model extends CI_Model {
	
	public function __construct() {
		parent::__construct();
	}

	public function get_contact($contactID){
		return $this->db->get_where('contact', array('contactID'=> $contactID ))->row_array();
	}
	public function get_contacts($contactID){
		return $this->db->get_where('contact', array('contactID'=> $contactID ))->result_array();
	}

	public function get_all_contact_count(){
		$this->db->from('contact');return $this->db->count_all_results();	
	}

	public function get_all_contact($params = array()){
		$this->db->order_by('contactID', 'desc');

		if(isset($params) && !empty(($params))){
			$this->db->limit($params['limit'], $params['offset']);
		}
		return $this->db->get('contact')->result_array();
	}

	
	public function add_contact($params){
		$this->db->insert('contact', $params);return $this->db->insert_id();
	}
   
	public function update_contact($contactID, $params){
		$this->db->where('contactID', $contactID);
		return $this->db->update('contact', $params);
	}

	public function delete_contact($contactID){
		return $this->db->delete('contact',array('contactID'=>$contactID));
	}
}
