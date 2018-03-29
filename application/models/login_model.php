<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model {

	public function __construct() {
		parent::__construct();
		$this->load->database();
	}

	public function login_me($username,$password) {

		$this->db->select('*');

		$this->db->from('users');

		$this->db->where('username', $username);

		$this->db->where('password', $password);

		$query = $this->db->get();

		if($query->num_rows()==1) {

			return $query->result();
		}
		else {

			return FALSE;
		}
	}

	
}