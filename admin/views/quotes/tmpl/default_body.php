<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted Access');
?>
  <?php if (!empty($this->quotes)) : ?>
      <?php foreach($this->quotes as $i => $row) : ?>
            <?php $link = 'index.php?option=com_quotesbox&task=quote.edit&id=' . $row->id; ?>
              <tr align="center">
                  <td><?php echo $this->pagination->getRowOffset($i); ?></td>
                  <td>
              			<?php echo JHtml::_('grid.id', $i, $row->id); ?>
              		</td>
              		<td>
              			<a href="<?php echo $link;?>"><?php echo $row->quote; ?></a>
              		</td>
              		<td>
              			<?php echo $row->author; ?>
              		</td>
              </tr>
      <?php endforeach; ?>
  <?php endif; ?>
