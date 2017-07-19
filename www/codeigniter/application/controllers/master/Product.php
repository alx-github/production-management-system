<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends MY_Controller 
{
	public function index()
	{
		$this->load_view('master/product/list', $this->data);
	}
	
	public function create()
	{
		$this->load_view('master/product/form', $this->data);
	}

	public function edit($id)
	{
		$this->load_view('master/product/form', $this->data);
	}
}
