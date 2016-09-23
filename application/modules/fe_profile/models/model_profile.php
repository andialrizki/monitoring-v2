<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_profile extends CI_Model {

	public function get_this_data($tbl, $id)
	{
		$query = $this->db->get_where($tbl, $id);
		if ($query->num_rows() > 0) {
			return $query->row_array();
		}
		return false;
	}

	public function edit_profile($data, $tbl, $where)
	{
		$this->db->where($where, $data[$where]);
		$this->db->update($tbl, $data);
		return true;
	}

}

/* End of file model_penjadwalan.php */
/* Location: ./application/modules/be_penjadwalan/models/model_penjadwalan.php */