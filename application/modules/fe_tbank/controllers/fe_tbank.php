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
	private function is_ajax(){
		return (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest');
	}
}

?>