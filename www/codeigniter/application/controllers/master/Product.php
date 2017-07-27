<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends MY_Controller 
{

	public function __construct()
	{
		parent::__construct();
		$this->check_admin_account();
	}

	public function index()
	{
		$customer_id = $this->input->get('customer_id');
		$keyword = $this->input->get('keyword');
		$order_by = $this->get_order_by();
		$count = $this->products_model->get_products_count($customer_id, $keyword);
		$this->data['customer_id'] 	= $customer_id;
		$this->data['keyword'] 		= $keyword;
		$this->load_pagination(site_url('/master/product?' . http_build_query($this->data)), $count);
		$start = $this->get_start_value();
		$this->data['products'] = $this->products_model->get_products($customer_id, $keyword, $this->pagination->per_page, $start, $order_by);
		$this->data['customers'] = $this->customers_model->get_combo_datas();
		$this->load_view('master/product/list', $this->data);
	}

	public function create()
	{
		$this->data['product'] = $this->create_empty_product();
		$this->render_form_product();
	}

	public function edit()
	{
		$product_id = $this->input->get('id');
		if(!$product_id)
		{
			redirect('/master/product');
		}
		$product = $this->products_model->get_by_id($product_id);
		if(!$product)
		{
			redirect('/master/product');
		}
		$product['product_materials'] = $this->materials_model->get_product_materials($product['product_id']);
		foreach ($product['product_materials'] as $key => $product_material)
		{
			$product['product_materials'][$key]['colors'] = $this->materials_model->get_color_combo_datas($product_material['part_number']);
		}
		$this->data['product'] = $product;
		$this->render_form_product();
	}

	public function insert_or_update()
	{
		if (!$this->is_post_request())
		{
			redirect('/master/product');
		}
		$this->data['product'] = $this->create_form_product();
		$product_id = $this->data['product']['product_id'] ?? NULL;
		$is_insert = empty($product_id);
		if($this->validate_form() !== TRUE)
		{
			$this->render_form_product();
			return;
		}
		$this->db->trans_start();
		if ($is_insert)
		{
			$product_id = $this->products_model->insert_data($this->create_modal_product($this->data['product']));
		}
		else
		{
			$this->products_model->update_data($product_id, $this->create_modal_product($this->data['product']));
		}
		$this->product_materials_model->delete_by_product_id($product_id);
		foreach ($this->data['product']['product_materials'] as $product_material)
		{
			$this->product_materials_model->insert_data([
				'product_id'     => $product_id,
				'material_id'    => $product_material['material_id'],
				'required_scale' => $product_material['required_scale']
			]);
		}
		$this->db->trans_complete();
		if($this->db->trans_status() !== FALSE)
		{
			$this->session->set_flashdata('message', $is_insert ? '商品を作成しました' : '商品情報を更新しました');
			redirect('master/product');
		}
		$this->session->set_flashdata('error_message', $is_insert ? '商品を作成することができません' : '商品情報を更新することができません');
		$this->render_form_product();
	}

	public function delete()
	{
		if (!$this->is_post_request())
		{
			redirect('/master/product');
		}
		$product_id = $this->input->post('delete_id');
		if(!$product_id)
		{
			redirect('/master/product');
		}
		$this->db->trans_start();
		$this->products_model->delete($product_id);
		$this->db->trans_complete();
		if($this->db->trans_status() !== FALSE)
		{
			$this->session->set_flashdata('message', '商品を削除しました');
		}
		else
		{
			$this->session->set_flashdata('error_message', '商品を削除することができません');
		}
		redirect('/master/product');
	}

	private function render_form_product()
	{
		$this->data['customers'] = $this->customers_model->get_combo_datas();
		$this->data['part_numbers'] = $this->materials_model->get_part_number_combo_datas();
		$this->load_view('master/product/form', $this->data);
	}

	private function create_empty_product()
	{
		return [
			'product_id'				=> NULL,
			'category'					=> NULL,
			'name'						=> NULL,
			'part_number'				=> NULL,
			'display_type'				=> NULL,
			'unit'						=> NULL,
			'processing_fee'			=> NULL,
			'receive_order_customer_id'	=> NULL,
			'product_materials'			=> [],
		];
	}

	private function create_modal_product($form_data)
	{
		$product = $form_data;
		unset($product['product_materials']);
		return $product;
	}

	private function create_form_product()
	{
		$product = $this->input->post(NULL, TRUE);
		$product['product_materials'] = [];
		if (is_array($product['part_numbers'] ?? NULL))
		{
			foreach ($product['part_numbers'] as $key => $part_number)
			{
				$colors = [];
				$material = [];
				$material_id = $product['material_ids'][$key] ?? '';
				if (!empty($part_number))
				{
					$colors = $this->materials_model->get_color_combo_datas($part_number);
					if (!empty($material_id))
					{
						$material = $this->materials_model->get_by_id($material_id);
					}
				}
				$product['product_materials'][] = [
					'part_number'    => $part_number,
					'material_id'    => $material_id,
					'required_scale' => $product['required_scales'][$key] ?? '',
					'colors'         => $colors ?? [],
					'unit'           => $material['unit'] ?? '',
				];
			}
			unset($product['part_numbers']);
			unset($product['material_ids']);
			unset($product['required_scales']);
		}
		return $product;
	}

	private function validate_form()
	{
		$this->form_validation->set_rules($this->products_model->get_validation());
		$product = $this->input->post(NULL, TRUE);
		if (is_array($product['part_numbers'] ?? NULL))
		{
			foreach ($product['part_numbers'] as $key => $part_number)
			{
				$this->form_validation->set_rules($this->product_materials_model->get_validation($key));
			}
		}
		if(!$this->form_validation->run())
		{
			$this->session->set_flashdata('error_message', validation_errors());
			return FALSE;
		}
		return TRUE;
	}
}
