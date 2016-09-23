<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Myhelper_model extends CI_Model {

	function get_this_name($id, $type = "mahasiswa")
	{
		if ($type == "mahasiswa") 
		{
			$this->db->where('nim', $id);
		}
		else 
		{
			$this->db->where('NIDN', $id);
		}
		
		if ($this->db->table_exists('table_'.$type)) 
		{
			$query = $this->db->get('table_'.$type);
		}
		else
		{
			echo Modules::run('fe_error', 'Table is not exist');
			exit();
		}

		if ($query->num_rows() != 0) 
		{
			return $query->row_array();
		}

		return false;
	}

	function get_data($table)
	{
		if ($table == "dosen") {
			$this->db->order_by('nama');
		}

		if ($this->db->table_exists('table_'.$table)) 
		{
			$query = $this->db->get('table_'.$table);
		}
		else
		{
			echo Modules::run('fe_error', 'Table is not exist');
			exit();
		}
		
		if ($query->num_rows() != 0) 
		{
			return $query->result();
		}

		return false;
	}

	function get_data_table($table_name, $field, $option, $option2)
	{
		$this->db->select($field);
		if ($option == 'where 1') 
		{
			$query = $this->db->get($table_name);
		}
		elseif ($option2 == '1') {
			$count = 0;
			foreach ($option as $row => $value) {
				if (!$count) {
					$this->db->where($row, $value);
				}else{
					$this->db->or_where($row, $value);
				}
				$count++;
			}
			$query = $this->db->get($table_name);
		}
		else 
		{
			$query = $this->db->get_where($table_name, $option);
		}

		if ($query->num_rows() != 0) 
		{
			if (sizeof($query->result_array()) > 1) {
				return $query->result_array();
			}else{
				return $query->row_array();
			}
		}

		return false;
	}	

	public function cekpassword($tbl, $id)
	{
		$this->db->select('password');
		$query = $this->db->get_where($tbl, $id);
		if ($query->num_rows() > 0) {
			return $query->row_array();
		}
		return false;
	}

	public function cekusername($tbl, $id)
	{
		$query = $this->db->get_where($tbl, $id);
		if ($query->num_rows() > 0) {
			return true;
		}
		return false;
	}

	public function ceklimit($id)
	{
		$uplimit = date('Y-m')."-01";
		$downlimit = date('Y-m')."-31";
		$this->db->where('tgl >=', $uplimit);
		$this->db->where('tgl <=', $downlimit);
		$this->db->where('id_pengecer', $id);
		$this->db->select_sum('qty');
		$query = $this->db->get('tbl_transaksi');
		if ($query->num_rows() > 0) {
			foreach ($query->row_array() as $key) {
				return $key;
			}
		}
		return 0;
	}

	public function setharga($harga, $id)
	{
		$this->db->where('id_pangkalan', $id);
		$this->db->update('tbl_pangkalan', array('harga_eceran' => $harga));
		return true;
	}
}

/* End of file myhelper_model.php */
/* Location: ./application/modules/myhelper/models/myhelper_model.php */