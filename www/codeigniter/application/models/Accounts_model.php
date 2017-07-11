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
		$login_id = $this->session->userdata('login_id');
		$this->db->select('*');
		$this->db->from($this->table_name);
		$this->db->where('login_id', $login_id);
		$this->db->where('deleted_at', NULL);
		$query = $this->db->get();
		$account = $query->first_row();
		return ($account === NULL ? NULL : $account->type);
	}

	public function update_last_login($id)
	{
		$this->db->where('id', $id);
		return $this->db->update($this->table_name, ['last_login' => date('Y-m-d H:i:s')]);
	}

	public function update_password($id, $password)
	{
		$this->db->where('id', $id);
		return $this->db->update($this->table_name, ['password' => $password]);
	}
	
	/**
     * ログインする
     *
     * @param $login_id
     * @param $password
     */
	public function login($login_id, $password)
	{
		$this->db->select('*');
		$this->db->from($this->table_name);

		$this->db->where('login_id', $login_id);
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
		$update_result = $this->update_last_login($result->result()[0]->id);
		if (! $update_result)
		{
			return FALSE;
		}
		return $result->result()[0];
	}

	public function check_login_id_exists($login_id)
	{
		$this->db->select('id');
		$this->db->from($this->table_name);
		$this->db->where('login_id', $login_id);
		$query = $this->db->get();

		return (count($query->result_array()) > 0);
	}
}
