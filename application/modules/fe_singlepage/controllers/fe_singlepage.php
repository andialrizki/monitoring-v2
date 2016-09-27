<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Fe_singlepage extends MX_Controller {

	public function __construct()
	{
		parent::__construct();
//		echo Modules::run('fe_login/is_login');
	}
	
	public function index()
	{
		
		$this->load->view('fe_singlepage');
	}
	public function get_pangkalan()
	{
		$pangkalan = Modules::run('myhelper/get_data_table', 'tbl_pangkalan', 'name, id_pangkalan');
		echo json_encode($pangkalan, JSON_PRETTY_PRINT);
	}
	public function daftar()
	{
		$dt = $this->input->post('dt');
		$verifikasi = $this->input->post('verifikasi');
		$valid = $this->input->post('verifikasi_valid');

		if ($verifikasi == $valid) {
			$dt['valid'] = 2;
			$dt['password'] = md5(sha1($dt['password']).'monitoringlpg');
			$insert = $this->db->insert('tbl_pengecer', $dt);
			if ($insert) {
				echo "<script>alert('Terimakasih telah melakukan pendaftaran, akun Anda akan diaktivasi oleh Pangkalan yang telah Anda Pilih sebelumnya'); window.location.href = '".site_url('sign-in')."'; </script>";
			}
		} else {
			echo "<script>alert('Kode verifikasi salah! ulangi lagi'); window.location.href = '".site_url()."'; </script>";
		}
	}

}

/* End of file backend.php */
/* Location: ./application/modules/backend/controllers/backend.php */