<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Production extends MY_Controller 
{
	public function index()
	{
		$this->load_view('production/index', $this->data);
	}
}
