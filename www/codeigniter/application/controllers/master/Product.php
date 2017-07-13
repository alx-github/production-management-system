<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends MY_Controller 
{
	public function index()
	{
		$this->load->view('header');
		$this->render_menu('master');
		$this->load->view('master/product/list', $this->data);
		$this->load->view('footer');
	}
	
	public function create()
	{
		$this->load->view('header');
		$this->render_menu('master');
		$this->load->view('master/product/form', $this->data);
		$this->load->view('footer');
	}

	public function edit($id)
	{
		$this->load->view('header');
		$this->render_menu('master');
		$this->load->view('master/product/form', $this->data);
		$this->load->view('footer');
	}
}
