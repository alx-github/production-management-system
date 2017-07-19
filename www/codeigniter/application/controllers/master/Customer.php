<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends MY_Controller 
{
	public function index()
	{
		$this->load_view('master/customer/list', $this->data);
	}
	
	public function create()
	{
		$this->load_view('master/customer/form', $this->data);
	}
	
	public function update()
	{
		$this->load_view('master/customer/form', $this->data);
	}
	
	public function delete()
	{
		redirect('master/customer');
	}
	
	public function save()
	{
		redirect('master/customer');
	}
	
	public function search()
	{
		redirect('master/customer');
	}
}
