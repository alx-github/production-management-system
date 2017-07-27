<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
require_once (BASEPATH . '../application/models/Base_model.php');

class Products_model extends Base_model
{

	public function __construct()
	{
		parent::__construct();
		$this->table_name = 'products';
		$this->primary_key_name = 'product_id';
	}

	public function get_validation()
	{
		$rules = [];
		$rules[] = ['field' => 'name', 'label' => '品名', 'rules' => 'trim|required|max_length[50]'];
		$rules[] = ['field' => 'part_number', 'label' => '品番', 'rules' => 'trim|max_length[50]'];
		$rules[] = ['field' => 'unit', 'label' => '単位', 'rules' => 'required'];
		$rules[] = ['field' => 'processing_fee', 'label' => '加工賃', 'rules' => 'trim|integer|max_length[9]'];
		return $rules;
	}

	public function get_products_count($customer_id = NULL, $keyword = NULL)
	{
		$this->db->from($this->table_name . ' AS P');
		$this->db->join('customers AS C', 'C.customer_id = P.receive_order_customer_id', 'LEFT');
		$this->db->where('P.deleted_at', NULL);
		$this->db->where('C.deleted_at', NULL);
		if ($customer_id)
		{
			$this->db->where('C.customer_id', $customer_id);
		}
		if ($keyword !== NULL)
		{
			$this->db->group_start();
			$this->db->or_like([
				'P.name' 		=> $keyword,
				'P.part_number' => $keyword
			]);
			$this->db->group_end();
		}
		return $this->db->count_all_results();
	}

	public function get_products($customer_id = NULL, $keyword = NULL, $limit = NULL, $offset = NULL, $order_by = NULL)
	{
		$this->db->select('P.*');
		$this->db->from($this->table_name . ' AS P');
		$this->db->join('customers AS C', 'C.customer_id = P.receive_order_customer_id', 'LEFT');
		$this->db->where('P.deleted_at', NULL);
		$this->db->where('C.deleted_at', NULL);
		if ($customer_id)
		{
			$this->db->where('C.customer_id', $customer_id);
		}
		if ($keyword !== NULL)
		{
			$this->db->group_start();
			$this->db->or_like([
				'P.name' 		=> $keyword,
				'P.part_number' => $keyword
			]);
			$this->db->group_end();
		}
		if ($order_by !== NULL)
		{
			$this->db->order_by($order_by);
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
}
