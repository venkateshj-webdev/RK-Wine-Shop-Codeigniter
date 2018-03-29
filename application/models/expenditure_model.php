<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class Expenditure_model extends CI_Model {
	public function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->library('session');
	}

	public function set_post_data($get_data_input) {
		$this->db->insert('expenditure',$get_data_input);
		return TRUE;
	}

	public function get_expenditure_list($limit,$start) {
		$this->db->select('*');
		$this->db->from('expenditure');
		$this->db->limit($limit,$start);
		$this->db->order_by('date_of_create','desc');
		$qry = $this->db->get();
		$qry_result = $qry->result();
		return $qry_result;
	}

	public function get_expenditure_count() {
		return $this->db->count_all('expenditure','desc');
	}
}
?>