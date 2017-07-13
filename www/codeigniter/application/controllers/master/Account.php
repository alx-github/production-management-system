<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends MY_Controller 
{	
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->render_list_account();
	}

	public function create()
	{
		$this->load->view('header');
		$this->render_menu('master');
		$this->load->view('master/account/form');
		$this->load->view('footer');
	}

	public function insert()
	{
		redirect('/master/account');
		return;
	}

	public function edit()
	{
		$this->load->view('header');
		$this->render_menu('master');
		$this->load->view('master/account/form');
		$this->load->view('footer');
	}

	public function delete()
	{
		redirect('/master/account');
	}

	private function render_list_account()
	{
		$this->load->view('header');
		$this->render_menu('master');
		$this->load->view('master/account/list');
		$this->load->view('footer');
	}
}
