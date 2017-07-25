<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends MY_Controller 
{	

	public function __construct()
	{
		parent::__construct();
		$this->check_admin_account();
	}

	public function index()
	{
		$keyword = $this->input->get('keyword');
		$count_by_keyword = $this->accounts_model->count_by_keyword($keyword);
		$this->load_pagination(site_url('/master/account?keyword='.$keyword), $count_by_keyword);
		$start = $this->get_start_value();
		$this->data['list_accounts'] = $this->accounts_model->get_list_account($keyword, $this->pagination->per_page, $start);
		$this->data['keyword'] = $keyword;
		$this->render_list_account();
	}

	public function create()
	{
		$this->data['account'] = $this->create_empty_account();
		$this->render_form_account();
	}

	public function insert()
	{
		if (!$this->is_post_request())
		{
			redirect('/master/account');
		}
		$this->data['account'] = $this->input->post(NULL, TRUE);
		if ($this->validate_form() !== TRUE)
		{
			$this->render_form_account();
			return;
		}
		$this->data['account']['password'] = hash_password($this->input->post('password'));
		$this->db->trans_start();
		$this->accounts_model->insert_data($this->data['account']);
		$this->db->trans_complete();
		if ($this->db->trans_status() !== FALSE)
		{
			$this->session->set_flashdata('message', "アカウントを作成しました");
			redirect('master/account');
		}
		$this->session->set_flashdata('error_message', 'アカウントを作成することができません');
		$this->render_form_account();
	}

	public function edit()
	{
		$account_id = $this->input->get('id');
		if (!$account_id)
		{
			redirect('/master/account');
		}
		$this->data['account'] = $this->accounts_model->get_by_id($account_id);
		if (!$this->data['account'])
		{
			redirect('/master/account');
		}
		$this->render_form_account();
	}

	public function update()
	{
		if (!$this->is_post_request())
		{
			redirect('/master/account');
		}
		$this->data['account'] = $this->create_updated_data($this->input->post(NULL, TRUE));
		if ($this->validate_form(FORM_MODE_UPDATE) !== TRUE)
		{
			$this->render_form_account();
			return;
		}
		if ($this->input->post('password'))
		{
			$this->data['account']['password'] = hash_password($this->input->post('password'));
		}
		$this->db->trans_start();
		$this->accounts_model->update_data($this->data['account']['account_id'], $this->data['account']);
		$this->db->trans_complete();
		if ($this->db->trans_status() !== FALSE)
		{
			$this->session->set_flashdata('message', "アカウント情報を更新しました");
		}
		else
		{
			$this->session->set_flashdata('error_message', 'アカウント情報を更新することができません');
		}
		redirect('master/account');
	}

	public function delete()
	{
		if (!$this->is_post_request())
		{
			redirect('/master/account');
		}
		$delete_id = $this->input->post('id');
		if (empty($delete_id) OR $delete_id == $this->session->userdata('account_id') )
		{
			redirect('/master/account');
		}
		$this->db->trans_start();
		$this->accounts_model->delete($delete_id);
		$this->db->trans_complete();
		if ($this->db->trans_status() !== FALSE)
		{
			$this->session->set_flashdata('message', 'ユーザーを削除しました');
		}
		else
		{
			$this->session->set_flashdata('error_message', 'ユーザーを削除することができません');
		}
		redirect('/master/account');
	}

	private function render_list_account()
	{
		$this->load_view('master/account/list', $this->data);
	}

	private function render_form_account()
	{
		$this->load_view('master/account/form', $this->data);
	}

	private function create_empty_account()
	{
		return [
			'account_id'=> NULL,
			'username'=> NULL,
			'auth'=> NULL
		];
	}

	private function create_updated_data($input)
	{
		return [
			'account_id'=> $input['account_id'] ?? NULL,
			'username'	=> $input['username'] ?? NULL,
			'auth'      => $input['auth'] ?? NULL
		];
	}

	private function validate_form($mode = FORM_MODE_INSERT)
	{
		if ($mode === FORM_MODE_INSERT)
		{
			$this->form_validation->set_rules('username', 'ユーザー名', 'trim|required|regex_match[/^[a-zA-Z0-9_\-]+$/]|callback_username_check');
			$this->form_validation->set_rules('password', 'パスワード', 'trim|required|min_length[6]|regex_match[/^[a-zA-Z0-9_\-]+$/]');
		}
		else
		{
			$this->form_validation->set_rules('password', 'パスワード', 'trim|min_length[6]|regex_match[/^[a-zA-Z0-9_\-]+$/]');
		}
		if (!$this->form_validation->run())
		{
			$this->session->set_flashdata('error_message', validation_errors());
			return FALSE;
		}
		return TRUE;
	}

	public function username_check($str)
	{
		return !$this->accounts_model->check_username_exists($str);
	}
}
