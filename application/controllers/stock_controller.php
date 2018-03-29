<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Stock_controller extends CI_Controller {

	public function __construct()
    {
        parent::__construct();

        $this->load->helper('form');
		
		$this->load->library('form_validation');

        $this->load->library('pagination');

        $this->load->model('login_model');

        $this->load->model('stock_model');
    }


    public function add_stock() {

        if($this->session->userdata('logged_in')) {

            $data['pageTitle']     = 'RK Wineshop : New Stock';

            $this->form_validation->set_error_delimiters('<div class="errors" style="color:red;">','</div>');

            $this->form_validation->set_rules('brand_name','Brand Name', 'required|trim|xss_clean');
            $this->form_validation->set_rules('stock_name','Name', 'required|trim|xss_clean');
            $this->form_validation->set_rules('invoice_number','Invoice Number', 'required|trim|xss_clean');
            $this->form_validation->set_rules('invoice_date','Invoice Date', 'required|trim|xss_clean|callback_checkDateFormat');
            $this->form_validation->set_rules('no_of_cases','No of Cases', 'required|trim|xss_clean');
            $this->form_validation->set_rules('no_of_bottles','Bottles', 'required|numeric|trim|xss_clean');  
            $this->form_validation->set_rules('unit_rate','Unit rate', 'required|numeric|trim|xss_clean');         
            $this->form_validation->set_rules('total','Total', 'required|trim|numeric|xss_clean');
            $this->form_validation->set_rules('sale_price','Sale Price', 'required|numeric|trim|xss_clean');

            function checkDateFormat($invoice_date) {
                if (preg_match("/[0-9]{4}\/[0-12]{2}\/[0-31]{2}/", $invoice_date)) {
                    if(checkdate(substr($invoice_date, 3, 2), substr($invoice_date, 0, 2), substr($invoice_date, 6, 4)))
                    return true;
                    else
                    return false;
                    } else {
                    return false;
                }
            } 

            $data['brand_name_list'] = $this->stock_model->get_brand_name();
            $data['stock_name_referance'] = "Stock received on " . date('d-M-Y');    
            if($this->form_validation->run() == FALSE) {   

              $this->load->view('includes/header',$data);

              $this->load->view('add_stock',$data);

              $this->load->view('includes/footer');  
            }
            else {

                $session_dat = $this->session->userdata('logged_in');
                $users_id = $session_dat['users_role_id'];

                $input= array();
                $input['users_id']         = $users_id;
                $input['brands_id']        = $this->input->post('brand_name');
                $input['name']             = addslashes($this->input->post('stock_name'));
                $input['invoice_number']   = $this->input->post('invoice_number');
                $input['invoice_date']     = $this->input->post('invoice_date');
                $input['no_of_cases']      = $this->input->post('no_of_cases');
                $input['no_of_bottles']    = $this->input->post('no_of_bottles');
                $input['unit_rate']        = $this->input->post('unit_rate');
                $input['total']            = $this->input->post('total');
                $input['sale_price']       = $this->input->post('sale_price');

                $retval = $this->stock_model->new_stock($input);

                if($retval==true) {
                    $this->session->set_flashdata('stock_success','Stock Added Successfully');
                }
                else {
                    $this->session->set_flashdata('stock_fail','Brand Added Failed Please Try Again');
                }

                redirect(base_url().'stock_controller/add_stock');
            }
        }
         else {
            
            redirect('/login_controller');
        }
    }

        public function view_stock($offset = 0) {

        if($this->session->userdata('logged_in')) {

            $data['pageTitle']     = 'RK Wineshop : New Stock';

            $data['result'] = $this->stock_model->get_stock();

            $config = array();

            $config['base_url'] = base_url()."stock_controller/view_stock";

            $config['total_rows'] =  $config["total_rows"] = $this->stock_model->record_count();
            
            $config['per_page'] = 10; 

            $config["uri_segment"] = 3;

            $this->pagination->initialize($config);

            $data['result'] = $this->stock_model->get_data($config['per_page'], $offset);

            $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            
            $data["results"] = $this->stock_model->get_data($config["per_page"], $page);

             $str_links = $this->pagination->create_links();

             $data["links"] =  explode('&nbsp;',$str_links );

            $this->load->view('includes/header',$data);

            $this->load->view('view_stock',$data);

            $this->load->view('includes/footer');

        }
         else {
            
            redirect('/login_controller');
        }
    }

    public function edit_stock($id = NULL) {

        if($this->session->userdata('logged_in')) {

            $session_dat = $this->session->userdata('logged_in');

            $users_role_id = $session_dat['users_role_id'];

            if($users_role_id == 1) {

            $data['select'] = $this->stock_model->select_stock($id);

            $data['pageTitle']     = 'RK Wineshop : New Stock';

            $this->load->view('includes/header',$data);

            $this->load->view('edit_stock',$data);

            $this->load->view('includes/footer');

            }

            else {

                $data['pageTitle']     = 'RK Wineshop : Access Denied';

                $this->load->view('includes/header',$data);
                
                $this->load->view('access_denied');

                $this->load->view('includes/footer');
            }
        }
        else {

            redirect('/login_controller');
        }
    }

    public function update_stock() {

        if($this->session->userdata('logged_in')) {

            $session_dat = $this->session->userdata('logged_in');

            $users_role_id = $session_dat['users_role_id'];

            if($users_role_id == 1) {

            $data['pageTitle']     = 'RK Wineshop : New Stock';

            $this->form_validation->set_error_delimiters('<div class="errors" style="color:red;">','</div>');

            $this->form_validation->set_rules('brands_id','Brands id', 'trim|xss_clean');
            $this->form_validation->set_rules('name','Name', 'required|trim|xss_clean');
            $this->form_validation->set_rules('invoice_number','Invoice Number', 'required|trim|xss_clean');
            $this->form_validation->set_rules('invoice_date','Invoice Date', 'required|trim|xss_clean');
            $this->form_validation->set_rules('no_of_bottles','No Of Bottles', 'required|numeric|trim|xss_clean');
            $this->form_validation->set_rules('no_of_cases','No Of Cases', 'required|numeric|trim|xss_clean');
            $this->form_validation->set_rules('unit_rate','Unit Rate', 'required|trim|xss_clean');
            $this->form_validation->set_rules('total','Total', 'required|numeric|trim|xss_clean');
            $this->form_validation->set_rules('sale_price','Sale Price', 'required|trim|xss_clean');
            $this->form_validation->set_rules('damage_bottles','No Of Bottles Damaged', 'numeric|trim|xss_clean');
            $this->form_validation->set_rules('description','Description', 'trim|xss_clean');

            if($this->form_validation->run() == FALSE) {   

              $this->load->view('includes/header',$data);

              $this->load->view('edit_stock');

              $this->load->view('includes/footer');  
            }
            else {

                 $input = array(
                    'name'             => addslashes($this->input->post('name')),
                    'invoice_number'   => $this->input->post('invoice_number'),
                    'invoice_date'     => $this->input->post('invoice_date'),
                    'no_of_cases'      => $this->input->post('no_of_cases'),
                    'no_of_bottles'    => $this->input->post('no_of_bottles'),
                    'unit_rate'        => $this->input->post('unit_rate'),
                    'total'            => $this->input->post('total'),
                    'sale_price'       => $this->input->post('sale_price'),
                    'damage_bottles'   => $this->input->post('damage_bottles'),
                    'description'      => $this->input->post('description')
                );

                $id = $this->input->post('id');
                $users_id = $users_role_id; 
                $brands_id = $this->input->post('brands_id');

                $retval = $this->stock_model->update_stock($input,$id,$users_id,$brands_id);

                if($retval==true) {
                    $this->session->set_flashdata('update_success', 'Stock Updated Successfully');
                }
                else {
                    $this->session->set_flashdata('update_failed', 'Stock Update Failed Please try Again');
                }
                redirect(base_url().'stock_controller/view_stock');
                }

            }   
             else {

                $data['pageTitle']     = 'RK Wineshop : Access Denied';

                $this->load->view('includes/header',$data);
                
                $this->load->view('access_denied');

                $this->load->view('includes/footer');
            }
        }
        else {
            redirect('/login_controller');
        }
    }

     public function delete_stock($id) {

        if($this->session->userdata('logged_in')) {

            $session_dat = $this->session->userdata('logged_in');

            $users_role_id = $session_dat['users_role_id'];

            if($users_role_id == 1) {
         
            $retval = $this->stock_model->delete_stock($id);

            if($retval==true) {
                
                $this->session->set_flashdata('delete_success', 'Data Deleted Successfully');
            }
            else {
                
                $this->session->set_flashdata('delete_failed', 'Data Delete Failed Please try Again');
            }
            redirect(base_url().'stock_controller/view_stock');
        }
        else {
            
            $data['pageTitle']     = 'RK Wineshop : Access Denied';

            $this->load->view('includes/header',$data);
                
            $this->load->view('access_denied');

            $this->load->view('includes/footer');
            }
        }
        else {
            redirect('/login_controller');
        }
    }

    public function search() {

    if($this->session->userdata('logged_in')) {

           $session_dat = $this->session->userdata('logged_in');

           $this->form_validation->set_error_delimiters('<div class="errors" style="color:red;">','</div>');

           $this->form_validation->set_rules('searchtext','Date','required');

           if($this->form_validation->run() == FALSE) {

                $this->session->set_flashdata('msg','Plase Select Date and hit search');

                redirect(base_url().'stock_controller/view_stock');
           }
           else {
                $searchtext = $this->input->post('searchtext');

                $data['result'] = $this->stock_model->search_text($searchtext); 

                $data['pageTitle'] = 'Search result';

                $this->load->view('includes/header',$data);

                $this->load->view('search_stock',$data);

                $this->load->view('includes/footer'); 
            }
        }
        else {
            redirect('/login_controller');
        }
    }

}