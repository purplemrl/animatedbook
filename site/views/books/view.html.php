<?php
/**
 * @author		
 * @copyright	
 * @license		
 */

defined("_JEXEC") or die("Restricted access");

/**
 * Books list view class.
 *
 * @package     Davidix_animatedbook
 * @subpackage  Views
 */
class Davidix_animatedbookViewBooks extends JViewLegacy
{
	protected $items;
	protected $pagination;
	protected $state;
	protected $toolbar;

	public function display($tpl = null)
	{
		$app = JFactory::getApplication();
		
		$this->items 		 = $this->get('Items');
		$this->state 		 = $this->get('State');
		$this->pagination 	 = $this->get('Pagination');
		$this->user		 	 = JFactory::getUser();
		$this->filterForm    = $this->get('FilterForm');
		$this->activeFilters = $this->get('ActiveFilters');
		
		
		$active = $app->getMenu()->getActive();
		if ($active)
		{
			$this->params = $active->params;
		}
		else
		{
			$this->params = new JRegistry();
		}
		
		// Add feed links
		$attribs = array('type' => 'application/rss+xml', 'title' => 'RSS 2.0');
		$this->document->addHeadLink(JRoute::_('&format=feed&type=rss'), 'alternate', 'rel', $attribs);
		$attribs = array('type' => 'application/atom+xml', 'title' => 'Atom 1.0');
		$this->document->addHeadLink(JRoute::_('&format=feed&type=atom'), 'alternate', 'rel', $attribs);
		
		// Prepare the data.
		foreach ($this->items as $item)
		{
			$item->slug	= $item->alias ? ($item->id.':'.$item->alias) : $item->id;

			$temp = new JRegistry;
			$temp->loadString($item->params);
				
			$active = $app->getMenu()->getActive();
			$item->params = clone($this->params);
			$item->params->merge($temp);
		}

		// Check for errors.
		if (count($errors = $this->get('Errors')))
		{
			throw new Exception(implode("\n", $errors));
			return false;
		}
		
		parent::display($tpl);
	}
}
?>