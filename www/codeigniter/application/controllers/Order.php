<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 発注
 */
class Order extends MY_Controller 
{
	public function index()
	{
		$this->load_view('order/index', $this->data);
	}
	
	public function order_status()
	{
		$this->data['referer_url'] = $_SERVER['HTTP_REFERER'];
		$this->load_view('order/order_status', $this->data);
	}
	
	public function delete()
	{
		redirect('order');
	}
	
	public function search()
	{
		redirect('order');
	}
	
	public function back()
	{
		$referer_url = $this->input->post('referer_url');
		if (strpos($referer_url, 'receive/save_confirm') !== false)
		{
			redirect('receive/save_confirm');
		}
		if (strpos($referer_url, 'receive') !== false)
		{
			redirect('receive');
		}
		if (strpos($referer_url, 'order') !== false)
		{
			redirect('order');
		}
	}
}
