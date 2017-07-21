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
	public function get_by_id($id, $has_delete_column = TRUE)
	{
		return $this->get_one_by_condition([$this->primary_key_name => $id], $has_delete_column);
	}

	public function get_one_by_condition($where, $has_delete_column = TRUE)
	{
		$this->db->select('*');
		$this->db->from($this->table_name);
		$this->db->where($where);
		if ($has_delete_column)
		{
			$this->db->where('deleted_at', NULL);
		}
		$this->db->limit(1);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function get_by_condition($where, $order_by = NULL, $has_delete_column = TRUE)
	{
		$this->db->select('*');
		$this->db->from($this->table_name);
		$this->db->where($where);
		if ($has_delete_column)
		{
			$this->db->where('deleted_at', NULL);
		}
		if ($order_by !== NULL)
		{
			$this->db->order_by($order_by);
		}
		$query = $this->db->get();
		return $query->result_array();
	}
	
	public function get_list_count($where = [], $like = [], $has_delete_column = TRUE)
	{
		$this->db->from($this->table_name);
		if ($has_delete_column)
		{
			$this->db->where('deleted_at', NULL);
		}
		if ($where != NULL)
		{
			$this->db->where($where);
		}
		if ($like != NULL)
		{
			$this->db->like($like);
		}
		return $this->db->count_all_results();
	}
	
	public function get_list($where = NULL, $like = NULL, $limit = NULL, $offset = NULL, $order_by = NULL, $has_delete_column = TRUE)
	{
		$this->db->select('*');
		$this->db->from($this->table_name);
		if ($has_delete_column)
		{
			$this->db->where('deleted_at', NULL);
		}
		if ($where != NULL)
		{
			$this->db->where($where);
		}
		if ($like != NULL)
		{
			$this->db->like($like);
		}
		if ($limit !== NULL)
		{
			$this->db->limit($limit);
		}
		if ($offset !== NULL)
		{
			$this->db->offset($offset);
		}
		if ($order_by !== NULL)
		{
			$this->db->order_by($order_by);
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
		$data['created_at'] = date(DATE_FORMAT_DEFAULT);
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
		$update_data['updated_at'] = date(DATE_FORMAT_DEFAULT);
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
		return $this->db->update($this->table_name, ['deleted_at' => date(DATE_FORMAT_DEFAULT)]);
	}
}
