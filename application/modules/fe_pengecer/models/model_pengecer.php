<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_pengecer extends CI_Model {

	public function get_all_pengecer()
	{
		if ($this->session->userdata(APP_PREFIX.'type_admin') == 0 || $this->session->userdata(APP_PREFIX.'type_admin') == 1) {
		}else{
			$this->db->where('id_pangkalan', $this->session->userdata(APP_PREFIX.'id_admin'));
		}
		$query = $this->db->get('tbl_pengecer');
		if ($query->num_rows() > 0) {
			return $query->result_array();
		}
		return false;
	}

	public function get_this_data($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get('tbl_pengecer');
		if ($query->num_rows() > 0) {
			return $query->row_array();
		}
		return false;
	}

	public function add_pengecer($data)
	{
		$this->db->where('id_pengecer', $data['id_pengecer']);
		$query = $this->db->get('tbl_pengecer');
		if ($query->num_rows() > 0) {
			echo "<script>alert('No Pelanggan Tidak Boleh Sama')</script>";
			return false;
		}else{
			$this->db->insert('tbl_pengecer', $data);
			return true;
		}
	}

	public function edit_pengecer($data)
	{
		$this->db->where('id', $data['id']);
		$this->db->update('tbl_pengecer', $data);
	}

	public function del_pengecer($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('tbl_pengecer'); 
	}

}

/* End of file model_penjadwalan.php */
/* Location: ./application/modules/be_penjadwalan/models/model_penjadwalan.php */