<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Receive extends MY_Controller 
{
	public function index()
	{
		$this->load->view('header');
		$this->render_menu('receive');
		$this->load->view('receive/index', $this->data);
		$this->load->view('footer');
	}
}
