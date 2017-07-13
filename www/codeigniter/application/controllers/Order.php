<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 発注
 */
class Order extends MY_Controller 
{
	public function index()
	{
		$this->load->view('header');
		$this->render_menu('order');
		$this->load->view('order/index', $this->data);
		$this->load->view('footer');
	}
	
	public function order_status()
	{
		$this->load->view('header');
		$this->render_menu('order');
		$this->load->view('order/order_status', $this->data);
		$this->load->view('footer');
	}
}
