<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_realisasi_spbe extends CI_Model {

	public function get_all_realisasi_spbe()
	{
		$query = $this->db->get('tbl_realisasi_spbe');
		if ($query->num_rows() > 0) {
			return $query->result_array();
		}
		return false;
	}

	public function get_this_data($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get('tbl_realisasi_spbe');
		if ($query->num_rows() > 0) {
			return $query->row_array();
		}
		return false;
	}

	public function add_realisasi_spbe($data)
	{
		$this->db->insert('tbl_realisasi_spbe', $data);
		return true;
	}

	public function edit_realisasi_spbe($data)
	{
		$this->db->where('id', $data['id']);
		$this->db->update('tbl_realisasi_spbe', $data);
	}

	public function del_realisasi_spbe($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('tbl_realisasi_spbe'); 
		return true;
	}

	public function support_chart()
	{
		$this->db->select('plant');
		$this->db->select_sum('qty_tabung');
		$this->db->from('tbl_realisasi_spbe');
		$this->db->where('tanggal', 'JAN 2014');
		$this->db->group_by('plant');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result_array();
		}
		return false;
	}

}

/* End of file model_penjadwalan.php */
/* Location: ./application/modules/be_penjadwalan/models/model_penjadwalan.php */