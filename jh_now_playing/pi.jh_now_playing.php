<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/**
 * JH Now Playing - (PHP5 only)
 * REQUIRES ExpressionEngine 2+
 * 
 * @package     JH Now Playing
 * @version     1.0.0
 * @author      John Henry Donovan
 * @copyright   Copyright (c) 2010 John Henry
 * @license     http://creativecommons.org/licenses/by-sa/3.0/ Attribution-Share Alike 3.0 Unported
 * 
 */
$plugin_info = array(   'pi_name'           => 'JH Now Playing',
                        'pi_version'        => '1.0.0',
                        'pi_author'         => 'John Henry Donovan',
                        'pi_author_url'     => 'http://johnhenry.ie/',
                        'pi_description'    => 'Display information about a currently or recently played iTunes song.',
                        'pi_usage'          => Jh_now_playing::Usage());

/**
 * Jh_now_playing For EE2.0
 * 
 * @package     JH_Now Playing
 * @category    Plugin
 * @author      John Henry Donovan
 * @version     1.0.0
 * 
 */
class Jh_now_playing {



    var $return_data;
	var $variables		= array();
	var $limit			= 1;
	
	
	/**
	 * Constructor
	 *
	 */
	public function Jh_now_playing()
	{
		$this->EE =& get_instance();

  		$this->limit = (($limit = $this->EE->TMPL->fetch_param('limit')) === FALSE) ? $this->limit : $limit;
    
 		/** ---------------------------------------
		/**  Fetch the XML 
		/** ---------------------------------------*/
		
		$sql = "SELECT settings FROM exp_extensions WHERE class = 'Jh_now_playing_ext'";	
		$query = $this->EE->db->query($sql);
		$settings =  $query->result_array();
		$pullpath = unserialize($settings[0]['settings']);
		$base_url =  $pullpath["xml_path"];

	

	if (is_file($base_url))
		{
			$handle = fopen($base_url, 'r');
			$data = fread($handle, filesize($base_url));
			fclose($handle);


    
		/** ---------------------------------------
		/**  Parse the XML with the EE XML Parser class
		/** ---------------------------------------*/
		
		$this->EE->load->library('xmlparser');

	    $XML = new EE_XMLparser;
		$xml_obj = $this->EE->xmlparser->parse_xml($data);
		$this->_load_variables($xml_obj);
		$this->return_data = $this->_parse_variables();
		 		}
	else
		{
			$this->return_data = $base_url.' does not exist.';
		} 
	}
  
  /**
	 * Parse Variables
	 *
	 * Parses the now playing variables
	 *
	 * @access	public
	 * @return	string
	 */
	public function _parse_variables()
	{
		
		$output = '';
		$count = 0;

		foreach($this->variables as $key => $val)
		{
			$tagdata = $this->EE->TMPL->tagdata;
			
			$count++;

			if ($count > $this->limit)
			{
				return $output;
			}

			/** ---------------------------------------
			/**  Prep conditionals
			/** ---------------------------------------*/
			
			$cond	 = $val;

			$tagdata = $this->EE->functions->prep_conditionals($tagdata, $cond);

			
			
			foreach($this->EE->TMPL->var_single as $var_key => $var_val)
			{
				

			$tagdata = $this->EE->TMPL->swap_var_single($var_key, $val[$var_key], $tagdata);
				
				
				
			}
			
			$output .= $tagdata;
		}
		
		return $output;
	}

	// --------------------------------------------------------------------  
    
  /**
	 * Load Variables
	 *
	 * Load variables from XML object
	 *
	 * @access	public
	 * @param	EE XML Parser object
	 * @return	void
	 */
	public function _load_variables($xml_obj)
	{
		foreach($xml_obj->children as $key => $status)
		{
			foreach($status->children as $ckey => $item)
			{
				
					$this->variables[$key][$item->tag] = $item->value;					
				
			}
		}
	}



	// --------------------------------------------------------------------
	


	public function usage()
    {
    	ob_start(); 
    	?>

		This plugin requires the Now Playing iTunes Visualizer by Brandon Fuller.
		http://brandon.fuller.name/archives/hacks/nowplaying/
		
		Example Usage:
		
		{exp:jh_now_playing limit="3"}
		<a href="{urlAmazon}"><img src="{artworkID}" alt="{album}" /></a><p><strong>{artist}</strong><br />{title}</p>
		{/exp:jh_now_playing}

		Available Variables:
		
		{title}			song title
		{artist}		artist name
		{album}			album name
		{genre}			genre
		{kind}			audio file type (AAC, MP3, etc.)
		{track}			track number
		{numTracks}		total album tracks
		{year}			year published
		{comments}		iTunes user comments
		{time}			time, in seconds
		{bitrate}		audio file bitrate
		{rating}		iTunes rating
		{disc}			disk number
		{numDiscs}		number of disks
		{playCount}		playcount
		{compilation}	compilation
		{urlAmazon}		address to album on Amazon, if available
		{urlApple}		address to album on Apple, if available
		{imageSmall}	address to small image on Amazon
		{image}			address to medium image on Amazon
		{imageLarge}	address to large image on Amazon
		{composer}		composer
		{urlSource}		URL source
		{file}			filename
		{artworkID}		address to uploaded artwork, built with $image_url
		
    	<?php
    	$buffer = ob_get_contents();

    	ob_end_clean(); 

    	return $buffer;

        }
        // END

}

/* End of file pi.jh_now_playing.php */ 
/* Location: ./system/expressionengine/third_party/jh_now_playing/pi.jh_now_playing.php */
