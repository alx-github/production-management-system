<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stock extends MY_Controller
{	
	public function __construct()
	{
		parent::__construct();
		$this->check_admin_account();
	}

	public function index()
	{
		$keyword = $this->input->get('keyword');
		$receive_order_customer_id = $this->input->get('receive_order_customer_id');
		$send_order_customer_id = $this->input->get('send_order_customer_id');

		$count = $this->materials_model->count_by_filter($receive_order_customer_id, $send_order_customer_id, $keyword);
		$this->load_pagination('/master/stock?receive_order_customer_id='.$receive_order_customer_id.'&send_order_customer_id='.$send_order_customer_id.'&keyword='.$keyword, $count);
		$start = $this->get_start_value();
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
		if ($this->validate_form() !== TRUE)
		{
			$this->render_form_material();
			return;
		}
		$this->db->trans_start();
		$this->materials_model->insert_data($this->data['material']);
		$this->db->trans_complete();
		if ($this->db->trans_status() !== FALSE)
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
		if (!$material_id)
		{
			redirect('/master/stock');
		}
		$this->data['material'] = $this->materials_model->get_by_id($material_id);
		if (!empty($this->data['material']))
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
		if ($this->validate_form() !== TRUE)
		{
			$this->render_form_material();
			return;
		}
		$this->db->trans_start();
		$this->materials_model->update_data($this->data['material']['material_id'], $this->data['material']);
		$this->db->trans_complete();
		if ($this->db->trans_status() !== FALSE)
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
		if (empty($delete_id))
		{
			redirect('/master/stock');
		}
		$this->db->trans_start();
		$this->materials_model->delete($delete_id);
		$this->db->trans_complete();
		if ($this->db->trans_status() !== FALSE)
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
		$this->data['list_receive_customers'] = $this->customers_model->get_combo_datas(TRUE);
		$this->data['list_send_customers'] = $this->customers_model->get_combo_datas(FALSE);
		$this->load_view('master/stock/list', $this->data);
	
	}

	private function render_form_material()
	{
		$this->data['list_receive_customers'] = $this->customers_model->get_combo_datas(TRUE);
		$this->data['list_send_customers'] = $this->customers_model->get_combo_datas(FALSE);
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
			'unit'=> NULL,
			'display_type'=> NULL,
			'send_order_customer_id'=> NULL
		];
	}

	private function validate_form()
	{
		$this->form_validation->set_rules($this->materials_model->get_validation());
		if (!$this->form_validation->run())
		{
			$this->session->set_flashdata('error_message', validation_errors());
			return false;
		}
		return true;
	}
}
