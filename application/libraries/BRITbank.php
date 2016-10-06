<?php 

/* API BRI TBANK */

/**
* 
*/
class Britbank
{
	

	private $client;
	public function __construct()
	{
		$this->client = new SoapClient('http://hackathon.bri.co.id/BRIHackathon.asmx?wsdl');
	}

	public function regTbank($data)
	{
		$response = $this->client->RegistrasiTBank(array(
		    'kodeMerchant'	=>	$data['kodeMerchant'],
		    'password'		=>	$data['password'],
		    'nohandphone'	=>	$data['nohandphone'],
		    'nama'			=>	$data['nama'],
		    'noktp'			=>	$data['noktp'],
		    'tempatLahir'	=>	$data['tempatLahir'],
		    'tanggalLahir'	=>	$data['tanggalLahir'],
		    'alamat'		=>	$data['alamat'],
		    'kota'			=>	$data['kota'],
		    'email'			=>	$data['email'],
		    'pekerjaan'		=>	$data['pekerjaan']
		));
		return $response;
	}
	public function saldoTbank($data)
	{
		$response = $this->client->InfoSaldoTBank(array(
			'nohandphone'	=> $data['nohandphone'],
			'pin'			=> $data['pin']));
		return $response->InfoSaldoTBankResult;
	}
	public function transferTbank($data)
	{
		$response = $this->client->TransferTBank(array(
			'nohandphonePengirim'	=> $data['nohandphonePengirim'],
			'nohandphonePenerima'	=> $data['nohandphonePenerima'],
			'pin'					=> $data['pin'],
			'nominal'				=> $data['nominal']));
		return $response->TransferTBankResult;
	}

}





 ?>