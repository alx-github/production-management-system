<?php

class MY_Controller extends CI_Controller 
{
	protected $data = [];
	protected $account_type = NULL;
	
	public function __construct()
	{
		parent::__construct();
		
		$this->load->database();
		$this->load->library(['session', 'form_validation', 'pagination']);
		$this->load->helper(['url', 'language', 'common', 'array']);
		$this->load->model([
				'accounts_model',
				'materials_model',
				'customers_model'
		]);
		$controller  = $this->uri->segment(1);
		if ($controller !== 'auth')
		{
			if (!$this->session->userdata('username'))
			{
				redirect('/auth', 'refresh');
			}
			else
			{
				$account_type = $this->accounts_model->get_type();
				if (NULL === $account_type)
				{
					redirect('/auth/logout', 'refresh');
				}
				$this->account_type = $account_type;
				$this->check_expired_account();
			}
		}
	}
	
	protected function force_admin()
	{
		if(!$this->is_admin())
		{
			redirect('/');
		}
	}
	
	protected function check_expired_account()
	{
		$id = $this->session->userdata('account_id');
		$userinfo = $this->accounts_model->get_by_id($id);
		if(!$userinfo)
		{
			redirect('auth/logout');
			return ;
		}
	}

	protected function is_admin()
	{
		return is_account_admin($this->account_type);
	}
	
	protected function render_menu($current_tab)
	{
		$this->load->view('menu', [
				'current' 		=> $current_tab, 
				'is_admin'		=> $this->is_admin()
		]);
	}
	
	protected function load_pagination($url, $count)
	{
		$this->load->library('pagination');
		$this->pagination->initialize([
			'base_url' 		=> $url,
			'total_rows' 	=> $count
		]);
	}
	
	protected function load_view($view, $data = NULL)
	{
		$this->load->view('template_no_container_fluid', [
				'is_admin'	 => $this->is_admin(),
				'content'	 => $this->load->view($view, $data, TRUE)
		]);
	}

	protected function is_post_request()
	{
		return $this->is_http_request('POST');
	}

	protected function is_get_request()
	{
		return $this->is_http_request('GET');
	}

	private function is_http_request($method)
	{
		return $this->input->method(TRUE) === $method;
	}
}
