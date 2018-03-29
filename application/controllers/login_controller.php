<?php if(!defined('BASEPATH')) exit('No direct script access allowed');



class Login_controller extends CI_Controller

{

	public function __construct() {



		parent::__construct();



		$this->load->helper('form');



		$this->load->library('form_validation');



		$this->load->model('login_model');



	}



	public function index() {



		$this->isloggedIn();

	}



	public function isloggedIn() {



		$isloggedIn = $this->session->userdata('isloggedIn');



		if(!isset($isloggedIn) || $isloggedIn != TRUE) {



			$data['pageTitle'] = "RK WineShop | Login Page";


			$this->load->view('login',$data);

		}

		else {

			redirect('/dashboard');

		}

	}



	public function login_check() {



		$this->form_validation->set_error_delimiters('<div class="error">','</div>');



		$this->form_validation->set_rules('username', 'UserName','required|max_length[20]|trim|xss_clean');



		$this->form_validation->set_rules('password', 'password','required|max_length[20]|trim');





		if($this->form_validation->run() == FALSE) {



			redirect('login_controller');



		}

		else {



			$username = $this->input->post('username');



			$password = $this->input->post('password');


			$this->load->model('login_model');



			$result = $this->login_model->login_me($username,$password);



			if($result) {



				foreach ($result as $key => $row) {



					$session_data = array(



						'user_id'       => $row->id,



						'users_role_id' => $row->users_role_id,



						'first_name'   => $row->first_name,



						'last_name'    => $row->last_name,



						'is_active'    => $row->is_active,



						'is_delete'    => $row->is_delete,



						'isloggedIn'   => TRUE

					);



					$this->session->set_userdata('logged_in',$session_data);



					}



					$this->session->set_flashdata('success', 'Login Successful');



					redirect('/dashboard');



					return true;



				}

			else {



				$this->session->set_flashdata('failed', 'Login Failed Please Try Again');



				redirect('login_controller');



				return false;

			}



		}



	}
    



	public function logout() {



		$this->session->sess_destroy();



		redirect('login_controller');

	}





}
