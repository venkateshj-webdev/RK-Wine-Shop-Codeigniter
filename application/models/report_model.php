<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Report_model extends CI_Model {

	public function __construct() {

		parent::__construct();

		$this->load->database();
	}

	public function get_reports() {
		$query_result = $this->db->query("select i.no_of_bottles,i.total,s.quantity,(i.no_of_bottles - s.quantity) AS opening_balance,concat(b.brand_number, '-', b.brand_name, '-', b.product_type, '-', b.size) as brands_id,(s.quantity * s.price) AS sale_amount,(i.no_of_bottles - s.quantity) AS closing_stock FROM sales AS s INNER JOIN brands AS b on s.brands_id = b.id INNER JOIN inventory AS i ON i.brands_id = s.brands_id");

	    $query = $query_result->result();

	    return $query;
	}

	public function get_from_to_iml($from_date,$to_date) {

		$query = $this->db->query("select i.no_of_bottles,i.total,s.quantity,(i.no_of_bottles - s.quantity) AS opening_balance,concat(b.brand_number, '-', b.brand_name, '-', b.product_type, '-', b.size) as brands_id,(s.quantity * s.price) AS sale_amount,(i.no_of_bottles - s.quantity) AS closing_stock FROM sales AS s INNER JOIN brands AS b on s.brands_id = b.id INNER JOIN inventory AS i ON i.brands_id = s.brands_id where s.date_created >= '".$from_date."' AND s.date_created <= '".$to_date."'");
		return $query->result();


	}

	
}


?>