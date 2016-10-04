<?php

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

class QuotesBoxViewQuote extends JViewLegacy
{
    protected $form;
    protected $quote;

    public function display($tpl = null)
    {
        $this->form = $this->get('Form');
        $this->quote = $this->get('Quote');

        $this->addToolBar();
        parent::display($tpl);

        $this->setDocument();
    }

    protected function addToolBar()
    {
        JToolBarHelper::title(JText::_('COM_QUOTESBOX_QUOTE_ADD'));

        JToolBarHelper::save('quote.save');
        JToolBarHelper::cancel('quote.cancel');
    }

    protected function setDocument()
    {
        $document = JFactory::getDocument();

        $document->setTitle(JText::_('COM_QUOTESBOX_ADMIN_TITLE'));
    }
}
