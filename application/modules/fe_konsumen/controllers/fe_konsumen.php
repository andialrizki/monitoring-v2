<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Fe_konsumen extends MX_Controller {

	public function __construct()
	{
		parent::__construct();
		echo Modules::run('fe_login/is_login');
		$this->load->model('fe_pangkalan/model_pangkalan');
		//Modules::run('myhelper/permission', array(1,3,4));
	}
	public function lokasi_pangkalan()
	{
		$id = $this->session->userdata(APP_PREFIX.'username');
		$dt = $this->db->where('id_pengecer', $id)->get('tbl_pengecer')->row();
		
		$data = $this->db->where('id_pangkalan', $dt->id_pangkalan)->get('tbl_pangkalan')->row_array();
		$center = isset($data) ? $data['lat'].', '.$data['lon']:'';
		$config = array(
			'apiKey' => 'AIzaSyBKaimwObSjJ1qqVP3f2yb8_eTQ3DL9HmI',
			'center' => '-7.966620,112.632632',
			'zoom' => 10
			);
		$this->load->library('googlemaps');
		$this->googlemaps->initialize($config);
		
		//foreach ($data as $key) {
			$data['lat'] = (substr($data['lat'], 0,2)=='-0') ? str_replace('-0', '-', $data['lat']):$data['lat'];
			$infowindow = $data['name']." (".$data['address'].")";
			$marker = array(
				'position' => $data['lat'].', '.$data['lon'],
				'infowindow_content' => $infowindow,
				'zoom' => '1',
				// 'icon' => base_url().'assets/images/marker-blue.png',
				);
			$this->googlemaps->add_marker($marker);
		//}
		$map = $this->googlemaps->create_map();

		$content = $this->load->view('lokasi_pangkalan', array('data' => $data, 'map' => $map), TRUE);
		echo Modules::run('frontend', $content, 'pangkalan');
	}
	public function get_this_data($id)
	{
		$data = $this->model_pangkalan->get_this_data($id);
		return $data;
	}
	public function beli_lpg()
	{
		$id = $this->session->userdata(APP_PREFIX.'username');
		$dt = $this->db->where('id_pengecer', $id)->get('tbl_pengecer')->row();
		
		$data = $this->db->where('id_pangkalan', $dt->id_pangkalan)->get('tbl_pangkalan')->row_array();
		$center = isset($data) ? $data['lat'].', '.$data['lon']:'';
		$config = array(
			'apiKey' => 'AIzaSyBKaimwObSjJ1qqVP3f2yb8_eTQ3DL9HmI',
			'center' => '-7.966620,112.632632',
			'zoom' => 10
			);
		$this->load->library('googlemaps');
		$this->googlemaps->initialize($config);
		
		//foreach ($data as $key) {
			$data['lat'] = (substr($data['lat'], 0,2)=='-0') ? str_replace('-0', '-', $data['lat']):$data['lat'];
			$infowindow = $data['name']." (".$data['address'].")";
			$marker = array(
				'position' => $data['lat'].', '.$data['lon'],
				'infowindow_content' => $infowindow,
				'zoom' => '1',
				// 'icon' => base_url().'assets/images/marker-blue.png',
				);
			$this->googlemaps->add_marker($marker);
		//}
		$map = $this->googlemaps->create_map();
		
		$content = $this->load->view('beli_lpg', array('data' => $data, 'kons' => $dt, 'map' => $map), TRUE);
		echo Modules::run('frontend', $content, 'pangkalan');
	}
	public function ceksaldo_tbank()
	{
		$dt = $this->input->post('cek');
		// array('nohandphone'=>'085754154674', 'pin' => '123'))
		$json = json_encode($this->britbank->saldoTbank($dt));
		echo substr($json, 1, strlen($json)-2);
	}
}