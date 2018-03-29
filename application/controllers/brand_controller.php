<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Brand_controller extends CI_Controller {

	public function __construct()
    {
        parent::__construct();

        $this->load->helper('form');
		
		$this->load->library('form_validation');

        $this->load->library('pagination');

        $this->load->model('login_model');

        $this->load->model('brand_model');
    }

    public function add_brand() {

        if($this->session->userdata('logged_in')) {

            $data['pageTitle']     = 'RK Wineshop : New Brands';

            $this->form_validation->set_error_delimiters('<div class="errors" style="color:red;">','</div>');

            $this->form_validation->set_rules('brand_number','Brand Number', 'required|trim|xss_clean');
            $this->form_validation->set_rules('brand_name','Brand Name', 'required|trim|xss_clean');
            $this->form_validation->set_rules('product_type','Product type', 'required|trim|xss_clean');
            // $this->form_validation->set_rules('pack_type','Pack Type', 'required|trim|xss_clean');
            $this->form_validation->set_rules('sizes','Sizes', 'required|trim|xss_clean');
    

            if($this->form_validation->run() == FALSE) {   

              $this->load->view('includes/header',$data);

              $this->load->view('add_brand');

              $this->load->view('includes/footer');  
            }
            else {

                    $brand_number     = addslashes($this->input->post('brand_number'));
                    $brand_name       = addslashes($this->input->post('brand_name'));
                    $product_type     = $this->input->post('product_type');
                    // $pack_type        = $this->input->post('pack_type');
                    $size            = $this->input->post('sizes');

                    $session_dat = $this->session->userdata('logged_in');

                    $users_id = $session_dat['users_role_id'];

                    $input = array();
                    $input['brand_number']     = addslashes($this->input->post('brand_number'));
                    $input['brand_name']       = addslashes($this->input->post('brand_name'));
                    $input['product_type']     = $this->input->post('product_type');
                    // $input['pack_type']        = $this->input->post('pack_type');
                    $input['size']             = $this->input->post('sizes');
                    $input['users_id']         = $users_id;


                $retval = $this->brand_model->new_brand($brand_number,$brand_name,$product_type,$size,$users_id,$input);

                if($retval==true) {
                    $this->session->set_flashdata('brand_success','Brand Added Successfully');
                }
                else {
                    $this->session->set_flashdata('brand_fail','Brand Already Exist Please try with different brand number');
                }

                redirect(base_url().'brand_controller/add_brand');
            }
        }
         else {
            
            redirect('/login_controller');
        }
    }

    public function view_brands() {

        if($this->session->userdata('logged_in')) {
 
            $data['pageTitle']     = 'RK Wineshop : View Brands';

            $data['select'] = $this->brand_model->brands_list();

            $this->load->view('includes/header',$data);

            $this->load->view('view_brand',$data);

            $this->load->view('includes/footer');

        }
         else {
            
            redirect('/login_controller');
        }
    }

     public function delete_brand($id) {

        if($this->session->userdata('logged_in')) {

            $session_dat = $this->session->userdata('logged_in');

            $users_role_id = $session_dat['users_role_id'];

            if($users_role_id == 1) {
         
            $retval = $this->brand_model->delete_brand($id);

            if($retval==true) {
                
                $this->session->set_flashdata('delete_success', 'Data Deleted Successfully');
            }
            else {
                
                $this->session->set_flashdata('delete_failed', 'Data Delete Failed Please try Again');
            }
            redirect(base_url().'brand_controller/view_brands');
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

    public function edit_brand($id = NULL) {

        if($this->session->userdata('logged_in')) {

            $session_dat = $this->session->userdata('logged_in');

            $users_role_id = $session_dat['users_role_id'];

            if($users_role_id == 1) {

            $data['select'] = $this->brand_model->select_brand($id);

            $data['pageTitle']     = 'RK Wineshop : New Stock';

            $this->load->view('includes/header',$data);

            $this->load->view('edit_brand',$data);

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

    public function update_brand() {

        if($this->session->userdata('logged_in')) {

            $session_dat = $this->session->userdata('logged_in');

            $users_role_id = $session_dat['users_role_id'];

            if($users_role_id == 1) {

            $data['pageTitle']     = 'RK Wineshop : New Stock';

            $this->form_validation->set_error_delimiters('<div class="errors" style="color:red;">','</div>');

            $this->form_validation->set_rules('brand_number','Brand Number', 'required|trim|xss_clean');
            $this->form_validation->set_rules('brand_name','Brand Name', 'required|trim|xss_clean');
            $this->form_validation->set_rules('product_type','Product type', 'required|trim|xss_clean');
            // $this->form_validation->set_rules('pack_type','Pack Type', 'required|trim|xss_clean');
            $this->form_validation->set_rules('size','Sizes', 'required|trim|xss_clean');

            if($this->form_validation->run() == FALSE) {   

              $this->load->view('includes/header',$data);

              $this->load->view('edit_brand');

              $this->load->view('includes/footer'); 
            }
            else {

                 $input = array(
                    'brand_number'    => addslashes($this->input->post('brand_number')),
                    'brand_name'      => addslashes($this->input->post('brand_name')),
                    'product_type'    => $this->input->post('product_type'),
                    'size'           => $this->input->post('size')
                );

                $id = $this->input->post('id');

                $retval = $this->brand_model->update_brand($input,$id);

                if($retval==true) {
                    $this->session->set_flashdata('update_success', 'Brand Updated Successfully');
                }
                else {
                    $this->session->set_flashdata('update_failed', 'Brand Update Failed Please try Again');
                }
                redirect(base_url().'brand_controller/view_brands');
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

        public function search_brand_item() {

    if($this->session->userdata('logged_in')) {

            $session_dat = $this->session->userdata('logged_in');

           $this->form_validation->set_error_delimiters('<div class="errors" style="color:red;">','</div>');

           $this->form_validation->set_rules('searchtext','Date','required');

           if($this->form_validation->run() == FALSE) {

                $this->session->set_flashdata('msg','Plase Select Date and hit search');

                redirect(base_url().'brand_controller/view_brands');
           }
           else {
                $searchtext = $this->input->post('searchtext');

                $data['result'] = $this->brand_model->search_text($searchtext); 

                $data['pageTitle'] = 'Search result';

                $this->load->view('includes/header',$data);

                $this->load->view('search_brands',$data);

                $this->load->view('includes/footer'); 
            }
        }
        else {
        
            redirect('/login_controller');
        }
    }



}