<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Service_model extends CI_Model {
	
	public function __construct() {
		parent::__construct();
	}

	public function get_service($serviceID){
		return $this->db->get_where('service', array('serviceID'=> $serviceID ))->row_array();
	}
	public function get_services($serviceID){
		return $this->db->get_where('service', array('serviceID'=> $serviceID ))->result_array();
	}

	public function get_all_service_count(){
		$this->db->from('service');return $this->db->count_all_results();	
	}

	public function get_all_service($params = array()){
		$this->db->order_by('serviceID', 'desc');

		if(isset($params) && !empty(($params))){
			$this->db->limit($params['limit'], $params['offset']);
		}
		return $this->db->get('service')->result_array();
	}

	
	public function add_service($params){
		$this->db->insert('service', $params);return $this->db->insert_id();
	}
   
	public function update_service($serviceID, $params){
		$this->db->where('serviceID', $serviceID);
		return $this->db->update('service', $params);
	}

	public function delete_service($serviceID){
		return $this->db->delete('service',array('serviceID'=>$serviceID));
	}
}
