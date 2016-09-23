<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_transaksi extends CI_Model {

	public function get_all_transaksi()
	{
		if ($this->session->userdata(APP_PREFIX.'type_admin') != 0) {
			$this->db->where('id_pangkalan', $this->session->userdata(APP_PREFIX.'id_admin'));
		}
		$this->db->order_by('tgl','desc');
		$query = $this->db->get('tbl_transaksi');
		if ($query->num_rows() > 0) {
			return $query->result_array();
		}
		return false;
	}

	public function get_transaksi_agen()
	{
        if ($this->session->userdata(APP_PREFIX.'type_admin') != 0) {
            $this->db->where('id_agen', $this->session->userdata(APP_PREFIX.'id_admin'));
        }
        $this->db->join('tbl_pangkalan', 'tbl_transaksi.id_pangkalan = tbl_pangkalan.id_pangkalan');
        $query = $this->db->get('tbl_transaksi');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
	}

	public function get_this_data($id)
	{
		$this->db->where('id_pengecer', $id);
		if ($this->session->userdata(APP_PREFIX.'type_admin') != 0) {
			$this->db->where('id_pangkalan', $this->session->userdata(APP_PREFIX.'id_admin'));
		}
		$query = $this->db->get('tbl_transaksi');
		if ($query->num_rows() > 0) {
			return $query->result_array();
		}
		return false;
	}

	public function add_transaksi($data)
	{
		$this->db->insert('tbl_transaksi', $data);
		return true;
	}

	public function edit_transaksi($data)
	{
		$this->db->where('id', $data['id']);
		$this->db->update('tbl_transaksi', $data);
	}

	public function del_transaksi($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('tbl_transaksi'); 
	}

}

/* End of file model_penjadwalan.php */
/* Location: ./application/modules/be_penjadwalan/models/model_penjadwalan.php */