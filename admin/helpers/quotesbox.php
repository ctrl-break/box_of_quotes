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

abstract class QuotesBoxHelper
{
	/**
	 * Configure the Linkbar.
	 *
	 * @return Bool
	 */

	public static function addSubmenu($submenu)
	{
		JSubMenuHelper::addEntry(
			JText::_('COM_QUOTESBOX_SUBMENU_MESSAGES'),
			'index.php?option=com_quotesbox',
			$submenu == 'quotes'
		);

		JSubMenuHelper::addEntry(
			JText::_('COM_QUOTESBOX_SUBMENU_CATEGORIES'),
			'index.php?option=com_categories&view=categories&extension=com_quotesbox',
			$submenu == 'categories'
		);

		// Set some global property
		$document = JFactory::getDocument();

		if ($submenu == 'categories')
		{
			$document->setTitle(JText::_('COM_QUOTESBOX_ADMINISTRATION_CATEGORIES'));
		}
	}
}
