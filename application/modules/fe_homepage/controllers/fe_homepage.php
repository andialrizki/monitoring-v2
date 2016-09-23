<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Fe_homepage extends MX_Controller {

	public function __construct()
	{
		parent::__construct();
		echo Modules::run('fe_login/is_login');
	}
	
	public function index()
	{
		// echo "<pre>";
		// print_r($this->session->all_userdata());die();	
		$content = $this->load->view('fe_homepage', '', TRUE);
		echo Modules::run('frontend', $content, 'home');
	}

}

/* End of file backend.php */
/* Location: ./application/modules/backend/controllers/backend.php */