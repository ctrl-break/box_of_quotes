<?php
/**
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

/**
 * QuotesBox Model.
 *
 * @since  0.0.1
 */
class QuotesBoxModelQuote extends JModelAdmin
{
    /**
     * Method to get a table object, load it if necessary.
     *
     * @param string $type   The table name. Optional
     * @param string $prefix The class prefix. Optional
     * @param array  $config Configuration array for model. Optional
     *
     * @return JTable A JTable object
     *
     * @since   1.6
     */
    public function getTable($type = 'QuotesBox', $prefix = 'QuotesBoxTable', $config = array())
    {
        return JTable::getInstance($type, $prefix, $config);
    }

    public function getForm($data = array(), $loadData = true)
    {
        $form = $this->loadForm('com_quotesbox.quote',
				                        'quote',
                                 array('control' => 'jform', 'load_data' => $loadData));
        if (empty($form)) {
            return false;
        }

        return $form;
    }

		public function getQuote()
		{
			return true;
		}
}
