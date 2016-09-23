<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Permission extends MX_Controller {

	public function __construct()
	{
		parent::__construct();
		echo Modules::run('fe_adminlogin/is_login');
		$this->load->model('model_permission');
	}

	public function index($plugin)
	{	
		$grade = $this->session->userdata(APP_PREFIX.'grade');
		$permission = $this->model_permission->get_permission($grade);
		if ($permission) 
		{
			if (strtolower($permission['user_data']) == 'all') 
			{
				// continue;
			}
			else
			{
				$status = false;
				$data = explode(':', $permission['user_data']);
				foreach ($data as $v) 
				{
					if ($v == strtolower($plugin)) 
					{
						$status = true;
						break;
					}
				}
				
				if ($status) 
				{
					// continue;
				}
				else 
				{
					show_error('You dont have permission on this plugin', 403);
				}
			}
		}
		else
		{
			show_404();
		}
	}
}

/* End of file secure_request.php */
/* Location: ./application/modules/secure_request/controllers/secure_request.php */