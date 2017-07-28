<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

	public function generate_password()
	{
		$this->output->set_header('HTTP/1.0 200 OK');
		$this->output->set_header('HTTP/1.1 200 OK');
		$this->output->set_content_type('application/json', 'utf-8');

		$this->load->helper('string');
		$password = array('password' => random_string('alnum', 10));
		
		$this->output->set_output(json_encode($password, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));
	}
	
	public function generate_colors($part_number)
	{
		$this->output->set_header('HTTP/1.0 200 OK');
		$this->output->set_header('HTTP/1.1 200 OK');
		$this->output->set_content_type('application/json', 'utf-8');

		$this->load->database();
		$this->load->helper('common');
		$this->load->model('materials_model');
		$colors = $this->materials_model->get_color_combo_datas($part_number);
		$result = [
			'color' => render_select_html_from_database('material_ids[ROWINDEX]', $colors, 'material_id', 'color', NULL, 'id="coROWINDEX" onchange="select_color(this.id);"')
		];
		$this->output->set_output(json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));
	}
	
	public function generate_unit($material_id)
	{
		$this->output->set_header('HTTP/1.0 200 OK');
		$this->output->set_header('HTTP/1.1 200 OK');
		$this->output->set_content_type('application/json', 'utf-8');

		$this->load->database();
		$this->load->model('materials_model');
		$material = $this->materials_model->get_by_id($material_id);
		$units = config_item('material')['units'];
		$result = [
			'unit'   => $units[$material['unit']] ?? '',
		];
		$this->output->set_output(json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));
	}

}
