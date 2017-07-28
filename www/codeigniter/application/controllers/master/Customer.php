<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends MY_Controller 
{
	public function index()
	{
		$keyword = $this->input->get('keyword');
		$order_by = $this->get_order_by();
		$this->data['keyword'] = $keyword;
		$url = 'master/customer/index?' . http_build_query($this->data);
		
		$offset = is_null($this->input->get('start')) ? 0 : $this->input->get('start');
		$limit = $this->pagination->per_page;
		$this->data['customers'] = $this->get_datas($keyword, $limit, $offset, $order_by);
		$this->load_pagination(site_url($url), count($this->get_datas($keyword)));
		
		$this->load_view('master/customer/list', $this->data);
	}
	
	private function render_form()
	{
		$this->load_view('master/customer/form', $this->data);
	}
	
	private function get_datas($keyword = NULL, $limit = NULL, $offset = NULL, $order_by = NULL)
	{
		return $this->customers_model->get_datas($keyword, $limit, $offset, $order_by);
	}
	
	/**
	 * 画面を表示
	 *
	 * @param $id
	 */
	public function show_form($id = NULL)
	{
		$this->create_data($id);
		$this->render_form();
	}
	
	private function create_data($id)
	{
		if (is_null($id))
		{
			$this->data['customer_id'] = NULL;
			$this->data['name'] = NULL;
			$this->data['contact'] = NULL;
			$this->data['postal_code'] = NULL;
			$this->data['address_1'] = NULL;
			$this->data['address_2'] = NULL;
			$this->data['phone_number'] = NULL;
			$this->data['email_1'] = NULL;
			$this->data['email_2'] = NULL;
			$this->data['display_type'] = NULL;
			$this->data['memo'] = NULL;
		}
		else
		{
			$data = $this->customers_model->get_by_id($id);
			$this->data['customer_id'] = $data['customer_id'];
			$this->data['name'] = $data['name'];
			$this->data['contact'] = $data['contact'];
			$this->data['postal_code'] = $this->show_postal_code($data['postal_code']);
			$this->data['address_1'] = $data['address_1'];
			$this->data['address_2'] = $data['address_2'];
			$this->data['phone_number'] = $data['phone_number'];
			$this->data['email_1'] = $data['email_1'];
			$this->data['email_2'] = $data['email_2'];
			$this->data['display_type'] = $data['display_type'];
			$this->data['memo'] = $data['memo'];
		}
	}
	
	/**
	 * データの削除
	 */
	public function delete()
	{
		try
		{
			$this->db->trans_start();
			$id = $this->input->post('delete_id');
			$this->customers_model->delete($id);
			$this->db->trans_complete();
			if ($this->db->trans_status() !== FALSE)
			{
				$this->session->set_flashdata('message', "取引先を削除しました");
				redirect('master/customer');
			}
			else
			{
				$this->session->set_flashdata('error_message', "取引先を削除することができません");
			}
		}
		catch (Exception $ex)
		{
			$this->session->set_flashdata('error_message', "取引先を削除することができません");
		}
	}
	
	/**
	 * データの更新／追加
	 */
	public function save()
	{
		try
		{
			$id = $this->input->post('customer_id');
			$this->form_validation->set_rules($this->customers_model->get_validation());
			
			$data = $this->input->post();
			// 郵便番号
			$postal_code = $data['postal_code'];
			$data['postal_code'] = str_replace('-', '', $postal_code);
			
			$this->data = $data;
			$this->data['customer_id'] = $id;
			
			if (!$this->form_validation->run())
			{
				$this->session->set_flashdata('error_message', validation_errors());
				$this->render_form();
				return;
			}
			if (empty($id) OR is_null($id))
			{
				$this->customers_model->insert_data($data);
				$this->session->set_flashdata('message', "取引先を作成しました");
			}
			else
			{
				$this->customers_model->update_data($id, $data);
				$this->session->set_flashdata('message', "取引先情報を更新しました");
			}
			redirect('master/customer');
		}
		catch (Exception $ex)
		{
			$this->session->set_flashdata('error_message', "取引先を更新することができません");
		}
	}
	
	private function show_postal_code($value)
	{
		return preg_replace('/^(\d{3})(\d{4})$/', '$1-$2', $value);
	}
}
