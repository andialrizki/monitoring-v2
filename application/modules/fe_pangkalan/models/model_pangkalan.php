<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_pangkalan extends CI_Model {

	public function get_all_pangkalan()
	{
		if ($this->session->userdata(APP_PREFIX.'type_admin') == 0 || $this->session->userdata(APP_PREFIX.'type_admin') == 1) {
		}else{
			$this->db->where('id_agen', $this->session->userdata(APP_PREFIX.'id_admin'));
		}
		$this->db->where('id_agen IS NOT NULL');
		$query = $this->db->get('tbl_pangkalan');
		if ($query->num_rows() > 0) {
			return $query->result_array();
		}
		return false;
	}

	public function get_perubahan_pangkalan()
	{
		if ($this->session->userdata(APP_PREFIX.'type_admin') == 0 || $this->session->userdata(APP_PREFIX.'type_admin') == 1) {
		}else{
			$this->db->where('id_agen', $this->session->userdata(APP_PREFIX.'id_admin'));
		}
		$this->db->where('id_agen IS NOT NULL');
		$query = $this->db->get('tbl_pangkalan_perubahan');
		$data = '';
		if ($query->num_rows() > 0) {
			foreach ($query->result_array() as $key) {
				$data[] = $this->get_this_data($key['id_pangkalan']);
			}
			return $data;
		}
		return false;
	}

	public function get_this_data($id)
	{
		$this->db->where('id_pangkalan', $id);
		$query = $this->db->get('tbl_pangkalan');
		if ($query->num_rows() > 0) {
			return $query->row_array();
		}
		return false;
	}

	public function add_pangkalan($data)
	{
		$query = $this->db->get_where('tbl_pangkalan', array('no_registrasi' => $data['no_registrasi']));
		if ($query->num_rows() > 0 ) {
			return false;
		}
		$data['password'] = Modules::run('myhelper/encrypt_text', 'password_pangkalan');
		$this->db->insert('tbl_pangkalan', $data);
		return true;
	}

	public function edit_pangkalan($data)
	{
		$this->db->where('id_pangkalan', $data['id_pangkalan']);
		$this->db->update('tbl_pangkalan', $data);
		return true;
	}

	public function del_pangkalan($id)
	{
		$this->db->where('id_pangkalan', $id);
		$this->db->delete('tbl_pangkalan'); 
		return true;
	}

	public function update_pangkalan()
	{
		$this->db->select('id_pangkalan,sp_agen');
		$query = $this->db->get('tbl_pangkalan');
		echo "<pre>";
		foreach ($query->result_array() as $key) {
			print_r($key);
			// $id_pangkalan = $key['id_pangkalan'];
			// $key = explode('-', $key['sp_agen']);
			// $key = isset($key['1']) ? trim($key['1']): trim($key['0']);
			// $this->db->select('id');
			// $this->db->like('name', $key);
			// $qq = $this->db->get('tbl_agen');
			// foreach ($qq->result_array() as $kk) {
			// 	$this->db->where('id_pangkalan', $id_pangkalan);
			// 	// $this->db->where('id_agen', 'NULL');
			// 	$this->db->update('tbl_pangkalan',array('id_agen' => $kk['id'], 'sp_agen' => $key));
			// }
		}
		echo "</pre>";
	}

	public function update_perubahan()
	{
		echo "<pre>";
		$this->db->select('no_agen,id_pangkalan, Vol_pang');
		$this->db->where('id_pangkalan !=', '');
		$query = $this->db->get('tbl_perubahan');
		$data = '';
		$i = 0;
		$pangkalan = '';
		// echo $query->num_rows();
		echo "<br>";
		foreach ($query->result_array() as $key) {
			// $pangkalan = $key['pangkalan'];
			// $key['pangkalan'] = preg_replace('/[^A-Za-z.\'\/`, ()]/', '', $key['pangkalan']);
			// $key['pangkalan'] = preg_replace('/\s+/', ' ', $key['pangkalan']);
			// $key['pangkalan'] = str_replace('()', '', $key['pangkalan']);
			// echo $key['id_pangkalan'];
			// echo "<br>";
			$this->db->distinct();
			$this->db->select('id_pangkalan');
			$this->db->where('id_pangkalan', $key['id_pangkalan']);
			$qq = $this->db->get('tbl_pangkalan');
			// $i+=$qq->num_rows();
			foreach ($qq->result_array() as $kk) {
				$key['id_pangkalan'] = $kk['id_pangkalan'];
				$data['id_agen'] = $key['no_agen'];
				$data['id_pangkalan'] = $key['id_pangkalan'];
				$data['grant_to'] = $key['Vol_pang'];
				$qw = $this->db->get_where('tbl_pangkalan_perubahan', array('id_pangkalan' => $data['id_pangkalan']));
				if ($qw->num_rows() > 0) {
					$this->db->where('id_pangkalan', $data['id_pangkalan']);
					$this->db->update('tbl_pangkalan_perubahan', $data);
				}else{
					$this->db->insert('tbl_pangkalan_perubahan', $data);
				}
			}
		}
		echo "</pre>";
	}

}

/* End of file model_penjadwalan.php */
/* Location: ./application/modules/be_penjadwalan/models/model_penjadwalan.php */