<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends MY_Controller {
	protected $data = ['login_id' => NULL];

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library(array('form_validation', 'session'));
		$this->load->helper(array('url', 'language', 'common'));
		$action  = $this->uri->segment(2);
		if ($action !== 'logout')
		{
			if ($this->session->userdata('login_id'))
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
			$this->form_validation->set_rules('login_id', 'ログインID', 'trim|required|regex_match[/^[a-zA-Z0-9_\-]+$/]');
			$this->form_validation->set_rules('password', 'パスワード', 'trim|required|regex_match[/^[a-zA-Z0-9_\-]+$/]');
			if (!$this->form_validation->run())
			{
				$this->session->set_flashdata('error_message', validation_errors());
				$this->render_login();
				return;
			}
			
			$login_id = $this->input->post('login_id');
			$password = $this->input->post('password');
			$this->data['login_id'] = $login_id;
			$message = '';
			
			$this->load->model('accounts_model');
			$password_hash = hash_password($password);
			$result = $this->accounts_model->login($login_id, $password_hash);
			if ($result !== FALSE)
			{
				$this->session->set_userdata('login_id', $login_id);
				$this->session->set_userdata('account_id', $result->id);
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
		$this->session->unset_userdata('login_id');
		$this->session->unset_userdata('account_id');
		$this->session->sess_destroy();
		redirect('/auth');
	}

	private function render_login()
	{
		$this->load->view('header');
		$this->load->view('/auth/login', $this->data);
		$this->load->view('footer');
	}
}
