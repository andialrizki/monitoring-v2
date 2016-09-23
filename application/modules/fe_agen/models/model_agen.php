<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Model_agen extends CI_Model
{
    public function get_all_agen()
    {
        if ($this->session->userdata(APP_PREFIX . 'type_admin') == 0 || $this->session->userdata(APP_PREFIX . 'type_admin') == 1) {
        } else {
            $this->db->like('id_spbe', $this->session->userdata(APP_PREFIX . 'id_admin'));
        }
        $this->db->from('tbl_agen');
        $this->db->order_by("name","asc");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }

    public function get_this_data($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('tbl_agen');
        if ($query->num_rows() > 0) {
            return $query->row_array();
        }
        return false;
    }

    public function add_agen($data)
    {
        $data['username'] = time();
        $data['password'] = Modules::run('myhelper/encrypt_text', 'password_agen');
        $this->db->insert('tbl_agen', $data);
        return true;
    }

    public function edit_agen($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->update('tbl_agen', $data);
    }

    public function del_agen($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tbl_agen');
        return true;
    }

}

/* End of file model_penjadwalan.php */
/* Location: ./application/modules/be_penjadwalan/models/model_penjadwalan.php */