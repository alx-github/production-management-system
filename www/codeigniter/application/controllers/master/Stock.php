<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stock extends MY_Controller 
{	
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->render_list_stock();
	}

	public function create()
	{
		$this->load_view('master/stock/form', $this->data);
	}

	public function insert()
	{
		redirect('/master/stock');
	}

	public function edit()
	{
		$this->load_view('master/stock/form', $this->data);
	}

	public function delete()
	{
		redirect('master/stock');
	}

	private function render_list_stock()
	{
		$this->load_view('master/stock/list', $this->data);
	}
}
