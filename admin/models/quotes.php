<?php
/**
 * @copyright   Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

class QuotesBoxModelQuotes extends JModelList
{
    protected function getListQuery()
    {
        // Create a new query object.
        $db    = JFactory::getDBO();
        $query = $db->getQuery(true);
        // Select some fields
        $query->select('id, quote, author');
        // From the hello table
        $query->from('#__quotesbox');
        return $query;
    }
}
