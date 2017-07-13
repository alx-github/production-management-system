<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stock extends MY_Controller 
{
	public function index()
	{
		$this->load->view('header');
		$this->render_menu('stock');
		$this->load->view('stock/index', $this->data);
		$this->load->view('footer');
	}
}
