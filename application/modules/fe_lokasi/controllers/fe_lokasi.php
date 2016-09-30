<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Fe_lokasi extends MX_Controller {
    public $config = array(
        'apiKey' => 'AIzaSyBKaimwObSjJ1qqVP3f2yb8_eTQ3DL9HmI',
		'center' => '-7.966620,112.632632',
        'zoom' => 10
    );

	public function __construct()
	{
		parent::__construct();
		echo Modules::run('fe_login/is_login');
	}

	public function pengecer()
	{
		Modules::run('myhelper/permission', array(1,2));
		$data = Modules::run('fe_pengecer/get_all_pengecer');

		$this->load->library('googlemaps');

        $this->googlemaps->initialize($this->config);
		if ($data) {
			foreach ($data as $key) {
				$infowindow = $key['name']." (".$key['address'].")";
				$marker = array(
					'position' => $key['latitude'].', '.$key['longitude'],
					'infowindow_content' => $infowindow,
					);
				$this->googlemaps->add_marker($marker);
			}
		}
		$map = $this->googlemaps->create_map();


		$content = $this->load->view('index', array('title' => 'pelanggan', 'map' => $map), TRUE);
		echo Modules::run('frontend', $content, 'lokasi-pengecer');
	}

	public function agen()
	{
		Modules::run('myhelper/permission', array(1,4));
		$data = Modules::run('fe_agen/get_all_agen');

		$this->load->library('googlemaps');
		$this->googlemaps->initialize($this->config);
		if ($data) {
			foreach ($data as $key) {
				$infowindow = $key['name']." (".$key['address'].")";
				$marker = array(
					'position' => $key['latitude'].', '.$key['longitude'],
					'infowindow_content' => $infowindow,
					);
				$this->googlemaps->add_marker($marker);
			}
		}
		$map = $this->googlemaps->create_map();


		$content = $this->load->view('index', array('title' => 'agen', 'map' => $map), TRUE);
		echo Modules::run('frontend', $content, 'lokasi-agen');
	}

	public function spbe()
	{
		Modules::run('myhelper/permission', array(1,4));
		$data = Modules::run('fe_spbe/get_all_spbe');

		$this->load->library('googlemaps');
		$this->googlemaps->initialize($this->config);
		if ($data) {
			foreach ($data as $key) {
				$infowindow = $key['name']." (".$key['address'].")";
				$marker = array(
					'position' => $key['latitude'].', '.$key['longitude'],
					'infowindow_content' => $infowindow,
				);
				$this->googlemaps->add_marker($marker);
			}
		}
		$map = $this->googlemaps->create_map();


		$content = $this->load->view('index', array('title' => 'spbe', 'map' => $map), TRUE);
		echo Modules::run('frontend', $content, 'lokasi-spbe');
	}

	public function pangkalan()
	{
		Modules::run('myhelper/permission', array(1,3));
		if ($this->session->userdata(APP_PREFIX.'type_admin') == 3){
			$data = Modules::run('myhelper/get_data_table', 'tbl_pangkalan', 'lat,lon,name,address', array('id_agen' => $this->session->userdata(APP_PREFIX.'id_admin')));
		}else{
			$data = Modules::run('myhelper/get_data_table', 'tbl_pangkalan', 'lat,lon,name,address');
		}
		$data2 = Modules::run('fe_pangkalan/get_perubahan_pangkalan');
		$center = isset($data[0]) ? $data[0]['lat'].', '.$data[0]['lon']:'';
		$config = array(
			'apiKey' => 'AIzaSyBKaimwObSjJ1qqVP3f2yb8_eTQ3DL9HmI',
			'center' => '-7.966620,112.632632',
			'zoom' => 10
			);
		$this->load->library('googlemaps');
		$this->googlemaps->initialize($config);
		if ($data) {
			foreach ($data as $key) {
				$key['lat'] = (substr($key['lat'], 0,2)=='-0') ? str_replace('-0', '-', $key['lat']):$key['lat'];
				$infowindow = $key['name']." (".$key['address'].")";
				$marker = array(
					'position' => $key['lat'].', '.$key['lon'],
					'infowindow_content' => $infowindow,
					'zoom' => '1',
					// 'icon' => base_url().'assets/images/marker-blue.png',
					);
				$this->googlemaps->add_marker($marker);
			}
		}
		if ($data2) {
			foreach ($data2 as $key) {
				$key['lat'] = (substr($key['lat'], 0,2)=='-0') ? str_replace('-0', '-', $key['lat']):$key['lat'];
				$infowindow = $key['name']." (".$key['address'].")";
				$marker = array(
					'position' => $key['lat'].', '.$key['lon'],
					'infowindow_content' => $infowindow,
					'zoom' => '1',
					'icon' => base_url().'assets/images/marker-blue.png',
					);
				$this->googlemaps->add_marker($marker);
			}
		}
		$map = $this->googlemaps->create_map();


		$content = $this->load->view('index', array('title' => 'pangkalan', 'map' => $map), TRUE);
		echo Modules::run('frontend', $content, 'lokasi-pangkalan');
	}

}

/* End of file backend.php */
/* Location: ./application/modules/backend/controllers/backend.php */