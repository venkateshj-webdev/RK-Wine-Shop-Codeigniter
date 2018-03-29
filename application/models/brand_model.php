<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Brand_model extends CI_Model {

	public function __construct() {

		parent::__construct();

		$this->load->database();

		$this->load->library('session');
	}

	public function new_brand($brand_number,$brand_name,$product_type,$size,$users_id,$input) {

	$check_query = $this->db->query("SELECT brand_number FROM brands WHERE  brand_number = '".$brand_number."' ");

	if($check_query->num_rows()>0) {
		
		$this->session->set_flashdata('brand_exist','Brand Already Exist');

		return FALSE;
	}
	else {
	
		$query = $this->db->insert('brands',$input);

		return TRUE;
		}
	}

	public function brands_list() {

		$query = $this->db->query("select b.id, b.brand_number, b.brand_name, b.product_type, b.size, b.date_created, 
concat(u.first_name, ' ', u.last_name) as full_name from  brands b inner join users u on b.users_id=u.id ORDER BY b.date_created DESC");

		$query = $query->result();

		return $query;
	}

		public function delete_brand($id) {

		$this->db->where('id',$id);

		$this->db->delete('brands');

		return TRUE;
	}

	public function select_brand($id) {

		$this->db->select('*');

		$this->db->from('brands');

		$this->db->where('id',$id);

		$query = $this->db->get();

		$query = $query->result();

		return $query;
	}

	public function update_brand($input,$id) {

		$this->db->where('id',$id);

		$this->db->update('brands',$input);

		return TRUE;
	}

	public function search_text($searchtext) {

		$this->db->select('*');

		$this->db->from('brands');

		$this->db->like('brand_name',$searchtext);

		$query = $this->db->get();

		$query = $this->db->query("select b.id, b.brand_number, b.brand_name, b.product_type, b.size, b.date_created, concat(u.first_name, ' ', u.last_name) as full_name from brands b inner join users u on b.users_id=u.id where b.brand_name LIKE CONCAT('%','".$searchtext."', '%')");

		$query = $query->result();

		return $query;

	}
}