<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Users_model extends CI_Model
{
	public function __construct() {

		parent::__construct();

		$this->load->database();

		$this->load->library('session');
	}

	public function newUser($data,$username) {

		$query = $this->db->select('username')->from('users')->where('username', $username)->get();
		
		if($query->num_rows()>0) {

			echo "<script type='text/javascript'>alert('User Already Exist Please try with different username');</script>";
			
			return FALSE;
		}
		else {

	    $this->db->insert('users',$data);

		return TRUE;
		}
	}

	public function list_users() {

		$query = $this->db->get('users');

		$query = $query->result();

		return $query;
	}

	public function delete_user($id) {

		$this->db->where('id',$id);

		$query = $this->db->delete('users');

		return $query;
	}

	public function edit_user($id) {

		$this->db->where('id',$id);

		$query = $this->db->get('users');

		$query = $query->result();

		return $query;
	}

	public function update_user($data,$id) {

		$this->db->where('id',$id);

		$query = $this->db->update('users',$data);

		return $query;
	}
}