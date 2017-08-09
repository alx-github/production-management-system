<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Receive extends MY_Controller 
{
	public function index()
	{
		$this->load_view('receive/index', $this->data);
	}
	
	/**
	 * 受注フォーム
	 */
	public function form()
	{
		$this->load_view('receive/form', $this->data);
	}
	
	public function update($send_order_id)
	{
		$this->load_view('receive/form', $this->data);
	}
	
	/**
	 * 保存し在庫確認
	 */
	public function save_confirm()
	{
		$this->load_view('receive/stock_status_confirm', $this->data);
	}

	/**
	 * 発注書PDF
	 */
	public function create_pdf()
	{
		$file_path = $this->render_pdf('receive/pdf_sample', $this->get_pdf_view_data(), date('YmdHis'));
		force_download($file_path, NULL);
		return $file_path;
	}

	protected function get_pdf_view_data()
	{
		$this->data['count'] = 18;
		return $this->data;
	}
	/**
	 * 発注書PDFを送信する
	 */
	public function create_pdf_send_mail()
	{
		$file_path = $this->render_pdf('receive/pdf_sample', $this->get_pdf_view_data(), date('YmdHis'));
		$this->send_mail('tdlam123@gmail.com', $file_path);
		force_download($file_path, NULL);
	}
	
	public function delete()
	{
		redirect('receive');
	}
	
	/**
	 * 受注フォームの「保存する」
	 */
	public function save()
	{
		redirect('receive');
	}
	
	public function search()
	{
		redirect('receive');
	}
}
