<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stock extends MY_Controller 
{
	public function index()
	{
		$this->load_view('stock/index', $this->data);
	}
}
