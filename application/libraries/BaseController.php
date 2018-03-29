<?php defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' ); 

/**
 * Class : BaseController
 * Base Class to control over all the classes
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class BaseController extends CI_Controller {

		public function response($data = NULL) {
		$this->output->set_status_header ( 200 )->set_content_type ( 'application/json', 'utf-8' )->set_output ( json_encode ( $data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES ) )->_display ();
		exit ();
	}
	
	
	function isLoggedIn() {
		
		$isLoggedIn = $this->session->userdata ( 'isLoggedIn' );
		
		if (! isset ( $isLoggedIn ) || $isLoggedIn != TRUE) {
			
			redirect ( 'login' );
		} 
		else 
			{

			$session_dat = $this->session->userdata('logged_in');

			$this->data['users_role_id'] = $session_dat['users_role_id'];

			$this->data['first_name']    = $session_dat['first_name'];

			$this->data['last_name']     = $session_dat['last_name'];

			$this->data['is_active']     = $session_dat['is_active'];

			$this->data['is_delete']     = $session_dat['is_delete'];

		}
	}

	function loadViews($viewName = "", $headerInfo = NULL, $pageInfo = NULL, $footerInfo = NULL) {

        $this->load->view('includes/header', $headerInfo);
        $this->load->view($viewName, $pageInfo);
        $this->load->view('includes/footer', $footerInfo);
    }

    function logout() {
		
		$this->session->sess_destroy ();
		
		redirect ( 'login' );
	}
	
}