<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
require_once (BASEPATH . '../application/models/Base_model.php');

class Product_materials_model extends Base_model
{

	public function __construct()
	{
		parent::__construct();
		$this->table_name = 'product_materials';
		$this->primary_key_name = 'product_material_id';
	}
	
	public function get_validation($row)
	{
		$rules = [];
		$rules[] = ['field' => 'part_numbers[' . $row . ']', 'label' => '品番', 'rules' => 'trim|required'];
		$rules[] = ['field' => 'material_ids[' . $row . ']', 'label' => '色番', 'rules' => 'trim|required'];
		$rules[] = ['field' => 'required_scales[' . $row . ']', 'label' => '要尺', 'rules' => 'trim|required|numeric'];
		return $rules;
	}

	public function delete_by_product_id($product_id)
	{
		$this->db->where(['product_id' => $product_id]);
		return $this->db->delete($this->table_name);
	}

}
