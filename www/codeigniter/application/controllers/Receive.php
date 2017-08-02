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

	private function draw_page_number()
	{
		$canvas = $this->pdf->get_canvas();
		$font = NULL;
		$size = 15;
		$color = array(0, 0, 0);
		$canvas->page_text(400, 10, ("{PAGE_NUM}" < 10) ? "伝票番号:  00000000-0{PAGE_NUM}" : "伝票番号:  00000000-{PAGE_NUM}", $font, $size, $color);
		$canvas->page_text(400, 40, "発行日付:  2017年12月31日", $font, $size, $color);
	}

	private function render_pdf()
	{
		$this->pdf->set_base_path("../html/assets/css/");
		$this->pdf->set_option('enable_font_subsetting', TRUE);
		$this->data['count'] = 11;
		$this->load->view('receive/pdf_default',$this->data);
		$this->data['count'] = 10;
		$this->load->view('receive/pdf_default',$this->data);
		$this->data['count'] = 5;
		$this->load->view('receive/pdf_default',$this->data);
		$this->pdf->load_html($this->output->get_output());
		$this->pdf->render();
		$this->draw_page_number();
		$pdf_output = $this->pdf->output();
		$pdfroot = dirname(dirname(__FILE__)) . '/third_party/pdf/' . date('Ymdhis') . '.pdf';
		$file = file_put_contents($pdfroot, $pdf_output);
		// $this->pdf->stream(date('Ymdhis') . '.pdf');
		return $pdfroot;
	}

	private function send_mail($link_file = NULL)
	{
		$config = $this->config->item('email');
		$this->email->initialize($config);
		$this->email->from($config['from']);
		$this->email->to($config['to']);
		$this->email->subject($config['subject']);
		$this->email->message($config['message']);
		if($link_file)
		{
			$this->email->attach($link_file);
		}
		if ( ! $this->email->send())
		{
			$this->session->set_flashdata('error_message', 'Sending email fail');
		}
		else
		{
			$this->session->set_flashdata('message', 'Sending email success');
		}
	}

	/**
	 * 発注書PDF
	 */
	public function create_pdf()
	{
		$this->render_pdf();
		redirect('/receive/save_confirm');
	}
	
	/**
	 * 発注書PDFを送信する
	 */
	public function create_pdf_send_mail()
	{
		$this->send_mail($this->render_pdf());
		redirect('receive/save_confirm');
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
