<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Replace_template_code_ext Class
 *
 * @package			JH Now Playing
 * @category		Extension
  * @version     1.0.0
 * @author			John Henry Donovan
 * @copyright		Copyright (c) 2010, John Henry Donovan
 * @link			http://johnhenry.ie/
 */

class Jh_now_playing_ext {

	//required
    public 	$settings        	= array();
    
    public 	$name            	= 'JH Now Playing';
    public 	$version         	= '1.0.0';
    public 	$description     	= 'Settings for the JH Now Playing add-on..';
    public 	$settings_exist  	= 'y';
    public 	$docs_url        	= 'http://johnhenry.ie/';
	public 	$class_name			= '';
	


    public function __construct($settings='')
    {
        $this->settings 	= $settings;
		$this->class_name	= get_class($this);
		$this->EE			=& get_instance();
    }



	// --------------------------------------------------------------------

	/**
	 * Activate
	 *
	 * @access	public
	 * @return	null
	 */
	
	public function activate_extension()
	{
	    $this->EE->db->query(
			$this->EE->db->insert_string(
				'exp_extensions',
				array(
					'extension_id' => '',
					'class'        => $this->class_name,
					'method'       => "dummy_hook_function",
					'hook'         => "dummy_hook_function",
					'settings' => serialize($this->settings),
					'priority'     => 10,
					'version'      => $this->version,
					'enabled'      => "y"
				)
			)
		);
		
		
	}



	// --------------------------------------------------------------------

	/**
	 * Update
	 *
	 * @access	public
	 * @return	null
	 */
	
	public function update_extension($current='')
	{
		if ($current == '' OR $current == $this->version)
	    {
	        return FALSE;
	    }
	    
		$this->EE->db->query(
			$this->EE->db->update_string(
				'exp_extensions',
				array(
					'version' 	=> $this->version
				),
				array(
					'class' 	=> $this->class_name
				)
			)
		);
	}

	

	// --------------------------------------------------------------------

	/**
	 * Disaable
	 *
	 * @access	public
	 * @return	null
	 */
	
	public function disable_extension()
	{
	    $this->EE->db->query(
			"DELETE 
			 FROM 	exp_extensions 
			 WHERE 	class = '{$this->class_name}'"
		);
	}


	// --------------------------------------------------------------------

	/**
	 * Settings
	 *
	 * @access	public
	 * @return	array settings
	 */
	
	public function settings()
	{
		$settings 				= array();

		$settings['xml_path']	= '';
		
		return $settings;
	}
	
	
	// --------------------------------------------------------------------
	public function save_settings()
	{

		$settings = array();

		foreach ($this->default_settings AS $key => $val)
		{
			$settings[$key] = $this->EE->input->post($key, $val);
		}

		$this->EE->db->update('exp_extensions', array('settings' => serialize($settings)), "class = '".ucfirst(get_class($this))."'");
	}

	
}
// END CLASS
/* End of file ext.jh_now_playing.php */ 
/* Location: ./system/expressionengine/third_party/jh_now_playing/ext.jh_now_playing.php */