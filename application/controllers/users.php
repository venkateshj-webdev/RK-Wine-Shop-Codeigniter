<?php if(!defined('BASEPATH')) exit('No direct script access allowed');



class Users extends CI_Controller

{

	public function __construct() {



		parent::__construct();



		$this->load->model('login_model');



		$this->load->model('users_model');



		$this->load->library('form_validation');



	}



	public function index() {

		if($this->session->userdata('logged_in')) {



			$data['pageTitle']  = 'RK Wineshop : Dashboard';



			$this->load->view('includes/header',$data);



			$this->load->view('dashboard');

			

			$this->load->view('includes/footer');

			

			}

	    	else 

	    	{

	    	

	    	redirect('/login_controller');

	    }



	}



	public function users_list() {



		if($this->session->userdata('logged_in')) {



			$data['select'] = $this->users_model->list_users();

 

			$data['pageTitle']     = 'RK Wineshop : Dashboard';



			$this->load->view('includes/header',$data);

	        

	        $this->load->view('users_list',$data);



	        $this->load->view('includes/footer');

	    }

	    else {

	    	redirect('/login_controller');

	    }

	}



	public function addNewUser() {



		if($this->session->userdata('logged_in')) {

			$session_dat = $this->session->userdata('logged_in');

            $users_role_id = $session_dat['users_role_id'];

            if($users_role_id == 1) {

			$data['pageTitle']     = 'RK Wineshop : Add User';



			$this->form_validation->set_error_delimiters('<div class="error">','</div');

			$this->form_validation->set_rules('username','Username','required|trim|xss_clean');

			$this->form_validation->set_rules('password','Password','required|trim');

			$this->form_validation->set_rules('passconf','Confirm Password','required|trim|matches[password]');

			$this->form_validation->set_rules('username','Username','required|trim|xss_clean');

			$this->form_validation->set_rules('fname','First Name','required|trim|xss_clean');

			$this->form_validation->set_rules('lname','lname','required|trim|xss_clean');

			$this->form_validation->set_rules('manage_role','Role','required|trim');

			//$this->form_validation->set_rules('role_id','Role ID','trim|xss_clean');



			if($this->form_validation->run() == FALSE) {



				$this->load->view('includes/header',$data);

	        

	        	$this->load->view('add_user');



	        	$this->load->view('includes/footer');



			}

			else {



				$data = array(

					'username'         => $this->input->post('username'),

					'password'         => $this->input->post('password'),

					'users_role_id'    => $this->input->post('manage_role'),

					'first_name'       => $this->input->post('fname'),

					'last_name'        => $this->input->post('lname')

					//'role'             => $this->input->post('manage_role'),

				);



				$username = $this->input->post('username');



				$retval = $this->users_model->newUser($data,$username);



				if($retval==true) {



					$this->session->set_flashdata('add_success', 'New user added successfully');

				}

				else {



					$this->session->set_flashdata('add_failed', 'User Already Exist Please try with different Username');



					redirect(base_url().'users/addNewUser');

				}



				redirect(base_url().'users/users_list');

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



	public function delete_user($id) {



		if($this->session->userdata('logged_in')) {



			$session_dat = $this->session->userdata('logged_in');



            $users_role_id = $session_dat['users_role_id'];



            if($users_role_id == 1) {



            	$retval = $this->users_model->delete_user($id);



            	if($retval==true) {



            		$this->session->set_flashdata('delete_success','User Deleted successfully');

            	}

            	else {



            		$this->session->set_flashdata('delete_failed','User Delete Failed Please try Again');

            	}

            	redirect('/users/users_list');

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



	public function edit_user($id) {



		if($this->session->userdata('logged_in')) {



			$session_dat = $this->session->userdata('logged_in');



            $users_role_id = $session_dat['users_role_id'];



            if($users_role_id == 1) {



            	$data['select'] = $this->users_model->edit_user($id);



            	$data['padeTitle'] = 'Update user';



            	$this->load->view('includes/header',$data);



            	$this->load->view('edit_user',$data);



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



	public function update_user() {



		if($this->session->userdata('logged_in')) {



			$session_dat = $this->session->userdata('logged_in');



            $users_role_id = $session_dat['users_role_id'];



            if($users_role_id == 1) {



            	$data['pageTitle']     = 'RK Wineshop : Edit User';



            	$this->form_validation->set_error_delimiters('<div class="error">','</div');

				$this->form_validation->set_rules('username','Username','required|trim|xss_clean');

				$this->form_validation->set_rules('password','Password','required|trim');

				$this->form_validation->set_rules('username','Username','required|trim|xss_clean');

				$this->form_validation->set_rules('first_name','First Name','required|trim|xss_clean');

				$this->form_validation->set_rules('last_name','lname','required|trim|xss_clean');

				$this->form_validation->set_rules('role','Role','required|trim');

				$this->form_validation->set_rules('users_role_id','Role ID','required|trim|xss_clean');	



				if($this->form_validation->run() == FALSE) {



				$this->load->view('includes/header',$data);

	        

	        	$this->load->view('edit_user');



	        	$this->load->view('includes/footer');



				}

				else {



					$data = array(



						'username'         => $this->input->post('username'),

						'password'         => $this->input->post('password'),

						'first_name'       => $this->input->post('first_name'),

						'last_name'        => $this->input->post('last_name'),

						'role'             => $this->input->post('role'),

						'users_role_id'    => $this->input->post('users_role_id')

					);



					$id = $this->input->post('id');



					$retval = $this->users_model->update_user($data,$id);



					if($retval) {



						$this->session->set_flashdata('update_success', 'Data updated Successfully');

					}

					else {



						$this->session->set_flashdata('update_failed','Data Update Failed');

					}

					redirect('/users/users_list');



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



	public function logout() {



		$this->session->sess_destroy();



		redirect('/login_controller');

	}



}