<?php

defined('_JEXEC') or die('Restricted access');
?>

<form class="" action="index.php?option=com_quotesbox"
    method="post" id="adminForm" name="adminForm">

    <table class="adminlist">
  		<thead><?php echo $this->loadTemplate('head'); ?></thead>
  		<tfoot><?php echo $this->loadTemplate('foot'); ?></tfoot>
  		<tbody><?php echo $this->loadTemplate('body'); ?></tbody>
  	</table>

    <input type="hidden" name="task" value="">
    <?php echo JHtml::_('form.token'); ?>
</form>
