<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shipping extends MY_Controller 
{
	public function index()
	{
		$this->load->view('header');
		$this->render_menu('production');
		$this->load->view('shipping/index', $this->data);
		$this->load->view('footer');
	}
}
