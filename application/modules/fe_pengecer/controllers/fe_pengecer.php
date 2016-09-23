<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Fe_pengecer extends MX_Controller {

	public function __construct()
	{
		parent::__construct();
		echo Modules::run('fe_login/is_login');
		$this->load->model('model_pengecer');
		Modules::run('myhelper/permission', array(1,2));
	}

	public function index()
	{
		$data = $this->get_all_pengecer();
		$content = $this->load->view('index', array('data' => $data), TRUE);
		echo Modules::run('frontend', $content, 'pelanggan');
	}

	public function add_pengecer()
	{
		$pangkalan = Modules::run('myhelper/get_data_table', 'tbl_pangkalan', 'name, id_pangkalan');
		$content = $this->load->view('add_edit_pengecer', array('pangkalan' => $pangkalan), TRUE);
		echo Modules::run('frontend', $content, 'pelanggan');
	}

	public function edit_pengecer()
	{
		$id = $this->uri->segment(3);
		$data = $this->get_this_data($id);
		if ($this->session->userdata(APP_PREFIX.'type_admin') != 0 && ($data['id_pangkalan'] != $this->session->userdata(APP_PREFIX.'id_admin'))) {
			redirect(site_url('pelanggan'));
		}
		$pangkalan = Modules::run('myhelper/get_data_table', 'tbl_pangkalan', 'name, id_pangkalan');
		$data=array_map('trim',$data);
		$pangkalan=array_map('trim',$pangkalan);
		$content = $this->load->view('add_edit_pengecer', array('data' => $data, 'pangkalan' => $pangkalan), TRUE);
		echo Modules::run('frontend', $content, 'pelanggan');
	}

	public function detail_pengecer()
	{
		$id = $this->uri->segment(3);
		$data = $this->get_this_data($id);
		if ($this->session->userdata(APP_PREFIX.'type_admin') !=0 && ($data['id_pangkalan'] != $this->session->userdata(APP_PREFIX.'id_admin'))) {
			redirect(site_url('pelanggan'));
		}		
		// gmaps
		$config = array(
			'apiKey' => 'AIzaSyBn0o8B0C_a1mEWA4ihL_PMpnYF6NKzuUI',
			'center' => $data['latitude'].', '.$data['longitude'],
			);
		$this->load->library('googlemaps');
		$this->googlemaps->initialize($config);
		$infowindow = $data['name']." (".$data['address'].")";
		$marker = array(
			'position' => $data['latitude'].', '.$data['longitude'],
			'infowindow_content' => $infowindow,
			);
		$this->googlemaps->add_marker($marker);
		$map = $this->googlemaps->create_map();
		$url = site_url('pelanggan/detail/'.$data['id']);	
		Modules::run('myhelper/get_qr_code', trim($url), 'pengecer');
		$data=array_map('trim',$data);
		
		$content = $this->load->view('detail_pengecer', array('data' => $data, 'map' => $map), TRUE);
		echo Modules::run('frontend', $content, 'pelanggan');
	}

	public function submit_pengecer()
	{
		$act = $this->input->post('action', TRUE);
		$arrData = array('id_pengecer', 'id_pangkalan', 'name', 'phone', 'address', 'latitude', 'longitude');
		$data = array();
		foreach ($arrData as $kk) {
			$data[$kk] = trim($this->input->post($kk, TRUE));
		}
		$data['address'] = preg_replace('/[^A-Za-z0-9\-()\/. ]/', '', $data['address']);
		$msg = '';
		$result = '';
		if ($act == 'add') {
			$data = $this->model_pengecer->add_pengecer($data);
			if ($data) {
				$msg = Modules::run('myhelper/refresh_page',"Sukses Menambah pengecer", site_url('pelanggan'));
			}else{
				$msg = Modules::run('myhelper/refresh_page',"No Pelanggan Tidak Boleh Sama", site_url('pelanggan/add'));
			}
		}
		if ($act == 'edit') {
			$data['id'] = $this->input->post('id', TRUE);
			$result = $data;
			$data = $this->model_pengecer->edit_pengecer($data);
			$msg = Modules::run('myhelper/refresh_page',"Sukses Merubah Data", site_url('pelanggan'));
		}
		$content = $this->load->view('add_edit_pengecer', array('data' => $result, 'error' => $msg), TRUE);
		echo Modules::run('frontend', $content, 'pelanggan');	
	}

	public function del_pengecer()
	{
		$id = $this->input->post('id', TRUE);
		$data = $this->model_pengecer->del_pengecer($id);
		$msg = Modules::run('myhelper/refresh_page',"Sukses Menghapus pengecer", site_url('pelanggan'));
		$data = $this->get_all_pengecer();
		$content = $this->load->view('index', array('data' => $data, 'error' => $msg), TRUE);
		echo Modules::run('frontend', $content, 'pelanggan');
	}

	public function get_all_pengecer()
	{
		$data = $this->model_pengecer->get_all_pengecer();
		return $data;
	}

	public function get_this_data($id)
	{
		$data = $this->model_pengecer->get_this_data($id);
		return $data;
	}

}

/* End of file backend.php */
/* Location: ./application/modules/backend/controllers/backend.php */