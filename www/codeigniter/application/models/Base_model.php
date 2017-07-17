<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Base_model extends CI_Model
{

	protected $table_name = '';
	protected $primary_key_name = '';

	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * idで取得する
	 *
	 * @param $id
	 */
	public function get_by_id($id)
	{
		$this->db->select('*');
		$this->db->from($this->table_name);
		$this->db->where($this->primary_key_name, $id);
		$this->db->where('deleted_at',null);
		$query = $this->db->get();
		return $query->result_array()[0];
	}
	
	public function get_all($limit = NULL, $offset = NULL, $has_delete_column = TRUE)
	{
		$this->db->select('*');
		$this->db->from($this->table_name);
		if ($has_delete_column)
		{
			$this->db->where('deleted_at', NULL);
		}
		if ($limit !== NULL)
		{
			$this->db->limit($limit);
		}
		if ($offset !== NULL)
		{
			$this->db->offset($offset);
		}
		$result = $this->db->get();
		return $result->result_array();
	}

	/**
	 * データを登録する
	 *
	 * @param $data
	 * 
	 * @return 追加されたId
	 */
	public function insert_data($data)
	{
		$data['created_at'] = date('Y-m-d H:i:s');
		$query = $this->db->insert_string($this->table_name, $data);
		$result = $this->db->query($query);
		if ( ! $result)
		{
			throw new Exception($this->db->error()['message']);
		}
		return $this->db->insert_id();
	}
	
	/**
	 * データを更新する。
	 *
	 * @param $id
	 * @param $update_data
	 */
	public function update_data($id, $update_data)
	{
		$update_data['updated_at'] = date('Y-m-d H:i:s');
		$this->db->where($this->primary_key_name, $id);
		return $this->db->update($this->table_name, $update_data);
	}

	/**
	 *
	 * @param $id
	 */
	public function delete($id)
	{
		$this->db->where($this->primary_key_name, $id);
		return $this->db->update($this->table_name, ['deleted_at' => date('Y-m-d H:i:s')]);
	}
}
