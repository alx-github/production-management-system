<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
require (BASEPATH . '../application/models/Base_model.php');

class Accounts_model extends Base_model
{

	public function __construct()
	{
		parent::__construct();
		$this->table_name = 'accounts';
		$this->primary_key_name = 'account_id';
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

	public function count_by_keyword($keyword = NULL)
	{
		$this->db->where('deleted_at',null);
		$this->db->like('username',$keyword);
		$this->db->from($this->table_name);
		return $this->db->count_all_results();
	}

	public function get_list($limit,$start,$keyword = NULL)
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
}
