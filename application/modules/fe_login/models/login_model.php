<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model {

    function authentification($username, $password)
    {      
        if (!empty($username) && !empty($password)) 
        {   
            $bri = $this->_check_bri($username, $password);
            if ($bri) {
                return true;
            }

            $pelanggan = $this->_check_pelanggan($username, $password);
            if ($pelanggan) {
                return true;
            }
            $pangkalan = $this->_check_pangkalan($username, $password);
            if ($pangkalan) {
                return true;
            }
            $agen = $this->_check_agen($username, $password);
            if ($agen) {
                return true;
            }
            $spbe = $this->_check_spbe($username, $password);
            if ($spbe) {
                return true;
            }
            $admin = $this->_check_admin($username, $password);
            if ($admin) {
                return true;
            }
        }

        return false;
    }
    protected function _check_pelanggan($username, $password){
        $this->db->where('id_pengecer', $username);
        //$this->db->or_where('phone', $username);
        $query = $this->db->get('tbl_pengecer');
        if($query->num_rows() != 0) 
        {
            $dt = $query->row(); 
            if ($dt->password == md5(sha1($password).'monitoringlpg')){ 
                
                // set session user login
                $val = array(
                    APP_PREFIX.'username' => $username,
                    APP_PREFIX.'name' => $dt->name,
                    APP_PREFIX.'id_admin' => $dt->id_pengecer,
                    APP_PREFIX.'is_login' => true,
                    APP_PREFIX.'type_admin' => 5,
                );
                $this->session->set_userdata($val);
                return true; // fix
            } else {
                return false;   
            }
        }
        return false;
    }
    protected function _check_bri($username, $password){
        $this->db->where('username', $username);
        //$this->db->or_where('phone', $username);
        $query = $this->db->get('tbl_bri');
        if($query->num_rows() != 0) 
        {
            $dt = $query->row(); 
            if ($dt->password == md5(sha1($password).'monitoringlpg')){ 
                
                // set session user login
                $val = array(
                    APP_PREFIX.'username' => $username,
                    APP_PREFIX.'name' => $dt->name,
                    APP_PREFIX.'id_admin' => $dt->id_bri,
                    APP_PREFIX.'is_login' => true,
                    APP_PREFIX.'type_admin' => 6,
                );
                $this->session->set_userdata($val);
                return true; // fix
            } else {
                return false;   
            }
        }
        return false;
    }


    protected function _check_admin($username, $password){
        $this->db->where('username', $username);
        $this->db->limit(1);
        $query = $this->db->get('tbl_admin');
        if($query->num_rows() != 0) 
        {
            foreach ($query->result() as $k) 
            {
                foreach ($k as $v => $value) 
                {
                    if ($v == 'password' && $password != Modules::run('myhelper/decrypt_text', $value)) {
                        return false;
                    }

                    $$v = $value;
                }
            }
            // set session user login
            $val = array(
                APP_PREFIX.'username' => $username,
                APP_PREFIX.'name' => $name,
                APP_PREFIX.'id_admin' => $id_admin,
                APP_PREFIX.'is_login' => true,
                APP_PREFIX.'status' => $status,
                APP_PREFIX.'type_admin' => 0,
            );
            $this->session->set_userdata($val);
            $this->update_login($id_admin);
            return true; // fix
        }
        return false;
    }

    protected function _check_pangkalan($username, $password){
        $this->db->where('no_registrasi', $username);
        $this->db->limit(1);
        $query = $this->db->get('tbl_pangkalan');
        if($query->num_rows() != 0) 
        {
            foreach ($query->result() as $k) 
            {
                foreach ($k as $v => $value) 
                {
                    if ($v == 'password' && $password != Modules::run('myhelper/decrypt_text', $value)) {
                        return false;
                    }

                    $$v = $value;
                }
            }
            // set session user login
            $val = array(
                APP_PREFIX.'username' => $no_registrasi,
                APP_PREFIX.'name' => $name,
                APP_PREFIX.'id_admin' => $id_pangkalan,
                APP_PREFIX.'is_login' => true,
                APP_PREFIX.'type_admin' => 2,
            );
            $this->session->set_userdata($val);
            return true; // fix
        }
        return false;
    }


    protected function _check_spbe($username, $password){
        $this->db->where('username', $username);
        $this->db->limit(1);
        $query = $this->db->get('tbl_spbe');
        if($query->num_rows() != 0) 
        {
            foreach ($query->result() as $k) 
            {
                foreach ($k as $v => $value) 
                {
                    if ($v == 'password' && $password != Modules::run('myhelper/decrypt_text', $value)) {
                        return false;
                    }

                    $$v = $value;
                }
            }
            // set session user login
            $val = array(
                APP_PREFIX.'username' => $username,
                APP_PREFIX.'name' => $name,
                APP_PREFIX.'id_admin' => $id,
                APP_PREFIX.'is_login' => true,
                APP_PREFIX.'type_admin' => 4,
            );
            $this->session->set_userdata($val);
            return true; // fix
        }
        return false;
    }

    protected function _check_agen($username, $password){
        $this->db->where('username', $username);
        $this->db->limit(1);
        $query = $this->db->get('tbl_agen');
        if($query->num_rows() != 0) 
        {
            foreach ($query->result() as $k) 
            {
                foreach ($k as $v => $value) 
                {
                    if ($v == 'password' && $password != Modules::run('myhelper/decrypt_text', $value)) {
                        return false;
                    }

                    $$v = $value;
                }
            }
            // set session user login
            $val = array(
                APP_PREFIX.'username' => $username,
                APP_PREFIX.'name' => $name,
                APP_PREFIX.'id_admin' => $id,
                APP_PREFIX.'is_login' => true,
                APP_PREFIX.'type_admin' => 3,
            );
            $this->session->set_userdata($val);
            return true; // fix
        }
        return false;
    }

    public function update_login($id)
    {
        $now = date('Y-m-d');
        $this->db->where('id_admin', $id);
        $this->db->update('tbl_admin', array('tgl_login' => $now));
    }

}

/* End of file login_model.php */
/* Location: ./application/modules/fe_login/models/login_model.php */