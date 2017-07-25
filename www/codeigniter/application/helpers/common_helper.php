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
	function format_datetime($datetime, $format = 'Y/m/d H:i:s')
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
	function render_select_html($name, $data, $selected_value, $has_unspecified = TRUE, $unspecified_text = '指定なし')
	{
		$html = '<select class="form-control" name="' . $name . '">';
		if ($has_unspecified) {
			$html .= '<option>' . $unspecified_text . '</option>';
		}
		foreach ($data as $key => $value)
		{
			$select = ($key == $selected_value) ? 'selected' : '';
			$html .= '<option value="' . $key . '" ' . $select . '>' . $value . '</option>';
		}
		$html .= '</select>';
		return $html;
	}
}
