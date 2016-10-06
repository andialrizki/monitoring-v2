<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Fe_pangkalan extends MX_Controller {

	public function __construct()
	{
		parent::__construct();
		echo Modules::run('fe_login/is_login');
		$this->load->model('model_pangkalan');
		Modules::run('myhelper/permission', array(1,3));
	}

	public function index()
	{
		$data = $this->get_all_pangkalan();
		$content = $this->load->view('index', array('data' => $data), TRUE);
		echo Modules::run('frontend', $content, 'pangkalan');
	}

	public function get_all_pangkalan()
	{
		$data = $this->model_pangkalan->get_all_pangkalan();
		return $data;
	}

	public function add_pangkalan()
	{
		$data_agen = '';
		if ($this->session->userdata(APP_PREFIX.'type_admin') != 3) {
			$data_agen = Modules::run('fe_agen/get_all_agen');
		}
		$content = $this->load->view('add_edit_pangkalan', array('data_agen' => $data_agen), TRUE);
		echo Modules::run('frontend', $content, 'pangkalan');
	}

	public function edit_pangkalan()
	{
		$id = $this->uri->segment(3);
		$data = $this->get_this_data($id);
		$data_agen = '';
		if ($this->session->userdata(APP_PREFIX.'type_admin') != 3) {
			$data_agen = Modules::run('fe_agen/get_all_agen');
		}
		$data=array_map('trim',$data);
		$content = $this->load->view('add_edit_pangkalan', array('data' => $data, 'data_agen' => $data_agen), TRUE);
		echo Modules::run('frontend', $content, 'pangkalan');
	}

	public function get_this_data($id)
	{
		$data = $this->model_pangkalan->get_this_data($id);
		return $data;
	}

	public function detail_pangkalan()
	{
		$id = $this->uri->segment(3);
		$data = $this->get_this_data($id);
		$dataSpbe = array();
		
		// gmaps
		$config = array(
			'apiKey' => 'AIzaSyBn0o8B0C_a1mEWA4ihL_PMpnYF6NKzuUI',
			'center' => $data['lat'].', '.$data['lon'],
			);
		$this->load->library('googlemaps');
		$this->googlemaps->initialize($config);
		$infowindow = $data['name']." (".$data['address'].")";
		$marker = array(
			'position' => $data['lat'].', '.$data['lon'],
			'infowindow_content' => $infowindow,
		);
		$this->googlemaps->add_marker($marker);
		$map = $this->googlemaps->create_map();
		$data=array_map('trim',$data);
		$content = $this->load->view('detail_pangkalan', array('data' => $data, 'map' => $map), TRUE);
		echo Modules::run('frontend', $content, 'pangkalan');
	}

	public function submit_pangkalan()
	{
		$act = $this->input->post('action', TRUE);
		$arrData = array('name', 'pemilik', 'ktp_pemilik', 'telepon', 'hp_pemilik', 'type', 'no_registrasi', 'qty_kontrak', 'id_agen', 'sales_eksekutif', 'address', 'provinsi', 'kabupaten', 'kecamatan', 'kelurahan', 'kode_pos', 'lat', 'lon');
		$data = array();
		foreach ($arrData as $kk) {
			$data[$kk] = trim($this->input->post($kk, TRUE));
		}
		if ($this->session->userdata(APP_PREFIX.'type_admin') == 3 ) {
			$data['sp_agen'] = trim($this->input->post('sp_agen', TRUE));
		}else{
			$sp_agen = Modules::run('myhelper/get_data_table', 'tbl_agen', 'name', array('id' => $data['id_agen']));
			$data['sp_agen'] = $sp_agen['sp_agen'];
		}
		$msg = '';
		$result = '';
		if ($act == 'add') {
			$data = $this->model_pangkalan->add_pangkalan($data);
			if ($data) {
				$msg = Modules::run('myhelper/refresh_page',"Sukses Menambah pangkalan", site_url('pangkalan'));
			}else{
				$msg = Modules::run('myhelper/refresh_page',"No Registrasi Sudah Digunakan", site_url('pangkalan/add'));
			}
		}
		if ($act == 'edit') {
			$data['id_pangkalan'] = $this->input->post('id_pangkalan', TRUE);
			$result = $data;
			unset($data['no_registrasi']);
			$data = $this->model_pangkalan->edit_pangkalan($data);
			if ($data) {
				$msg = Modules::run('myhelper/refresh_page',"Sukses Merubah Data", site_url('pangkalan'));
			}else{
				$msg = Modules::run('myhelper/refresh_page',"No Registrasi Sudah Digunakan", site_url('pangkalan/edit/'.$this->input->post('id_pangkalan', TRUE)));
			}
		}

		$content = $this->load->view('add_edit_pangkalan', array('data' => $result, 'error' => $msg), TRUE);
		echo Modules::run('frontend', $content, 'pangkalan');
	}

	public function del_pangkalan()
	{
		$id = $this->input->post('id', TRUE);
		$data = $this->model_pangkalan->del_pangkalan($id);
		$msg = Modules::run('myhelper/refresh_page',"Sukses Menghapus pangkalan", site_url('pangkalan'));
		$data = $this->get_all_pangkalan();
		$content = $this->load->view('index', array('data' => $data, 'error' => $msg), TRUE);
		echo Modules::run('frontend', $content, 'pangkalan');
	}

	public function perubahan_pangkalan()
	{
		$data = $this->get_perubahan_pangkalan();
		$content = $this->load->view('index_perubahan', array('data' => $data), TRUE);
		echo Modules::run('frontend', $content, 'perubahan-pangkalan');
	}

	public function get_perubahan_pangkalan()
	{
		$data = $this->model_pangkalan->get_perubahan_pangkalan();
		return $data;
	}

}

/* End of file backend.php */
/* Location: ./application/modules/backend/controllers/backend.php */