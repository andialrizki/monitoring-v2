<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Fe_login extends MX_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('login_pagev2');
	}

	function is_login()
	{
		$username = $this->session->userdata(APP_PREFIX.'username');
		$name = $this->session->userdata(APP_PREFIX.'name');
		$id = $this->session->userdata(APP_PREFIX.'id_admin');
		$is_login = $this->session->userdata(APP_PREFIX.'is_login');

		if ( $username == null || $name == null || $id == null || $is_login == false ) 
		{
			redirect( site_url('sign-in') );
		} 
	}

	function do_login()
	{
		$this->load->library('user_agent');

		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() == FALSE) 
		{
			$this->load->view('login_pagev2');
		}
		else 
		{
			// parameter dari login form 
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			$this->load->model('login_model');
			// pengecekan login dengan database
			$result = $this->login_model->authentification($username, $password);
			if ( $result )		 
			{
				redirect( site_url('home') );
			}
			else
			{
				// jika login gagal; redirect ke login.html
				$message = 'Username atau password anda salah.<script type="text/javascript">setInterval(function(){
				   			window.location.href = "'.site_url('sign-in').'";
				   		},2000);</script>';
				$this->load->view('login_page', array('error' => $message));
			}
		}
	}

	// digunakan untuk logout
	function do_logout()
	{
		$this->session->sess_destroy();	
		redirect( base_url() );
	}


}

/* End of file backend.php */
/* Location: ./application/modules/backend/controllers/backend.php */