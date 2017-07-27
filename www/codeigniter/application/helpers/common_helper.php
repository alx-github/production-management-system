<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if ( ! function_exists('hash_password'))
{
	function hash_password($password)
	{
		return hash("sha256", $password);
	}
}

if ( ! function_exists('format_datetime'))
{
	function format_datetime($datetime, $format = DATE_FORMAT_DEFAULT)
	{
		if ($datetime === NULL)
		{
			return NULL;
		}
		$date = date_create_from_format(DATE_FORMAT_DEFAULT, $datetime);
		return date($format, $date->getTimestamp());
	}
}

if ( ! function_exists('is_account_admin'))
{
	function is_account_admin($account_type)
	{
		return ACCOUNT_ADMIN === $account_type;
	}
}

if ( ! function_exists('empty_to_default'))
{
	function empty_to_default($value, $default = NULL)
	{
		if (empty($value))
		{
			return $default;
		}
		return $value;
	}
}

if ( ! function_exists('render_select_html'))
{
	function render_select_html($name, $options, $selected_value, $has_unspecified = TRUE, $unspecified_text = '指定なし')
	{
		$html = '<select class="form-control" name="' . $name . '">';
		if ($has_unspecified) 
		{
			$html .= '<option>' . $unspecified_text . '</option>';
		}
		foreach ($options as $key => $value)
		{
			$select = ($key == $selected_value) ? 'selected' : '';
			$html .= '<option value="' . $key . '" ' . $select . '>' . $value . '</option>';
		}
		$html .= '</select>';
		return $html;
	}
}

if ( ! function_exists('render_select_html_from_database'))
{
	function render_select_html_from_database($name, $options, $key_column, $value_column, $selected_value, $has_unspecified = TRUE, $unspecified_text = '指定なし')
	{
		$html = '<select class="form-control" name="' . $name . '">';
		if ($has_unspecified) 
		{
			$html .= '<option value="">' . $unspecified_text . '</option>';
		}
		foreach ($options as $value)
		{
			$select = ($value[$key_column] == $selected_value) ? 'selected' : '';
			$html .= '<option value="' . $value[$key_column] . '" ' . $select . '>' . $value[$value_column] . '</option>';
		}
		$html .= '</select>';
		return $html;
	}
}

if ( ! function_exists('render_input_html'))
{
	function render_input_html($name, $value = NULL, $placeholder = NULL, $custom_class = NULL, $custom_attribute = NULL, $type = 'text')
	{
		$html = '<input class="form-control ' . $custom_class . '" type="' . $type . '" name="' . $name . '" id="' . $name . '" ';
		if ($value) 
		{
			$html .= 'value="' . $value . '" ';
		}
		if ($placeholder) 
		{
			$html .= 'placeholder="' . $placeholder . '" ';
		}
		if ($custom_attribute) 
		{
			$html .= $custom_attribute;
		}
		$html .= '/>';
		return $html;
	}
}

if ( ! function_exists('render_input_hidden_html'))
{
	function render_input_hidden_html($name, $value = NULL)
	{
		return '<input type="hidden" name="' . $name . '" value="' . $value . '"/>';
	}
}

if ( ! function_exists('render_message_html'))
{
	function render_message_html()
	{
		$CI = get_instance();
		$CI->load->library('session');
		if ( ! $CI->session->flashdata('message')) 
		{
			return '';
		}
		$html = '<div class="col-sm-12">';
		$html .=	'<div class="alert alert-dismissible alert-info">';
		$html .=		'<button type="button" class="close" data-dismiss="alert">×</button>';
		$html .=		'<strong>メッセージ</strong>';
		$html .=		'<p>' . $CI->session->flashdata('message') . '</p>';
		$html .=	'</div>';
		$html .= '</div>';
		$CI->session->unmark_flash('message');
		return $html;
	}
}

if ( ! function_exists('render_error_message_html'))
{
	function render_error_message_html()
	{
		$CI = get_instance();
		$CI->load->library('session');
		if ( ! $CI->session->flashdata('error_message'))
		{
			return '';
		}
		$html = '<div class="col-sm-12">';
		$html .=	'<div class="alert alert-dismissible alert-danger">';
		$html .=		'<button type="button" class="close" data-dismiss="alert">×</button>';
		$html .=		'<strong>エラー</strong>';
		$html .=		'<p>' . $CI->session->flashdata('error_message') . '</p>';
		$html .=	'</div>';
		$html .= '</div>';
		$CI->session->unmark_flash('error_message');
		return $html;
	}
}

if ( ! function_exists('render_radio_html'))
{
	function render_radio_html($name, $data, $selected_value)
	{
		$html = '<div class="btn-group" data-toggle="buttons">';
		foreach ($data as $key => $value)
		{
			$html .= '<label class="btn btn-default ' . (($key == $selected_value) ? ' active"' : '"') . '>';
			$html .= '<input type="radio" name="' . $name . '" value="' . $key . '" autocomplete="off"' .(($key == $selected_value) ? 'checked' : '') .'>' . $value . '</label>';
		}
		$html .= '</div>';
		return $html;
	}
}
