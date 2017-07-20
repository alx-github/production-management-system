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
}
