<?php
// No direct access
defined('_JEXEC') or die;
// Include the syndicate functions only once
require_once dirname(__FILE__) . '/helper.php';

$rotate = $params->get('rotate', 'random');
$category=$params->get('catid','');
$quote = modQuotesBoxHelper::getQuote($rotate, $category);
require JModuleHelper::getLayoutPath('mod_quotesbox');
