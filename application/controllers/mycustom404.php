<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Mycustom404 extends CI_Controller
{
	public function __construct() {

        parent::__construct();
    }

    public function index(){

     	$data['pageTitle'] = "Page Not Found";

        $this->output->set_status_header('404');

        $this->load->view('includes/header',$data);

        $this->load->view('404');

        $this->load->view('includes/footer');
    }
}
