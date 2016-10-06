<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include "aes.class.php";
include "aesctr.class.php";

use HadesEncrypt\AesCtr as Keepme;

class Myhelper extends MX_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('myhelper_model');
  }

  public function refresh_page($message = "", $url = "")
  {
      return $message . "<script>setTimeout(function(){window.location='$url" . "?" . time() . "'}, 2000)</script>";
  }

  public function encrypt_text($value)
  {
    $key = 'DmgOu7610sgU4Yqm17u59JLgu13UE4ta';
    $param = Keepme::encrypt( $value, $key, 256 );
    return( $param );
  }

  public function get_data($tabel_name)
  {
    return $this->myhelper_model->get_data($tabel_name);    
  }

  public function format_date($date, $type = "1")
  {
      $day = date('d', strtotime($date));
      $month = date('m', strtotime($date));
      $year = date('Y', strtotime($date));
      $hour = date('H', strtotime($date));
      $minute = date('i', strtotime($date));
      $seconds = date('s', strtotime($date));
      if (strlen($month)==1) {
        $month = "0".$month;
      }
      $arrMonth = array('01' => 'Januari', '02' => 'Februari', '03' => 'Maret', '04' => 'April',
           '05' => 'Mei', '06' => 'Juni', '07' => 'Juli', '08' => 'Agustus',
            '09' => 'September', '10' => 'Oktober', '11' => 'November', '12' => 'Desember',);
      if ($type == "1") {
          $month = $arrMonth[$month];
          $date = $day." ".$month." ".$year; //03 november 1991
      }elseif ($type=="2") {
          $date = "{$day}-{$month}-{$year}"; //03-11-1991
      }elseif ($type=="3") {
          $month = $arrMonth[$month];
          $date = "{$day} {$month} {$year} {$hour}:{$minute}"; //03 november 1991 08:40
      }elseif ($type=="4") {
          $date = "{$day}-{$month}-{$year} {$hour}:{$minute}"; //03-11-1991 08:40
      }
      return $date;
  }

  public function permission($id = "")
  {
      // echo "<pre>";
      // print_r($this->session->all_userdata());die();
      $res = false;
      $type_admin = $this->session->userdata(APP_PREFIX.'type_admin');
      if ($id || $type_admin == 0) {
          foreach ($id as $key) {
              if ($type_admin == 0 || $type_admin == $key) {
                  $res = true;
                  break;
              }else{
                  $res = false;
              }
          }
          if (!$res) {
            show_error('You dont have permission on this page', 403);
          }
      }else{
        show_error('You dont have permission on this page', 403);
      }
    
  }

  public function get_qr_code($data, $name)
  {
      $this->load->library('ciqrcode');
      $params['data'] = $data;
      $params['level'] = 'H';
      $params['size'] = 10;
      $params['savename'] = FCPATH.'assets/images/qr_bkma_'.$name.'.png';
      $this->ciqrcode->generate($params);
      return 'qr_bkma.png';
  }

  public function cekpassword()
  {
      $id = $this->input->post('id', TRUE);
      $pass = $this->input->post('pass', TRUE);
      $type_admin = $this->session->userdata(APP_PREFIX.'type_admin');
      if ($type_admin == 2) {
          $password = $this->myhelper_model->cekpassword('tbl_pangkalan', array('id_pangkalan' => $id));
      }
      if ($type_admin == 3) {
          $password = $this->myhelper_model->cekpassword('tbl_agen', array('id' => $id));
      }
      if ($type_admin == 4) {
          $password = $this->myhelper_model->cekpassword('tbl_spbe', array('id' => $id));
      }
      $password = $this->decrypt_text($password['password']);
      $return = ($password === $pass) ? 'ok':'nok';
      echo $return;
  }

    public function decrypt_text($value)
    {
        $key = 'DmgOu7610sgU4Yqm17u59JLgu13UE4ta';
        $param = Keepme::decrypt($value, $key, 256);
        return ($param);
    }

  public function cekusername()
  {
      $username = $this->input->post('username', TRUE);
      $type_admin = $this->session->userdata(APP_PREFIX.'type_admin');
      $id_admin = $this->session->userdata(APP_PREFIX.'id_admin');
      if ($type_admin == 3) {
          $username_ex = $this->myhelper_model->cekusername('tbl_agen', array('username' => $username));
          $self = $this->get_data_table('tbl_agen', 'username', array('id' => $id_admin));
      }
      if ($type_admin == 4) {
          $username = 'spbe-'.$username;
          $username_ex = $this->myhelper_model->cekusername('tbl_spbe', array('username' => $username));
          $self = $this->get_data_table('tbl_spbe', 'username', array('id' => $id_admin));
      }
      if ($self['username'] == $username) {
          echo "ok";
      }else{
          echo ($username_ex === true) ? 'nok':'ok';
      }
  }

    public function get_data_table($tabel_name, $field, $option = 'where 1', $option2 = 0)
    {
        $result = $this->myhelper_model->get_data_table($tabel_name, $field, $option, $option2);

        return $result;
  }

  public function ceklimit()
  {
      $id = $this->input->post('id', TRUE);
      $data = $this->myhelper_model->ceklimit($id);
      if (!$data) {
        $data = 0; 
      }
      echo $data;
  }

  public function backup_db($tabel_name = 'all')
  {
      $filename = 'mybackup.sql';
      $config = array(
            'format'      => 'txt',             // gzip, zip, txt
            'filename'    => 'mybackup.sql',    // File name - NEEDED ONLY WITH ZIP FILES
            'add_drop'    => TRUE,              // Whether to add DROP TABLE statements to backup file
            'add_insert'  => TRUE,              // Whether to add INSERT data to backup file
            'newline'     => "\n"               // Newline character used in backup file
      );
      if ($tabel_name != 'all') {
          $config['tables'] = $tabel_name;
          $filename = 'mybackup-'.$tabel_name.'.sql';
      }
      $this->load->dbutil();
      $backup =& $this->dbutil->backup($config);

      // Load the file helper and write the file to your server
      $this->load->helper('file');
      write_file($filename, $backup); 

      // Load the download helper and send the file to your desktop
      $this->load->helper('download');
      force_download($filename, $backup);
  }

  public function setharga()
  {
      $harga = $this->input->post('harga', TRUE);
      $id = $this->session->userdata(APP_PREFIX.'id_admin');
      $this->myhelper_model->setharga($harga, $id);
      echo "ok";
  }

}

/* End of file secure_request.php */
/* Location: ./application/modules/secure_request/controllers/secure_request.php */