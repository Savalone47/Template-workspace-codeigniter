<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Partenaire_model extends CI_Model {
	
	public function __construct() {
		parent::__construct();
	}

	public function get_partenaire($patID){
		return $this->db->get_where('partenaire', array('patid'=> $patID ))->row_array();
	}

	public function get_partenaires($patID){
		return $this->db->get_where('partenaire', array('patid'=> $patID ))->result_array();
	}

	public function get_all_partenaire_count(){
		$this->db->from('partenaire');
		return $this->db->count_all_results();	
	}

	public function get_all_partenaire($params = array()){
		$this->db->order_by('patid', 'desc');

		if(isset($params) && !empty(($params))){
			$this->db->limit($params['limit'], $params['offset']);
		}
		return $this->db->get('partenaire')->result_array();
	}

	
	public function add_partenaire($params){
		$this->db->insert('partenaire', $params);
		return $this->db->insert_id();
	}
   
	public function update_partenaire($patID, $params){
		$this->db->where('patid', $patID);
		return $this->db->update('partenaire', $params);
	}

	public function delete_partenaire($patID){
		return $this->db->delete('partenaire', array('patid' => $patID));
	}
}
