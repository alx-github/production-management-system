<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shipping extends MY_Controller 
{
	public function index()
	{
		$this->load_view('shipping/index', $this->data);
	}
}
