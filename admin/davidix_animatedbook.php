<?php
/**
 * @author		
 * @copyright	
 * @license		
 */

defined("_JEXEC") or die("Restricted access");

require_once JPATH_COMPONENT_ADMINISTRATOR.'/helpers/davidix_animatedbook.php';

$controller	= JControllerLegacy::getInstance('Davidix_animatedbook');
$input = JFactory::getApplication()->input;

if (!JFactory::getUser()->authorise('core.manage', 'com_davidix_animatedbook'))
{
	return JError::raiseWarning(404, JText::_('JERROR_ALERTNOAUTHOR'));
}

try {
	$controller->execute($input->get('task'));
} catch (Exception $e) {
	$controller->setRedirect(JURI::base(), $e->getMessage(), 'error');
}

$controller->redirect();
?>