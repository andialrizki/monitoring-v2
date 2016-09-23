<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Fe_penataan_agen extends MX_Controller
{

    public function __construct()
    {
        parent::__construct();
        echo Modules::run('fe_login/is_login');
        $this->load->model('model_penataan_agen');

    }

    public function index()
    {
        Modules::run('myhelper/permission', array(1));
        $data = $this->model_penataan_agen->get_all_penataan_agen();
        $max = $this->model_penataan_agen->get_max_distance();
        $min = $this->model_penataan_agen->get_min_distance();
        $content = $this->load->view('index', array('data' => $data, 'val' => $this->avg(), 'max' => $max, 'min' => $min), TRUE);
        echo Modules::run('frontend', $content, 'penataan-agen');
    }

    function haversine($latitudeFrom, $longitudeFrom, $latitudeTo, $longitudeTo, $earthRadius = 6371)
    {
        // convert from degrees to radians
        $latFrom = deg2rad($latitudeFrom);
        $lonFrom = deg2rad($longitudeFrom);
        $latTo = deg2rad($latitudeTo);
        $lonTo = deg2rad($longitudeTo);

        $latDelta = $latTo - $latFrom;
        $lonDelta = $lonTo - $lonFrom;

        $angle = 2 * asin(sqrt(pow(sin($latDelta / 2), 2) +
                cos($latFrom) * cos($latTo) * pow(sin($lonDelta / 2), 2)));
        return round(($angle * $earthRadius),2);
    }

    function GetDrivingDistance($lat1, $long1, $lat2, $long2)
    {
        $url = "https://maps.googleapis.com/maps/api/distancematrix/json?origins=".$lat1.",".$long1."&destinations=".$lat2.",".$long2."&key=AIzaSyAMFkZDFZPlYU3kDXBS3IfbWQ-W7_flsKA";
        //$url = "https://maps.googleapis.com/maps/api/distancematrix/json?origins=".$lat1.",".$long1."&destinations=".$lat2.",".$long2."&mode=driving&language=pl-PL";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $response = curl_exec($ch);
        curl_close($ch);
        $response_a = json_decode($response, true);
        //var_dump($response_a);
        $dist = $response_a['rows'][0]['elements'][0]['distance']['text'];
//        $time = $response_a['rows'][0]['elements'][0]['duration']['text'];
//        return array('distance' => $dist, 'time' => $time);
        return $dist;
    }

    function edit_penataan_agen()
    {
        Modules::run('myhelper/permission', array(1));
        $data = $this->model_penataan_agen->get_all_penataan_agen();
        foreach ($data as $key)
        {
            $range = $this->haversine($key['lat_agen'],$key['lon_agen'],$key['lat_spbe'],$key['lon_spbe']);
            //$range = $this->GetDrivingDistance($key['lat_agen'],$key['lon_agen'],$key['lat_spbe'],$key['lon_spbe']);
            $key['jarak']=$range;
            $this->model_penataan_agen->edit_penataan_agen($key);
        }
        redirect('penataan-agen');
        //$content = $this->load->view('index', array('data' => $data), TRUE);
        //echo Modules::run('frontend', $content, 'penataan-agen');
    }

    function avg()
    {
        $data = $this->model_penataan_agen->get_all_penataan_agen();
        foreach ($data as $key){
            $jarak =+ $key['jarak'];
        }
        return $val = $jarak / sizeof($data);
    }

    /*public function add_agen()
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
        $data = array_map('trim', $data);
        $content = $this->load->view('add_edit_agen', array('data' => $data), TRUE);
        echo Modules::run('frontend', $content, 'agen');
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
        $dataSpbe = array();
        if ($data['id_spbe']) {
            $id_spbe = explode('-', $data['id_spbe']);
            foreach ($id_spbe as $key) {
                $spbe = Modules::run('fe_spbe/get_this_data', $key);
                $dataSpbe[] = array('id_spbe' => $spbe['id'], 'name' => $spbe['name']);
            }
        }
        $data['spbe'] = $dataSpbe;
        // gmaps
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
        $data = array_map('trim', $data);
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
        $data['id_spbe'] = implode('-', $spbe);
        $msg = '';
        $result = '';
        if ($act == 'add') {
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
    }*/

    public function del_penataan_agen()
    {
        Modules::run('myhelper/permission', array(1));
        if ($this->session->userdata(APP_PREFIX . 'type_admin') != 0 && (strpos($data['id_spbe'], $this->session->userdata(APP_PREFIX . 'id_admin'))) === false) {
            redirect(site_url('penataan-agen'));
        }
        $id = $this->input->post('id', TRUE);
        $data = $this->model_penataan_agen->del_penataan_agen($id);
        $msg = Modules::run('myhelper/refresh_page', "Sukses Menghapus supply agen", site_url('penataan-agen'));
        $data = $this->get_all_penataan_agen();
        $content = $this->load->view('index', array('data' => $data, 'error' => $msg), TRUE);
        echo Modules::run('frontend', $content, 'penataan-agen');
    }

    public function get_all_penataan_agen()
    {
        $data = $this->model_penataan_agen->get_all_penataan_agen();
        return $data;
    }
    
    public function get_this_data($id)
    {
        $data = $this->model_penataan_agen->get_this_data($id);
        return $data;
    }
    
    public function penataan_jarak()
    {
        $data = $this->model_penataan_agen->get_all_jarak_agen_spbe();
        foreach ($data as $key)
        {
            $range = $this->haversine($key['lat_agen'],$key['lon_agen'],$key['lat_spbe'],$key['lon_spbe']);
           /* if($range<15.0){
                $stat = 'update';
                $val = array('id_agen'=>$key['id_agen'],'id_spbe'=>$key['id_spbe'],'jarak'=>$range,'status'=>$stat);
                $this->model_penataan_agen->add_penataan_agen($val);
            }*/
            $arrdata[] = array('name_agen'=>$key['name_agen'],'name_spbe'=>$key['name_spbe'],'jarak'=>$range);

            //$range = $this->GetDrivingDistance($key['lat_agen'],$key['lon_agen'],$key['lat_spbe'],$key['lon_spbe']);
        }
        //var_dump($arrdata);
        $content = $this->load->view('detail_penataan', array('data' => $arrdata), TRUE);
        echo Modules::run('frontend', $content, 'detail-penataan');
    }


}

/* End of file backend.php */
/* Location: ./application/modules/backend/controllers/backend.php */