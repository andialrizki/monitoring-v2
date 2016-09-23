<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Fe_spbe extends MX_Controller {

	public function __construct()
	{
		parent::__construct();
		echo Modules::run('fe_login/is_login');
		$this->load->model('model_spbe');
	}

	public function index()
	{
		Modules::run('myhelper/permission', array(1));
		$data = $this->get_all_spbe();
		$content = $this->load->view('index', array('data' => $data), TRUE);
		echo Modules::run('frontend', $content, 'spbe');
	}

	public function add_spbe()
	{
		Modules::run('myhelper/permission', array(1));
		$content = $this->load->view('add_edit_spbe', '', TRUE);
		echo Modules::run('frontend', $content, 'spbe');
	}

	public function edit_spbe()
	{
		Modules::run('myhelper/permission', array(1));
		$id = $this->uri->segment(3);
		$data = $this->get_this_data($id);
		$content = $this->load->view('add_edit_spbe', array('data' => $data), TRUE);
		echo Modules::run('frontend', $content, 'spbe');
	}

	public function submit_spbe()
	{
		Modules::run('myhelper/permission', array(1));
		$act = $this->input->post('action', TRUE);
		$arrData = array('name', 'lokasi_spbe', 'kapasitas', 'longitude', 'latitude');
		$data = array();
		foreach ($arrData as $kk) {
			$data[$kk] = trim($this->input->post($kk, TRUE));
		}
		$data['lokasi_spbe'] = preg_replace('/[^A-Za-z0-9\-()\/. ]/', '', $data['lokasi_spbe']);
		$msg = '';
		$result = '';
		if ($act == 'add') {
			$data = $this->model_spbe->add_spbe($data);
			$msg = Modules::run('myhelper/refresh_page',"Sukses Menambah spbe", site_url('spbe'));
		}
		if ($act == 'edit') {
			$data['id'] = $this->input->post('id', TRUE);
			$result = $data;
			$data = $this->model_spbe->edit_spbe($data);
			$msg = Modules::run('myhelper/refresh_page',"Sukses Merubah Data", site_url('spbe'));
		}

		$content = $this->load->view('add_edit_spbe', array('data' => $result, 'error' => $msg), TRUE);
		echo Modules::run('frontend', $content, 'spbe');
	}

	public function del_spbe()
	{
		$id = $this->input->post('id', TRUE);
		$data = $this->model_spbe->del_spbe($id);
		$msg = Modules::run('myhelper/refresh_page',"Sukses Menghapus spbe", site_url('spbe'));
		$data = $this->get_all_spbe();
		$content = $this->load->view('index', array('data' => $data, 'error' => $msg), TRUE);
		echo Modules::run('frontend', $content, 'spbe');
	}

	public function get_all_spbe()
	{
		$data = $this->model_spbe->get_all_spbe();
		return $data;
	}

	public function get_this_data($id)
	{
		$data = $this->model_spbe->get_this_data($id);
		return $data;
	}

}

/* End of file backend.php */
/* Location: ./application/modules/backend/controllers/backend.php */