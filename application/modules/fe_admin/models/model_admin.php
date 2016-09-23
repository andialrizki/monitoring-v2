<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_admin extends CI_Model {

	public function get_all_admin()
	{
		$this->db->where('status', '1');
		$query = $this->db->get('tbl_admin');
		if ($query->num_rows() > 0) {
			return $query->result_array();
		}
		return false;
	}

	public function get_this_data($id)
	{
		$this->db->where('status', '1');
		$this->db->where('id_admin', $id);
		$query = $this->db->get('tbl_admin');
		if ($query->num_rows() > 0) {
			return $query->row_array();
		}
		return false;
	}

	public function add_admin($data)
	{
		$query = $this->db->get_where('tbl_admin', array('username' => $data['username']));
		if ($query->num_rows() > 0 ) {
			return false;
		}
		$data['tgl_login'] = date('Y-m-d');
		$data['password'] = Modules::run('myhelper/encrypt_text', $data['password']);
		$this->db->insert('tbl_admin', $data);
		return true;
	}

	public function edit_admin($data)
	{
		$query = $this->db->get_where('tbl_admin', array('username' => $data['username']));
		if ($query->num_rows() > 0 ) {
			return false;
		}
		$data['password'] = Modules::run('myhelper/encrypt_text', $data['password']);
		$this->db->where('id_admin', $data['id_admin']);
		$this->db->update('tbl_admin', $data);
		return true;
	}

	public function del_admin($id)
	{
		$this->db->where('id_admin', $id);
		$this->db->delete('tbl_admin'); 
	}

}

/* End of file model_penjadwalan.php */
/* Location: ./application/modules/be_penjadwalan/models/model_penjadwalan.php */