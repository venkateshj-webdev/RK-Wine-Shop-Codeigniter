<?php if(!defined('BASEPATH')) exit('No direct script access allowed');



class Sales_model extends CI_Model {



	public function __construct() {



		parent::__construct();



		$this->load->database();

	}



	public function add_sales($input) {



		$this->db->insert('sales',$input);



		return TRUE;

	}





	public function sales_list($limit,$start) {



		$query = $this->db->query("select s.id, concat(brand_number, '-', brand_name, '-', product_type, '-', size) as brands_id, name as inventory_id, customer_name, quantity, price, s.date_created from sales s inner join brands b on s.brands_id=b.id 

inner join inventory i on s.inventory_id = i.id ORDER BY s.date_created DESC LIMIT $limit OFFSET $start");

		$query = $query->result();

		return $query;

	}



	public function get_brand_name() {



		$qry = $this->db->query("SELECT id, CONCAT(brand_number, '-', brand_name, '-', size) as brand_name FROM brands ORDER BY id");



		$qry = $qry->result();



		return $qry; 

	}



	public function delete_sale($id) {



		$this->db->where('id',$id);



		$this->db->delete('sale');



		return TRUE;

	}


	public function select_sale($id) {



		$query = $this->db->where('id',$id);



		$query = $this->db->get('sale');



		return $query->result();

	}



	public function update_sale($input,$id) {



		$this->db->where('id',$id);



		$this->db->update('sale',$input);



		return TRUE;

	}

	public function search_text($searchtext) {
		

	$query = $this->db->query("select s.id, concat(brand_number, '-', brand_name, '-', product_type, '-', size) as brands_id, name as inventory_id, customer_name, quantity, price, s.date_created from sales s inner join brands b on s.brands_id=b.id 

		inner join inventory i on s.inventory_id = i.id where s.date_created LIKE CONCAT('%','".$searchtext."', '%')");

		$query = $query->result();

		return $query;
	}

	public function record_count() {



		return $this->db->count_all("sales");

	}

}