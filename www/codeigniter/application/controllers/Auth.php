<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends MY_Controller {
	protected $data = ['username' => NULL];

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library(array('form_validation', 'session'));
		$this->load->helper(array('url', 'language', 'common'));
		$action  = $this->uri->segment(2);
		if ($action !== 'logout')
		{
			if ($this->session->userdata('username'))
			{
				redirect('/production', 'refresh');
			}
		}
	}

	public function index()
	{
		$this->login();
	}

	public function login()
	{
		if ($this->input->post())
		{
			$this->verify_login();
		}
		else
		{
			$this->render_login();
		}
	}

	/**
	 * ユーザーのログインを確認する
	 */
	public function verify_login()
	{
		try
		{
			$this->form_validation->set_rules('username', 'ユーザー名', 'trim|required|regex_match[/^[a-zA-Z0-9_\-]+$/]');
			$this->form_validation->set_rules('password', 'パスワード', 'trim|required|regex_match[/^[a-zA-Z0-9_\-]+$/]');
			if (!$this->form_validation->run())
			{
				$this->session->set_flashdata('error_message', validation_errors());
				$this->render_login();
				return;
			}
			
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$this->data['username'] = $username;
			$message = '';
			
			$this->load->model('accounts_model');
			$password_hash = hash_password($password);
			$result = $this->accounts_model->login($username, $password_hash);
			if ($result !== FALSE)
			{
				$this->session->set_userdata('username', $username);
				$this->session->set_userdata('account_id', $result->account_id);
				if ($this->is_admin())
				{
					redirect('/receive');
				}
				else
				{
					redirect('/production');
				}
			}
			$message = "ログインできませんでした。";
			$this->session->set_flashdata('error_message', $message);
			$this->render_login();
		}
		catch (Exception $e) 
		{
			log_message('error', $e->getMessage());
		}
	}

	/**
	 * ログアウト
	 */
	public function logout()
	{
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('account_id');
		$this->session->sess_destroy();
		redirect('/auth');
	}

	private function render_login()
	{
		$this->load_view('auth/login', $this->data);
	}
}
