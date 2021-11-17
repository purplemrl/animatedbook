<?php
/**
 * @author		
 * @copyright	
 * @license		
 */

defined("_JEXEC") or die("Restricted access");

/**
 * Davidix_animatedbook Component Category Tree
 *
 * @static
 * @package     Davidix_animatedbook
 * @subpackage  Helpers
 */
class Davidix_animatedbookCategories extends JCategories
{
	/**
	 * Constructor
	 * 
	 */
	public function __construct($options = array())
	{
		$options["extension"] = "com_davidix_animatedbook";
		$options["table"] = "#__books";
		$options["field"] = "catid";
		$options["key"] = "id";
		$options["statefield"] = "published";

		parent::__construct($options);
	}
}