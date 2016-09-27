<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_quotesbox
 *
 * @copyright   Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

/**
 * QuotesBox Model
 *
 * @since  0.0.1
 */
class QuotesBoxModelQuotesBox extends JModelItem
{
  /**
	 * @var array messages
	 */
	protected $messages;

  /**
	 * Method to get a table object, load it if necessary.
	 *
	 * @param   string  $type    The table name. Optional.
	 * @param   string  $prefix  The class prefix. Optional.
	 * @param   array   $config  Configuration array for model. Optional.
	 *
	 * @return  JTable  A JTable object
	 *
	 * @since   1.6
	 */
	public function getTable($type = 'QuotesBox', $prefix = 'QuotesBoxTable', $config = array())
	{
		return JTable::getInstance($type, $prefix, $config);
	}


  	/**
  	 * Get the message
  	 *
  	 * @param   integer  $id  Greeting Id
  	 *
  	 * @return  string        Fetched String from Table for relevant Id
  	 */
  	public function getMsg($id = 1)
  	{
  		if (!is_array($this->messages))
  		{
  			$this->messages = array();
  		}

  		if (!isset($this->messages[$id]))
  		{
  			// Request the selected id
  			$jinput = JFactory::getApplication()->input;
  			$id     = $jinput->get('id', 1, 'INT');

  			// Get a TableHelloWorld instance
  			$table = $this->getTable();

  			// Load the message
  			$table->load($id);

  			// Assign the message
  			$this->messages[$id] = $table->quote;
  		}

  		return $this->messages[$id];
  	}
}
