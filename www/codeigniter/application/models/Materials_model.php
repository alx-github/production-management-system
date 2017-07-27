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

	public function get_validation()
	{
		$rules = [];
		$rules[] = ['field' => 'part_number', 'label' => '品番', 'rules' => 'trim|required|max_length[50]'];
		$rules[] = ['field' => 'unit', 'label' => '単位', 'rules' => 'required'];
		$rules[] = ['field' => 'send_order_customer_id', 'label' => '発注先', 'rules' => 'required'];
		$rules[] = ['field' => 'color_number_code', 'label' => '色番.コード', 'rules' => 'max_length[20]'];
		$rules[] = ['field' => 'color_number_tint', 'label' => '色番.色合い', 'rules' => 'max_length[50]'];
		$rules[] = ['field' => 'spec', 'label' => '仕様', 'rules' => 'max_length[100]'];

		return $rules;
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

	public function get_part_number_combo_datas()
	{
		$where = ['display_type' => MATERIAL_DISPLAY];
		return $this->get_by_condition($where, NULL, 'part_number', TRUE);
	}

	public function get_color_combo_datas($part_number)
	{
		$where = [
			'part_number'  => $part_number,
			'display_type' => MATERIAL_DISPLAY
		];
		return $this->get_by_condition($where, NULL, ['material_id', 'CONCAT(color_number_code, ": ", color_number_tint) AS color'], TRUE);
	}

	public function get_product_materials($product_id)
	{
		$this->db->select('M.*, PM.required_scale');
		$this->db->from($this->table_name . ' AS M');
		$this->db->join('product_materials AS PM', 'PM.material_id = M.material_id', 'INNER');
		$this->db->where([
			'M.deleted_at'   => NULL,
			'M.display_type' => MATERIAL_DISPLAY,
			'PM.deleted_at'  => NULL,
			'PM.product_id'  => $product_id,
		]);
		$result = $this->db->get();
		return $result->result_array();
	}
}
