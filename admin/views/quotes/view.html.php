<?php

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

class QuotesBoxViewQuotes extends JViewLegacy
{
    public function display($tpl = null)
    {
        $this->addToolBar();
        parent::display($tpl);

        $this->setDocument();
    }

    protected function addToolBar()
    {
        JToolBarHelper::title(JText::_('COM_QUOTESBOX_ADMIN_TITLE'));

        JToolBarHelper::addNew('quote.add');
        JToolBarHelper::editList('quote.edit');

        JToolBarHelper::deleteList( '', 'quotes.delete');
    }

    protected function setDocument()
    {
        $document = JFactory::getDocument();

        $document->setTitle(JText::_('COM_QUOTESBOX_ADMIN_TITLE'));
    }

}
