<?php
/**
 * @author		
 * @copyright	
 * @license		
 */

defined("_JEXEC") or die("Restricted access");

/**
 * Books feed view class.
 *
 * @package     Davidix_animatedbook
 * @subpackage  Views
 */
class Davidix_animatedbookViewBooks extends JViewLegacy
{
	public function display($tpl = null)
	{
		// Parameters
		$app       = JFactory::getApplication();
		$doc       = JFactory::getDocument();

		$doc->link	= JRoute::_('index.php?option=com_davidix_animatedbook&view=book');
		$app->input->set('limit', $app->getCfg('feed_limit'));

		$rows = $this->get('Items');

		foreach ($rows as $row)
		{
			// strip html from feed item title
			$link = JRoute::_('index.php?option=com_davidix_animatedbook&view=book&id=' . $row->id);
			$link = html_entity_decode($link, ENT_COMPAT, 'UTF-8');

			// Load individual item creator class
			$item				= new JFeedItem;
			$item->title		= $row->type;
			$item->link			= $link;
			$item->date			= $row->publish_up;
			$item->author 		= $row->created_by_alias ? $row->created_by_alias : $row->author;

			// Load item description and add div
			$item->description	= $row->description;

			// Loads item info into rss array
			$doc->addItem($item);
		}
	}
}
