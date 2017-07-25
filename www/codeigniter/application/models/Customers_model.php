<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
require_once (BASEPATH . '../application/models/Base_model.php');

class Customers_model extends Base_model
{

	public function __construct()
	{
		parent::__construct();
		$this->table_name = 'customers';
		$this->primary_key_name = 'customer_id';
	}
	
	/**
	 * コンボデータの習得
	 * 
	 * @param $is_combo_customers
	 * TRUE: 取引先/ FALSE: 発注先
	 */
	public function get_combo_datas($is_combo_customers = TRUE) 
	{
		$this->db->select('customer_id, name');
		$this->db->from($this->table_name);
		$this->db->where('deleted_at', NULL);
		
		// 取引先
		if ($is_combo_customers)
		{
			$this->db->where_in('display_type', [1, 3]);
		}
		else // 発注先
		{
			$this->db->where_in('display_type', [2, 3]);
		}
		$this->db->order_by($this->primary_key_name, 'ASC');
		$result = $this->db->get();
		
		return $result->result_array();
	}
	
	/**
	 * 検索
	 * 
	 * @param $keyword
	 * @param $limit
	 * @param $offset
	 */
	public function get_datas($keyword = NULL, $limit = NULL, $offset = NULL)
	{
		$keyword = trim($keyword);
		
		$this->db->select('*');
		$this->db->from($this->table_name);
		$this->db->where('deleted_at', NULL);
		
		if ($keyword != NULL)
		{
			$this->db->group_start();
			$this->db->like('name', $keyword);
			$this->db->or_like('contact', $keyword);
			$this->db->or_like('postal_code', $keyword);
			$this->db->or_like('address_1', $keyword);
			$this->db->or_like('address_2', $keyword);
			$this->db->or_like('phone_number', $keyword);
			$this->db->or_like('email_1', $keyword);
			$this->db->or_like('email_2', $keyword);
			$this->db->or_like('memo', $keyword);
			$this->db->group_end();
		}
		if ($limit !== NULL)
		{
			$this->db->limit($limit);
		}
		if ($offset !== NULL)
		{
			$this->db->offset($offset);
		}
		$this->db->order_by('customer_id', 'ASC');

		$result = $this->db->get();
		return $result->result_array();
	}
	
	public function get_validation() 
	{
		$rules = [];
		$rules[] = ['field' => 'name', 'label' => '取引先名', 'rules' => 'required'];
		$rules[] = ['field' => 'postal_code', 'label' => '郵便番号', 'rules' => 'regex_match[/^\d{3}\-\d{4}$/]'];
		$rules[] = ['field' => 'phone_number', 'label' => '連絡先', 'rules' => 'is_natural|max_length[12]'];
		$rules[] = ['field' => 'email_1', 'label' => 'メールアドレス1', 'rules' => 'valid_email'];
		$rules[] = ['field' => 'email_2', 'label' => 'メールアドレス2', 'rules' => 'valid_email'];

		return $rules;
	}
}
