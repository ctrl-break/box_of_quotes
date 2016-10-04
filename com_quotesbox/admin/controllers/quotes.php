<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

/**
 * Quotes Controller.
 *
 * @since       0.0.9
 */
class QuotesBoxControllerQuotes extends JControllerAdmin
{
    public function getModel($name = 'Quote', $prefix = 'QuotesBoxModel')
  	{
  		$model = parent::getModel($name, $prefix, array('ignore_request' => true));
  		return $model;
  	}
}
