<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends MY_Controller 
{	
	protected $per_page = 2;

	public function __construct()
	{
		parent::__construct();
		$this->force_admin();
		$this->check_expired_account();
	}

	public function index()
	{
		$count_all = $this->accounts_model->count_all();
		$this->load_pagination('/master/account',$count_all, $this->per_page);
		$page_links = $this->pagination->create_links();
		$this->data['pagination'] = $page_links;
		$start = $this->input->get('start');
		if( $start > $count_all)
		{
			if($count_all < $this->per_page)
			{
				$start = 0;
			}
			else 
			{
				$start = $count_all - $this->per_page;
			}
		}
		if( ($start % $this->per_page) !== 0 )
		{
			$start -=($start % $this->per_page);
		}
		$this->data['list_accounts'] = $this->accounts_model->get_list($this->per_page, $start,"");
		$this->render_list_account();
	}

	public function search()
	{
		$keyword = null;
		if($this->input->get('username'))
		{
			$keyword =  $this->input->get('username');
		}
		$count_by_keyword = $this->accounts_model->count_by_keyword($keyword);
		$this->load_pagination('/master/account/search?username='.$keyword,$count_by_keyword, $this->per_page);
		$page_links = $this->pagination->create_links();
		$this->data['pagination'] = $page_links;
		$start = $this->input->get('start');
		if( $start > $count_by_keyword)
		{
			if($count_by_keyword < $this->per_page)
			{
				$start = 0;
			}
			else 
			{
				$start = $count_by_keyword - $this->per_page;
			}
		}
		if( ($start % $this->per_page) !== 0 )
		{
			$start -=($start % $this->per_page);
		}
		$this->data['list_accounts'] = $this->accounts_model->get_list($this->per_page, $start,$keyword);
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
		$form = $this->input->post();
		$this->data['account'] = $form;
		if($this->validate_form(null) !== TRUE)
		{
			$this->render_form_account();
			return;
		}
		$this->data['account']['password'] = hash_password($this->input->post('password'));
		$new_account_id = $this->accounts_model->insert_account($this->data['account']);
		if($new_account_id)
		{
			$this->session->set_flashdata('message', "アカウント情報を更新しました");
		}
		else
		{
			$this->session->set_flashdata('error_message', 'アカウント情報を更新することができません');
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
		if($this->accounts_model->get_account_by_id($account_id))
		{
			$this->data['account'] = $this->accounts_model->get_account_by_id($account_id);
			$this->render_form_account();
		}
		else
		{
			redirect('/master/account');
		}
	}

	public function update()
	{
		$form = $this->input->post();
		$this->data['account'] = $form;
		if($this->validate_form($this->data['account']['account_id']) !== TRUE)
		{
			$this->render_form_account();
			return;
		}
		if($this->input->post('password'))
		{
			$this->data['account']['password'] = hash_password($this->input->post('password'));
		}
		else
		{
			$old_info = $this->accounts_model->get_account_by_id($this->data['account']['account_id']);
			$this->data['account']['password'] = $old_info['password'];
		}

		$update_result = $this->accounts_model->update_account($this->data['account']);
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
		$result = $this->accounts_model->delete_account($delete_id);
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
		return ['account_id'=>null,
				'username'=> null,
				'password'=> null,
				'auth'=> null
				];
	}

	private function validate_form($account_id)
	{
		if(!$account_id)
		{
			$this->form_validation->set_rules('username','ユーザー名','trim|required|regex_match[/^[a-zA-Z0-9_\-]+$/]');
			$this->form_validation->set_rules('password','パスワード','trim|required|min_length[6]|regex_match[/^[a-zA-Z0-9_\-]+$/]');
			if($this->accounts_model->check_username_exists($this->input->post('username')))
	        {
	        	$this->session->set_flashdata('error_message','username exists');
	            return false;
	        }
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
}
