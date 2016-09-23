<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_spbe extends CI_Model {

	public function get_all_spbe()
	{
		$query = $this->db->get('tbl_spbe');
		if ($query->num_rows() > 0) {
			return $query->result_array();
		}
		return false;
	}

	public function get_this_data($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get('tbl_spbe');
		if ($query->num_rows() > 0) {
			return $query->row_array();
		}
		return false;
	}

	public function add_spbe($data)
	{
		$data['password'] = Modules::run('myhelper/encrypt_text', 'password_spbe');
		$data['username'] = 'spbe-'.time();
		$this->db->insert('tbl_spbe', $data);
		return true;
	}

	public function edit_spbe($data)
	{
		$this->db->where('id', $data['id']);
		$this->db->update('tbl_spbe', $data);
	}

	public function del_spbe($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('tbl_spbe'); 
		return true;
	}

}

/* End of file model_penjadwalan.php */
/* Location: ./application/modules/be_penjadwalan/models/model_penjadwalan.php */