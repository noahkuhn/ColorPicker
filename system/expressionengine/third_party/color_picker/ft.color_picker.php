<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* ===========================================================================
ft.color_picker.php ---------------------------
A color picker Field Type for the ExpressionEngine control panel.

INFO ---------------------------
Developed by: Noah Kuhn, pilotmade.com
Created:   Oct 17 2011
Last Mod:  Oct 17 2011
=============================================================================== */

class Color_picker_ft extends EE_Fieldtype
{
	var $info = array(
	    'name'             => 'Color Picker',
	    'version'          => '1.0'
	);
    
	function Color_picker_ft()
	{
		$this->EE =& get_instance();
		
		$this->EE->load->library('javascript');
	}
	
	function display_publish_field($data)
	{
		return $this->display_field($data);
	}
    
	function _display_field($name, $data)
	{
		$this->EE->load->helper('form');
		
		$this->EE->cp->add_to_head('<script type="text/javascript" src="'.$this->EE->config->item('theme_folder_url').'third_party/color_picker/jscolor.js"></script>');	
		
		$input = form_input(array(
			'name' => $name,
			'value' => $data,
			'type' => 'text',
			'size' => '6',
			'maxlength' => '6',
			'class' => 'color {pickerFaceColor:\'#ecf1f4\', pickerBorderColor:\'#b6c0c2 #b6c0c2 #b6c0c2 #b6c0c2\'}'
		));
				
		return $input;
	}

	/**
	 * Display Field
	 * 
	 * @param  string  $field_name      The field's name
	 * @param  mixed   $field_data      The field's current value
	 * @param  array   $field_settings  The field's settings
	 * @return string  The field's HTML
	 */
	function display_field($data)
	{
		return $this->_display_field($this->field_name, $data);
	}

	/**
	 * Display Cell
	 * 
	 * @param  string  $cell_name      The cell's name
	 * @param  mixed   $cell_data      The cell's current value
	 * @param  array   $cell_settings  The cell's settings
	 * @return string  The cell's HTML
	 */
	function display_cell($data)
	{
		return $this->_display_field($this->cell_name, $data);
	}

/* END class */
}
/* End of file ft.color_picker.php */
/* Location: ./system/expressionengine/third_party/color_picker/ft.color_picker.php */ 