<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Fe_singlepage extends MX_Controller {

	public function __construct()
	{
		parent::__construct();
//		echo Modules::run('fe_login/is_login');
	}
	
	public function index()
	{
		$this->load->view('fe_singlepage');
	}

}

/* End of file backend.php */
/* Location: ./application/modules/backend/controllers/backend.php */