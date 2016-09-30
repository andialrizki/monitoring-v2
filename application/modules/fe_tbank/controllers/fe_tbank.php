<?php  
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* API BRI TBANK 
*/
class Fe_tbank extends MX_Controller
{
	
	public function __construct()
	{
		
	}
	/* tbank */
	public function ceksaldo_tbank()
	{

		if ($this->is_ajax()) {
			$dt = $this->input->post('cek');
			//$dt = array('nohandphone'=>'085754154674', 'pin' => '123');
			$json = json_encode($this->britbank->saldoTbank($dt));
			$json = str_replace('\"', '"', $json);
			echo substr($json, 1, strlen($json)-2);
		}
	}
	public function transfer_tbank()
	{
		if ($this->is_ajax()) {
			$dt = $this->input->post('cek');
			$json = json_encode($this->britbank->transferTbank($dt));
			$json = str_replace('\"', '"', $json);
			echo substr($json, 1, strlen($json)-2);
		}
	}
	public function input_transaksi()
	{
		if ($this->is_ajax()) {
			$data = array(
				'id_pengecer' => $this->input->post('id_pengecer'), 
				'tgl' => date('Y-m-d'),
				'id_pangkalan' => $this->input->post('id_pangkalan'),
				'qty' => $this->input->post('qty'),
				'jml_uang' => $this->input->post('jml_uang'),
				'jenis_pembayaran' => 2);
			$insert = $this->db->insert('tbl_transaksi', $data);
			if ($insert) {
				echo "success";
			} else {
				echo "error";
			}
		}

	}

	private function is_ajax(){
		return (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest');
	}

}

?>