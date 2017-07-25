<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
require_once (BASEPATH . '../application/models/Base_model.php');
class Materials_model extends Base_model
{

	public function __construct()
	{
		parent::__construct();
		$this->table_name = 'materials';
		$this->primary_key_name = 'material_id';
	}

	public function count_by_filter($receive_order_customer_id = NULL, $send_order_customer_id = NULL, $keyword = NULL)
	{
		$where_clause = NULL;
		if(!empty($receive_order_customer_id))
		{
			$where_clause['receive_order_customer_id'] = $receive_order_customer_id;
		}
		if(!empty($send_order_customer_id))
		{
			$where_clause['send_order_customer_id'] = $send_order_customer_id;
		}
		$like_clause = $this->create_like_clause($keyword);
		return $this->get_list_count($where_clause, $like_clause);
	}

	public function get_list_material($receive_order_customer_id = NULL, $send_order_customer_id = NULL, $keyword = NULL, $limit = NULL, $start = NULL)
	{
		$where_clause = NULL;
		if(!empty($receive_order_customer_id))
		{
			$where_clause['receive_order_customer_id'] = $receive_order_customer_id;
		}
		if(!empty($send_order_customer_id))
		{
			$where_clause['send_order_customer_id'] = $send_order_customer_id;
		}
		$like_clause = $this->create_like_clause($keyword);
		return $this->get_list($where_clause, $like_clause, $limit, $start);
	}

	private function create_like_clause($keyword = NULL)
	{
		return [
			'spec' => $keyword,
			'color_number_code' => $keyword,
			'color_number_tint' => $keyword,
			'part_number' => $keyword
		];
	}
}