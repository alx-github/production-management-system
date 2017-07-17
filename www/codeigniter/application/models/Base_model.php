<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Base_model extends CI_Model
{

	protected $table_name = '';

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
		$this->db->where('id', $id);
		$query = $this->db->get();
		return $query->first_row();
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
	public function update_data($id_column_name = "id",$id, $update_data)
	{
		$this->db->trans_start();
		$this->db->where($id_column_name, $id);
		$this->db->update($this->table_name, $update_data);
		
		$this->db->trans_complete();
		
		return $this->db->trans_status();
	}

	/**
	 *
	 * @param $id
	 */
	public function delete($id_column_name, $id)
	{
		$this->db->trans_start();
		
		$this->db->where($id_column_name, $id);
		$this->db->update($this->table_name, ['deleted_at' => date('Y-m-d H:i:s')]);

		$this->db->trans_complete();

		return $this->db->trans_status();
	}
}
