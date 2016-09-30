<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Fe_realisasi_spbe extends MX_Controller {

	public function __construct()
	{
		parent::__construct();
		echo Modules::run('fe_login/is_login');
		Modules::run('myhelper/permission', array(1));
		$this->load->model('model_realisasi_spbe');
	}

	public function index()
	{
		$data = $this->get_all_realisasi_spbe();
		$content = $this->load->view('index', array('data' => $data), TRUE);
		echo Modules::run('frontend', $content, 'realisasi_spbe');
	}

	public function get_all_realisasi_spbe()
	{
		$data = $this->model_realisasi_spbe->get_all_realisasi_spbe();
		return $data;
	}

	public function add_realisasi_spbe()
	{
		$content = $this->load->view('add_edit_realisasi_spbe', '', TRUE);
		echo Modules::run('frontend', $content, 'realisasi_spbe');
	}

	public function edit_realisasi_spbe()
	{
		$id = $this->uri->segment(3);
		$data = $this->get_this_data($id);
		$data=array_map('trim',$data);
		$content = $this->load->view('add_edit_realisasi_spbe', array('data' => $data), TRUE);
		echo Modules::run('frontend', $content, 'realisasi_spbe');
	}

	public function get_this_data($id)
	{
		$data = $this->model_realisasi_spbe->get_this_data($id);
		return $data;
	}

	public function submit_realisasi_spbe()
	{
		$act = $this->input->post('action', TRUE);
		$arrData = array('plant', 'sales_district', 'tanggal', 'material', 'qty_tabung', 'berat');
		$data = array();
		foreach ($arrData as $kk) {
			$data[$kk] = trim($this->input->post($kk, TRUE));
		}
		$data['tanggal'] = '01-'.$data['tanggal'];
		$data['tanggal'] = date('M Y', strtotime($data['tanggal']));
		$msg = '';
		$result = '';
		if ($act == 'add') {
			$data = $this->model_realisasi_spbe->add_realisasi_spbe($data);
			$msg = Modules::run('myhelper/refresh_page',"Sukses Menambah Realisasi Spbe", site_url('realisasi-spbe'));
		}
		if ($act == 'edit') {
			$data['id'] = $this->input->post('id', TRUE);
			$result = $data;
			$data = $this->model_realisasi_spbe->edit_realisasi_spbe($data);
			$msg = Modules::run('myhelper/refresh_page',"Sukses Merubah Data", site_url('realisasi-spbe'));
		}

		$content = $this->load->view('add_edit_realisasi_spbe', array('data' => $result, 'error' => $msg), TRUE);
		echo Modules::run('frontend', $content, 'realisasi_spbe');
	}

	public function del_realisasi_spbe()
	{
		$id = $this->input->post('id', TRUE);
		$data = $this->model_realisasi_spbe->del_realisasi_spbe($id);
		$msg = Modules::run('myhelper/refresh_page',"Sukses Menghapus realisasi_spbe", site_url('realisasi-spbe'));
		$data = $this->get_all_realisasi_spbe();
		$content = $this->load->view('index', array('data' => $data, 'error' => $msg), TRUE);
		echo Modules::run('frontend', $content, 'realisasi_spbe');
	}

	public function support_chart()
	{
		$data = $this->model_realisasi_spbe->support_chart();
		$value = array();
		foreach ($data as $key) {
			$value[] = $key['qty_tabung'];
		}

		$label = array();
		foreach ($data as $key) {
			$label[] = $key['plant'];
		}

		$data['label'] = json_encode($label);//json_encode($label);
		$data['result'] = json_encode($value);

		return $data;
	}

}

/* End of file backend.php */
/* Location: ./application/modules/backend/controllers/backend.php */