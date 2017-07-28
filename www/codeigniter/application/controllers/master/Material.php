<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Material extends MY_Controller
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
		$order_by = $this->get_order_by();
		$count = $this->materials_model->count_by_filter($receive_order_customer_id, $send_order_customer_id, $keyword);
		$params = [
			'receive_order_customer_id' => $receive_order_customer_id,
			'send_order_customer_id'	=> $send_order_customer_id,
			'keyword'					=> $keyword
		];
		$this->load_pagination('/master/material?' . http_build_query($params), $count);
		$start = $this->get_start_value();
		$this->data['list_materials'] = $this->materials_model->get_list_material($receive_order_customer_id, $send_order_customer_id, $keyword, $this->pagination->per_page, $start, $order_by);
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
		if (!$this->is_post_request())
		{
			redirect('/master/material');
		}
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
		redirect('/master/material');
	}

	public function edit()
	{
		$material_id = $this->input->get('id');
		if (!$material_id)
		{
			redirect('/master/material');
		}
		$this->data['material'] = $this->materials_model->get_by_id($material_id);
		if (!empty($this->data['material']))
		{
			$this->render_form_material();
		}
		else
		{
			redirect('/master/material');
		}
	}

	public function update()
	{
		if (!$this->is_post_request())
		{
			redirect('/master/material');
		}
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
		redirect('/master/material');
	}

	public function delete()
	{
		if (!$this->is_post_request())
		{
			redirect('/master/material');
		}
		$delete_id = $this->input->post('delete_id');
		if (empty($delete_id))
		{
			redirect('/master/material');
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
		redirect('/master/material');
	}

	private function render_list_material()
	{
		$this->data['list_receive_customers'] = $this->customers_model->get_combo_datas(TRUE);
		$this->data['list_send_customers'] = $this->customers_model->get_combo_datas(FALSE);
		$this->load_view('master/material/list', $this->data);
	
	}

	private function render_form_material()
	{
		$this->data['list_receive_customers'] = $this->customers_model->get_combo_datas(TRUE);
		$this->data['list_send_customers'] = $this->customers_model->get_combo_datas(FALSE);
		$this->load_view('master/material/form', $this->data);
	}

	private function create_empty_material()
	{
		return [
			'material_id'				=> NULL,
			'receive_order_customer_id'	=> NULL,
			'category'					=> NULL,
			'part_number'				=> NULL,
			'color_number_code'			=> NULL,
			'color_number_tint'			=> NULL,
			'spec'						=> NULL,
			'unit'						=> NULL,
			'display_type'				=> NULL,
			'send_order_customer_id'	=> NULL
		];
	}

	private function validate_form()
	{
		$this->form_validation->set_rules($this->materials_model->get_validation());
		if (!$this->form_validation->run())
		{
			$this->session->set_flashdata('error_message', validation_errors());
			return FALSE;
		}
		return TRUE;
	}
}
