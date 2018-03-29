<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Report_controller extends CI_Controller {

	public function __construct()
    {
    	parent::__construct();
    	$this->load->library('form_validation');
    	$this->load->model('report_model');
    }

    public function view_reports() {

    	if($this->session->userdata('logged_in')) {

    		$data['pageTitle'] = 'RK Wineshop : Reports';

            $data['query_results'] = $this->report_model->get_reports();

    		$this->load->view('includes/header',$data);

             $this->load->view('report_view',$data);

             $this->load->view('includes/footer');

 		}
 		else {

 			redirect('/login_controller');
 		}
    }

    public function between_date() {
        if($this->session->userdata('logged_in')) {

            $this->form_validation->set_error_delimiters('<div class="errors" style="color:red;">','</div>');

            $this->form_validation->set_rules('from-date','From Date','required');
            $this->form_validation->set_rules('to-date','To Date','required');

            if($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('error','Please Enter correct From and To date and hit Enter');
                redirect(base_url().'report_controller/view_reports');
            }
            else {

                $from_date = $this->input->post('from-date');
                $to_date   = $this->input->post('to-date');

                $data['from_date'] = $this->input->post('from-date');
                $data['to_date']   = $this->input->post('to-date');

                $data['result'] = $this->report_model->get_from_to_iml($from_date,$to_date);  
                    $data['pageTitle'] = 'RK Wineshop : Reports Between Dates';
                    $this->load->view('includes/header',$data);    
                    $this->load->view('report_iml',$data);    
                    $this->load->view('includes/footer');                
            }
        }
        else {

            redirect('/login_controller');
        }
    }

    public function get_result_between_date_beer() {
        if($this->session->userdata('logged_in')) {

            $this->form_validation->set_error_delimiters('<div class="errors" style="color:red;">','</div>');

            $this->form_validation->set_rules('from-date','From Date','required');
            $this->form_validation->set_rules('to-date','To Date','required');

            if($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('error','Please Enter correct From and To date and hit Enter');
                $current_url = $SERVER['HTTP_REFERER'];
                redirect($current_url);
                return FALSE;
            }
            else {

                $from_date = $this->input->post('from-date');
                $to_date   = $this->input->post('to-date');

                $data['from_date'] = $this->input->post('from-date');
                $data['to_date']   = $this->input->post('to-date');

                $data['result'] = $this->report_model->get_from_to_iml($from_date,$to_date);  
                    $data['pageTitle'] = 'RK Wineshop : Reports Between Dates';
                    $this->load->view('includes/header',$data);    
                    $this->load->view('report_beer',$data);    
                    $this->load->view('includes/footer',$data);                
            }
        }
        else {

            redirect('/login_controller');
        }
    }


     public function get_result_between_date_wine() {
        if($this->session->userdata('logged_in')) {

            $this->form_validation->set_error_delimiters('<div class="errors" style="color:red;">','</div>');

            $this->form_validation->set_rules('from-date','From Date','required');
            $this->form_validation->set_rules('to-date','To Date','required');

            if($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('error','Please Enter correct From and To date and hit Enter');
                $current_url = $SERVER['HTTP_REFERER'];
                redirect($current_url);
                return FALSE;
            }
            else {

                $from_date = $this->input->post('from-date');
                $to_date   = $this->input->post('to-date');

                $data['from_date'] = $this->input->post('from-date');
                $data['to_date']   = $this->input->post('to-date');

                $data['result'] = $this->report_model->get_from_to_iml($from_date,$to_date);  
                    $data['pageTitle'] = 'RK Wineshop : Reports Between Dates';
                    $this->load->view('includes/header',$data);    
                    $this->load->view('report_wine',$data);    
                    $this->load->view('includes/footer',$data);                
            }
        }
        else {

            redirect('/login_controller');
        }
    }
}
?>