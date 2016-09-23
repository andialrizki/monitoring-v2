<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_penataan_agen extends CI_Model {

	public function get_all_penataan_agen()
	{
		$this->db->select('tbl_supply_spbe_agen.id_supply_sa AS id, tbl_agen.name AS name_agen, tbl_agen.latitude AS lat_agen, tbl_agen.longitude AS lon_agen, tbl_spbe.name AS name_spbe, tbl_spbe.latitude AS lat_spbe, tbl_spbe.longitude AS lon_spbe, jarak');
		$this->db->from('tbl_supply_spbe_agen');
		$this->db->join('tbl_agen', 'tbl_agen.id = tbl_supply_spbe_agen.id_agen');
		$this->db->join('tbl_spbe', 'tbl_spbe.id = tbl_supply_spbe_agen.id_spbe');
		$this->db->where('tbl_supply_spbe_agen.status','update');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result_array();
		}
		return false;
	}


	public function get_this_data($id)
	{
		$this->db->select('tbl_supply_spbe_agen.id_supply_sa AS id, tbl_agen.id AS id_agen, tbl_agen.name AS name_agen, tbl_agen.latitude AS lat_agen, tbl_agen.longitude AS lon_agen, tbl_spbe.id AS id_spbe, tbl_spbe.name AS name_spbe, tbl_spbe.latitude AS lat_spbe, tbl_spbe.longitude AS lon_spbe, jarak');
		$this->db->from('tbl_supply_spbe_agen');
		$this->db->join('tbl_agen', 'tbl_agen.id = tbl_supply_spbe_agen.id_agen');
		$this->db->join('tbl_spbe', 'tbl_spbe.id = tbl_supply_spbe_agen.id_spbe');
		$this->db->where('tbl_agen.id', $id);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result_array();
		}
		return false;
	}

	public function add_penataan_agen($data)
	{
		$this->db->insert('tbl_supply_spbe_agen', $data);
		return true;
	}
	
	public function edit_penataan_agen($data)
	{
		$arr = array('jarak' => $data['jarak']);
		$this->db->where('id_supply_sa', $data['id']);
		$this->db->update('tbl_supply_spbe_agen', $arr);
	}

	public function del_penataan_agen($id)
	{
		$this->db->where('id_supply_sa', $id);
		$this->db->delete('tbl_supply_spbe_agen');
		return true;
	}

	public function get_max_distance()
	{
		$this->db->select_max('jarak');
		$query = $this->db->get('tbl_supply_spbe_agen');
		if ($query->num_rows() > 0) {
			return $query->row_array();
		}
		return false;
	}

	public function get_min_distance()
	{
		$this->db->select_min('jarak');
		$query = $this->db->get('tbl_supply_spbe_agen');
		if ($query->num_rows() > 0) {
			return $query->row_array();
		}
		return false;
	}

	public function get_all_jarak_agen_spbe()
	{
		$this->db->select('tbl_agen.id AS id_agen, tbl_agen.name AS name_agen, tbl_agen.latitude AS lat_agen, tbl_agen.longitude AS lon_agen, tbl_spbe.id AS id_spbe, tbl_spbe.name AS name_spbe, tbl_spbe.latitude AS lat_spbe, tbl_spbe.longitude AS lon_spbe ');
		$this->db->from('tbl_agen,tbl_spbe');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result_array();
		}
		return false;
	}

}

/* End of file model_penjadwalan.php */
/* Location: ./application/modules/be_penjadwalan/models/model_penjadwalan.php */