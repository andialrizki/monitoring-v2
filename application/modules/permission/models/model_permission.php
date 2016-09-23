<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_permission extends CI_Model {

	function get_permission($grade)
	{
		if ($this->db->table_exists('table_permission')) 
        {
			$this->db->where('grade', $grade);
			$query = $this->db->get('table_permission');
			if ($query->num_rows() != 0)
			{
				return $query->row_array();
			}
			else 
			{
				return false;
			}
		}
        else
        {
            echo Modules::run('fe_error', 'Table is not exists.');
            exit();
        }
	}

}

/* End of file model_permission.php */
/* Location: ./application/modules/permission/models/model_permission.php */