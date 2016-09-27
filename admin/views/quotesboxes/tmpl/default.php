<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_quotesbox
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted Access');
// load tooltip behavior
JHtml::_('behavior.tooltip');
?>
<form action="<?php echo JRoute::_('index.php?option=com_quotesbox'); ?>" method="post" name="adminForm">
	<table class="table table-striped table-hover">
		<thead>
			<tr>
				<th width="20">
					<?php echo JHtml::_('grid.checkall'); ?>
				</th>
				<th>
					<?php echo JText::_('COM_QUOTESBOX_QUOTESBOX_HEADING_GREETING'); ?>
				</th>
				<th width="5">
					<?php echo JText::_('COM_QUOTESBOX_QUOTESBOX_HEADING_ID'); ?>
				</th>
			</tr>
		</thead>
		<tfoot>
			<tr>
				<td colspan="3"><?php echo $this->pagination->getListFooter(); ?></td>
			</tr>
		</tfoot>
		<tbody>

			<?php if (!empty($this->items)) : ?>
				<?php foreach ($this->items as $i => $row) :
					$link = JRoute::_('index.php?option=com_quotesbox&task=quotesbox.edit&id=' . $row->id);
				?>
					<tr>
						<td>
							<?php echo JHtml::_('grid.id', $i, $row->id); ?>
						</td>
						<td>
							<a href="<?php echo $link; ?>" title="<?php echo JText::_('COM_QUOTESBOX_EDIT_QUOTESBOX'); ?>">
								<?php echo $row->quote; ?>
							</a>
						</td>
						<td align="center">
							<?php echo $row->id; ?>
						</td>
					</tr>
				<?php endforeach; ?>
			<?php endif; ?>



		</tbody>
	</table>
	<input type="hidden" name="task" value=""/>
	<input type="hidden" name="boxchecked" value="0"/>
	<?php echo JHtml::_('form.token'); ?>
</form>
