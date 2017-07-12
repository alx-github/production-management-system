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
		$this->load->view('header');
		$this->render_menu('');
		$this->load->view('master/stock/form');
		$this->load->view('footer');
	}

	public function insert()
	{
		redirect('/master/stock');
	}
	public function edit()
	{
		$this->load->view('header');
		$this->render_menu('');
		$this->load->view('master/stock/form');
		$this->load->view('footer');
	}
	public function delete()
	{
		redirect('master/stock');
	}

	private function render_list_stock()
	{
		$this->load->view('header');
		$this->render_menu('');
		$this->load->view('master/stock/list');
		$this->load->view('footer');
	}
}
