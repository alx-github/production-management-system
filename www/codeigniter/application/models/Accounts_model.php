<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
require_once (BASEPATH . '../application/models/Base_model.php');

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
		$account = $this->get_one_by_condition(['username' => $username]);
		return $account['auth'] ?? NULL;
	}

	/**
     * ログインする
     *
     * @param $username
     * @param $password
     */
	public function login($username, $password)
	{
		$condition = [
			'username' => $username,
			'password' => $password
		];
		$result = $this->get_by_condition($condition);
		if (count($result) === 0)
		{
			return FALSE;
		}
		return $result[0];
	}

	public function check_username_exists($username)
	{
		$result = $this->get_by_condition(['username' => $username], FALSE);
		return (count($result) > 0);
	}

	public function count_by_keyword($keyword = NULL)
	{
		return $this->get_list_count(NULL, ['username' => $keyword]);
	}

	public function get_list_account($keyword = NULL, $limit = NULL, $start = NULL)
	{
		return $this->get_list(NULL, ['username' => $keyword], $limit, $start);
	}
}
