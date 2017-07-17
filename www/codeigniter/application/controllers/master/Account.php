<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends MY_Controller 
{	

	public function __construct()
	{
		parent::__construct();
		$this->force_admin();
	}

	public function index()
	{
		$keyword =  $this->input->get('keyword');
		$count_by_keyword = $this->accounts_model->count_by_keyword($keyword);
		$this->load_pagination('/master/account?keyword='.$keyword,$count_by_keyword);
		$start = $this->input->get('start');
		if($start > $this->pagination->get_last_page_start())
		{
			$start = $this->pagination->get_last_page_start();	
		}
		$this->data['list_accounts'] = $this->accounts_model->get_list($this->pagination->per_page, $start, $keyword);
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
		$this->data['account'] =  $this->input->post();
		if($this->validate_form(NULL) !== TRUE)
		{
			$this->render_form_account();
			return;
		}
		$this->data['account']['password'] = hash_password($this->input->post('password'));
		$new_account_id = $this->accounts_model->insert_data($this->data['account']);
		if($new_account_id)
		{
			$this->session->set_flashdata('message', "アカウントを作成しました");
		}
		else
		{
			$this->session->set_flashdata('error_message', 'アカウントを作成することができません');
		}
		redirect('master/account');
	}

	public function edit()
	{
		$account_id = $this->input->get('id');
		if(!$account_id)
		{
			redirect('/master/account');
		}
		$this->data['account'] = $this->accounts_model->get_by_id($account_id);
		if($this->data['account'])
		{
			$this->render_form_account();
		}
		else
		{
			redirect('/master/account');
		}
	}

	public function update()
	{
		$this->data['account'] = $this->create_updated_data($this->input->post());
		if($this->validate_form($this->data['account']) !== TRUE)
		{
			$this->render_form_account();
			return;
		}
		if($this->input->post('password'))
		{
			$this->data['account']['password'] = hash_password($this->input->post('password'));
		}
		$update_result = $this->accounts_model->update_data($this->data['account']['account_id'],$this->data['account']);
		if($update_result)
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
		$delete_id = $this->input->post('id');
		if(empty($delete_id) || $delete_id == $this->session->userdata('account_id') )
		{
			redirect('/master/account');
		}
		$result = $this->accounts_model->delete($delete_id);
		if($result)
		{
			$this->session->set_flashdata('message','ユーザーを削除しました');
			redirect('/master/account');
		}
		else
		{
			$this->session->set_flashdata('error_message', 'ユーザーを削除することができません');
		}
		redirect('/master/account');
	}

	private function render_list_account()
	{
		$this->load->view('header');
		$this->render_menu('master');
		$this->load->view('master/account/list',$this->data);
		$this->load->view('footer');
	}

	private function render_form_account()
	{
		$this->load->view('header');
		$this->render_menu('master');
		$this->load->view('master/account/form',$this->data);
		$this->load->view('footer');
	}

	private function create_empty_account()
	{
		return ['account_id'=> NULL,
				'username'=> NULL,
				'auth'=> NULL
				];
	}

	private function create_updated_data($input)
	{
		return ['account_id'=> $input['account_id'],
				'auth'      => $input['auth']
				];
	}

	private function validate_form($account_id)
	{
		if(!$account_id)
		{
			$this->form_validation->set_rules('username','ユーザー名','trim|required|regex_match[/^[a-zA-Z0-9_\-]+$/]|callback_username_check');
			$this->form_validation->set_rules('password','パスワード','trim|required|min_length[6]|regex_match[/^[a-zA-Z0-9_\-]+$/]');
		}
		else
		{
			$this->form_validation->set_rules('password','パスワード','trim|min_length[6]|regex_match[/^[a-zA-Z0-9_\-]+$/]');
		}
        if(!$this->form_validation->run())
        {
            $this->session->set_flashdata('error_message',validation_errors());
            return false;
        }
        return true;
	}

	public function username_check($str)
	{
		if($this->accounts_model->check_username_exists($str))
		{
			return false;
		}
		return true;
	}
}
