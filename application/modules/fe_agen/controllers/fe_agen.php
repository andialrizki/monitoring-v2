<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Fe_agen extends MX_Controller
{

    public function __construct()
    {
        parent::__construct();
        echo Modules::run('fe_login/is_login');
        $this->load->model('model_agen');
        Modules::run('myhelper/permission', array(1, 4));
    }

    public function index()
    {
        $data = $this->get_all_agen();
        $content = $this->load->view('index', array('data' => $data), TRUE);
        echo Modules::run('frontend', $content, 'agen');
    }

    public function get_all_agen()
    {
        $data = $this->model_agen->get_all_agen();
        return $data;
    }

    public function add_agen()
    {
        $content = $this->load->view('add_edit_agen', '', TRUE);
        echo Modules::run('frontend', $content, 'agen');
    }

    public function edit_agen()
    {
        $id = $this->uri->segment(3);
        $data = $this->get_this_data($id);
        if ($this->session->userdata(APP_PREFIX . 'type_admin') == 0 || $this->session->userdata(APP_PREFIX . 'type_admin') == 1) {
        } else {
            if ((strpos($data['id_spbe'], $this->session->userdata(APP_PREFIX . 'id_admin'))) === false) {
                redirect(site_url('agen'));
            }
        }
        $dataspbe = Modules::run('fe_penataan_agen/get_this_data', $id);
        $spbe = array();
        foreach ($dataspbe as $key) {
            $spbe[] = array('id'=>$key['id'],'id_spbe' => $key['id_spbe'], 'name_spbe' => $key['name_spbe']);
        }
        $data['spbe'] = $spbe;
        //$data = array_map('trim', $data);
        $content = $this->load->view('add_edit_agen', array('data' => $data), TRUE);
        echo Modules::run('frontend', $content, 'agen');
    }

    public function get_this_data($id)
    {
        $data = $this->model_agen->get_this_data($id);
        return $data;
    }

    public function detail_agen()
    {
        $id = $this->uri->segment(3);
        $data = $this->get_this_data($id);

        if ($this->session->userdata(APP_PREFIX . 'type_admin') == 0 || $this->session->userdata(APP_PREFIX . 'type_admin') == 1) {
        } else {
            if ((strpos($data['id_spbe'], $this->session->userdata(APP_PREFIX . 'id_admin'))) === false) {
                redirect(site_url('agen'));
            }
        }
        $dataspbe = Modules::run('fe_penataan_agen/get_this_data', $id);
        if($dataspbe) {
            $spbe = array();
            foreach ($dataspbe as $key) {
                $spbe[] = array('id_spbe' => $key['id_spbe'], 'name' => $key['name_spbe']);
            }
            $data['spbe'] = $spbe;
        }else{ $data['spbe']='';}
        $config = array(
            'apiKey' => 'AIzaSyBn0o8B0C_a1mEWA4ihL_PMpnYF6NKzuUI',
            'center' => $data['latitude'] . ', ' . $data['longitude'],
        );
        $this->load->library('googlemaps');
        $this->googlemaps->initialize($config);
        $infowindow = $data['name'] . " (" . $data['address'] . ")";
        $marker = array(
            'position' => $data['latitude'] . ', ' . $data['longitude'],
            'infowindow_content' => $infowindow,
        );
        $this->googlemaps->add_marker($marker);
        $map = $this->googlemaps->create_map();
        //$data = array_map('trim', $data);
        //var_dump($data);
        $content = $this->load->view('detail_agen', array('data' => $data, 'map' => $map), TRUE);
        echo Modules::run('frontend', $content, 'agen');
    }

    public function submit_agen()
    {
        // if ($this->session->userdata(APP_PREFIX.'type_admin') !=0 && (strpos($data['id_spbe'], $this->session->userdata(APP_PREFIX.'id_admin'))) === false) {
        // 	redirect(site_url('agen'));
        // }
        $act = $this->input->post('action', TRUE);
        $arrData = array('name', 'provinsi', 'city', 'address', 'latitude', 'longitude');
        $data = array();
        foreach ($arrData as $kk) {
            $data[$kk] = trim($this->input->post($kk, TRUE));
        }
        $spbe = $this->input->post('spbe');
        //$dataspbe['id_spbe'] = implode('-', $spbe);
        $msg = '';
        $result = '';
        if ($act == 'add') {
            //$spbe = $this->model_penataan_agen->add_penataan_agen($dataspbe);
            $data = $this->model_agen->add_agen($data);
            $msg = Modules::run('myhelper/refresh_page', "Sukses Menambah agen", site_url('agen'));
        }
        if ($act == 'edit') {
            $data['id'] = $this->input->post('id', TRUE);
            $result = $data;
            $data = $this->model_agen->edit_agen($data);
            $msg = Modules::run('myhelper/refresh_page', "Sukses Merubah Data", site_url('agen'));
        }

        $content = $this->load->view('add_edit_agen', array('data' => $result, 'error' => $msg), TRUE);
        echo Modules::run('frontend', $content, 'agen');
    }

    public function del_agen()
    {
        if ($this->session->userdata(APP_PREFIX . 'type_admin') != 0 && (strpos($data['id_spbe'], $this->session->userdata(APP_PREFIX . 'id_admin'))) === false) {
            redirect(site_url('agen'));
        }
        $id = $this->input->post('id', TRUE);
        $data = $this->model_agen->del_agen($id);
        $msg = Modules::run('myhelper/refresh_page', "Sukses Menghapus agen", site_url('agen'));
        $data = $this->get_all_agen();
        $content = $this->load->view('index', array('data' => $data, 'error' => $msg), TRUE);
        echo Modules::run('frontend', $content, 'agen');
    }


}

/* End of file backend.php */
/* Location: ./application/modules/backend/controllers/backend.php */