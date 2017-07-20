<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stock extends MY_Controller
{	
	public function __construct()
	{
		parent::__construct();
		$this->force_admin();
	}

	public function index()
	{
		$keyword = $this->input->get('keyword');
		$receive_order_customer_id = $this->input->get('receive_order_customer_id');
		$send_order_customer_id = $this->input->get('send_order_customer_id');

		$count = $this->materials_model->count_by_filter($receive_order_customer_id, $send_order_customer_id, $keyword);
		$this->load_pagination('/master/stock?receive_order_customer_id='.$receive_order_customer_id.'&send_order_customer_id='.$send_order_customer_id.'&keyword='.$keyword, $count);
		$start = $this->input->get('start');
		if($start > $this->pagination->get_last_page_start())
		{
			$start = $this->pagination->get_last_page_start();	
		}
		$this->data['list_materials'] = $this->materials_model->get_list_material($receive_order_customer_id, $send_order_customer_id, $keyword, $this->pagination->per_page, $start);
		$this->data['keyword'] = $keyword;
		$this->data['receive_order_customer_id'] = $receive_order_customer_id;
		$this->data['send_order_customer_id'] = $send_order_customer_id;
		$this->render_list_material();
	}

	public function create()
	{
		$this->data['material'] = $this->create_empty_material();
		$this->render_form_material();
	}

	public function insert()
	{
		$this->data['material'] = $this->input->post();
		if($this->validate_form() !== TRUE)
		{
			$this->render_form_material();
			return;
		}
		$new_material_id = $this->materials_model->insert_data($this->data['material']);
		if($new_material_id)
		{
			$this->session->set_flashdata('message', '材料を作成しました');
		}
		else
		{
			$this->session->set_flashdata('error_message', '材料を作成することができません');
		}
		redirect('/master/stock');
	}

	public function edit()
	{
		$material_id = $this->input->get('id');
		if(!$material_id)
		{
			redirect('/master/stock');
		}
		$this->data['material'] = $this->materials_model->get_by_id($material_id);
		if(!empty($this->data['material']))
		{
			$this->render_form_material();
		}
		else
		{
			redirect('/master/stock');
		}
	}

	public function update()
	{
		$this->data['material'] = $this->input->post();
		if($this->validate_form() !== TRUE)
		{
			$this->render_form_material();
			return;
		}
		$update_result = $this->materials_model->update_data($this->data['material']['material_id'], $this->data['material']);
		if($update_result)
		{
			$this->session->set_flashdata('message', '材料情報を更新しました');
		}
		else
		{
			$this->session->set_flashdata('error_message', '材料情報を更新することができません');
		}
		redirect('/master/stock');
	}

	public function delete()
	{
		$delete_id = $this->input->post('id');
		if(empty($delete_id))
		{
			redirect('/master/stock');
		}
		$result = $this->materials_model->delete($delete_id);
		if($result)
		{
			$this->session->set_flashdata('message', '材料を削除しました');
		}
		else
		{
			$this->session->set_flashdata('error_message', '材料を削除することができません');
		}
		redirect('/master/stock');
	}

	private function render_list_material()
	{
		$this->data['list_customers'] = $this->customers_model->get_list();
		$this->load_view('master/stock/list', $this->data);
	
	}

	private function render_form_material()
	{
		$this->data['list_customers'] = $this->customers_model->get_list();
		$this->load_view('master/stock/form', $this->data);
	}

	private function create_empty_material()
	{
		return [
			'material_id'=> NULL,
			'receive_order_customer_id'=> NULL,
			'category'=> NULL,
			'part_number'=> NULL,
			'color_number_code'=> NULL,
			'color_number_tint'=> NULL,
			'spec'=> NULL,
			'display_type'=> NULL,
			'send_order_customer_id'=> NULL
		];
	}

	private function validate_form()
	{
		$this->form_validation->set_rules('part_number', '品番', 'trim|required|regex_match[/^[a-zA-Z0-9_\-]+$/]');
		$this->form_validation->set_rules('unit', '単位', 'trim|required|regex_match[/^[a-zA-Z0-9_\-]+$/]');
		$this->form_validation->set_rules('send_order_customer_id', '発注先', 'trim|required|regex_match[/^[a-zA-Z0-9_\-]+$/]');
		if(!$this->form_validation->run())
		{
			$this->session->set_flashdata('error_message', validation_errors());
			return false;
		}
		return true;
	}
}
