<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Fe_transaksi extends MX_Controller {

	public function __construct()
	{
		parent::__construct();
		echo Modules::run('fe_login/is_login');
		echo Modules::run('myhelper/permission', array(2,3));
		$this->load->model('model_transaksi');
	}

	public function index()
	{
		$data = $this->get_all_transaksi();
		$content = $this->load->view('index', array('data' => $data), TRUE);
		echo Modules::run('frontend', $content, 'transaksi');
	}

	public function add_transaksi()
	{
		if ($this->session->userdata(APP_PREFIX.'type_admin') != 2) {
			redirect(site_url('transaksi'));
		}
		$id_admin = $this->session->userdata(APP_PREFIX.'id_admin');
		$pelanggan = Modules::run('myhelper/get_data_table', 'tbl_pengecer', 'name, id_pengecer', array('id_pangkalan' => $id_admin));
		$pelanggan = isset($pelanggan[0]) ? $pelanggan : array('0' => $pelanggan);
		$harga = Modules::run('myhelper/get_data_table', 'tbl_pangkalan', 'harga_eceran', array('id_pangkalan' => $id_admin));
		$content = $this->load->view('add_edit_transaksi', array('pelanggan' => $pelanggan, 'harga' => $harga), TRUE);
		echo Modules::run('frontend', $content, 'transaksi');
	}

	public function submit_transaksi()
	{
		$btn = $this->input->post('submit-transaksi', TRUE);
		if (!$btn) {
			redirect('transaksi');
		}
		$act = $this->input->post('action', TRUE);
		$arrData = array('id_pengecer','tgl', 'qty', 'jml_uang');
		$data = array();
		foreach ($arrData as $kk) {
			$data[$kk] = trim($this->input->post($kk, TRUE));
		}
		$msg = '';
		$result = '';
		$data['id_pangkalan'] = $this->session->userdata(APP_PREFIX.'id_admin');
		$data = $this->model_transaksi->add_transaksi($data);
		$msg = Modules::run('myhelper/refresh_page',"Sukses Menambah transaksi", site_url('transaksi'));
		$content = $this->load->view('add_edit_transaksi', array('data' => $result, 'error' => $msg), TRUE);
		echo Modules::run('frontend', $content, 'transaksi');	
	}

	public function detail_transaksi()
	{
		$id_pengecer = $this->uri->segment(3);
		$id = str_replace('-', '.', $id_pengecer);
		$data = $this->get_this_data($id);
		if ($this->session->userdata(APP_PREFIX.'type_admin') != 0 && ($data[0]['id_pangkalan'] != $this->session->userdata(APP_PREFIX.'id_admin'))) {
			redirect(site_url('transaksi'));
		}
		$pelanggan = Modules::run('myhelper/get_data_table', 'tbl_pengecer', 'name,address,phone,id_pengecer ', array('id_pengecer' => $data[0]['id_pengecer']));
		Modules::run('myhelper/get_qr_code', site_url('transaksi/detail/'.trim($id_pengecer)), 'transaksi');
		$content = $this->load->view('detail_transaksi', array('data' => $data, 'pelanggan' => $pelanggan), TRUE);
		echo Modules::run('frontend', $content, 'transaksi');
	}

	public function get_all_transaksi()
	{
		$data = $this->model_transaksi->get_all_transaksi();
		return $data;
	}

	public function del_transaksi()
	{
		$id = $this->input->post('id', TRUE);
		$this->model_transaksi->del_transaksi($id);
		$msg = Modules::run('myhelper/refresh_page', 'Sukses Menghapus Data', site_url('transaksi'));
		$data = $this->get_all_transaksi();
		$content = $this->load->view('index', array('data' => $data, 'error' => $msg), TRUE);
		echo Modules::run('frontend', $content, 'transaksi');
	}

	public function transaksi_agen()
	{
		$data = $this->model_transaksi->get_transaksi_agen();
		$content = $this->load->view('index_transaksi_agen', array('data' => $data), TRUE);
		echo Modules::run('frontend', $content, 'transaksi-agen');
	}

	public function get_this_data($id)
	{
		$data = $this->model_transaksi->get_this_data($id);
		return $data;
	}


}

/* End of file backend.php */
/* Location: ./application/modules/backend/controllers/backend.php */