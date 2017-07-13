<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends MY_Controller 
{
	public function index()
	{
		$this->load->view('header');
		$this->render_menu('customer');
		$this->load->view('master/customer/index', $this->data);
		$this->load->view('footer');
	}
	
	public function create()
	{
		$this->load->view('header');
		$this->render_menu('customer');
		$this->load->view('master/customer/form', $this->data);
		$this->load->view('footer');
	}
	
	public function update()
	{
		$this->load->view('header');
		$this->render_menu('customer');
		$this->load->view('master/customer/form', $this->data);
		$this->load->view('footer');
	}
}
