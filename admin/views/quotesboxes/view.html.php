<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_quotesbox
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla view library
jimport('joomla.application.component.view');
/**
 * QuotesBoxes View
 *
 * @since  0.0.1
 */
class QuotesBoxViewQuotesBoxes extends JViewLegacy
{
	/**
	 * Display the Quotes Boxes view
	 *
	 * @param   string  $tpl  The name of the template file to parse; automatically searches through the template paths.
	 *
	 * @return  void
	 */
	 function display($tpl = null)
 	{
 		// Get data from the model
 		$items      = $this->get('Items');
 		$pagination = $this->get('Pagination');
 		// Check for errors.
 		if (count($errors = $this->get('Errors')))
 		{
 			JError::raiseError(500, implode('<br />', $errors));
 			return false;
 		}
 		// Assign data to the view
 		$this->items      = $items;
 		$this->pagination = $pagination;
 		// Display the template
 		parent::display($tpl);
 	}
}
