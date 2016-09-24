<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Frontend extends MX_Controller {

	public function index($content, $active)
	{
		$navbar = '';
		$type_admin = $this->session->userdata(APP_PREFIX.'type_admin');
		if ($type_admin==0 || $type_admin==1) {
			$navbar = $this->load->view('navbar_admin', array('active' => $active),TRUE);
			$grid = $this->load->view('grid_admin', array('active' => $active), TRUE);
		}
		if ($type_admin==2) {
			$navbar = $this->load->view('navbar_pangkalan', array('active' => $active),TRUE);
		}
		if ($type_admin==3) {
			$navbar = $this->load->view('navbar_agen', array('active' => $active),TRUE);
		}
		if ($type_admin==4) {
			$navbar = $this->load->view('navbar_spbe', array('active' => $active),TRUE);
		}
		$data = array('content' => $content, 'active' => $active, 'navbar' => $navbar, 'grid' => $grid);
		$this->load->view('index', $data);
	}

}

/* End of file backend.php */
/* Location: ./application/modules/backend/controllers/backend.php */