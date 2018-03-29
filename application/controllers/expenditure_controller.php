<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Expenditure_controller extends CI_Controller {
	public function __construct() {
		parent::__construct();
        $this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('pagination');
		$this->load->model('expenditure_model');
		$this->load->model('login_model');
	}

	public function set_expenditure() {
	if($this->session->userdata('logged_in')) {

			$session_dat = $this->session->userdata('logged_in');
			$data['pageTitle']     = 'RK Wineshop : Expenditure';
			$this->form_validation->set_error_delimiters('<div class="errors" style="color:red">','</div>');

			$this->form_validation->set_rules('expenditure_item','Expenditure Item', 'required|trim|xss_clean');
			$this->form_validation->set_rules('expenditure_value','Expenditure Value', 'required|trim|xss_clean');
			$this->form_validation->set_rules('comments','Comments', 'trim|xss_clean');

				if($this->form_validation->run() == FALSE) {
					$this->load->view('includes/header',$data);
					$this->load->view('expenditure');
					$this->load->view('includes/footer');
				}
				else {
					$session_dat = $this->session->userdata('logged_in');
                	$users_id = $session_dat['users_role_id'];
                	$get_data_input = array(
                		'users_id'          => $users_id,
                		'expenditure_item'  => $this->input->post('expenditure_item'),
                		'expenditure_value' => $this->input->post('expenditure_value'),
                		'comments'          => $this->input->post('comments')
                	);
                	$retval = $this->expenditure_model->set_post_data($get_data_input);

                	if($retval==true) {
                		$this->session->set_flashdata('data_insert_success','Data Inserted Successfully');
                	}
                	else {
                		$this->session->set_flashdata('data_insert_failed','Data Insert Failed Please try Again');
                	}
                	redirect(base_url().'expenditure_controller/set_expenditure');
				}
			}
		else {
        	redirect('/login_controller');
		}			
	}

	public function get_expenditure() {
		if($this->session->userdata('logged_in')) {
			$data['pageTitle']     = 'RK Wineshop : Expenditure List';
			$config = array();
			$config['base_url']    = base_url().'expenditure_controller/get_expenditure';
			$config['total_rows']   = $this->expenditure_model->get_expenditure_count();
			$config['per_page']    = 10;
			$config['uri_segment'] = 3;
			$config['use_page_numbers'] = TRUE;

			$config['cur_tag_open'] = '&nbsp;<a class="current">';
			$config['cur_tag_close'] = '</a>';
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Previous';

			$this->pagination->initialize($config);

			$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			$data['result'] = $this->expenditure_model->get_expenditure_list($config['per_page'],$page);

			$str_links = $this->pagination->create_links();
			$data["links"] = explode('&nbsp;',$str_links );
			
			$this->load->view('includes/header',$data);
            $this->load->view('expenditure_list',$data);
            $this->load->view('includes/footer');
		}
	}
}
?>