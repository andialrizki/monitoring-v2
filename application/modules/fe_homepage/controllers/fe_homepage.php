<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Fe_homepage extends MX_Controller
{

    public function __construct()
    {
        parent::__construct();
        echo Modules::run('fe_login/is_login');
    }

    /*public function index()
    {
        //$data = Modules::run('fe_realisasi_agen/support_chart');
        //$content = $this->load->view('fe_homepage', array('data' => $data), TRUE);
        $content = $this->load->view('fe_homepage', TRUE);
        echo Modules::run('frontend', $content, 'home');
    }*/

    public function index()
    {
        $type_admin = $this->session->userdata(APP_PREFIX . 'type_admin');
        if ($type_admin == 0 || $type_admin == 1) {
            $data = Modules::run('fe_realisasi_agen/support_chart');
            $data2 = Modules::run('fe_realisasi_spbe/support_chart');
            $content = $this->load->view('fe_homepage_admin', array('data' => $data, 'data2' => $data2), TRUE);
            echo Modules::run('frontend', $content, 'home');
        }

        if ($type_admin == 2) {
            $content = $this->load->view('fe_homepage', TRUE);
            echo Modules::run('frontend', $content, 'home');
        }
        if ($type_admin == 3) {
            $content = $this->load->view('fe_homepage', TRUE);
            echo Modules::run('frontend', $content, 'home');
        }
        if ($type_admin == 4) {
            $content = $this->load->view('fe_homepage', TRUE);
            echo Modules::run('frontend', $content, 'home');
        }
        if ($type_admin == 5) {
            $content = $this->load->view('fe_homepage', TRUE);
            echo Modules::run('frontend', $content, 'home');
        }
        if ($type_admin == 6) {
            $content = $this->load->view('fe_homepage', TRUE);
            echo Modules::run('frontend', $content, 'home');
        }
    }
}

/* End of file backend.php */
/* Location: ./application/modules/backend/controllers/backend.php */