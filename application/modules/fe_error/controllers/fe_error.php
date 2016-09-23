<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Fe_error extends MX_Controller {

	public function index()
	{
		$content = $this->load->view('index', '', TRUE);
		echo Modules::run('frontend', $content, 'home');
	}

}

/* End of file backend.php */
/* Location: ./application/modules/backend/controllers/backend.php */