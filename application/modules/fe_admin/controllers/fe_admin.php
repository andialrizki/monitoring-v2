<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Fe_admin extends MX_Controller {

	public function __construct()
	{
		parent::__construct();
		echo Modules::run('fe_login/is_login');
		$this->load->model('model_admin');
		Modules::run('myhelper/permission', array(1));
	}

	public function index()
	{
		$data = $this->get_all_admin();
		$content = $this->load->view('index', array('data' => $data), TRUE);
		echo Modules::run('frontend', $content, 'admin');
	}

	public function get_all_admin()
	{
		$data = $this->model_admin->get_all_admin();
		return $data;
	}

	public function add_admin()
	{
		$content = $this->load->view('add_edit_admin', '', TRUE);
		echo Modules::run('frontend', $content, 'admin');
	}

	public function edit_admin()
	{
		$id = $this->uri->segment(3);
		$data = $this->get_this_data($id);
		$data['password'] = Modules::run('myhelper/decrypt_text', $data['password']);
		$content = $this->load->view('add_edit_admin', array('data' => $data), TRUE);
		echo Modules::run('frontend', $content, 'admin');
	}

	public function get_this_data($id)
	{
		$data = $this->model_admin->get_this_data($id);
		return $data;
	}

	public function submit_admin()
	{
		$act = $this->input->post('action', TRUE);
		$arrData = array('name', 'username', 'password');
		$data = array();
		foreach ($arrData as $kk) {
			$data[$kk] = trim($this->input->post($kk, TRUE));
		}
		$msg = '';
		$result = '';
		if ($act == 'add') {
			$data = $this->model_admin->add_admin($data);
			if ($data) {
				$msg = Modules::run('myhelper/refresh_page',"Sukses Menambah Admin", site_url('manage-admin'));
			}else{
				$msg = Modules::run('myhelper/refresh_page',"Username Sudah Digunakan", site_url('manage-admin/add'));
			}
		}
		if ($act == 'edit') {
			$data['id_admin'] = $this->input->post('id_admin', TRUE);
			$result = $data;
			$data = $this->model_admin->edit_admin($data);
			if ($data) {
				$msg = Modules::run('myhelper/refresh_page',"Sukses Merubah Data", site_url('manage-admin'));	
			}else{
				$msg = Modules::run('myhelper/refresh_page',"Username Sudah Digunakan", site_url('manage-admin/edit/'.$this->input->post('id_admin', TRUE)));
			}
		}

		$content = $this->load->view('add_edit_admin', array('data' => $result, 'error' => $msg), TRUE);
		echo Modules::run('frontend', $content, 'admin');
	}

	public function del_admin()
	{
		$id = $this->input->post('id', TRUE);
		$data = $this->model_admin->del_admin($id);
		$msg = Modules::run('myhelper/refresh_page',"Sukses Menghapus Admin", site_url('manage-admin'));
		$data = $this->get_all_admin();
		$content = $this->load->view('index', array('data' => $data, 'error' => $msg), TRUE);
		echo Modules::run('frontend', $content, 'admin');
	}

}

/* End of file backend.php */
/* Location: ./application/modules/backend/controllers/backend.php */