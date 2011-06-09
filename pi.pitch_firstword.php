<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * ExpressionEngine - by EllisLab
 *
 * @package		ExpressionEngine
 * @author		ExpressionEngine Dev Team
 * @copyright	Copyright (c) 2003 - 2011, EllisLab, Inc.
 * @license		http://expressionengine.com/user_guide/license.html
 * @link		http://expressionengine.com
 * @since		Version 2.0
 */

/**
 * Pitch First Word Plugin
 *
 * @package		ExpressionEngine
 * @subpackage	Addons
 * @category	Plugin
 * @author		Pitch
 * @link		http://pitch.net.nz
 */

$plugin_info = array(
	'pi_name'		=> 'Pitch First Word',
	'pi_version'	=> '1.0.0',
	'pi_author'		=> 'Pitch',
	'pi_author_url'	=> 'http://pitch.net.nz',
	'pi_description'=> 'A plugin to show only the first word of a string.',
	'pi_usage'		=> Pitch_firstword::usage()
);

  
class Pitch_firstword
{
	function pitch_firstword()
	{
		
		// First lets get an instance of EE.
		$this->EE =&get_instance();
		
		// Grab the contents of our plugin tag
		$full_string = $this->EE->TMPL->tagdata;
		
		// Now just grab the first word from the string and put in an array
		$full_string = explode(' ', $full_string);
		
		// Return that word for usage by grabbing the first item of the array if there isn't a name die quietly
		$this->return_data = (isset($full_string[0])) ? $full_string[0] : '';
		
	}

	function usage()
	{
		ob_start(); 
?>

	Use this when you need to output ony the first word of a string some examples are below.
	{exp:pitch_firstword}Ben Lilley{/exp:pitch_firstword} would output "Ben"
	{exp:pitch_firstword}{person-fullname}{/exp:pitch_firstword}

<?php
		$buffer = ob_get_contents();
		ob_end_clean(); 
		return $buffer;
	}
}

/* End of file pi.pitch_firstword.php */
/* Location: /system/expressionengine/third_party/pitch_firstword/pi.pitch_firstword.php */