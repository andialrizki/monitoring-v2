<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Fe_profile extends MX_Controller {

	public function __construct()
	{
		parent::__construct();
		echo Modules::run('fe_login/is_login');
		$this->load->model('model_profile');
		// Modules::run('myhelper/permission', array(1));
		if ($this->session->userdata(APP_PREFIX.'type_admin') == 0 || $this->session->userdata(APP_PREFIX.'type_admin') == 1) {
			redirect(site_url());
		}
	}

	public function index()
	{
		$type_admin = $this->session->userdata(APP_PREFIX.'type_admin');
		$id_admin = $this->session->userdata(APP_PREFIX.'id_admin');
		$map = '';
		if ($type_admin==2) {
			$data = $this->get_this_data('tbl_pangkalan', array('id_pangkalan' => $id_admin));
			$dataSpbe = array();
			$view = 'profile_pangkalan';
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
		}
		if ($type_admin == 3) {
			$view = 'profile_agen';
			$data = $this->get_this_data('tbl_agen', array('id' => $id_admin));
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
		}
		if ($type_admin == 4) {
			$view = 'profile_spbe';
			$data = $this->get_this_data('tbl_spbe', array('id' => $id_admin));

		}
		$content = $this->load->view($view, array('data' => $data, 'map' => $map), TRUE);
		echo Modules::run('frontend', $content, 'profile');
	}

	public function edit_profile()
	{
		$type_admin = $this->session->userdata(APP_PREFIX.'type_admin');
		$id_admin = $this->session->userdata(APP_PREFIX.'id_admin');
		// die($type_admin);
		if ($type_admin==2) {
			$view = 'edit_profile_pangkalan';
			$data = $this->get_this_data('tbl_pangkalan', array('id_pangkalan' => $id_admin));
		}
		if ($type_admin==3) {
			$view = 'edit_profile_agen';
			$data = $this->get_this_data('tbl_agen', array('id' => $id_admin));
		}
		if ($type_admin==4) {
			$view = 'edit_profile_spbe';
			$data = $this->get_this_data('tbl_spbe', array('id' => $id_admin));
		}
		$content = $this->load->view($view, array('data' => $data), TRUE);
		echo Modules::run('frontend', $content, 'profile');
	}

	public function edit_password()
	{
		$content = $this->load->view('edit_password', '', TRUE);
		echo Modules::run('frontend', $content, 'profile');
	}

	public function submit_profile()
	{
		$type_admin = $this->session->userdata(APP_PREFIX.'type_admin');
		$id_admin = $this->session->userdata(APP_PREFIX.'id_admin');
		$msg = '';
		$result = '';
		$act = $this->input->post('action', TRUE);
		if ($type_admin==2) {
			if ($act == 'password') {
				$view = 'edit_password';
				$pass = $this->input->post('new_password', TRUE);
				$data['password'] = Modules::run('myhelper/encrypt_text', $pass);
			}else{
				$view = 'edit_profile_pangkalan';
				$arrData = array('name', 'pemilik', 'ktp_pemilik', 'telepon', 'hp_pemilik', 'type', 'no_registrasi', 'qty_kontrak', 'sp_agen', 'sales_eksekutif', 'address', 'provinsi', 'kabupaten', 'kecamatan', 'kelurahan', 'kode_pos', 'lat', 'lon');
				$data = array();
				foreach ($arrData as $kk) {
					$data[$kk] = trim($this->input->post($kk, TRUE));
				}
			}
			$data['id_pangkalan'] = $id_admin;
			$result = $data;
			$data = $this->model_profile->edit_profile($data, 'tbl_pangkalan', 'id_pangkalan');
		}
		if ($type_admin==3) {
			if ($act == 'password') {
				$view = 'edit_password';
				$pass = $this->input->post('new_password', TRUE);
				$data['password'] = Modules::run('myhelper/encrypt_text', $pass);
			}else{
				$view = 'edit_profile_agen';
				$arrData = array('name', 'username', 'provinsi', 'city', 'address', 'latitude', 'longitude');
				$data = array();
				foreach ($arrData as $kk) {
					$data[$kk] = trim($this->input->post($kk, TRUE));
				}
			}
			$data['id'] = $id_admin;
			$result = $data;
			$data = $this->model_profile->edit_profile($data, 'tbl_agen', 'id');
		}
		if ($type_admin==4) {
			if ($act == 'password') {
				$view = 'edit_password';
				$pass = $this->input->post('new_password', TRUE);
				$data['password'] = Modules::run('myhelper/encrypt_text', $pass);
			}else{
				$view = 'edit_profile_spbe';
				$arrData = array('name', 'lokasi_spbe', 'username');
				$data = array();
				foreach ($arrData as $kk) {
					$data[$kk] = trim($this->input->post($kk, TRUE));
				}
				$data['name'] = 'spbe-'.$data['name'];
			}
			$data['id'] = $id_admin;
			$result = $data;
			$data = $this->model_profile->edit_profile($data, 'tbl_spbe', 'id');
		}

		if (isset($data) && $data) {
			$msg = Modules::run('myhelper/refresh_page',"Sukses Merubah Data", site_url('profile'));
		}else{
			$msg = Modules::run('myhelper/refresh_page',"Gagal Merubah Data", site_url('profile'));
		}
		$content = $this->load->view($view, array('data' => $result, 'error' => $msg), TRUE);
		echo Modules::run('frontend', $content, 'pangkalan');
	}

	public function get_this_data($tbl, $id = array())
	{
		$data = $this->model_profile->get_this_data($tbl, $id);
		return $data;
	}
}

/* End of file backend.php */
/* Location: ./application/modules/backend/controllers/backend.php */