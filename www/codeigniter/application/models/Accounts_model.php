<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
require (BASEPATH . '../application/models/Base_model.php');

class Accounts_model extends Base_model
{

	public function __construct()
	{
		parent::__construct();
		$this->table_name = 'accounts';
	}

	public function get_type()
	{
		$username = $this->session->userdata('username');
		$this->db->select('*');
		$this->db->from($this->table_name);
		$this->db->where('username', $username);
		$this->db->where('deleted_at', NULL);
		$query = $this->db->get();
		$account = $query->first_row();
		return ($account === NULL ? NULL : $account->auth);
	}
	public function update_password($id, $password)
	{
		$this->db->where('id', $id);
		return $this->db->update($this->table_name, ['password' => $password]);
	}
	
	/**
     * ログインする
     *
     * @param $username
     * @param $password
     */
	public function login($username, $password)
	{
		$this->db->select('*');
		$this->db->from($this->table_name);

		$this->db->where('username', $username);
		$this->db->where('password', $password);
		$this->db->where('deleted_at', NULL);

		$result = $this->db->get();

		$this->db->trans_complete();
		if ( ! $result)
		{
			log_message('error', $this->db->error()['message']);
			return FALSE;
		}
		if (count($result->result()) === 0)
		{
			return FALSE;
		}
		return $result->result()[0];
	}

	public function check_username_exists($username)
	{
		$this->db->select('account_id');
		$this->db->from($this->table_name);
		$this->db->where('username', $username);
		$query = $this->db->get();

		return (count($query->result_array()) > 0);
	}

	public function count_all()
	{
		$this->db->where('deleted_at',null);
		$this->db->from($this->table_name);
		return $this->db->count_all_results();
	}

	public function count_by_keyword($keyword)
	{
		$this->db->where('deleted_at',null);
		$this->db->like('username',$keyword);
		$this->db->from($this->table_name);
		return $this->db->count_all_results();
	}

	public function get_list($limit,$start,$keyword)
	{
		$this->db->limit($limit,$start);
		$this->db->where('deleted_at',null);
		$this->db->like('username',$keyword);
		$result = $this->db->get($this->table_name);
		if ( ! $result)
		{
			log_message('error', $this->db->error()['message']);
			return FALSE;
		}
		if (count($result->result()) === 0)
		{
			return FALSE;
		}
		return $result->result_array();
	}

	public function get_account_by_id($account_id)
	{
		$this->db->select('*');
		$this->db->from($this->table_name);
		$this->db->where('account_id',$account_id);
		$this->db->where('deleted_at',null);
		$result = $this->db->get();
		$this->db->trans_complete();
		if ( !$result)
		{
			log_message('error', $this->db->error()['message']);
			return FALSE;
		}
		if (count($result->result()) === 0)
		{
			return FALSE;
		}
		return $result->result_array()[0];
	}

	public function insert_account($account)
	{
		$account['created_at'] = date('Y-m-d H:i:s');
		$query = $this->db->insert_string($this->table_name,$account);
		$result = $this->db->query($query);
		if ( ! $result)
		{
			throw new Exception($this->db->error()['message']);
		}
		return $this->db->insert_id();
	}

	public function update_account($account)
	{
		$account['updated_at'] = date('Y-m-d H:i:s');
		$this->db->trans_start();
		$this->db->where('account_id', $account['account_id']);
		$this->db->update($this->table_name, $account);
		$this->db->trans_complete();
		return $this->db->trans_status();
	}

	public function delete_account($delete_id)
	{
		$this->db->trans_start();
		$this->db->where('account_id', $delete_id);
		$this->db->update($this->table_name, ['deleted_at'=>date('Y-m-d H:i:s')]);
		$this->db->trans_complete();
		return $this->db->trans_status();
	}
}
