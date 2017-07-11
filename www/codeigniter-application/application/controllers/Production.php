<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Production extends MY_Controller 
{
	public function index()
	{
		$this->load->view('header');
		$this->render_menu('production');
		$this->load->view('production/index', $this->data);
		$this->load->view('footer');
	}
}
