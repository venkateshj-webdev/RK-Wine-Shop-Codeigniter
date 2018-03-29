<?php if(!defined('BASEPATH')) exit('No direct script access allowed');



class Stock_model extends CI_Model {



	public function __construct() {



		parent::__construct();



		$this->load->database();

	}



	public function new_stock($input) {



		$this->db->insert('inventory',$input);



		return TRUE;

	}

	public function get_stock_list_by_brand_id($brand_id){		


		 $query = $this->db->query("SELECT id, name FROM inventory where brands_id=$brand_id");



		 $query = $query->result();

		 
		 return $query; 

	}

	public function get_price_and_stock_by_brand_id_by_stock_id($brand_id, $stock_id){		

		 $query = $this->db->query("SELECT sale_price, (no_of_bottles - (select IFNULL(sum(quantity),0) from sales where brands_id=$brand_id and inventory_id=$stock_id)) as quantity  from inventory where id=$stock_id and brands_id=$brand_id");



		 $query = $query->result();



		 return $query; 

	}

	public function get_brand_name() {



		 $query = $this->db->query("SELECT id, CONCAT(brand_number, '-', brand_name, '-', size) as brand_name FROM brands ORDER BY id");



		 $query = $query->result();



		 return $query; 

	}



	public function get_stock() {



		 $query = $this->db->get('inventory');



		 $query = $query->result();



		 return $query; 

	}



	public function select_stock($id) {



		$this->db->select('*');



		$this->db->from('inventory');



		$this->db->where('id',$id);



		$query = $this->db->get();



		$query = $query->result();



		return $query;

	}



	public function update_stock($input,$id,$users_id,$brands_id) {

		if($input['no_of_bottles'] > 0) {

			if($input['damage_bottles'] == TRUE) {

				$totalval = $input['no_of_bottles'] - $input['damage_bottles'];
				
				if($totalval >= 0) {
				$query = $this->db->query("UPDATE inventory SET no_of_bottles = (no_of_bottles - '".$input['damage_bottles']."'),users_id = '".$users_id."', damage_bottles = (damage_bottles + '".$input['damage_bottles']."'), description = '".$input['description']."' WHERE id= '".$id."' ");
					return TRUE;
				} else {
					$this->session->set_flashdata('value_underflow','Sorry Available No of Bottles '.$input['no_of_bottles'].' You Entered Greater than actual bottles ');
					$current_url =  $_SERVER['HTTP_REFERER'];
					redirect($current_url);
					return FALSE;
				}
			} elseif($input['damage_bottles'] == FALSE) {
			$query = $this->db->query("UPDATE inventory SET users_id = '".$users_id."', name = '".$input['name']."', invoice_number = '".$input['invoice_number']."', invoice_date = '".$input['invoice_date']."', no_of_cases = '".$input['no_of_cases']."', unit_rate = '".$input['unit_rate']."',no_of_bottles = '".$input['no_of_bottles']."', total = '".$input['total']."', sale_price = '".$input['sale_price']."', damage_bottles = (damage_bottles + '".$input['damage_bottles']."'), description = '".$input['description']."' WHERE id= '".$id."' ");
			return TRUE;
			}
		} else {

			$this->session->set_flashdata('stock_zero','No stock left in this Brand');
			$current_url =  $_SERVER['HTTP_REFERER'];
			redirect($current_url);
			return FALSE;
		}	
	}

	public function delete_stock($id) {


		$this->db->where('id',$id);

		$this->db->delete('inventory');

		return TRUE;

	}



	public function get_data($limit,$start) {

    	$query = $this->db->query("SELECT i.id,CONCAT(b.brand_number, '-', b.brand_name, '-', b.size) AS brands_id,i.name,i.invoice_number,i.invoice_date,i.no_of_cases,i.no_of_bottles AS btls_inventory,i.unit_rate,i.total,i.sale_price,i.date_created,i.damage_bottles,i.description FROM inventory AS i INNER JOIN brands AS b ON i.brands_id = b.id ORDER BY i.date_created DESC LIMIT 0,25 ");

    	return $query->result();



	}



	public function record_count() {

		return $this->db->count_all("inventory");

	}



	public function search_text($searchtext) {

		$query = $this->db->query("SELECT i.id,i.brands_id,i.name,i.invoice_number,i.invoice_date,i.no_of_cases,i.no_of_bottles AS btls_inventory,i.unit_rate,i.total,i.sale_price,i.date_created, ivd.no_of_bottles AS btls_damaged,ivd.description FROM inventory AS i LEFT JOIN inventory_damage AS ivd ON i.brands_id = ivd.inventory_id where i.date_created LIKE '%".$searchtext."%' ");

		return $query->result();

	}
  
}