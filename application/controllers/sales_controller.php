<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Sales_controller extends CI_Controller {

	public function __construct()
    {
        parent::__construct();

        $this->load->helper('form');
		
		$this->load->library('form_validation');

        $this->load->library('pagination');

        $this->load->model('login_model');

        $this->load->model('sales_model');

        $this->load->model('stock_model');
    }
    public function get_inventory(){       
        $brand_id =  $_POST['brand_id'];
        $result = $this->stock_model->get_stock_list_by_brand_id($brand_id);
        
        echo json_encode($result) ; 
    }
    public function get_price_stock(){
        $brand_id =  $_POST['brand_id'];
        $stock_id =  $_POST['stock_id'];
        $result = $this->stock_model->get_price_and_stock_by_brand_id_by_stock_id($brand_id, $stock_id);
        echo json_encode($result) ; 
    }
    public function add_sales() {

        if($this->session->userdata('logged_in')) {

            $session_dat = $this->session->userdata('logged_in');

            $data['pageTitle']     = 'RK Wineshop : Add Sales';

            $this->form_validation->set_error_delimiters('<div class="errors" style="color:red;">','</div>');

            $this->form_validation->set_rules('brand_name','Brand Name', 'required|trim|xss_clean');
            $this->form_validation->set_rules('stock_name','Stock Name', 'required|trim|xss_clean');
            $this->form_validation->set_rules('customer_name','Customer Name', 'trim|xss_clean');
            $this->form_validation->set_rules('price','Price', 'required|trim|numeric|xss_clean');  
            $this->form_validation->set_rules('quantity','Quantity', 'required|trim|numeric|xss_clean');  
            $this->form_validation->set_rules('total','Total', 'required|numeric|trim|xss_clean');

            if($this->form_validation->run() == FALSE) { 

                $data['get_brand_name'] = $this->sales_model->get_brand_name();  

                $this->load->view('includes/header',$data);

                $this->load->view('add_sales',$data);

                $this->load->view('includes/footer');  
            }
            else {

            $session_dat = $this->session->userdata('logged_in');
            $users_id = $session_dat['users_role_id'];
            $input['users_id']      = $users_id;
            $input['brands_id']     = $this->input->post('brand_name');
            $input['inventory_id']  = $this->input->post('stock_name');
            $input['customer_name'] = addslashes($this->input->post('customer_name'));
            $input['quantity']      = $this->input->post('quantity');
            $input['price']         = $this->input->post('total');

            $retval = $this->sales_model->add_sales($input);

            if($retval==true) {

                $this->session->set_flashdata('success','New Sale Added Successfully');
            }
            else {

                $this->session->set_flashdata('failed','Data Add Failed Please Try Again');
            }
            redirect(base_url().'sales_controller/add_sales');

            }
        }
    else {
        
        redirect('/login_controller');
        }
    }

     public function view_sales($offset = 0) {

        if($this->session->userdata('logged_in')) {
 
            $data['pageTitle']     = 'RK Wineshop : View Sales';



            $config = array();

            $config['base_url'] = base_url()."sales_controller/view_sales";

            $config['total_rows'] =  $config["total_rows"] = $this->sales_model->record_count();
            
            $config['per_page'] = 10; 

            $config["uri_segment"] = 3;

            $this->pagination->initialize($config);

            //$data['results'] = $this->sales_model->sales_list($config['per_page'], $offset);

            $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            
            $data["select"] = $this->sales_model->sales_list($config["per_page"], $page);

            $str_links = $this->pagination->create_links();

            $data["links"] =  explode('&nbsp;',$str_links );

            $this->load->view('includes/header',$data);

            $this->load->view('view_sales',$data);

            $this->load->view('includes/footer');

        }
         else {
            
            redirect('/login_controller');
        }
    }


    public function search_sales() {

    if($this->session->userdata('logged_in')) {

        $session_dat = $this->session->userdata('logged_in');

           $this->form_validation->set_error_delimiters('<div class="errors" style="color:red;">','</div>');

           $this->form_validation->set_rules('searchtext','Date','required');

           if($this->form_validation->run() == FALSE) {

                $this->session->set_flashdata('msg','Plase Select Date and hit search');

                redirect(base_url().'sales_controller/view_sales');
           }
           else {
                $searchtext = $this->input->post('searchtext');

                $data['result'] = $this->sales_model->search_text($searchtext); 

                $data['pageTitle'] = 'Search result';

                $this->load->view('includes/header',$data);

                $this->load->view('search_sales',$data);

                $this->load->view('includes/footer'); 
            }
        }
        else {
        
            redirect('/login_controller');
        }
    }
}